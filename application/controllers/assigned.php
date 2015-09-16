<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assigned extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('is_loggedin')) {

		}
		else {
			redirect('/home');
		}
	}

	public function view() {
		// view all the list of applicants assigned
		$this->load->model('assigne_model');
		$this->load->model('interviewer_model');
		$email = $this->session->userdata('email');
		$interviewer_id = $this->interviewer_model->get_id($email);
		$result = $this->assigne_model->get_records($interviewer_id);
		$this->load->view('templates/header');
		$record = array('result' => $result);
		$this->load->view('assigned_view', $record);
	}

	public function schedule() {
		$this->load->model('interviewer_model');
		$this->load->model('user_model');
		$interviewer_email = $this->session->userdata('email');
		$interviewer_id = $this->interviewer_model->get_id($interviewer_email);
		$user_id = $this->input->post('id');
		$user_email = $this->user_model->get_email($user_id);
		$date = $this->input->post('date');
		$end_date = $this->input->post('end_date');
		$name = $this->input->post('name');
		$this->create_interviewpad($date, $end_date, $name, $user_email, $interviewer_email);
		$this->load->model('assigne_model');
		$assign_to = $this->input->post('assign_to');
		$data = array(
				'date' => $date,
				'done' => 1,
				'status' => 'pending'
			);
		$this->send_mail_schedule($user_id, $date);
		$this->assigne_model->update_question($user_id, $interviewer_id, $data);
		redirect('/assigned/interviews');

	}

	public function interviews() {
		$this->load->model('interviewpad_model');
		$email = $this->session->userdata('email');
		$data = $this->interviewpad_model->get_interviews($email);
		$record = array(
				'data' => $data
			);
		$this->load->view('templates/header');
		$this->load->view('all_interviews', $record);

	}

	public function interview($id) {
		$this->load->view('templates/header');
		$this->load->model('interviewpad_model');
		$email = $this->session->userdata('email');
		$this->load->model('question_model');
		$data = $this->interviewpad_model->get_interview($id);
		$question  = $this->question_model->get_all($id);
		$record = array(
				'id' => $id,
				'data' => $data,
				'question' => $question
			);
		$this->load->view('interview_show', $record);
	}

	public function rate($id) {
		$rate = $this->input->post('rate');
		$this->load->model('interviewpad_model');
		$this->load->model('assigne_model');
		$data = array(
				'rate' => $rate
			);
		$candidate_data = $this->interviewpad_model->get_interview($id);
		// print_r($candidate_data);
		$record = array (
				'done' => 1,
				'status' => 'completed'
			);
		$this->load->model('user_model');
		$user_id = $this->user_model->get_user_id($candidate_data['invite_to']);
		$interviewer_id = $this->session->userdata('id');
		$this->assigne_model->update_status($user_id, $interviewer_id, $record);
		$this->interviewpad_model->update_rating($id, $data);
		redirect('/assigned/interviews');
	}

	public function create_interviewpad($date, $end_date, $name, $user_id, $interviewer_id) {

		$start_timestamp = new DateTime($date);
		$start_timestamp = $start_timestamp->getTimestamp();
		$end_timestamp = new DateTime($end_date);
		$end_timestamp = $end_timestamp->getTimestamp();
		$pad_name = substr(base64_encode($name), 0, -2);
		$url = "http://localhost/test/index.php/interviewpad/view/".$pad_name;
		$result = array(
				'name' => $name,
				'url' => $url,
				'start_time' => $start_timestamp,
				'end_time' => $end_timestamp,
				'invite_to' => $user_id,
				'interviewer_id' => $interviewer_id
			);
		$this->load->model('interviewpad_model');
		$this->interviewpad_model->insert($result);
	}

	public function send_mail_schedule($user_id, $date) {
		$this->load->model('user_model');
		$email = $this->user_model->get_email($user_id);
		// Email configuration
	  	$config = Array(
	    	'protocol' => 'smtp',
	    	'smtp_host' => 'smtp.gmail.com',
	    	'smtp_port' => 465,
	    	'smtp_user' => 'lalithr1995@gmail.com', // change it to yours
	    	'smtp_pass' => 'adminr95', // change it to yours
	    	'mailtype' => 'html',
	    	'charset' => 'iso-8859-1',
	    	'wordwrap' => TRUE
	  	); 
		$this->load->library('email');
		$this->email->from('lalithr95@gmail.com', 'Lalith');
		$this->email->to($email); 

		$this->email->subject('Zomato Hiring');
		$this->email->message('You have been shortlisted for the applied position  Inteview Date: '.$date.'\r\n Thanks !');	

		$this->email->send();

	}
	public function reject($id) {
		$this->load->model('user_model');
		$this->load->model('assigne_model');
		$interviewer_id = $this->session->userdata('id');
		$this->assigne_model->update_reject($id, $interviewer_id);
		$this->user_model->update_reject($id);
		$this->send_mail_reject($id);
		redirect('assigned/view');
	}

	public function send_mail_reject($id) {
		$this->load->model('user_model');
		$email = $this->user_model->get_email($id);
		// Email configuration
	  	$config = Array(
	    	'protocol' => 'smtp',
	    	'smtp_host' => 'smtp.gmail.com',
	    	'smtp_port' => 465,
	    	'smtp_user' => 'lalithr1995@gmail.com', // change it to yours
	    	'smtp_pass' => 'adminr95', // change it to yours
	    	'mailtype' => 'html',
	    	'charset' => 'iso-8859-1',
	    	'wordwrap' => TRUE
	  	); 
		$this->load->library('email');
		$this->email->from('lalithr95@gmail.com', 'Lalith');
		$this->email->to($email); 

		$this->email->subject('Zomato Hiring');
		$this->email->message('You have been rejected for the applied position \r\n Thanks !');	

		$this->email->send();
		// echo "Mail sent";

		// echo $this->email->print_debugger();
	}
}