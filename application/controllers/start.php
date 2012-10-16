<?php
class Start extends CI_Controller {

  public function index()
  {
    $this->load->helper(array('form', 'url'));
    $this->load->view('header_view');
    //$this->load->view('login_view');
    $this->load->view('footer_view');
	}
}
?>
