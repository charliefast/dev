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

	/**
	 * Constructor 
	 */
	function __construct()
	{
		parent::__construct();
		$this->data = array( 'title' => 'Välkommen');
	}

	function index()
	{
		$this->load->helper(array('form','url'));
		$this->load->view('header_view', $this->data);
		($this->logged_in())?$this->load->view('start_view'):$this->load->view('login_view');
		$this->load->view('footer_view');
		//$this->template->build('welcome_message', array('message' => 'Hi there!'));
	}
	function logged_in()
	{
		$is_logged_in = $this->session->userdata('logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
		return FALSE;
		}
		else
		{
		return TRUE;
		}
	}

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		echo "logged out";
	}
}
/* End of file login.php */
/* Location: ./application/controllers/login.php */