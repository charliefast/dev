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
    $this->load->model('item_model');
    $this->data = array('title' => 'Meddelande', 'page' => 'message');
  }
  /**
  * Sends messages to other users
  *
  * @param (optional) int $to_id
  * @param (optional) int $parent_id
  * @param (optional) int $item_id
  */
  function send_message_to_user($to_id, $parent_id = 0){
    //if ($to_id != 0 && $parent_id != 0 && $item_id != 0){
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
    $response = array(
      'state'  => TRUE,
      'message' => 'Medelandet är skickat!'
    );
  }
  else
  {
    $response = array(
      'state'  => FALSE,
      'message' => 'Något blev fel, försök igen!'
    );
    }
    echo create_json($response);
    exit;
  }

  function send_message_to_item($item_id = 0){
    //if ($to_id != 0 && $parent_id != 0 && $item_id != 0){
  $form_data = array (
    'parent_id'=> $parent_id,
    'to_id' => $this->input->post('to_id'),
    'item_id' => $item_id,
    'message'  => $this->input->post('message'),
    'from_id'  => $this->input->post('id'),
    'date_sent'  => $this->input->post('date')
    );
  $insert = $this->message_model->insert_message($form_data);
  if ($insert)
  {
    $response = array(
      'state'  => TRUE,
      'message' => 'Medelandet är skickat!'
    );
  }
  else
  {
    $response = array(
      'state'  => FALSE,
      'message' => 'Något blev fel, försök igen!'
    );
    }
    echo create_json($response);
    exit;
  }
  
  /**
   * Loads message form
   * 
   * @param int $item_id
   */
  function load_form($item_id)
  {
    $owner = $this->item_model->get_owner($item_id);
    $this->content = array('item_id' => $item_id, 'to_id' => $owner);
    $this->load->view('header_view', $this->data);
    if ($this->input->is_ajax_request())
    {
      echo create_json(array($this->content));
      exit();
    }
    $this->load->view('message_form_view', $this->content);
    $this->load->view('footer_view');
  }
  
  /**
   * Loads page with parent message and children
   * 
   * @param int $to_id
   * @param int $message_id
   */
  function view_message($to_id, $message_id)
  {
    $message_result = $this->message_model->fetch_all_messages($to_id , TRUE, '10, 0', $message_id, '', 0);
    if ($message_result)
    {
      foreach ($message_result as $mrow) {
        $messages[] = array('parent' => $mrow,
          'children' => $this->message_model->fetch_all_messages($to_id , FALSE, '10, 0', '', '', $mrow->message_id)
          );
      }
    }
    else
    {
      $messages = 0;
    }

    $this->content = array (
      'to_id' => $to_id,
      'comments' => $messages,
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

  function message_delete_by_id($item_id)
  {
    $delete = $this->message_model->delete_message($id,$user_id);
    if($delete)
    {
      $response = array(
        'state'  => TRUE,
        'message' => 'Medelandet är nu borttaget!'
        );
    }
    else
    {
      $response = array(
        'state'  => FALSE,
        'message' => 'Något blev fel, försök igen!'
        );
      
    }
    echo create_json($response);
    exit;
  }
}
/* End of file message.php */
/* Location: ./application/controllers/message.php */