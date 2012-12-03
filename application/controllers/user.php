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
    $this->load->model('user_model','',TRUE);
    $this->load->model('message_model');
    $this->content = array('error' => 'Ingen användare funnen');
    $this->data = array('title' => 'Profilsida');
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
     foreach($result as $row){
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
          'avatar' => NULL,
          'presentation' => NULL,
          'comments' => $this->message_model->fetch_all_messages($row->id),
          'error' => FALSE
          );
      }
      if ( ! $this->content['avatar'])
      {
        $this->content['avatar'] = 'http://placehold.it/150x150';
      }
      if ( ! $this->content['presentation'])
      {
        $this->content['presentation'] = '<div class="noResult">Denna användare har ej skrivit någon presentation än</div>';
      }
    }
  }

  function edit_info($where)
  {
    $this->_set_content($this->logged_in_user['id']);
    switch ($where):
      case 'all': 
      $this->load->view('header_view', $this->data);
      $this->load->view('edit_profile_view', $this->content);
      $this->load->view('footer_view'); 
      break;
      case 'avatar':
      echo 'blöh';
      break;
    endswitch;
  }

  function verify_edit_info()
  {
  if ($this->form_validation->run('change_profile_info') == FALSE) // validation hasn't been passed
    {
      echo "något blev fel";
    }
    else // passed validation proceed to post success logic
    {
      // build array for the model
      $password = set_value('password');
      $pw = SHA1('shru7hTTls'.$password);
      $id = $this->logged_in_user['id'];

      $data = array(
                        //'username' => set_value('username'),
                        'firstname' => set_value('firstname'),
                        'lastname' => set_value('lastname'),
                        'city' => set_value('city'),
                        'country' => set_value('country'),
                        'zip' => set_value('zip'),
                        'phone' => set_value('phone'),
                        'email' => set_value('email'),
                        ); 
      $result = $this->user_model->update_user_info($id, $pw, $data);
      if($result){
        echo 'uppgifter ändrade';
      }else{
        echo 'något gick snett';
      }
    }
  }
}
/* End of file user.php */
/* Location: ./application/controllers/user.php */