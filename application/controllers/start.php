<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {

private $arg = array( 'title' => 'Välkommen');

  function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
  }
  function index()
  {
    $this->load->helper(array('form', 'url'));
    $this->load->view('header_view', $this->_get_args() );
    //$this->load->view('login_view');
    ($this->user_model->logged_in())?$this->load->view('start_view'):$this->load->view('login_view', $this->_get_args() );
    $this->load->view('footer_view');
    //$this->template->build('welcome_message', array('message' => 'Hi there!'));
  }
  function _get_args(){
    return $this->arg;
  }

  function logout()
  {
    $this->session->unset_userdata('logged_in');
    session_destroy();
    echo "logged out";
  }
}