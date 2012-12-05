<?php

class VerifyRegistration extends CI_Controller {
               
  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation','email');
    $this->lang->load('form_validation', 'swedish');
    $this->load->helper('form', 'url', 'string');
    $this->load->model('user_model','',TRUE);
  }   
  function index()
  {
    $this->load->view('header_view', array('title' => 'Registrering'));
    $this->load->view('registration_view');
    $this->load->view('footer_view');
  }
  function register(){
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    if ($this->form_validation->run('signup') == FALSE) // validation hasn't been passed
    {
      $response = array(
        'state'  => false,
        'message' => 'Något blev fel, försök igen!'
      );
      echo json_encode($response);
  	}
    else // passed validation proceed to post success logic
    {
      // build array for the model
      $password = set_value('password');
      $activationkey = random_string('alnum', 50);

      $form_data = array(
                        //'username' => set_value('username'),
                        'firstname' => set_value('firstname'),
                        'lastname' => set_value('lastname'),
                        //'city' => set_value('city'),
                        //'country' => set_value('country'),
                        //'zip' => set_value('zip'),
                        //'phone' => set_value('phone'),
                        'email' => set_value('email'),
                        'password' => SHA1('shru7hTTls'.$password),
                        'activation_key' => $activationkey
                        );      
      // run insert model to write data to db
        
      if ($this->user_model->register_user($form_data) == TRUE) // the information has therefore been successfully saved in the db
      {
        if($this->send_email_activation_key($activationkey)==TRUE){
                  
          //$this->load->view('login_view');
          //echo $this->email->print_debugger();
                
        }
        else
        {
          echo 'Ett fel uppstod när aktiveringsmailet skulle skickas. Var god försök senare.';
        }
      }
      else
      {
          echo 'Ett fel uppstod. Var god försök senare.';
          // Or whatever error handling is necessary
        }
      }
    }
    function send_email_activation_key($activationkey){
      $this->load->library('email');
      //$this -> form_validation -> set_message('send_email_activation_key', 'Något blev fel när verifikationsmailet skulle skickas.');
      $this->email->from('noreply@bytarna.se', 'Bytarna');
      $this->email->to('carina.mollbrink@gmail.com', 'Carina');
      $this->email->subject('Email Test');
      $this->email->message('Klicka på länken för att aktivera ditt konto'. anchor('index.php/confirm').$activationkey.'Aktivera');   
        
      //if($this->email->send() == TRUE)
      //{
      //  return TRUE;
      //}
      //return FALSE;
      echo 'Klicka på länken för att aktivera ditt konto: '. anchor('index.php/confirm/'.$activationkey, 'Aktivera').
      ' eller kopiera följande länk till din webbläsare: '. anchor('index.php/confirm/'.$activationkey);
      return TRUE;
    }


    function user_not_exist($username){
      $this -> form_validation -> set_message('user_not_exist', 'Användarnamnet är upptaget');

      if ($this->user_model->check_exists_username($username))
      {
        return FALSE;
      }
      return TRUE;

    }
    function email_not_exist($email){
      $this -> form_validation -> set_message('email_not_exist', 'Det finns redan ett konto registrerat på den här emailadressen.');

      if ($this->user_model->check_exists_email($email))
      {
        return FALSE;
      }
      return TRUE;

    }
    //use this function when using ajax validation. use "echo site_url('index.php/verifyregistration/ajax_check');" for example and type must be 'post'.
    function ajax_check() {
      if($this->input->post('ajax') == '1') {
        if($this->form_validation->run('signup') == FALSE){
        //Field validation failed.
         echo validation_errors();
        }
        else
        {
        //Go to loginpage
        echo 'registration successful';
        }
      }
    }
    function register_confirm($activation_key){
    
      //$activation_key = $this->uri->segment(3);
    
      if (!$activation_key){
        echo 'Ingen aktiveringskod funnen i URL';
        exit ();
      }else{
        if ($this->user_model->activate_user($activation_key) == TRUE){
            echo 'Jippie! Ditt konto är aktiverat. '.anchor('index.php', 'Logga in här');
        }else{
          echo 'Någonting blev knas';
          exit ();
        }
      }
    }
}
