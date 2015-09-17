<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('is_loggedin')) {

		}
		else {
			redirect('/home');
		}
	}

	public function index() {
		// Display list of users profile
		$this->load->model('user_model');
		$user_data = $this->user_model->get_all();
		$this->load->library('pagination');

		$config['base_url'] = base_url().'index.php/dashboard/index/';
		$config['total_rows'] = $this->user_model->record_count();
		$config['per_page'] = 10; 
		$config['num_links'] = 5;
		$config['full_tag_open'] = '<nav><ul class="pagination">';// for bootstrap pagination tag
		$config['full_tag_close'] = '</ul> </nav>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active" ><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['records'] = $this->user_model->get_records($config['per_page']);
		$this->pagination->initialize($config);
		//$data['records'] = $this->Admin_contests->getrecords($config['per_page']);
		$config['links'] = $this->pagination->create_links();
		$this->load->view('templates/header');
		$this->load->view('dashboard_index', $config);
	}
}