<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Controller Verifyregistration class
 * 
 * Handles verification of registration
 *
 */
class VerifyRegistration extends CI_Controller {

	/**
	 * Constructor
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation','email');
		$this->lang->load('form_validation', 'swedish');
		$this->load->helper('form', 'url', 'string');
		$this->load->model('user_model','',TRUE);
	}
	
	/**
	 * Index
	 */
	function index()
	{
		$this->load->view('header_view', array('title' => 'Registrering'));
		$this->load->view('registration_view');
		$this->load->view('footer_view');
	}
	
	/**
	 * Registers users
	 * 
	 * @return mixed
	 */
	function register(){
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run('signup') == FALSE) // validation hasn't been passed
		{
			$response = array(
				'state'  => false,
				'message' => 'Något blev fel, försök igen!'
			);
			echo create_json($response);
			exit;
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
												'email' => set_value('email'),
												'password' => SHA1('shru7hTTls'.$password),
												'activation_key' => $activationkey,
												'sign_up_date' => date('Y-m-d h:i:s')
												);      
			// run insert model to write data to db
				
			if ($this->user_model->register_user($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				echo create_json(array('state' => TRUE, 'status' => 'Du är nu registrerad och kan logga in'));
				exit;
				//$this->send_email_activation_key($activationkey);
			}
		}
	}
	
	/**
	 * Sends email with activation key
	 * 
	 * @todo incorporate or remove?
	 * 
	 * @param (optional) string $activation key 
	 * @return BOOLEAN
	 */
	function send_email_activation_key($activation_key = ''){
		$activation_key = 'hejhejhej';
		$this->load->library('email');
		//$this -> form_validation -> set_message('send_email_activation_key', 'Något blev fel när verifikationsmailet skulle skickas.');
		$this->email->from('noreply@bytarna.se', 'Bytarna');
		$this->email->to('carina.mollbrink@gmail.com', 'Carina');
		$this->email->subject('Email Test');
		$this->email->message('Klicka på länken för att aktivera ditt konto'. anchor('index.php/confirm').$activation_key.'Aktivera');   
			
		//if($this->email->send() == TRUE)
		//{
		//  return TRUE;
		//}
		//return FALSE;
		$this->load->view('activation_view', array('activation_key' => $activation_key));
		// if ($this->input->is_ajax_request())
		// {
			// echo create_json(array('key' => $activation_key));
				// exit;
		// }
		return TRUE;
	}

	/**
	 * check if user exists
	 * 
	 * @todo remove?
	 * 
	 * @param string $username
	 * @return BOOLEAN
	 */
	function user_not_exist($username){
		$this -> form_validation -> set_message('user_not_exist', 'Användarnamnet är upptaget');

		if ($this->user_model->check_exists_username($username))
		{
			//echo create_json('Användarnamnet är upptaget.');
			//exit;
			return FALSE;
		}
		return TRUE;
	}

	/**
	 * check if email exists
	 * 
	 * @todo remove?
	 * 
	 * @param string $email
	 * @return BOOLEAN
	 */
	function email_not_exist($email){
		$this -> form_validation -> set_message('email_not_exist', 'Det finns redan ett konto registrerat på den här emailadressen.');
		
		if ($this->user_model->check_exists_email($email))
		{
			//echo create_json('Det finns redan ett konto registrerat på den här emailadressen.');
			// exit;
			return FALSE;
		}
		return TRUE;
	}

	/**
	 * Activates user
	 * @todo incorporate or remove?
	 * 
	 * @param string $activation key 
	 * @return mixed
	 */
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
/* End of file verifyregistration.php */
/* Location: ./application/controllers/verifyregistration.php */
