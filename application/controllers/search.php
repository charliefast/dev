<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('item_model');
   // $categories = $this->list_categories();
    $this->load->view('header_view', array('title' => 'Kategorier'));
   // $this->load->view('category_menu_view', $categories);
    $this->load->view('item_view', array('content' => 'hejhejhej'));
    $this->load->view('footer_view');
  }
  function get_items($item = null){
    $type = '';
    $search = array('headline' => '');
    $category = '';
    if ($this->input->get('key')){
      $search['headline'] = $this->input->get('key');
    }
    if ($item != '$1'){
      $category = $item;
    }
    $result = $this->item_model->get_item($category,$search);
      if ($result){
         if ($this->input->get('callback') == 'json'){
          return json_encode($result);
          exit();
      }  
        $this->load->view('result_view', array('result' => $result));
      }
    else
    {
    	$this->load->view('item_view', array('content' => 'Inget sökresultat för "'.$search['headline'].'"'));
    }


  }

}