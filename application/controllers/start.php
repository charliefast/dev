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
    $this->load->view('header_view', $this->get_args() );
    //$this->load->view('login_view');
    $this->logged_in();
    $this->load->view('footer_view');
    //$this->template->build('welcome_message', array('message' => 'Hi there!'));
  }
  function get_args(){
    return $this->arg;
  }
  function logged_in()
  {
    if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];
      return $this->load->view('home_view', $data);
    }
    else
    {
      //If no session, redirect to login page
    //  redirect('login', 'refresh');
    return $this->load->view('login_view', $this->get_args() );
    }
  }

  function logout()
  {
    $this->session->unset_userdata('logged_in');
    session_destroy();
    echo "logged out";
  }

}