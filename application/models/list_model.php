<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * List model class
 * 
 */

Class List_model extends CI_Model {

  /**
   * Constructor
   */
  function __construct()
  {
    parent::__construct();
  }


    // function Todo_model()

    // {

    //     parent::Model();

    // }

  function new_list($content)

  /**
   * Inserts lists to db
   * 
   * @return mixed
   */
  {
    $date = date('l jS \of F Y h:i:s A');

    $q = $this->db->query("INSERT INTO list (date_list_item,content) VALUES ('$date','$content')");

  }

  /**
   * Fetches users lists
   * 
   * @param int $user_id
   * @return mixed
   */
  function get_all_list_items()
  {
    $q = $this->db->query("SELECT id,date,content FROM items");
    return $q->result_array();
  }

  function delete_todo_item($id)
  {
    $q = $this->db->query("DELETE FROM items WHERE id = '$id'");
  }

}

/* End of file list_model.php */
/* Location: ./application/models/list_model.php */