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
    
  }
  /**
   * Index
   */
  function index()
  {
    $this->load->view('header_view', $this->data);
    $this->load->view('category_menu_view', array('list' => $this->categories));
    $this->load->view('result_view', $this->content);
    $this->load->view('footer_view'); 
  }
  
  /**
   * Gets items
   * 
   * @param (optional) string $item
   */
  function get_items($item = null){
    $type = '';
    //$search = '';
    $category = '';
   
    if ($item != '$1'){
      $category = $item;
      $this->data['title'] = $category;
    }
    $result = $this->item_model->get_item($category,$search = '');
      if ($result){
        if ($this->input->get('callback') == 'json' OR $this->input->is_ajax_request()){
          echo create_json(array('result'=> $result));
          exit();
        }
        $this->content['result'] = $result;
      }
    $this->index();
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
    $this->load->view('result_view', $this->content);
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
   * Validates and insert new item
   */
  function verify_new_item()
  {
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    var_dump($this->input->post('title'));
    exit;
    if ($this->form_validation->run('new_item') == FALSE) // validation hasn't been passed
    {
      echo create_json('Något blev fel, försök igen!');
      exit;
    }
    else // passed validation proceed to post success logic
    {
      $category = set_value('selectCategory');
      $date = date('Y-m-d h:i:s');
      $form_data = array(
                        'category_id' => 0,
                        'headline' => set_value('inputTitle'),
                        'description' => set_value('inputDescription'),
                        'category_id' => set_value('selectCategory'),
                        'user_id' => $this->session->user_data['logged_in']['id'],
                        'date_added' => $date,
                        'end_date' => '',
                        'status' => 0
                        );      
      // run insert model to write data to db
     }
      $item_id = $this->item_model->insert_item($form_data);
      if ($item_id) // the information has therefore been successfully saved in the db
      {
        $this->load->view('header_view', array('title' => 'Förhandsgranskning', 'page' => 'preview_item'));
        $this->load->view('new_item_preview_view', array('content' => $this->item_model->get_item_by_id($item_id, '0')));
        $this->load->view('footer_view');
      }
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
}
/* End of file item.php */
/* Location: ./application/controllers/item.php */