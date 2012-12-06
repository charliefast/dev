<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Item model class
 * 
 * @author Carina Möllbrink
 */

Class Item_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  
   /**
   * Fetches item from db
   * 
   * @param (optional) array $category
   * @param (optional) array $search
   * @param (optional) BOOLEAN $desc
   * @param (optional) string $limit
   * @return mixed
   */
  function get_item($category = '', $search = '', $limit = '20, 0', $desc = TRUE){
    //SELECT items.id, headline, description, date_added, end_date, name, user_id  FROM items JOIN categories ON categories.id = items.category_id WHERE categories.name = '$variabel'
    //$this -> db -> select('items.id, headline, description, date_added, end_date, user_id');
    //$this -> db -> from('items');

    if ($category){
      //$this -> db -> join('categories', 'categories.id = items.category_id');
      //$this -> db -> where('categories.slug = ' . "'" . $category . "'");
      $this -> db -> select('*');
      $this -> db -> from($category);
    }else{
      $this->db->select('items.id, 
        headline, 
        description, 
        date_added, 
        end_date, 
        user_id, 
        users.firstname, 
        users.lastname');
      $this->db->from('items');
      $this->db->join('users','items.user_id = users.id');
    }
    if ($search){
      foreach ($search as $key => $value) {
      $this->db->where($key. " LIKE '%" . $value . "%'");
      }
    }
    if ($desc){
      $this->db->order_by("date_added", "desc"); 
    }
    $this->db->limit($limit);
    $query = $this->db->get();
    
    return $query->result();
  }

  function get_queried_item($category, $query){
    echo $category.' '.$query.' ';
  }
  function get_item_by_id($id){
    $this->db->select('items.id, 
        headline, 
        description, 
        date_added, 
        end_date, 
        user_id, 
        users.firstname, 
        users.lastname')
      ->from('items')
      ->join('users','items.user_id = users.id')
      ->where('items.id', $id)
      ->limit('1,0');
      $query = $this -> db -> get();
    return $query->result();
  }
  /**
   * @access public
   * @return mixed
   */
  function insert_item($form_data)
  {
    $this->db->insert('item', $form_data);
    
    if ($this->db->affected_rows() == '1')
    {
      return $this->db->insert_id();
    }
    
    return FALSE;
  }
   /**
   * Fetches items from category
   *
   * @access public
   * @param string $slug
   * @param int $limit
   * @return mixed
   */
  function fetch_category($slug, $limit = 20){
    $str = "SELECT * FROM items 
            INNER JOIN categories 
            ON categories.id = items.category_id 
            AND categories.slug = ? LIMIT 0, ?";
    $query = $this->db->query($str,array($slug,$limit));
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
/* End of file item_model.php */
/* Location: ./application/models/item_model.php */
