<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class interviewpad extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('interviewpad_model');

	}

	public function view($hash) {
		$name_hash = base64_decode($hash."==");
		$r  = $this->interviewpad_model->interview_exist($name_hash);
		if($r > 0) {
		$this->load->view('templates/interview_header');
		$this->load->view('interviewpad_view', array('name' => $name_hash, 'hash' => $hash));
		}
		else {
			$this->load->view('errors/index.html');
		}
	}

	public function exam($hash, $id) {
		// $name_hash = base64_decode($hash."==");
		$this->load->model('interviewpad_model');
		$this->load->model('question_model');
		$this->load->view('templates/interview_header');
		$session = $this->session->userdata('data');
		$data = array(
				'questions' => $this->question_model->get_all($id),
				'start_time' => date('m/d/Y H:i:s', $session['start_time']),
				'end_time' => date('m/d/Y H:i:s', $session['end_time']),
				'name' => $session['name'],
				'candidate_email' => $this->session->userdata('candidate_email'),
				'hash' => $hash,
				'id' => $id
			);
		$this->load->view('interviewpad_exam', $data);

	}

	public function submit($hash) {
		$email = $this->input->post('email');
		$interview_id = $this->session->userdata('data')['id'];
		$this->load->model('question_model');
		$questions = $this->question_model->get_all($interview_id);
		$question_ids = array();
		for ($i=0; $i < count($questions); $i++) {
			array_push($question_ids, $questions[$i]['id']);
		}
		$data = array(
				'expired' => 1,
			);
		// uncommend TODO
		$this->load->model('interviewpad_model');
		$this->interviewpad_model->update_solution($hash, $email, $data);
		$data = array();
		for ($i=0; $i < count($question_ids); $i++) {
			$answer = $this->input->post('answer'.$question_ids[$i]);
			$this->question_model->update_answers($interview_id, $question_ids[$i], $answer);
		}
		redirect('/home');
	}

	public function check($name) {
		$interview_name = base64_decode($name."==");
		$email = $this->input->post('email');
		$data = $this->interviewpad_model->get_data($interview_name);
		if($this->interviewpad_model->is_valid($email, $interview_name)) {
			$date = new DateTime();
			$timestamp = $date->getTimestamp();
			// if ($timestamp >= $data['start_time']) {
			$record = array(
					'data' => $data,
					'status' => 'active',
					'candidate_email' => $email
				);
			// }
			$this->session->set_userdata($record);
			redirect('interviewpad/exam/'.$name."/".$data['id']);
		}
		else {
			redirect('/home');
		}
	}

}