<?php
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