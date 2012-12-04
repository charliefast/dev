<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller messages class
 * 
 * Handles messages
 */
class Message extends Auth_Controller {

  private $data;
  
  /**
   * Constructor
   */
   function __construct()
   {
     parent::__construct();
     $this->load->model('message_model');
     $this->data = array('title' => 'Meddelande', 'page' => 'message');
   }
     /**
   * Sends messages to other users
   */
  function send_message($to_id, $parent_id = 0){
    $form_data = array (
      'parent_id'=> $parent_id,
      'to_id' => $to_id,
      'message'  => $this->input->post('message'),
      'from_id'  => $this->input->post('id'),
      'date_sent'  => $this->input->post('date')
    );
    $insert = $this->message_model->insert_message($form_data);
    if ($insert)
    {
      redirect('index.php/user/'.$to_id);
    }
    else
    {
      echo 'message sent failed';
    }
  }
  function view_message($to_id,$message_id)
  {
    $this->content = array (
      'id' => $to_id,
      'comments' => $this->message_model->fetch_all_messages('', FALSE, $limit = '20, 0', $message_id),
      'error' => FALSE,
      'parent_id' => $message_id);
    $this->load->view('header_view', $this->data);
    if ($this->input->is_ajax_request())
    {
      echo create_json(array('status' => $this->content));
      exit();
    }
    $this->load->view('message_view', $this->content);
    $this->load->view('footer_view');
  }
}
/* End of file message.php */
/* Location: ./application/controllers/message.php */