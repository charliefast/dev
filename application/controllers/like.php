<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller like class
 * 
 * Handles likes
 */
class Like extends Auth_Controller {
		
	private $data;
	private $content;
	private $logged_in_user;
	
	/**
	 * Constructor
	 */
	function __construct()
	{
		parent::__construct();
		$this->logged_in_user = $this->session->userdata('logged_in');
		$this->load->model('like_model');
		$this->load->model('user_model');
	}
	
	/**
	 * Adds likes
	 * 
	 * @param int $item_id
	 * @return mixed
	 */
	function like_item($item_id)
	{
		$result = $this->like_model->insert_like($item_id, $this->logged_in_user['id']);
		if($result)
		{
			$response = array(
				'state'  => true,
				'message' => 'Tillagd i minneslistan!'
			);
		}
		else
		{
			$response = array(
				'state'  => false,
				'message' => 'Något gick fel!'
			);
		}  
		echo create_json($response);
		exit;
	}
	
	/**
	 * Fetches likes
	 * 
	 * @param int $item_id
	 * @return mixed
	 */
	function get_likes($user_id)
	{
		$result = $this->like_model->fetch_likes($user_id);
		if ($result)
		{
			if ($this->input->get('callback') == 'json' || $this->input->is_ajax_request())
			{
				echo json_encode(array('content' => $result));
				exit();
			}
			return array('likes' => $result, 'error' =>FALSE, 'id' => $user_id);
		}
		else
		{
			return array('error' =>'Minneslistan är tom', 'id' => $user_id);
		}
	}

	/**
	* Loads view for user's likes
	* 
	* @param int $user_id
	*/
	function show_user_likes($user_id)
	{
		$user_data = $this->session->userdata('logged_in');
		$edit = ($user_data['id'] === $user_id)?TRUE:FALSE;
		$this->content =  $this->get_likes($user_id);
		$this->content['result'] = $this->user_model->get_user($user_id);
		$this->load->view('header_view', array('title' => 'Minneslista', 'page' => 'likes'));
		if ($edit)
		{
			$this->load->view('edit_likes_view', $this->content); 
		}
		else
		{
			$this->load->view('likes_view', $this->content); 
		}
		$this->load->view('footer_view'); 
	}
}
/* End of file like.php */
/* Location: ./application/controllers/like.php */