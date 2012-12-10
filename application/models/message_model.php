<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Message model class
 * inserts and retrieves messages
 */
Class Message_model extends CI_Model
{
  /**
   * Constructor
   */
   function __construct()
   {
     parent::__construct();
   }

  /**
   * Inserts message
   * 
   * @param array $formdata
   * @return BOOLEAN
   */
  function insert_message($form_data)
  {
    $this->db->insert('messages', $form_data);  
    if ($this->db->affected_rows() == '1')
    {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * Deletes message
   * 
   * @param int $id
   * @param int $user_id
   * @return BOOLEAN
   */
  function delete_message($id,$user_id)
  {
    $this->db->where('id', $id);
    $this->db->where('user_id', $user_id);
    $this->db->delete('messages');  
    if ($this->db->affected_rows() == '1')
    {
      return TRUE;
    }
    return FALSE;
  }
    /**
   * Fetches all users messages
   * 
   * @param (optional)int $user_id
   * @param (optional) BOOLEAN $desc
   * @param (optional) string $limit
   * @param (optional) int $message_id
   * @param (optional) int $item_id
   * @return mixed
   */
  function fetch_all_messages($user_id = '', $desc = TRUE, $limit = '10, 0', $message_id = '', $item_id = '', $parent_id ='')
  {

    $this->db->select('messages.id AS message_id, message, date_sent, firstname, lastname, parent_id, item_id, items.headline')
      ->from('messages')
      ->join('users','messages.from_id = users.id')
      ->join('items','items.id = messages.item_id', 'left');
    if ($parent_id != ''){
      $this->db->where('parent_id', $parent_id);
    }
    //$str = "SELECT * FROM messages WHERE to_id = ?";
    if ($user_id != ''){
      $this->db->where('to_id', $user_id);
    }
    if ($item_id != ''){
      $this->db->where('item_id', $item_id);
    }
    if ($message_id != ''){
      $this->db->where('messages.id', $message_id);
      $this->db->or_where('parent_id', $message_id); 
    }
    $order_by = ($desc)?'desc':'asc';
    $this->db->order_by('messages.id', $order_by);
    $this->db->limit($limit);
    //$query = $this->db->query($str, $id);
    $query = $this->db->get();
    $result = $query->result();
    if($result)
    {
      return $result;
    }
    return FALSE;
  }
}
/* End of file message_model.php */
/* Location: ./application/models/message_model.php */
