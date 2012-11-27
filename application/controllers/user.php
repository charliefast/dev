<?php
class User extends Auth_Controller {

  function __construct()
  {
   parent::__construct();
   $this->load->model('user_model','',TRUE);
   $this->load->library('form_validation');
   $this->lang->load('form_validation', 'swedish');
  }
  function get_user_info($id){
    $result = $this->user_model->get_user($id);
    if($result){
      foreach($result as $row){
        echo $row->firstname.' ';
        echo $row->lastname;
        echo $row->city;
        echo $row->country;
        echo $row->sign_up_date;
      }
    }else{
      echo "no user by that id";
    }
  }
  function new_user(){
    echo 'new user';
  }
}