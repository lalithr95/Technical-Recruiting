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
		// print_r($result);
		// print_r($name);
		if ($result->num_rows() > 0) {
			return TRUE;
		}
		return FALSE;
	}

	public function is_valid($email, $name) {
		$this->db->where('name', $name);
		$this->db->where('invite_to', $email);
		$this->db->where('expired', '0');
		$data = $this->db->get('interview_pad');
		$data = $data->num_rows();
		if ($data > 0) {
			return TRUE;
		}
		return FALSE;
	}

	public function update_avgrate($id, $rate) {
		$this->db->where('id', $id);
		$this->db->update('interview_pad', array('rate' => $rate));
	}

	public function get_interviews($email) {
		$this->db->where('interviewer_id', $email);
		$data = $this->db->get('interview_pad');
		$data = $data->result_array();
		return $data;
	}

	public function get_interview($id) {
		$this->db->where('id', $id);
		$data = $this->db->get('interview_pad');
		$data = $data->result_array();
		return $data[0];
	}

	public function get_id($name) {
		$this->db->where('name', $name);
		$data = $this->db->get('interview_pad');
		$data = $data->result_array();
		return $data[0]['id'];
	}

	public function update_solution($hash, $email, $data) {
		$name = base64_decode($hash."==");
		$this->db->where('invite_to', $email);
		$this->db->where('name', $name);
		$this->db->update('interview_pad', $data);
	}

	public function update_rating($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('interview_pad', $data);
	}

	public function get_data($name) {
		$this->db->where('name', $name);
		$data = $this->db->get('interview_pad');
		$data = $data->result_array();
		return $data[0];
	}

	public function get_rating($user_email, $interviewer_id) {
		$this->db->where('invite_to', $user_email);
		$this->db->where('interviewer_id', $interviewer_id);
		$data = $this->db->get('interview_pad');
		if($data->num_rows > 0) {
			$data = $data->result_array();
			return $data[0]['rate'];
		}
	}
}