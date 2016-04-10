<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Topics extends CI_Controller {

public $current_user;

	function __construct() {
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Comment');
		$this->current_user = $this->session->userdata("current_user");
		$this->load->view('partials/nav',array('current_user' => $this->current_user));
	}
public function index() {
	$data['topics'] = $this->Topic->retrieve_all();
	$this->load->view('main', $data);
}

public function new_topic() {
	$this->load->view("create_topic");
}

public function add_topic() {
	$this->Topic->add_topic($this->input->post());
	redirect('topics');
}

public function show($id) {
	$topic = $this->Topic->get_one_topic($id);
	$comments = $this->Comment->get_comments($id);
	$this->load->view('topic', array('topic' => $topic,
																	'comments' => $comments));
}

public function update($topic_id) {
	$this->Topic->update_topic($this->input->post(), $topic_id);
	redirect('/topics/'.$topic_id);
}

public function destroy($topic_id) {

	if($this->Topic->destroy_topic($topic_id)){
		$this->session->set_flashdata('topic-delete-success', 'Topic successfully deleted');
		redirect("topics");
	} else {
		$this->session->set_flashdata('error', 'Something went wrong! Please try again later.');
	}
}

}
