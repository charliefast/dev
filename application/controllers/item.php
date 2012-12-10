<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Controller item class
 * 
 * Handles viewing items and categories
 */
 
class Item extends Auth_Controller {

	private $data;
	private $categories;
	private $content;
	private $logged_in_user;
	private $pag_config;
	
	/**
	 * Constructor
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('item_model');
		$this->load->model('message_model');
		$this->load->model('category_model');
		$this->data = array('title' => 'Kategorier', 'page' => 'item');
		$this->categories = $this->category_model->get_categories_from_db();
		$this->content = array('result' => 'Inga annonser hittades i vald kategori');
		$this->load->library('form_validation','email');
		$this->lang->load('form_validation', 'swedish');
		$this->load->helper('form', 'url', 'string');
		$this->logged_in_user = $this->session->userdata('logged_in');
		$this->load->library('pagination');
		$this->_set_pagination_config();
		
	}
	/**
	 * Index
	 */
	function index()
	{
		$this->load->view('header_view', $this->data);
		$this->load->view('category_menu_view', array('list' => $this->categories));
		//$this->load->view('result_view', $this->content);
		$this->load->view('footer_view');

	}
	
	/**
	 * Gets items
	 * 
	 * @param (optional) string $item
	 */
	function get_items($item = null, $offset = 0){
		$type = '';
		//$search = '';
		$category = '';
	 
		if ($item != '$1' && $item != 'page'){
			$category = $item;
			$this->data['title'] = $category;
			$this->_set_pagination_config($category);
		}
		$limit = $this->pag_config["per_page"];
		$result = $this->item_model->get_item($category, '', $limit, $offset);
			if ($result){
				$response = array(
					'state'  => TRUE,
					'result' => $result
					);
				$this->content['result'] = $result;
			}
			else
			{
			$response = array(
				'state'  => FALSE,
				'message' => 'Inga annonser hittade!'
				);
			
			}
			if ($this->input->get('callback') == 'json' OR $this->input->is_ajax_request()){
					echo create_json($response);
					exit();
			}
		$this->load->view('header_view', $this->data);
		$this->load->view('category_menu_view', array('list' => $this->categories));
		$this->load->view('result_view', $this->content);
		$this->load->view('footer_view');
	}

	/**
	 * Shows item by id with messages
	 * 
	 * @param int $id
	 */
	function show_item_by_id($id, $status)
	{
		if (! $status && $status !== '0')
		{
			$status = 1;
		}
		$result = $this->item_model->get_item_by_id($id, $status);
		if ($result){
			$message_content = array (
			'to_id' => $this->item_model->get_owner($id),
			'comments' => $this->message_model->fetch_all_messages('', FALSE, '20, 0', '', $id),
			'error' => FALSE,
			'form_to' => 'item/send_message/'.$id);
				if ($this->input->get('callback') == 'json' OR $this->input->is_ajax_request()){
					echo create_json(array('result'=> $result, 'messages' => $message_content));
					exit();
				}
				$this->content['result'] = $result;
		}
		else
		{
			$this->content['error'] = 'Ingen annons funnen';
			 $message_content['error'] = 'TRUE';
		}
		$this->load->view('header_view', $this->data);
		$this->load->view('single_result_view', $this->content);
		$this->load->view('message_view', $message_content);
		$this->load->view('footer_view'); 
	}

	/**
	* Loads view for new item
	* 
	* @param int $item_id
	*/
	function new_item_view($item_id){
		$result = array((object) array('id' => FALSE, 'headline' => '', 'description' => '', 'url' => '', 'category_id' => ''));
		if ($item_id != '$1')
		{
			$user_id = $this->session->userdata['logged_in']['id'];
			$query = $this->item_model->get_item_by_id($item_id, '0', $user_id);
			if ($query)
			{
				$result = $query;
			}
			else
			{
				redirect('item/new');
			}
		}
		$this->load->view('header_view', array('title' => 'Ny annons', 'page' => 'new_item'));
		// $this->load->view('category_menu_view', $categories);
		//mimic result but empty
		$this->load->view('new_item_form_view', array('result'=> $result, 'categories' => $this->categories));
		//$this->load->view('upload_form_view');
		$this->load->view('footer_view');
	}

	/**
	* Loads view for edit item
	* 
	* @param int $item_id
	*/
	function edit_item_form($item_id){
		if ($item_id != '$1')
		{
			$user_id = $this->session->userdata['logged_in']['id'];
			$query = $this->item_model->get_item_by_id($item_id, '1', $user_id);
			if ($query)
			{
				$result = $query;
			}
			else
			{
				redirect('item');
			}
			$this->load->view('header_view', array('title' => 'Ändra annons', 'page' => 'edit_item'));
			$this->load->view('edit_item_form_view', array('result'=> $result, 'categories' => $this->categories));
			//$this->load->view('upload_form_view');
			$this->load->view('footer_view');
		}
	}

	/**
	 * Validates and creates new item
	 */
	function verify_new_item()
	{
		$form_data = $this->_validate_form();
		$form_data['status'] = 0;
		if ($this->input->post('item_id'))
		{
			$item_id = $this->input->post('item_id');
			$this->item_model->update_item($item_id, $form_data);
		}
		else
		{
			$item_id = $this->item_model->insert_item($form_data);
		}
		if ($item_id) // the information has therefore been successfully saved in the db
		{
			$this->show_item_preview($item_id);
		}
	}

	function _validate_form()
	{
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if ($this->form_validation->run('new_item') == FALSE) // validation hasn't been passed
		{
			$response = array(
						'state'  => FALSE,
						'message' => 'Något blev fel, försök igen!'
					);
			echo create_json($response);
			exit;
		}
		else // passed validation proceed to post success logic
		{
			$date = date('Y-m-d h:i:s');
			$form_data = array(
												'headline' => set_value('inputTitle'),
												'description' => set_value('inputDescription'),
												'category_id' => set_value('selectCategory'),
												'user_id' => $this->session->userdata['logged_in']['id'],
												'date_added' => $date,
												'end_date' => ''
												);
		}
		return $form_data;
	}
	
/**
	* Changes status to published
	* 
	* @return string
	*/
	function publish_item()
	{
		if ($this->input->post('item_id'))
		{
			$item_id = $this->input->post('item_id');
			$result = $this->item_model->update_item($item_id, array('status' => 1));
			if ($result)
			{
				$response = array(
					'state'  => TRUE,
					'message' => 'Dina ändringar har sparats!'
					);
			}
		}
		else
		{
			$response = array(
				'state'  => FALSE,
				'message' => 'Något blev fel, försök igen!'
				);
			
		}
		echo create_json($response);
		exit;
	}
	
	/**
	 * Shows item preview
	 *
	 * @param int $item_id
	 */
	function show_item_preview($item_id)
	{
		$this->load->view('header_view', array('title' => 'Förhandsgranskning', 'page' => 'preview_item'));
		$this->load->view('new_item_preview_view', array('result' => $this->item_model->get_item_by_id($item_id, '0')));
		$this->load->view('footer_view');
	}

	/**
	 *  Creates new empty item
	 */
	function create_item()
	{
		$form_data = array(
												'user_id' => $this->session->userdata['logged_in']['id'],
												'date_added' => date('Y-m-d h:i:s'),
												'status' => 0);
		$item_id = $this->item_model->insert_item($form_data);
		if ($item_id)
		{
			redirect('item/upload/'.$item_id);
		}
		else
		{
			echo create_json('Något blev fel, försök igen!');
			exit;
		}
	}

	/**
	 * Handles edit form for published items
	 */
	function edit_published_item()
	{
		$submit = $this->input->post('submit');
		$item_id = $this->input->post('item_id');
		if ($submit == 'save')
		{
		$form_data = $this->_validate_form();
			$result = $this->item_model->update_item($item_id, $form_data);
			if ($result)
			{
				$response = array(
					'state'  => TRUE,
					'message' => 'Dina ändringar har sparats!'
					);
			}
		}
		elseif($submit == 'delete')
		{
			$this->delete_item($item_id);
		}
		elseif($submit == 'abort')
		{
			redirect(base_url().'item/'.$item_id);
		}
		else
		{
			$response = array(
				'state'  => FALSE,
				'message' => 'Något blev fel, försök igen!'
				);
			
		}
		echo create_json($response);
		exit;
	}

	function delete_item($item_id)
	{
		$user_id = $this->logged_in_user['id'];
		$item_id = $this->input->post('item_id');
		$result = $this->item_model->delete_item($item_id, $user_id);
		if ($result)
		{
			$response = array(
				'state'  => TRUE,
				'message' => 'Annons är nu borttagen!'
				);
		}
		else
		{
			$response = array(
				'state'  => FALSE,
				'message' => 'Något blev fel, försök igen!'
				);
			
		}
		echo create_json($response);
		exit;
	}

	function show_user_items($user_id)
	{
		$user_data = $this->session->userdata('logged_in');
		$edit = ($user_data['id'] === $user_id)?TRUE:FALSE;
		
		$this->load->view('header_view', array('title' => 'Annonslista', 'page' => 'item_list'));
		if ($edit)
		{
			$result = $this->item_model->get_users_items($user_id);
			if ($result)
			{
				$this->content = array('result' => $result, 'error' => FALSE);
			}
			else
			{
				$this->content['error'] = 'Inga annonser funna';
			}
			$this->load->view('edit_item_list_view', $this->content); 
		}
		else
		{
			$result = $this->item_model->get_users_items($user_id, TRUE);
			if ($result)
			{
				$this->content = array('result' => $result, 'error' => FALSE);
			}
			else
			{
				$this->content['error'] = 'Inga annonser funna';
			}
			$this->load->view('items_list_view', $this->content); 
		}
		$this->load->view('footer_view'); 
	}

	private function _set_pagination_config($category = '')
	{
		$this->pag_config['first_link'] = 'Först';
		$this->pag_config['last_link'] = 'Sist';
		$this->pag_config['base_url'] = base_url().'item/page';
		$this->pag_config['total_rows'] = $this->item_model->count_rows($category);
		$this->pag_config['per_page'] = 5;
		$this->pagination->initialize($this->pag_config);
		$this->content['links'] = $this->pagination->create_links();
	}
}
/* End of file item.php */
/* Location: ./application/controllers/item.php */