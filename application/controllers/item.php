<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Controller item class
 * 
 * Handles viewing items and categories
 */
 
class Item extends Auth_Controller {

  private $data;
  private $categories;
  private $content;

  function __construct()
  {
    parent::__construct();
    $this->load->model('item_model');
    $this->data = array('title' => 'Kategorier');
    $this->categories = $this->list_categories();
    $this->content = array('result' => 'Inga annonser hittades i vald kategori');;
    
    
  }

  function index()
  {
    $this->load->view('header_view', $this->data);
    $this->load->view('category_menu_view', $this->categories);
    $this->load->view('result_view', $this->content);
    $this->load->view('footer_view'); 
  }

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

  function list_categories(){
    $result = $this->item_model->get_categories_from_db();
    if ($result > 0){
      $list['url'] = array();
      foreach ($result as $row)
      {
     	  $name = $row -> name;
       	$slug = $row-> slug;
        $list['url'][] = anchor('index.php/item/'.$slug, $name);
      }
      if ($this->input->get('callback') == 'json' OR $this->input->is_ajax_request()){
          echo create_json(array('result'=> $list));
          exit();
      }
    return $list;
    }
    else
    {
      echo'något blev fel';
    }
  }

  function get_item_by_query($category, $query){
    echo $category.' '.$query.' ';

  }

}