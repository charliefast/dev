<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class item extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('item_model');
    $categories = $this->list_categories();
    $this->load->view('header_view', array('title' => 'Kategorier'));
    $this->load->view('category_menu_view', $categories);
    $this->load->view('item_view', array('content' => 'hejhejhej'));
    $this->load->view('footer_view');
    
  }

  function index()
  {
    
  }
  function get_items($item = null){
    $type = '';
    $search = '';
    $category = '';
    if ($this->input->get('search')){
      $search = $this->input->get('search');
    }
    if ($item != '$1'){
      $category = $item;
    }
    $result = $this->item_model->get_item($category,$search);
      if ($result){
        
        $this->load->view('result_view', array('result' => $result));
      }
    else
    {
    	$this->load->view('item_view', array('content' => 'Inga annonser hittades i vald kategori'));
    }

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