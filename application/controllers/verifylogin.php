<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller VerifyLogin class
 * 
 * Handles verification of login and sets session
 *
 */

class VerifyLogin extends CI_Controller {

  /**
   * Constructor
   */
  function __construct()
  {
    parent::__construct();
    $this->load->model('user_model','',TRUE);
    $this->load->library('form_validation');
    $this->lang->load('form_validation', 'swedish');
  }
  
  /**
   * Index
   * 
   * @return mixed
   */
  function index()
  {
    if($this->form_validation->run('login') == FALSE)
    {
      $response = array(
        'state'  => false,
        'message' => 'Inloggningen misslyckades, försök igen!'
      );
      echo json_encode($response);
    }
    else
    {
      //Go to private area
      redirect('index.php', 'refresh');
    } 

  }
  
  /**
   * Validates against database and sets session
   * 
   * @param string $password
   * @return BOOLEAN
   */
  function check_database($password)
  {
    //Field validation succeeded.&nbsp; Validate against database
    $username = $this->input->post('username');
    //query the database
    $result = $this->user_model->login($username, $password);
    if($result)
    {
      $sess_array = array();
      foreach($result as $row)
      {
        $sess_array = array(
          'id' => $row->id,
          'username' => $row->email
        );
        $this->session->set_userdata('logged_in', $sess_array);
      }
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('check_database', 'Invalid username or password');
      return FALSE;
    }
  }
}
/* End of file verifylogin.php */
/* Location: ./application/controllers/verifylogin.php */