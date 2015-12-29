<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Model {

	public $user;
	
function __construct() {
	parent::__construct();
	$this->output->enable_profiler();
}

public function create($post) {
	$this->form_validation->set_rules("name", "Name", "trim|required");
	$this->form_validation->set_rules("description", "Description", "trim|required");
	if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata("errors", validation_errors());
		} else {
	     	$query = "INSERT INTO categories (name, description, created_at, updated_at) VALUES (?,?,?,?)";
			//below fills in the ?,? in the query - here we tell CI to look ofr the values
			//make certain that the values and selectors match up with database order
			$values = array($post["name"], $post["description"], date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
			//using the query bindings automatically escapes the string (the ??s)
			return $this->db->query($query, $values);
		}
	}

}

		