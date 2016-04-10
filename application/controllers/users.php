<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public $current_user;


	function __construct() {
		parent::__construct();
		$this->load->model("User");
		$this->current_user = $this->session->userdata("current_user");
		$this->load->view('partials/nav',array('current_user' => $this->current_user));
	}

	public function index() {
		$topics = $this->Topic->retrieve_all();
		$this->load->view('main', array('current_user' => $this->current_user,
																		'topics' => $topics
																		));
	}

	public function is_login() {
		if($this->current_user) {
			return true;
		} else {
			return false;
		}
	}	


	public function login() {

		$user = $this->input->post(NULL, TRUE);
		$login_user = $this->User->login_user($user);

		if($login_user["is_login"]) {
			$this->session->set_flashdata("success_message",$login_user["success_message"]);
			redirect('topics/main');
		} else {
			$this->session->set_flashdata("error_message",$login_user["error_message"]);
			redirect(base_url('/users/login'));	 
		}
	}

	public function register() {
		$user = $this->input->post(NULL, TRUE); 
    $register_user = $this->User->create_user_record($user);
    
    if($register_user["user_created"]) {
    	$this->session->set_flashdata("success_message",$register_user["success_message"]);
    	$this->login_user();
    } else {
    	$this->session->set_flashdata("error_message",$register_user["error_message"]); 
    }
	}

	public function profile() {
		$this->load->view("user_profile", array('current_user' => $this->current_user));
	}

	public function new_user() {
		$this->load->view("register");
	}

	public function login_user() {
		$this->load->view("login");
	}

	public function logout() {
		$this->session->sess_destroy();
		$this->session->set_flashdata("error_message","Logged Out successfully");
		redirect("topics");
	}

	function get_user_with_username($username) {
    $user_name  = strtolower($username);
    $user_fetch_query = "SELECT * FROM users WHERE username = ?";
    return $this->db->query($user_fetch_query,$user_name)->row_array();
  }

	public function edit($user_id) {
		$user = $this->User->get_user_with_id($user_id);
		$this->load->view("profile",array('user' => $user));

		$user_id = intval($user_session['id']);
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
		$this->form_validation->set_rules("password", "Password", "trim|min_length[8]|required|matches[confirm_password]|md5");
		$this->form_validation->set_rules("confirm_password", "Confirm Password", "trim|required|md5");

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata("errors", validation_errors());
			redirect('user_profile');
		} else {
			$this->User->update_user($this->input->post(), $user_id);
			redirect('/users/profile/'.$user_id);
		}
	}


}
