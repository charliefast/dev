<?php
Class User_model extends CI_Model
{
  private $user;
  
  function __construct()
  {
    parent::__construct();
  }
  function login($username, $password)
  {
    $pw = SHA1('shru7hTTls'.$password);
    
    
    //$str = "SELECT id, username, password FROM members WHERE username = ? AND password = ? LIMIT 1";
    //query for using username as username, not email;
    $str = "SELECT id, email, password FROM users WHERE email = ? AND password = ? LIMIT 1";

  //$query = $this -> db -> get();
    $query = $this -> db -> query($str,array($username, $pw));

    if($query -> num_rows() > 0)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }
 
  function register_user($form_data)
  {
    $this->db->insert('users', $form_data);
    
    if ($this->db->affected_rows() == '1')
    {
      return TRUE;
    }
    
    return FALSE;

  }
   
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
  function check_exists_email($email){

    $query = "SELECT email FROM members WHERE email = ?";

    $result = $this -> db -> query($query,$email);

    if ($result -> num_rows() > 0 )
    {
      //email exists
      return TRUE;
    }
    //email doesn't exist
    return FALSE;
  }
  function activate_user($activation_key){
    //first check if key exists
    $query = "SELECT activation_key, email_activated FROM members WHERE activation_key = ?";

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
        if ($this->db->affected_rows() > 0){
      
          return TRUE;
        }
        //if activation_key doesn't exist or there where no affected rows
        return FALSE;  
      }
    }
  }
  private function _get_user_from_db($id){
    $str = "SELECT firstname, lastname, city, country, sign_up_date FROM users WHERE id = ? LIMIT 1";
    $query = $this -> db -> query($str, $id);
    $this->user = $query->result();
  }
  function get_user($id){
    $this->_get_user_from_db($id);
    if ($this->user){
      return $this->user;
    }else{
      return FALSE;
    }
  }
}