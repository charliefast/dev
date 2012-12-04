<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Controller upload class
 * 
 * Handles uploads
 */

class Upload extends Auth_Controller {
  private $user_id;
  private $demo_mode;
  private $allowed_ext;
  private $form_data;

  /**
   * Constructor
   */
  function __construct() {
    parent::__construct();
    $this->user_id = $this->session->userdata['logged_in']['id'];
    $this->load->model('upload_model','',TRUE);
    $this->load->library('form_validation');
    $this->lang->load('form_validation', 'swedish');
    $this->allowed_ext = array('jpg','jpeg','png','gif');
  }
  /**
   * Default function
   * 
   * Loads default upload form view
   */
  function index(){
    $this->load->view('header_view', array('title' => 'Ladda upp bild', 'page' => 'upload_image'));
    // $this->load->view('category_menu_view', $categories);
    $this->load->view('upload_form_view');
    $this->load->view('footer_view');
  }
  /**
   * Loads view for new item
   */
  function new_item_view(){
    $this->load->view('header_view', array('title' => 'Ny annons', 'page' => 'new_item'));
    // $this->load->view('category_menu_view', $categories);
    $this->load->view('new_item_form_view');
    $this->load->view('upload_form_view');
    $this->load->view('footer_view');
  }
  function new_item()
  {
  }
  function verify_new_item()
  {
      var_dump($_FILES);
  }
  
  /**
   * Validates and handles file upload request
   */
  function upload_pic($item=''){
    if(strtolower($_SERVER['REQUEST_METHOD']) != 'post')
    {
      $this->__exit_status('Error! Wrong HTTP method!');
    }
    if(array_key_exists('pic',$_FILES) && $_FILES['pic']['error'] == 0 )
    {
      $pic = $_FILES['pic'];
      if( ! in_array($this->_get_extension($pic['name']),$this->allowed_ext))
      {
        $this->_exit_status('Only '.implode(',',$this->allowed_ext).' files are allowed!');
      } 
      $this->pic_id = $this->upload_model->save_image($pic, $this->user_id);
      if($this->pic_id)
      {
        $this->_exit_status('File was uploaded successfully!');
      } 
    }
  $this->_exit_status('Something went wrong with your upload!');
  }

  /**
   * Outputs jsonencoded status string
   * 
   * @access private
   * @param string $str
   */
  private function _exit_status($str){
    echo create_json(array('status' =>$str));
    exit;
  }
  
  /**
   * Fetches exstension from file
   * 
   * @access private
   * @param string $file_name
   * @return string $ext
   */
  private function _get_extension($file_name){
    $ext = explode('.', $file_name);
    $ext = array_pop($ext);
    return strtolower($ext);
  }
}
/* End of file upload.php */
/* Location: ./application/controllers/upload.php */