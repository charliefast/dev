<?php
Class Item_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  function get_item($category, $search){
    //SELECT items.id, headline, description, date_added, end_date, name, user_id  FROM items JOIN categories ON categories.id = items.category_id WHERE categories.name = '$variabel'
    $this -> db -> select('items.id, headline, description, date_added, end_date, user_id');
    $this -> db -> from('items');

    if ($category){
      $this -> db -> join('categories', 'categories.id = items.category_id');
      $this -> db -> where('categories.slug = ' . "'" . $category . "'");
    }
    if ($search){
      $this -> db -> where('headline = ' . "'" . $search['headline']. "'");
    }
    $query = $this -> db -> get();
    
    return $query->result();
  }
  function get_queried_item($category, $query){
    echo $category.' '.$query.' ';
  }
 function get_categories_from_db(){
 	$this -> db -> select('name, slug');
    $this -> db -> from('categories');
    $query = $this -> db -> get();

    if($query -> num_rows() > 0)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }
}