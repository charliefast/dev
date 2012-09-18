<?php
Class User_model extends CI_Model
{
 function login($username, $password)
 {
    //$this -> db -> select('id, username, password');
    //$this -> db -> from('members');
    //$this -> db -> where('username = ' . "'" . $username . "'");
    //$this -> db -> where('password = ' . "'" . SHA1('shru7hTTls'.$password) . "'");
    //$this -> db -> limit(1);

    //$query = $this -> db -> get();
    $pw = SHA1('shru7hTTls'.$password);
    
    //query for using username as username, not email;
    //$str = "SELECT id, username, password FROM members WHERE username = ? AND password = ? LIMIT 1";
    $str = "SELECT id, email, password FROM members WHERE email = ? AND password = ? LIMIT 1";


    $query = $this -> db -> query($str,array($username, $pw));

    if($query -> num_rows() == 1)
    {
      return $query->result();
    }
    else
    {
      var_dump($pw);
      return false;
    }
  }
  function register_user($form_data)
  {
    $this->db->insert('members', $form_data);
    
    if ($this->db->affected_rows() == '1')
    {
      return TRUE;
    }
    
    return FALSE;

  }
   
  function check_exists_username($username){

    $query = "SELECT username FROM members WHERE username = ?";

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


}