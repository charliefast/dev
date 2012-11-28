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
    $this->db->insert('users', $form_data);  
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
   * @return BOOLEAN
   */
  function delete_message($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('users');  
    if ($this->db->affected_rows() == '1')
    {
      return TRUE;
    }
    return FALSE;
  }
    /**
   * Fetches all users messages
   * 
   * @param int $id
   * @param (optional) BOOLEAN $desc
   * @param (optional) string $limit
   * @return mixed
   */
  function fetch_all_messages($id, $desc = TRUE, $limit = '20, 0')
  {
   /* $this->db->select('messages.id')->from('messages')->where($to_id = $id)->join('users','messages.from_id = users.id');
    //$str = "SELECT * FROM messages WHERE to_id = ?";
    if ($desc){
      $this->db->order_by("date_added", "desc"); 
    }
    $this->db->limit($limit);
    //$query = $this->db->query($str, $id);
    $query = $this -> db -> get();
    $result = $query->result();
    if($result)
    {
      return $result;
    }*/
    return FALSE;
  }
}
/* End of file message_model.php */
/* Location: ./application/models/message_model.php */
