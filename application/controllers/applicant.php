<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Applicant extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('is_loggedin')) {

		}
		else {
			redirect('/home');
		}
	}

	public function user($id = NULL) {
		if ($id == NULL) {
			$this->load->view('errors/index.html');
		}
		else {
			$this->load->view('templates/header');
			$this->load->model('user_model');
			$user = $this->user_model->get_user($id);

			$this->load->model('assigne_model');
			$this->load->model('interviewpad_model');
			$data = $this->assigne_model->get_applicant($id);
			print_r($user);
			echo $this->session->userdata('email');
			$rating_data = $this->interviewpad_model->get_rating($user[0]['email'], $this->session->userdata('email'));
			$result = array(
					'data' => $data,
					'user' => $user[0],
					'rate' => $rating_data
				);
			// print_r($result['data']);
			$this->load->view('applicant_index', $result);
		}
	}

	public function assign($id) {
		$email = $this->input->post('email');
		$this->load->model('interviewer_model');
		if ($this->interviewer_model->is_email_exist($email)) {
			$this->load->model('user_model');
			$user_id = $this->interviewer_model->get_id($email);
			$this->load->model('assigne_model');
			// check for already assigned
			if ($this->assigne_model->assigned($id, $user_id)) {
				echo "already assigned";
			}
			else {
				$result = array
				(
					'user_id' => $id,
					'interviewer_id'  => $user_id
				);
				$this->assigne_model->insert($result);
				$this->session->set_flashdata('success','Applicant assigned to '.$email);
				$this->load->view('templates/header');
				$user = $this->user_model->get_user($id);
				$status = "Assigned";
				$this->user_model->update_status($status);
				redirect('applicant/user/'.$id);
			}
		}
		else {
			$this->session->set_flashdata('error', 'Email doesn\'t exist');
		}
	}




}