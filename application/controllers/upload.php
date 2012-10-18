<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {
private $user_id;

  function __construct()
  {
   parent::__construct();
   //$this->user_id = $user_id;
   $this->load->model('upload_model','',TRUE);
   $this->load->library('form_validation');
   $this->lang->load('form_validation', 'swedish');
   }
  
 function index()
 {
    $this->load->view('header_view', array('title' => 'Kategorier'));
    // $this->load->view('category_menu_view', $categories);
    $this->load->view('upload_form_view');
    $this->load->view('footer_view');
  }
}