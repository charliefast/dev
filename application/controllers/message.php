<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller messages class
 * 
 * Handles messages
 */
class Message extends Auth_Controller {
  
  /**
   * Constructor
   */
   function __construct()
   {
     parent::__construct();
     $this->load->model('message_model');
   }
     /**
   * Sends messages to other users
   */
  function send_message($to_id){
    $message = $this->input->post('message');
  }
}
/* End of file message.php */
/* Location: ./application/controllers/message.php */