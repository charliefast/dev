<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   $this->load->helper(array('form', 'url'));
   $this->load->view('login_view');
   //$this->template->build('welcome_message', array('message' => 'Hi there!'));
 }

}