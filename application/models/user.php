<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	public $current_user;
		
		function __construct() {
			parent::__construct();
			$this->current_user = $this->session->userdata("current_user");
			$this->load->library('form_validation');
		}

	public function index() {
		$this->load->view("main/index",array('current_user' => $this->current_user));
	}	
		
	// public function get_user($user_info) {
	// 	$select_user = "SELECT * FROM users WHERE username = ? AND password = ?";
	// 	$values = array($user_info['username'], $user_info['password']);
	// 	return $this->db->query($select_user, $values)->row_array();
	// }
	
	  public function create_user_record($user) {
    $input_validation_passed = TRUE; 
    $data   = array();
    $config = array(
                    array(
                      'field' => 'email', 
                      'label' => 'Email', 
                      'rules' => 'trim|valid_email|required'
                    ),
                    array(
                      'field' => 'username', 
                      'label' => 'Username', 
                      'rules' => 'trim|required|min_length[3]|is_unique[users.username]'
                    ),
                    array(
                      'field' => 'password', 
                      'label' => 'Password', 
                      'rules' => 'trim|min_length[8]|required|md5|matches[password_conf]'
                    ),   
                    array(
                      'field' => 'password_conf', 
                      'label' => 'Password Confirmation', 
                      'rules' => 'trim|required'
                    )
              );

    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() == FALSE) {
      $data["user_created"] = FALSE;
      $data["error_message"] = validation_errors();
      $input_validation_passed = FALSE;
    }

    $get_user_with_username = $this->get_user_with_username($user['username']);
    if($get_user_with_username) {
      $data["user_created"] = FALSE;
      $data["error_message"] = "Your record already exists..Please login!!";
      $input_validation_passed = FALSE;
    } else if ($input_validation_passed) {
      $insert_query  =  "INSERT INTO users (email, username, password, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
      $add_user = $this->db->query($insert_query,
                                  array($user['email'],
                                        $user['username'],
                                        md5($user['password']),
                                        "user",
                                        date("Y-m-d H:i:s"),
                                        date("Y-m-d H:i:s")
                                  )  
                  );     
      if($add_user) {
        $data["user_created"] = TRUE;
        $data["success_message"] = "Successfully registered with The Wandering Reader. Please login with your credentials";
      } else {    
        $data["user_created"] = FALSE;
        $data["error_message"] = "Cannot create user. Please try again";
      }      
    }
    return $data;
  }

    function login_user($post) {
    $input_validation_passed = TRUE; 
    $config = array(
                   array(
                         'field' => 'username', 
                         'label' => 'User Name', 
                         'rules' => 'trim|required'
                    ),
                   array(
                         'field' => 'password', 
                         'label' => 'Password', 
                         'rules' => 'trim|required' 
                    )        
              );

    $this->form_validation->set_rules($config);
    $check_user_present = $this->get_user_with_username($post['username']);
    $user = $this->get_user_with_username($post['username']);

    if ($this->form_validation->run() == FALSE) {
      $input_validation_passed = FALSE; 
      $data["error_message"] = validation_errors();
      $data["is_login"] = FALSE;
    } else if(!$check_user_present) {
      $input_validation_passed = FALSE; 
      $data["error_message"] = "User not found in records, Please register.";
      $data["is_login"] = FALSE;
    } else {
      if(($check_user_present['password'] == md5($post['password']))) {
        $current_user = array('user_id'    => $check_user_present['id'],
                              'username'  => $user['username'],
                              'avatar'  => $this->get_gravatar($user['email']),
                              'email' => $user['email'],
                              'created_at' => $user['created_at'] );

        $this->session->set_userdata("current_user",$current_user);
        $data["is_login"]        = TRUE;
        $data["success_message"] = "Successfully logged in";
      }
      else
      {
        $data["is_login"] = FALSE;
        $data["error_message"] = "Password entered is wrong. Please try again";
      }
    }
    return $data;  
  } 

  function get_user_with_username($username) {
    $user_name   = strtolower($username);
    $user_fetch_query = "SELECT * FROM users WHERE username = ?";
    return $this->db->query($user_fetch_query,$user_name)->row_array();
  }

  function get_user_with_id($id) {
    $user_fetch_query = "SELECT * FROM users WHERE id = ?";
    return $this->db->query($user_fetch_query,$id)->row_array();
  }

  function get_all_users() {
    $users_fetch_query = "SELECT * FROM users";
    return $this->db->query($users_fetch_query)->result_array();
  }

  function update_user($user) {
    $update_data =  array('email' => $user['email'], 
                          'password'  => $user['password']  
                          );
    $this->db->where('id', $user['id']);
    return $this->db->update('users', $update_data);
  }

  function delete_user($id) {
    $user = $this->get_user_with_id($id);
    //make sure admin is not deleted
    if($user["user_level"]!="admin") {
      return $this->db->delete('users', array('id' => $id));
    } else {
      return false;
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

