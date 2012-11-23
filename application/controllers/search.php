<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller search class
 * 
 * Handles searches of items
 */

class Search extends CI_Controller {
  private $search = array();
  private $search_query;
  private $search_key;
  private $searchtype = 'and';
  private $category;
  private $county;
  private $type = FALSE;
  private $json = FALSE;
  private $callback;
  private $item;
  private $args;
  private $result;
  private $search_criterias;

  /**
   * Constructor
   */
  function __construct() {
    parent::__construct();
    $this->load->model('item_model');
    $this->args = array(
      'key' => '',
      'county' => '',
      'desc' => '',
      'searchtype' => 
        array(
          'val' => 
          array(
            0 => 'and', 
            1 => 'or'
          )
        ),
      'callback' => array(
      'val' => array(
        0 => 'json')
      )
    );
    $this->search_criterias = array('searchtype' => '', 'key'=> '', 'callback'=>'');
    // $categories = $this->list_categories();
    
  }

  function index()
  {
    $this->load->view('header_view', array('title' => 'Sök'));
    $this->load->view('item_view', array('content' => ''));
    $this->load->view('result_view', array('result' => $this->get_items()));
    $this->load->view('footer_view');
  }
  /**
   * get_items:
   * @param string $item
   * @return void
   */
  function get_items($item = null)
  {
    $category = '';
    if ($this -> input -> get())
    {
      $url = $this -> input -> get();
      foreach ($url as $key => $val)
      {
        if ($this->_validate($key, $val))
        {
          $val = $this->_clean_string($val);
          if($key == 'key')
          {
            $this->search_key = $val;
            $this->search['headline'] = $this->_build_key($this->search_key);
          }
          else{
            $this->$key = $val;
          }
        }
      }
    }
    // $search[] = array ('headline' => explode( ' ', $key ) );
    if ($item != '$1') {
      $category = $item;
    }

    $this->result = $this->item_model->get_item($category, $this->search);
    if ($this->result)
    {
      if ($this->callback == 'json')
      {
        $this->output_json();
      }
    } 
    else
    {
      $this->result =  array( 'error' => 'Inget sökresultat för "' . $this->search_key. '"');
    }
    return $this->result;
  }
  /**
   * Validates as valid searchtype and value
   * @param $string $key
   * @param $string $val
   * @return BOOLEAN
   */
  private function _validate($key, $val){
    if ($this->_is_search_type($key) && $val !== '' && $this->_is_valid_value($key, $val, 'val'))
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
   }
  function set_search_query() {

  }
  /**
  * Iterates through private array $selections
  * and checks if selection options isset and saves to private variables accordingly
  * and updates boolean $this->selected.
  */
  private function _updateSelection(){
    foreach ($this->selections as $key => $val){
      $this->$key = isset($_POST[$key]) ? $_POST[$key]: NULL;
      if ($this->$key) {
         $this->selected = TRUE;
      }
    }
  }
  private function _set_json($val) {
    switch ($val) {
      case 0 :
        $this -> json = FALSE;
        break;
      case 1 :
        $this -> json = TRUE;
        break;
    }
  }

  private function _build_key($str) {
    $new_str = str_replace(" ", "%' $this->searchtype headline LIKE '%", "$str");
    return $new_str;
  }

  /**
   * _is_searchtype: checks if get param is allowed.
   * @param string $search to compare to $this->args
   * @return BOOLEAN
   */
  private function _is_search_type($search) {
    if (!array_key_exists($search, $this -> args)) {
      return FALSE;
    }
    return TRUE;
  }

  private function _is_valid_value($key, $val, $where) {
    if (isset($this->args[$key][$where])) {
      if (! in_array($val, $this -> args[$key][$where])) {
        return FALSE;
      }
    }
    return TRUE;
  }

  /**
   * Removes non-alphanumeric characters
   * @param string $str
   * @return string $new_str
   */
  private function _clean_string($str) {
    $new_str = preg_replace("/[^a-zA-Z0-9\s]/", " ", $str);
    return $new_str;
  }

  /**
   * Sets output to json 
   */
  function output_json(){
    $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($this->result));
        echo $this->output->get_output();
        exit;
  }
}
/* End of file search.php */
/* Location: ./application/controllers/search.php */
