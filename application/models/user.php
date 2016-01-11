<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	public $user;
		
		function __construct() {
			parent::__construct();
		}
		
	public function get_user($user_info) {
		$select_user = "SELECT * FROM users WHERE username = ? AND password = ?";
		$values = array($user_info['username'], $user_info['password']);
		return $this->db->query($select_user, $values)->row_array();
	}
	
	public function insert_user($post) {
		$insert_query = "INSERT INTO users (username, password, email, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
		$values = array($post['username'], $post['password'], $post['email']);
		$this->db->query($insert_query, $values);
		return $this->db->insert_id();
	}

	public function update_user($post) {
		$query = "UPDATE users SET username=?, password=?, email=?, updated_at=NOW() WHERE id=?";
		$values = array($post['username'], $post['password'], $post['email'], intval($this->session->userdata['user_session']['id']));
		return $this->db->query($query,$values)->row_array();
	}

}

