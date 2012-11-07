<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {

private $arg = array( 'title' => 'Välkommen');

  function __construct()
  {
    parent::__construct();
    //$this->logged_in();
    $this->load->model('user_model');
  }
  function index()
  {
    $this->load->helper(array('form', 'url'));
    $this->load->view('header_view', $this->_get_args() );
    //$this->load->view('login_view');
    ($this->logged_in())?$this->load->view('start_view'):$this->load->view('login_view', $this->_get_args() );
    //$this->load->view('login_view', $this->_get_args() );
    $this->load->view('footer_view');
  }
  
  function _get_args(){
    return $this->arg;
  }
  /**
   * logged_in() checks id session is set
   * @return BOOLEAN
   */

  function logged_in()
  {
    $is_logged_in = $this->session->userdata('logged_in');
    if(!isset($is_logged_in) || $is_logged_in != true)
    {
     return FALSE;
      /*echo 'Du har inte tillgång till denna sida. Vänligen logga in här<a href="../index.php/login">Login</a>';
      die();*/
    }
    else
    {
       $data['username'] = $is_logged_in['username'];
      //return $this->load->view('home_view', $data);
    return TRUE;
    }
  }
  function logout()
  {
    $this->session->unset_userdata('logged_in');
    session_destroy();
    echo "logged out";
  }
  function hej($i){
   echo 'hejs';
  }
  
}