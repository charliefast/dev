<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller like class
 * 
 * Handles likes
 */
class Like extends Auth_Controller {
    
  private $data;
  private $content;
  private $logged_in_user;

  function __construct()
  {
    parent::__construct();
    $this->logged_in_user = $this->session->userdata('logged_in');
    $this->load->model('like_model');
  }
  
  function like_item($item_id)
  {
    $result = $this->like_model->insert_like($item_id, $this->logged_in_user['id']);
    if ($result)
    {
      redirect('index.php');
    }
    else
    {
      echo 'något gick snett';
    }
  }
  function get_likes($user_id)
  {
    $result = $this->like_model->fetch_likes($user_id);
    if ($result)
    {
      if ($this->input->get('callback') == 'json' || $this->input->is_ajax_request())
      {
        echo json_encode(array('content' => $result));
        exit();
      }
      return $result;
    }
  }
}
/* End of file like.php */
/* Location: ./application/controllers/like.php */