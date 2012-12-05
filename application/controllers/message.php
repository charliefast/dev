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
  *
  * @param int $to_id
  * @param (optional) int $parent_id
  * @param (optional) int $item_id
  */
  function send_message($to_id = 0, $parent_id = 0, $item_id = 0){
    //if ($to_id != 0 && $parent_id != 0 && $item_id != 0){
       $form_data = array (
        'parent_id'=> $parent_id,
        'to_id' => $to_id,
        'item_id' => $item_id,
        'message'  => $this->input->post('message'),
        'from_id'  => $this->input->post('id'),
        'date_sent'  => $this->input->post('date')
      );
      $insert = $this->message_model->insert_message($form_data);
      if ($this->input->is_ajax_request())
      {
        echo create_json(array('status' => 'message sent'));
        exit();
      }
      if ($insert)
      {
        if ($item_id)
        {
          redirect('item/'.$item_id);
        }
        else
        {
          redirect('user/'.$to_id);
        }
      }
    //}
    else
    {
      echo 'message sent failed';
    }
  }
  function load_form($item_id)
  {
    $this->content = array('item_id' => $item_id);
    $this->load->view('header_view', $this->data);
    if ($this->input->is_ajax_request())
    {
      echo create_json(array($this->content));
      exit();
    }
    $this->load->view('message_form_view', $this->content);
    $this->load->view('footer_view');
  }
  
  function view_message($to_id,$message_id)
  {
    $this->content = array (
      'comments' => $this->message_model->fetch_all_messages('', FALSE, $limit = '20, 0', $message_id),
      'error' => FALSE,
      'form_to' => 'user/send_message/'.$to_id.'/'.$message_id);
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