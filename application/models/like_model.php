<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Like model class
 * 
 */

Class Like_model extends CI_Model
{
  /**
   * Constructor
   */
  function __construct()
  {
    parent::__construct();
  }
  
  /**
   * Inserts likes to db
   * 
   * @return mixed
   */
  function insert_like($item_id, $user_id)
  {
    $date = date('Y-m-d H:i:s');
    $data = array(
      'user_id' => $user_id,
      'item_id' => $item_id,
      'date_liked' => $date);
    $this->db->insert('likes', $data);  
    if ($this->db->affected_rows() == '1')
    {
      $id = $this->db->insert_id();
      return  $id;
    }
    return FALSE;
  }
  /**
   * Fetches users likes
   * 
   * @param int $user_id
   * @return mixed
   */
  function fetch_likes($user_id)
  {
    $this->db->select('items.id AS item_id, 
        headline, 
        description, 
        date_added, 
        end_date, 
        items.user_id, 
        users.firstname, 
        users.lastname')
      ->from('likes')
      ->join('items','likes.item_id = items.id')
      ->join('users','likes.user_id = users.id')
      ->where('users.id', $user_id)
      ->limit('20,0');
      $query = $this-> db->get();
    return $query->result();
  }
}
/* End of file like_model.php */
/* Location: ./application/models/like_model.php */