<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends Auth_Controller {
  private $user_id;
  private $demo_mode;
  private $allowed_ext;

  function __construct() {
    parent::__construct();
    //$this->user_id = $user_id;
    $this->load->model('upload_model','',TRUE);
    $this->load->library('form_validation');
    $this->lang->load('form_validation', 'swedish');
    $demo_mode = false;  // If you want to ignore the uploaded files, set $demo_mode to true;
    $this->allowed_ext = array('jpg','jpeg','png','gif');
  }
  
  function index(){
    $this->load->view('header_view', array('title' => 'Kategorier'));
    // $this->load->view('category_menu_view', $categories);
    $this->load->view('upload_form_view');
    $this->load->view('footer_view');
  }

  function upload_pic(){
    if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
      $this->exit_status('Error! Wrong HTTP method!');
    }


    if(array_key_exists('pic',$_FILES) && $_FILES['pic']['error'] == 0 ){
      
      $pic = $_FILES['pic'];

      if(!in_array($this->get_extension($pic['name']),$this->allowed_ext)){
        $this->exit_status('Only '.implode(',',$this->allowed_ext).' files are allowed!');
      } 

      if($this->demo_mode){
        
        // File uploads are ignored. We only log them.
        
        $line = implode('   ', array( date('r'), $_SERVER['REMOTE_ADDR'], $pic['size'], $pic['name']));
        file_put_contents('log.txt', $line.PHP_EOL, FILE_APPEND);
        
        $this->exit_status('Uploads are ignored in demo mode.');
      }
      // Move the uploaded file from the temporary 
      // directory to the uploads folder:
      
      if($this->upload_model->move_image($pic)){
        $this->exit_status('File was uploaded successfuly!');
      } 
    }

  $this->exit_status('Something went wrong with your upload!');
  }

  // Helper functions

  private function exit_status($str){
    echo json_encode(array('status'=>$str));
    exit;
  }

  private function get_extension($file_name){
    $ext = explode('.', $file_name);
    $ext = array_pop($ext);
    return strtolower($ext);
  }
}