<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Controller {
	
	
	function __construct() {
		parent::__construct();
	}

public function add_comment() {
	$this->Comment->add_comment($this->input->post());
	$id = $this->input->post('topic_id');
	redirect('topics/'.$id);
}

public function update($comment_id) {
	$topic_id = $this->input->post('topic_id');
	$this->Comment->update_comment($this->input->post(), $comment_id);
	redirect('topics/'.$topic_id);
}

}