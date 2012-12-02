<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

/**
 * Controller Login class
 * 
 * Default controller. Loads login page.
 * @author Carina Möllbrink
 */

class Login extends CI_Controller {

	private $data;
  private $user_id;

	/**
	 * Constructor 
	 */
	function __construct()
	{
		parent::__construct();
    $this->load->model('item_model');
		$this->data = array( 'title' => 'Välkommen');
	}
  /**
   * Default function. Loads firstpage.
   */
	function index()
	{
		$this->load->helper(array('form','url'));
		$this->load->view('header_view', $this->data);
		($this->logged_in())?$this->load->view('start_view', $this->get_starrred_items()):$this->load->view('login_view');
		$this->load->view('footer_view');
	}
  
  /**
   * Checks if user is logged in
   * 
   * @return BOOLEAN
   */
	function logged_in()
	{
		$is_logged_in = $this->session->userdata('logged_in');
    $this->user_id = $is_logged_in['id'];
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
		return FALSE;
		}
		else
		{
		return TRUE;
		}
	}

  /**
   * Logout user and destroys session
   * 
   * @return mixed
   */
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		$status = 'logged out';
    $this->load->view('header_view', $this->data);
    $this->load->view('logout_view');
    $this->load->view('footer_view');
		if ($this->input->get('callback') == 'json' || $this->input->is_ajax_request())
		{
      echo json_encode(array('status' => $status));
      exit();
    }
		echo $status;
	}
  
  /**
   * Gets starred items
   * @todo make it actually make it specific to user
   * 
   * @return mixed
   */
  function get_starrred_items()
  {
    $result = $this->item_model->get_item();
    if ($result){
      if ($this->input->get('callback') == 'json' || $this->input->is_ajax_request())
      {
        echo json_encode(array('starred' => $result));
        exit();
      }
      $this->content = array('result' => $result);
    }
    else
   {
     $this->content = array('error' => $result);
   }
   if ($this->input->get('callback') == 'json' || $this->input->is_ajax_request())
   {
     echo json_encode(array('content' => $this->content));
     exit();
   }
   return $this->content;
  }
}
/* End of file login.php */
/* Location: ./application/controllers/login.php */