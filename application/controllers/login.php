<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

private $arg = array( 'title' => 'Välkommen');

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   $this->load->helper(array('form', 'url'));
   $this->load->view('header_view', $this->get_args() );
   $this->load->view('login_view');
   $this->load->view('footer_view');
   //$this->template->build('welcome_message', array('message' => 'Hi there!'));
 }
function get_args(){
   return $this->arg;
}
}