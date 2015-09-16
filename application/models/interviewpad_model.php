<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class interviewpad_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}

	public function insert($data) {
		$this->db->insert('interview_pad', $data);
	}

	public function interview_exist($name) {
		$this->db->where('name', $name);
		$result = $this->db->get('interview_pad');
		if ($result->num_rows() > 0) {
			return TRUE;
		}
		return FALSE;
	}

	public function is_valid($email, $name) {
		$this->db->where('name', $name);
		$this->db->where('invite_to', $email);
		$data = $this->db->get('interview_pad');
		$data = $data->num_rows();
		if ($data > 0) {
			return TRUE;
		}
		return FALSE;
	}
}