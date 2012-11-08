<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
private $search = array();
private $search_query;
private $headline;
private $searchtype = 'and';
private $category;
private $county;
private $type = false;
private $json = false;
private $callback;
private $item;
private $args = array(	'key' => '',
						'county' => '',
						'desc' =>'',
						'searchtype' =>
							array(	'val' => 
										array(	0 => 'and', 
												1=> 'or')
								), 
						'callback'=>
							array(	'val' =>
										array(	0 => 'json')
								)
					);

	function __construct()
	{
		parent::__construct();
		$this->load->model('item_model');
		// $categories = $this->list_categories();
		$this->load->view('header_view', array('title' => 'Kategorier'));
		$this->load->view('item_view', array('content' => ''));
		// $this->load->view('category_menu_view', $categories);
		$this->load->view('footer_view');
	}
	/**
	 * get_items: 
	 * @param string $item
	 * @return load views with result
	 */
	function get_items($item = null){
	$category = '';
	if ($this->input->get()){
		$url = $this->input->get();
		foreach($url as $key => $val){
			if ($this->_is_search_type($key) && $val != '' && $this->_is_valid_value($key, $val, 'val')){
				//$this->search[$key] = $this->_clean_string($val);
				$val =  $this->_clean_string($val);
				if ($key == 'searchtype'){
					$this->searchtype = $val;
				}
				if ($key == 'key'){
					$this->headline = $val;
				}
				if ($key == 'callback'){
					$this->callback = $val;
				}
			}
		}
		$this->search['headline'] = $this->_build_key($this->headline);
	}
		// $search[] = array ('headline' => explode( ' ', $key ) );
	if ($item != '$1'){
		$category = $item;
	}
	
	$result = $this->item_model->get_item($category,$this->search);
	if ($result){
		if ($this->callback == 'json'){
			echo json_encode($result);
			exit();
		}
		$this->load->view('result_view', array('result' => $result));
		}
		else
		{
		$this->load->view('item_view', array('content' => 'Inget sökresultat för "'.$this->headline.'"'));
		}
	}
	function set_search_query(){
		
	}
	private function _set_json($val){
		switch ($val){
			case 0:
			$this->json = FALSE;
			break;
			case 1:
			$this->json = TRUE;
			break;
		}
	}
	private function _build_key($str){
		$new_str = str_replace(" ", "%' $this->searchtype headline LIKE '%", "$str");
		return $new_str;
	}
	
	/**
	 * _is_searchtype: checks if get param is allowed.
	 * @param string $search to compare to $this->args
	 * @return BOOLEAN
	 */
	private function _is_search_type($search){
		if (!array_key_exists($search, $this->args))
		{
			return FALSE;
		}
		return TRUE;
	}
	private function _is_valid_value($key, $val, $where){
		if (isset($this->args[$key][$where])){
			if(!in_array($val, $this->args[$key][$where]))
			{
			return FALSE;
			}
		}
		
		return TRUE;
	}
	/**
	 * _clean_string: removes non-alphanumeric characters
	 * @param string $str to be cleaned
	 * @return string
	 */
	private function _clean_string($str){
		$new_str = preg_replace("/[^a-zA-Z0-9\s]/", " ", $str);
		return $new_str;
	}
}