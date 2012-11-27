<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User model class
 * 
 * @author Carina Möllbrink
 */

Class User_model extends CI_Model
{
  private $user;
  
  /**
   * Constructor
   */
  function __construct()
  {
    parent::__construct();
  }
  
  /**
   * Adds salt and queries database
   *
   * @param string $username
   * @param strint $password
   * @return mixed
   */
  function login($username, $password)
  {
    $pw = SHA1('shru7hTTls'.$password);
    $str = "SELECT id, email, email_activated FROM users WHERE email = ? AND password = ? LIMIT 1";
    $query = $this->db->query($str,array($username, $pw));

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
   * Inserts form data to table users
   *
   * @param array $form_data
   * @return BOOLEAN
   */
  function register_user($form_data)
  {
    $this->db->insert('users', $form_data);  
    if ($this->db->affected_rows() == '1')
    {
      return TRUE;
    }
    return FALSE;
  }
  
  /**
   * Checks if username exist in database
   *
   * @param string $username
   * @return BOOLEAN
   */
  function check_exists_username($username){

    $query = "SELECT username FROM users WHERE username = ?";

    $result = $this -> db -> query($query,$username);

    if ($result -> num_rows() > 0 )
    {
      //username exists
      return TRUE;
    }
    //username doesn't exist
    return FALSE;
  }

  /**
   * Checks if email exist in database
   *
   * @param string $email
   * @return BOOLEAN
   */
  function check_exists_email($email){

    $query = "SELECT email FROM users WHERE email = ?";

    $result = $this -> db -> query($query,$email);

    if ($result -> num_rows() > 0 )
    {
      //email exists
      return TRUE;
    }
    //email doesn't exist
    return FALSE;
  }
  
  /**
   * Activates user
   *
   * @param string $activation_key
   * @return BOOLEAN
   */
  function activate_user($activation_key){
    //first check if key exists
    $query = "SELECT activation_key, email_activated FROM users WHERE activation_key = ?";

    $result = $this -> db -> query($query,$activation_key);
    if ($result->num_rows() > 0)
    {
      $row = $result->row(); 
      if($row->email_activated == 1){
        echo 'Ditt konto är redan aktiverat. '.anchor('index.php/login','Logga in här');
        exit();
      }else{
        //activation_key exists
        //update database
        $this -> db -> update('users', array('email_activated' => '1'), array('activation_key' => $activation_key));
        // check if any rows where affected by this update
        if ($this->db->affected_rows() > 0)
        {
          return TRUE;
        }
        //if activation_key doesn't exist or there where no affected rows
        return FALSE;  
      }
    }
  }
  
  /**
   * Fetches user by ID
   * 
   * @access public
   * @param int $id
   * @return mixed
   */
  function get_user($id){
    $str = "SELECT * FROM users WHERE id = ? LIMIT 1";
    $query = $this -> db -> query($str, $id);
    $this->user = $query->result();
    if ($this->user)
    {
      return $this->user;
    }
    return FALSE;
  }
  /**
   * Updates user by ID
   * 
   * @access public
   * @param int $id
   * @param array $data
   * @return BOOLEAN
   */
  function update_user_info($id, $pw, $data){
    $this->db->where('id', $id);
    $this->db->where('password', $pw);
    $this->db->update('users', $data);
    if ($this->db->affected_rows() > 0)
    {
     return TRUE;
    }
    return FALSE;  
  }
}
/* End of file user_model.php */
/* Location: ./application/models/user_model.php */