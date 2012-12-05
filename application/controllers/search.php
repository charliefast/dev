<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller search class
 * 
 * Handles searches of items
 */

class Search extends Auth_Controller {
  
  private $search = array();
  private $search_query;
  private $search_key;
  private $searchtype;
  private $category;
  private $county;
  private $type = FALSE;
  private $callback;
  private $item;
  private $args;
  private $result;
  private $search_criterias;
  private $categories;

  /**
   * Constructor
   */
  function __construct() {
    parent::__construct();
    $this->load->model('item_model');
    $this->load->model('category_model');
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
    $this->searchtype = 'and';
    $this->categories = $this->category_model->get_categories_from_db();
    
  }
  /**
   * Loads default item page.
   */
  function index()
  {
    $this->load->view('header_view', array('title' => 'Sök', 'page' => 'search'));
    $this->load->view('item_view', array('content' => '', 'categories' => $this->categories));
    $this->load->view('result_view', array('result' => FALSE));
    $this->load->view('footer_view');
  }
  
  function load_page(){
    $category = $this->input->post('categories');
    $this->load->view('header_view', array('title' => 'Sök', 'page' => 'search'));
    $this->load->view('item_view', array('content' => '', 'categories' => $this->categories));
    $this->load->view('result_view', array('result' => $this->get_items($category)));
    $this->load->view('footer_view');
  }
  /**
   * Fetches and validates get parameters for search query
   * @param string $item
   * @return array
   */
  function get_items($item = null)
  {
    $category = '';
    if ($this->input->get())
    {
      $url = $this->input->get();
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
          elseif($key == 'categories')
          {
            $category = $val;
          }
          else{
            $this->$key = $val;
          }
        }
      }
    }
    if ($this->input->post('categories'))
    {
      $category = $this->input->post('categories');
    }
    // $search[] = array ('headline' => explode( ' ', $key ) );
    if ($item != '$1') {
      $category = $item;
    }
    $this->result = $this->item_model->get_item($category, $this->search);
    if (! $this->result)
    {
      $this->result =  array( 'error' => 'Inget sökresultat för "' . $this->search_key. '"');
    }
    if ($this->callback == 'json' OR $this->input->is_ajax_request())
      {
        echo create_json($this->result);
        exit();
      }
    return $this->result;
  }

  /**
   * Validates as valid searchtype and value
   * @access private
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
  /**
   * Builds key for search
   * 
   * @access private
   * @param string $str
   * @return string $new_str
   */
  private function _build_key($str) {
    $new_str = str_replace(" ", "%' $this->searchtype headline LIKE '%", "$str");
    return $new_str;
  }

  /**
   * Checks if get param is allowed.
   * @param string $search to compare to $this->args
   * @return BOOLEAN
   */
  private function _is_search_type($search) {
    if (!array_key_exists($search, $this -> args)) {
      return FALSE;
    }
    return TRUE;
  }
  /**
  * Checks if get param is valid.
  * @param string $key
  * @param string $val
  * @param string $where
  * @return BOOLEAN
  */
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
}
/* End of file search.php */
/* Location: ./application/controllers/search.php */