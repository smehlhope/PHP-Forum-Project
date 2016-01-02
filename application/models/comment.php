<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Model {

	public $user;
		
		function __construct() {
			parent::__construct();
		}
public function add_comment($post) {
	$post = $this->input->post();
	$this->form_validation->set_rules("content", "Comment", "trim|required");
	if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata("errors", validation_errors());
		} else {
	     	$query = "INSERT INTO comments (content, created_at, updated_at, topic_id, user_id) VALUES (?, NOW(), NOW(),?,?)";
			$values = array($post["content"], intval($post['topic_id']), intval($this->session->userdata['user_session']['id']));
			return $this->db->query($query, $values);
		}
}

public function get_comments($id) {
	$query = "SELECT comments.id, comments.content, comments.created_at, comments.updated_at, users.id as user_id, users.username FROM comments JOIN users ON comments.user_id = users.id WHERE topic_id = ?";
	$values = $id;
	return $this->db->query($query, $values)->result_array();
}

public function update_comment($post, $comment_id) {
	$query = "UPDATE comments SET content=?, updated_at=NOW()  WHERE id=? AND topic_id=?";
	$values = array($post['content'], $comment_id, $post['topic_id']);
	return $this->db->query($query,$values);
}

}		