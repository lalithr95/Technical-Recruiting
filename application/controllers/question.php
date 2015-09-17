<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('question_model');
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

	public function rate($id) {
		$data = array();
		$questions = $this->question_model->get_all($id);
		$count = 0;
		$sum = 0;
		foreach ($questions as $q) {
			$this->question_model->update_rating($q['id'], $this->input->post($q['id']));
			$sum += $this->input->post($q['id']);
			$count++;
		}
		// update average to applicant profile
		$average = $sum/$count;
		$this->load->model('interviewpad_model');
		$this->interviewpad_model->update_avgrate($id, $average);
		redirect('/assigned/interview/'.$id);
	}

}