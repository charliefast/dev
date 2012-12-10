<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

/**
 * Controller Login class
 * 
 * Default controller. Loads login page.
 */

class Login extends CI_Controller {

	private $data;
	private $user_id;
	private $fb_data;

	/**
	 * Constructor 
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('item_model');
		$this->load->model('user_model');
		$this->data = array( 'title' => 'Välkommen', 'page' => 'front');
		$this->load->helper(array('form','url'));
	}
	/**
	 * Default function. Loads firstpage.
	 */
	function index()
	{
		$this->fb_data = $this->_set_fb_data();
		$this->load->view('header_view', $this->data);
		($this->logged_in())?$this->load->view('start_view', $this->get_starred_items()):$this->load->view('login_view', $this->fb_data);
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
		$user = $this->facebook->getUser();
		if($user)
		{
			$this->facebook->destroySession();
		}
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
	 * @param (optional) int $offset 
	 * @param (optional) int $number
	 * @return mixed
	 */
	function get_starred_items($offset = '0', $limit = '20')
	{
		$result = $this->item_model->get_item('', '', $limit, $offset);
		if ($result){
			$this->content = array('result' => $result);
		}
		else
	 {
		 $this->content = array('error' => $result);
	 }
	 $this->content['total_num_row'] = $this->item_model->count_rows();
	 if ($this->input->get('callback') == 'json' || $this->input->is_ajax_request())
	 {
		 echo json_encode(array('starred' => $result, 'total_num_row' => $this->content['total_num_row']));
		 exit();
	 }
	 return $this->content;
	}
  
  /**
   * sets fb_data
   *
   * @access private
   * @return mixed
   */
	private function _set_fb_data()
	{
		$user = $this->facebook->getUser();
		if ($user)
		{
				try {
						$this->fb_data['user_profile'] = $this->facebook->api('/me');
						$this->_handle_fb_login();
				} catch (FacebookApiException $e) {
						$user = null;
				}
		}
		if (! $user)
		{
			$this->fb_data['login_url'] = $this->facebook->getLoginUrl(array('scope' => 'email'));
		}
		return $this->fb_data;
	}
  
  /**
   * Checks if user that is trying to log on from fb is member already
   *
   * @access private
   * @return BOOLEAN
   */
	private function _is_member_check()
	{
		$email = $this->fb_data['user_profile']['email'];
		$result = $this->user_model->get_user_by_email($email);
		if ($result)
		{
			foreach ($result as $row) {
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
		return FALSE;
		}
	}
	/**
	 * Handles fb login
	 *
	 * @access private
	 */
	private function _handle_fb_login()
	{
		$result = $this->_is_member_check();
		if (! $result)
		{
			$register = $this->user_model->register_user_from_fb($this->fb_data);
			if ($register)
			{
				redirect(base_url());
			}
		}
	}
}
/* End of file login.php */
/* Location: ./application/controllers/login.php */