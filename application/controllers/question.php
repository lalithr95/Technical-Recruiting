<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question extends CI_Controller
{
	public function __construct() {
		parent::__construct();
	}

	public function add() {
		$question = $this->input->post('question');
		$id = $this->input->post('id');
		$this->load->model('question_model');
		$data = array(
				'interview_id' => $id,
				'name' => $question
			);
		$this->question_model->insert($data);
		redirect('/assigned/interview/'.$id);
	}

}