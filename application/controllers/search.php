<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
private $search = array();
private $search_query;
private $category;
private $county;
private $type = false;
private $json = false;
private $item;
private $criterias = array('key' => '', 'county' => '', 'desc' =>'', 'searchtype' => '');

	function __construct()
	{
		parent::__construct();
		$this->load->model('item_model');
		// $categories = $this->list_categories();
		$this->load->view('header_view', array('title' => 'Kategorier'));
		// $this->load->view('category_menu_view', $categories);
		$this->load->view('item_view', array('content' => 'hejhejhej'));
		$this->load->view('footer_view');
	}
	function get_items($item = null){
	$type = '';	
	$category = '';
	if ($this->input->get()){
		if ($this->input->get('callback')){
			$callback = $this->input->get('callback');
			if ($callback == 'json'){
				$this->json = TRUE;
			}
		};
		$url = $this->input->get();
		foreach($url as $key => $val){
			if ($this->is_search_type($key) && $val != ''){
				$this->search[$key] = $val; 
			}
			if($this->search){
				//$this->set_search_query();
				foreach ($this->search as $key => $val){
					if (isset($this->search['key'])){
						$this->search_query['headline'] = explode( ' ', $val ) ;
					}
				}
			}
		}
	}
		// $search[] = array ('headline' => explode( ' ', $key ) );
	if ($item != '$1'){
		$category = $item;
	}
	
	$result = $this->item_model->get_item($category,$this->search_query);
	if ($result){
		if ($this->json){
			return json_encode($result);
			exit();
		}
		$this->load->view('result_view', array('result' => $result));
		}
	else
	{
		$this->load->view('item_view', array('content' => 'Inget sökresultat för "'.$this->search_query['headline'].'"'));
	}
	}
	function set_search_query(){
		
	}
	function is_search_type($search){
		
		if (!array_key_exists($search, $this->criterias))
		//if ( ! preg_match('/^\s*"?(key|county|desc|searchtype)\s+/i', $search))
		{
			return FALSE;
		}
		return TRUE;
	}
}