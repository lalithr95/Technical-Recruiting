<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class question_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}

	public function insert($data) {
		$this->db->insert('questions', $data);
	}

	public function get_all($id) {
		$this->db->where('interview_id', $id);
		$data = $this->db->get('questions');
		$data = $data->result_array();
		return $data;
	}

	
}