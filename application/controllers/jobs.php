<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs extends CI_Controller
{
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view('templates/header');
		$this->load->view('jobs_index');
	}

	public function submit() {

		// upload functionality
		$config['upload_path'] = APPPATH.'/uploads';
		$config['allowed_types'] = 'pdf|doc|rtf';
		$config['max_size']	= '700';


		$this->load->library('upload', $config);
		$this->load->view('templates/header');
		if ( ! $this->upload->do_upload('resume'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('jobs_index', $error);
		}
		else
		{
			$file_data = $this->upload->data();
			$data = "Profile successfully submitted";
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$result = array
			(
				'name' => $name,
				'email' => $email,
				'resume' => $file_data['full_path']
			);
			$this->load->model('user_model');
			$data = array('data' => $data);
			$result = $this->user_model->save($result);
			if ($result) {
				$this->load->view('jobs_index', $data);
			}

		}

	}
}