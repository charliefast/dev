<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * upload model class
 * 
 */
Class Upload_model extends CI_Model
{
  private $upload_dir;

  function __construct()
  {
    parent::__construct();
    $this->upload_dir = 'uploads/';
  }
  function move_image($pic){
  	if(move_uploaded_file($pic['tmp_name'], $this->upload_dir.$pic['name'])){
  		return TRUE;
  	}
  }
}
/* End of file upload_model.php */
/* Location: ./application/models/upload_model.php */