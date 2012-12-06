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

  function get_user_info($id)
  {
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

  private function _set_content($id)
  {
    $result = $this->user_model->get_user($id);
    if($result){
      $this->content = array(
        'id' => $id,
        'result' => $result, 
        'comments' => $this->message_model->fetch_all_messages($id),
        'error' => FALSE);
     /*foreach($result as $row){
        $this->data = array ('title' => $row->firstname.' '.$row->lastname);
        $place = ($row->city && $row->country)?$row->city.', '.$row->country:'ej angivet';
        $this->content = array(
          'id' => $row->id,
          'firstname' => $row->firstname,
          'lastname' => $row->lastname,
          'city' => $row->city,
          'country' => $row->country,
          'place' => $place,
          'sign_up_date' => $row->sign_up_date,
          'email' => $row->email,
          'avatar' => $row->url,
          'presentation' => NULL,
          'comments' => $this->message_model->fetch_all_messages($row->id),
          'error' => FALSE,
          'likes' => $this->like_model->fetch_likes($row->id)
          );*/
      }
     /* if ( ! $this->content['avatar'])
      {
        $this->content['avatar'] = 'http://placehold.it/150x150';
      } */
      /*if ( ! $this->content['presentation'])
      {
        $this->content['presentation'] = '<div class="noResult">Denna användare har ej skrivit någon presentation än</div>';
      }
    }*/
  }

  function edit_profile()
  {
    $this->_set_content($this->logged_in_user['id']);
    $this->load->view('header_view', $this->data);
    $this->load->view('edit_profile_view', $this->content);
    $this->load->view('footer_view'); 
  }

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
          'message' => 'Något blev fel'
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
            'message' => 'Dina uppgifter har ändrats!'
          );
          echo create_json($response);
          exit;
        }else{
          
          $response = array(
            'state'  => false,
            'message' => 'Något gick snett'
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