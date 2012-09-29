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
      foreach ($search['headline'] as $key => $value) {
      $this -> db -> where('headline LIKE "%' . $value . '%"');
      }
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
  function insert_item($form_data)
  {
    $this->db->insert('item', $form_data);
    
    if ($this->db->affected_rows() == '1')
    {
      return TRUE;
    }
    
    return FALSE;

  }
}