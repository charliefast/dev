<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Upload model class
 * 
 * Moves and saves uploaded image to db
 * 
 */
Class Upload_model extends CI_Model
{
  private $upload_dir;
  private $pic;
  private $user_id;
  private $item_id;
  private $name;

  /**
   * Constructor
   */
  function __construct()
  {
    parent::__construct();
    $this->upload_dir = 'uploads/';
  }
  
  /**
   * Saves image
   * 
   * @access public
   * @param array $pic
   * @param int $user_id
   * @param (optional) $item_id
   * @return BOOLEAN
   */
  function save_image($pic, $user_id, $item_id ='')
  {
    $this->pic = $pic;
    $this->user_id = $user_id;
    $this->item_id = $item_id;
    $move = $this->_move_image();
    if ($move)
    {
      $save = $this->_insert_to_db();
      if ($save)
      {
        return $save;
      }
    }
    return FALSE;
  }
  
  /**
   * Moves image to upload folder
   * 
   * @access private
   * @return BOOLEAN
   */
  private function _move_image()
  {
    $timestamp = time();
    $this->name = $this->upload_dir.$this->user_id.$timestamp.'-'.$this->pic['name'];
    if (! file_exists($this->name))
    {
      if(move_uploaded_file($this->pic['tmp_name'], $this->name))
      {
        return TRUE;
      }
    }
    return FALSE;
  }
  
  /**
   * Saves image data to db
   * 
   * @access private
   * @return mixed
   */
  private function _insert_to_db()
  {
    $data = array(
      'user_id' => $this->user_id,
      'item_id' => $this->item_id,
      'url' => $this->name,
      'name' => $this->pic['name']);
    $this->db->insert('images', $data);  
    if ($this->db->affected_rows() == '1')
    {
      $id = $this->db->insert_id();
      return  $id;
    }
    return FALSE;
  }
}
/* End of file upload_model.php */
/* Location: ./application/models/upload_model.php */