<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class item extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->view('item_view');
    $this->load->model('item_model');
  }

  function index()
  {
    
  }
  function get_all_items(){
    $this->get_items('');
  }
  function get_items($item){
    $search = '';
    $category = '';
    if ($this->input->get('search')){
      $search = $this->input->get('search');
      echo $search;
    }
    if ($item){
      echo $item;
      $category = $item;
    }
      $result = $this->item_model->get_item($category,$search);
      if ($result){  
        foreach ($result as $row)
        {
          echo "<p>".$row -> id."</p>";
      	  echo "<p>".$row -> user_id."</p>";
          echo "<h3>".$row -> headline."</h3>";
          echo "<p>".$row -> description."</p>";
          echo "<p>".$row -> date_added."</p>";
          echo "<p>".$row -> end_date."</p>";
        }
      }
    else
    {
    	echo'Inga annonser hittades i vald kategori';
    }
 }

 function list_categories(){
   $result = $this->item_model->get_categories_from_db();
   if ($result > 0){
     foreach ($result as $row)
     {
     	$name = $row -> name;
     	$slug = $row-> slug;
        echo anchor('index.php/item/'.$slug, $name);
      }
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