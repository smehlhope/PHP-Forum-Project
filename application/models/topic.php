<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topic extends CI_Model {

	public $user;

		
		function __construct() {
			parent::__construct();
				$this->output->enable_profiler();
		}

public function add_topic($post) {
	$this->form_validation->set_rules("subject", "Subject", "trim|required");
	$this->form_validation->set_rules("category", "Category", "trim|required");
	$this->form_validation->set_rules("description", "Description", "trim|required");
	if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata("errors", validation_errors());
		} else {
	     	$query = "INSERT INTO topics (subject, category, description, created_at, updated_at, user_id) VALUES (?,?,?,NOW(),NOW(),?)";
			//below fills in the ?,? in the query - here we tell CI to look ofr the values
			//make certain that the values and selectors match up with database order
			$values = array($post["subject"], $post["category"], $post["description"], intval($this->session->userdata['user_session']['id']));
			//using the query bindings automatically escapes the string (the ??s)
			return $this->db->query($query, $values);
		}
	}

public function retrieve_all() {
	return $this->db->query("SELECT t.id, t.subject, t.category, t.description, t.created_at, t.updated_at, u.username, count(c.topic_id) comment_count FROM topics t left join comments c ON t.id = c.topic_id left join users u on u.id = t.user_id group by t.id")->result_array();
}

public function get_one_topic($id) {
	$query = "SELECT topics.id, topics.subject, topics.category, topics.description, topics.created_at, topics.updated_at, users.id AS user_id, users.username FROM topics JOIN users ON topics.user_id = users.id WHERE topics.id = ? ORDER BY topics.created_at";
	$values = $id;
	return $this->db->query($query, $values)->row_array();
}

public function update_topic($post, $topic_id) {
	$query = "UPDATE topics SET subject=?, category=?, description=?, updated_at=NOW() WHERE id=?";
	$values = array($post['subject'], $post['category'], $post['description'], $topic_id);
	return $this->db->query($query,$values);
}

public function destroy_topic($topic_id) {
	$query = "DELETE FROM topics WHERE id = ?";
	$values = $topic_id;
	return $this->db->query($query, $values);
}

}		