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
    $this->content = array('result' => 'Inga annonser hittades i vald kategori');;
    
    
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
  function show_item_by_id($id)
  {
    $result = $this->item_model->get_item_by_id($id);
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
    
    $this->load->view('header_view', $this->data);
    $this->load->view('result_view', $this->content);
    $this->load->view('message_view', $message_content);
    $this->load->view('footer_view'); 
  }
}
/* End of file item.php */
/* Location: ./application/controllers/item.php */