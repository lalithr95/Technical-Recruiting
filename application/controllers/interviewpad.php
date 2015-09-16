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
		$this->load->view('interviewpad_view', array('name' => $name_hash));
		}
		else {
			$this->load->view('errors/html/error_404');
		}
	}

	public function check($hash) {
		$name_hash = base64_decode($hash."==");
		$email = $this->input->post('email');
		if($this->interviewpad_model->is_valid($email, $name_hash)) {
			$data = array(
					'candidate_email' => $email
				);
			$this->session->set_userdata($data);
		}
	}

}