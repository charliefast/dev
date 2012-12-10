<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller user class
 * 
 * Handles existing users
 */
class User extends Auth_Controller {
    
  private $data;
  private $content;
  private $logged_in_user;

  function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->model('message_model');
    $this->load->model('like_model');
    $this->content = array('error' => 'Ingen användare funnen');
    $this->data = array('title' => 'Profilsida', 'page' => 'profile');
    $this->logged_in_user = $this->session->userdata('logged_in');
    $this->load->library('form_validation');
    $this->lang->load('form_validation', 'swedish');
  }
  
  function index()
  { 
  }
  /**
   * Loads page with user info
   * 
   * @param in $id
   */
  function get_user_info($id)
  {
    $user = $this->facebook->getUser();
    if ($user)
    {
      $this->load_facebook_profile_page();
    }
    if ($this->logged_in_user['id'] == $id)
    {
      $this->data['page'] = 'my_profile';
    }
    $this->_set_content($id);
    $this->load->view('header_view', $this->data);
    if ($this->input->is_ajax_request())
    {
      echo create_json(array('status' => $this->content));
      exit();
    }
    $this->load->view('profile_view', $this->content);
    $this->load->view('footer_view');
  }
  
  function load_facebook_profile_page()
  {
    $this->content = $this->facebook->api('/me');
    $this->load->view('header_view', $this->data);
    $this->load->view('fb_profile_view', $this->content);
    $this->load->view('footer_view');
  }

  /**
   * Sets content
   * 
   * @access private
   * @param int $id
   */
  private function _set_content($id)
  {
    $result = $this->user_model->get_user($id);
    if($result){
    $message_result = $this->message_model->fetch_all_messages($id , TRUE, '10, 0', '', '', 0);
    foreach ($message_result as $mrow) {
      $messages[] = array('parent' => $mrow,
        'children' => $this->message_model->fetch_all_messages($id , FALSE, '10, 0', '', '', $mrow->message_id)
        );

    }
      $this->content = array(
        'id' => $id,
        'result' => $result, 
        'comments' => $messages,
        'error' => FALSE);
      }
  }
  
  /**
   * Loads edit profile page
   */
  function edit_profile()
  {
    $this->_set_content($this->logged_in_user['id']);
    $this->load->view('header_view', $this->data);
    $this->load->view('edit_profile_view', $this->content);
    $this->load->view('footer_view'); 
  }
  
  /**
   * Verifies new profile info
   * 
   * @return mixed
   */
  function verify_edit_info()
  {
    $id = $this->logged_in_user['id'];
    if ($this->input->post('submit') == 'abort')
    {
      redirect('user/'.$id);
    }
    else
    {
    if ($this->form_validation->run('change_profile_info') == FALSE) // validation hasn't been passed
      {
        $response = array(
          'state'  => false,
          'message' => 'Nu blev det fel'
        );
  
        echo create_json($response);
        exit;
      }
      else // passed validation proceed to post success logic
      {
        // build array for the model
        $password = set_value('password');
        $pw = SHA1('shru7hTTls'.$password);
        $data = array(
                          //'username' => set_value('username'),
                          'firstname' => set_value('firstname'),
                          'lastname' => set_value('lastname'),
                          'city' => set_value('city'),
                          'country' => set_value('country'),
                          'zip' => set_value('zip'),
                          'phone' => set_value('phone'),
                          'email' => set_value('email'),
                          'presentation' => set_value('presentation'),
                          ); 
        $result = $this->user_model->update_user_info($id, $pw, $data);
        if($result){
          $response = array(
            'state'  => true,
            'message' => 'Dina ändringar har sparats!'
          );
          echo create_json($response);
          exit;
        }else{
          $response = array(
            'state'  => false,
            'message' => 'Du kanske inte har gjort någon ändring i formuläret, eller så är ditt lösenord fel. Försök igen!'
          );
          echo create_json($response);
          exit;
        }
      }
    }
  }
}
/* End of file user.php */
/* Location: ./application/controllers/user.php */