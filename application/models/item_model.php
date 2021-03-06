<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Item model class
 * 
 * @author Carina Möllbrink
 */

Class Item_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	 /**
	 * Fetches item from db
	 * 
	 * @param (optional) array $category
	 * @param (optional) array $search
	 * @param (optional) BOOLEAN $desc
	 * @param (optional) int $limit
	 * @param (optional) int $offset
	 * @return mixed
	 */
	function get_item($category = '', $search = '', $limit = 20, $offset = 0, $desc = TRUE){
			$this->db->select('items.id, 
				headline, 
				description, 
				date_added, 
				end_date, 
				items.user_id,
				users.firstname, 
				users.lastname,
				images.name,
				images.url,
				categories.name')
			->from('items')
			->join('users','items.user_id = users.id')
			->join('categories', 'categories.id = items.category_id')
			->join('images','images.item_id = items.id','left')
			->group_by('items.id');
		if ($category){
			$this->db->where('categories.slug', $category);
		}
		if ($search){
			foreach ($search as $key => $value) {
			$this->db->where($key. " LIKE '%" . $value . "%'");
			}
		}
		if ($desc){
			$this->db->order_by("date_added", "desc"); 
		}
		$this->db->limit($limit, $offset);
		$this->db->where('status', '1');
		$query = $this->db->get();
		//var_dump($this->db->last_query());
		return $query->result();
	}

	/**
	 * Gets user's items
	 *
	 * @param int $user_id
	 * @param (optional) int $status
	 * @return mixed
	 */
	function get_users_items($user_id, $status = ''){
			$this->db->select('items.id AS item_id, 
				headline, 
				description, 
				date_added, 
				end_date, 
				items.user_id,
				users.firstname, 
				users.lastname,
				images.name,
				images.url,
				categories.name,
				status')
			->from('items')
			->join('users','items.user_id = users.id')
			->join('categories', 'categories.id = items.category_id')
			->join('images','images.item_id = items.id','left')
			->order_by("date_added", "desc")
			->where('items.user_id', $user_id)
			->group_by('items.id');
			if ($status)
			{
				$this->db->where('status', $status);
			}
		$query = $this->db->get();
		//var_dump($this->db->last_query());
		return $query->result();
	}

	/**
	 * Gets user's items
	 *
	 * @param int $id
	 * @param (optional) int $status
	 * @param (optional) int $user_id
	 * @return mixed
	 */
	function get_item_by_id($id, $status = 1, $user_id = ''){
		$this->db->select('items.id, 
				headline, 
				description, 
				date_added, 
				end_date, 
				items.user_id, 
				users.firstname, 
				users.lastname,
				images.name,
				images.url,
				categories.name AS category_name,
				items.category_id')
			->from('items')
			->join('users','items.user_id = users.id')
			->join('categories', 'categories.id = items.category_id', 'left')
			->join('images','images.item_id = items.id','left')
			->where('items.id', $id)
			->where('status', $status)
			->order_by('images.id', 'DESC')
			->group_by('items.id')
			->limit('1,0');
			if ($user_id)
			{
				$this->db->where('items.user_id', $user_id);
			}
			$query = $this->db->get();
		return $query->result();
	}

	/**
	 * Inserts form data to db
	 * 
	 * @param array $form_data
	 * @return mixed
	 */
	function insert_item($form_data)
	{
		$this->db->insert('items', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return $this->db->insert_id();
		}
		
		return FALSE;
	}

	/**
	 * Updates item by id
	 * 
	 * @access public
	 * @param int $item_id
	 * @param array $form_data
	 * @return BOOLEAN
	 */
	function update_item($item_id, $form_data){
		$this->db->where('id', $item_id)
			->update('items', $form_data);
		if ($this->db->affected_rows() > 0)
		{
		 return TRUE;
		}
		return FALSE;
	}

	/**
	 * Deletes item by id and user id
	 * 
	 * @access public
	 * @param int $item_id
	 * @param int $user_id
	 * @return BOOLEAN
	 */
	function delete_item($item_id, $user_id){
		$this->db->where('id', $item_id)
			->where('user_id', $user_id)
			->delete('items');
		if ($this->db->affected_rows() > 0)
		{
		 return TRUE;
		}
		return FALSE;
	}

	/**
	 * Fetches items from category
	 *
	 * @access public
	 * @param string $slug
	 * @param int $limit
	 * @return mixed
	 */
	function fetch_category($slug, $limit = 20){
		$str = "SELECT * FROM items 
						INNER JOIN categories 
						ON categories.id = items.category_id 
						AND categories.slug = ? LIMIT 0, ?";
		$query = $this->db->query($str,array($slug,$limit));
		if($query -> num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
  
  /**
   * Gets owner of item
   *
   * @param $int $item_id
   * @return mixed
   */
	function get_owner($item_id)
	{
		$str = "SELECT user_id FROM items 
						WHERE id = ? ";
		$query = $this->db->query($str,$item_id);
		if ($query->num_rows() > 0)
		{
		$row = $query->row_array(); 
		return $row['user_id'];
		}
		return FALSE;
	}

	/**
	 * Queries and count_rows
	 * 
	 * @param (optional) string $category
	 * @return mixed
	 */
	function count_rows($category='')
	{
		$this->db->select('*')
			->from('items')
			->where('status', 1);
		if($category)
		{
			$this->db->join('categories', 'categories.id = items.category_id', 'left')
				->where('categories.slug', $category);
		}
		return $this->db->count_all_results();
	}
}
/* End of file item_model.php */
/* Location: ./application/models/item_model.php */