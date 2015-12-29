<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	
	protected $view_data = array();
	protected $user_session = NULL;
	
	function __construct() {
		parent::__construct();
		$this->view_data['user_session'] = 
		$this->user_session = 
		$this->session->userdata("user_session");
			// $this->output->enable_profiler(true);

	}
	
	public function index() {
		// would be good to make this a function on its own because DRY
		$this->load->view("index");
	}
	
	public function login() {		
		$this->load->library("form_validation");
		$this->form_validation->set_rules("username", "Username", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|min_length[8]|required|md5");
		
		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata("login_errors", validation_errors());
			redirect(base_url());
			//vardump and die
		} else {
			$this->load->model("User");							   
			$get_user = $this->User->get_user($this->input->post());

			if ($get_user) {
				$this->session->set_userdata("user_session", $get_user);
				redirect(base_url("topics/main"));
			} else {
				$this->session->set_flashdata("login_errors", "Invalid email and/or password");
				redirect(base_url());
			}
		}
	}
	
	public function register() {
		$this->load->library("form_validation");
		$this->form_validation->set_rules("username", "Username", "trim|required|min_length[3]");
		$this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
		$this->form_validation->set_rules("password", "Password", "trim|min_length[8]|required|matches[confirm_password]|md5");
		$this->form_validation->set_rules("confirm_password", "Confirm Password", "trim|required|md5");

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata("registration_errors", validation_errors());
			redirect(base_url());
		} else {
			$this->load->model("User");
			$post = $this->input->post();	
			//var_dump($this->input-post());
			//die();		
			$insert_user = $this->User->insert_user($post);
			
			if($insert_user) {				
				$this->session->set_userdata("user_session", $user_input);
				redirect("topics/main");
			} else {
				$this->session->set_flashdata("registration_errors", "Sorry but your info were not registered please try again.");
				redirect(base_url());
			}
		}
	}
	
	public function profile() {
		$this->load->view("nav", $this->view_data);
	}
	
	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
