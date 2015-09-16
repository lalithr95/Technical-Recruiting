<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view('templates/header');
		if ($this->session->userdata('is_loggedin')) {
			redirect('/dashboard');
		}
		$this->load->view('login');

	}

	public function login() {
		$email = $this->input->post('lemail');
		$password = $this->input->post('lpassword');
		if ($email && $password) {
			$this->load->model('interviewer_model');
			$result = $this->interviewer_model->authenticate($email, $password);
			if ($result > 0) {
				$data = array(
						'is_loggedin' => 1,
						'email' => $email,
						'id' => $this->interviewer_model->get_id($email)
					);
				$this->session->set_userdata($data);
				redirect('dashboard');
			}
			else {
				echo "Invalid Details";
			}
		}

	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('/home');
	}
	public function register() {

		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confirm = $this->input->post('confirm');

		$this->load->model('interviewer_model');
		if ($this->interviewer_model->is_email_exist($email)) {
			echo "Email exists";
		}
		else {
			if ($password == $confirm) {
				$data = array
				(
					'username' => $username,
					'email' => $email,
					'password' => $password
				);
				if($this->interviewer_model->register($data)) {
					$session = array
					(
						'is_loggedin' => 1,
						'email' => $email
					);
					$this->session->set_userdata($session);
					redirect('dashboard');
				}
			}
			else {
				echo "Passwords Donot match";
			}
		}
	}


	
}