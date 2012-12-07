<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Category model class
 */
class Category_model extends CI_Model {

  /**
   * Constructor
   */
  function __construct()
  {
    parent::__construct();
  }
  
  function insert_into_db()
  {
    
  }
  
  /**
   * 
   */
  private function create_slug($name)
  {
    
  }
  /**
   * Gets catigories from db
   * 
   * @return mixed
   */
  function get_categories_from_db(){
    $this->db->select('id, name, slug');
    $this->db->from('categories');
    $query = $this->db ->get();

    if($query->num_rows() > 0)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }

}
/* End of file category_model.php */
/* Location: ./application/models/category_model.php */