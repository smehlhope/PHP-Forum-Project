<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topics extends CI_Controller {
	
	
	function __construct() {
		parent::__construct();
		// $this->load->model('Topic');
	}
public function index() {
	$this->load->view('main', $data);
}

public function main() {
	$data['topics'] = $this->Topic->retrieve_all();
	$this->load->view("main", $data);
}

public function new_topic() {
	$this->load->view("create_topic");
}

public function add_topic() {
	$this->Topic->add_topic($this->input->post());
	redirect('topics/main');
}

public function show($id) {
	$data['topic'] = $this->Topic->get_one_topic($id);
	$this->load->view('topic', $data);
}

}