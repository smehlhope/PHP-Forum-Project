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
 
			// return $this->db->query("SELECT * FROM users WHERE email = '{$user_info[email]}'
			// 						 AND password = '{$user_info[password]}'")->row_array();
		}
		
		public function insert_user($post) {
			$insert_query = "INSERT INTO users (username, password, email, created_at) VALUES (?, ?, ?, NOW())";
			$values = (array($post['username'], $post['password'], $post['email']));
			$this->db->query($insert_query, $values);
			return $this->db->insert_id();
		}

}

