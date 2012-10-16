<?php
class User extends CI_Controller {

  function __construct()
  {
   parent::__construct();
   $this->load->model('user_model','',TRUE);
   $this->load->library('form_validation');
   $this->lang->load('form_validation', 'swedish');
  }
  function get_user_info($id){
  	echo $id;
  }
}