<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {
	
function __construct() {
	parent::__construct();
}

public function main() {
	$this->load->view("main");
}

public function new_category() {
	$this->load->view("create_category");
}

public function create() {
	$post = $this->input->post();
	$this->Category->create($post);
	$id = $this->db->insert_id();
	redirect('/main.php');
}

}