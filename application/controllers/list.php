<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Lists extends Auth_Controller {

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
		$this->load->model('list_model');
		$this->load->model('user_model');
	}
	// function Todo()
	// {
	// 	parent::Controller();
 //                $this->load->helper('url');
	// 	$this->load->helper('form');
	// 	$this->load->model('todo_model');
	// }

	function index()
	{
		$this->index_page();
	}

	function index_page()
	{
		$info['item'] = $this->list_model->get_all_list_items();
		$this->load->view('list_view.php', $info);
	}

	function add_item()
	{
		$content = $this->input->post('content');
		$this->list_model->new_list($content);

		redirect('');
	}

	function delete_item()
	{
		$this->list_model->delete_list_item($this->uri->segment(3));

		redirect('');
	}
}
/* End of file list.php */
/* Location: ./application/controllers/list.php */