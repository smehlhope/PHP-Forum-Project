<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Model {

	public $user;
		
		function __construct() {
			parent::__construct();
		}
public function add_comment($post) {
	$this->form_validation->set_rules("content", "Response", "trim|required");
	if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata("errors", validation_errors());
		} else {
	     	$query = "INSERT INTO posts (content, created_at, updated_at, topic_id, user_id) VALUES (?,?,?,?,?)";
			$values = array($post["content"], date('F j Y g:i a'), date('F j Y g:i a'), intval($post['topic_id']), intval($this->session->userdata['user_session']['id']));
			return $this->db->query($query, $values);
		}
}

}		