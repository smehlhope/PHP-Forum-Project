<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	protected $view_data = array();
	protected $user_session = NULL;


	function __construct() {
		parent::__construct();
		$this->view_data['user_session'] =
		$this->user_session =
		$this->session->userdata("user_session");
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
			$user = $this->User->get_user($this->input->post());

			if ($user) {
				$user['avatar'] = $this->get_gravatar($user['email']);
				$this->session->set_userdata("user_session", $user);
				redirect("topics");
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
				$this->session->set_userdata("user_session", $post);
				redirect("topics/main");
			} else {
				$this->session->set_flashdata("registration_errors", "Sorry but your info were not registered please try again.");
				redirect(base_url());
			}
		}
	}

	public function profile() {
		$this->load->view("user_profile", $this->view_data);
	}

	public function new_user() {
		$this->load->view("register");
	}

	public function login_user() {
		$this->load->view("login");
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect("topics");
	}

	public function edit($user_id) {
		$user_id = intval($this->session->userdata['user_session']['id']);
		$this->load->library("form_validation");
		$this->form_validation->set_rules("username", "Username", "trim|required|min_length[3]");
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

	public function get_gravatar($email, $s = 40, $d = 'identicon', $r = 'pg', $img = false, $atts = array()) {
		// $email = $this->session->userdata['user_session']['email'];
	    $url = 'http://www.gravatar.com/avatar/';
	    $url .= md5(strtolower(trim($email)));
	    $url .= "?s=$s&d=$d&r=$r";
	    if ($img) {
	        $url = '<img src="' . $url . '"';
	        foreach ($atts as $key => $val) {
	            $url .= ' ' . $key . '="' . $val . '"';
	        	$url .= ' />'; 
	        }
		}
	    return $url;
	}
}
