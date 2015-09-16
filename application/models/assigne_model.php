<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class assigne_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}

	public function insert($data) {
		$result = $this->db->insert('assigned', $data);
		if ($result) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	public function assigned($user_id, $interviewer_id) {
		$this->db->where('user_id', $user_id);
		$this->db->where('interviewer_id', $interviewer_id);
		$data = $this->db->get('assigned');
		if ($data->num_rows() > 0) {
			return TRUE;
		}
		return FALSE;
	}

	public function get_applicants_assigned($interviewer_id) {
		$this->db->select('user_id');
		$this->db->where('interviewer_id', $interviewer_id);
		$data = $this->db->get('assigned');
		$data = $data->result_array();
		$result = array();
		for($i=0 ;$i<count($data); $i++) {
			$this->db->where('id', $data[$i]['user_id']);
			$record = $this->db->get('users');
			$record = $record->result_array();
			array_push($result, $record[0]);
		}
		return $result;
	}

	public function get_records($interviewer_id) {
		$data = $this->db->query('SELECT a.* FROM users a, assigned b where a.id = b.user_id AND b.interviewer_id ='.$interviewer_id);
		return $data->result_array();
	}

	public function update_question($applicant_id, $interviewer_id, $data) {
		$this->db->where('interviewer_id', $interviewer_id);
		$this->db->where('user_id', $applicant_id);
		$this->db->update('assigned', $data);


	}

	public function update_reject($id, $interviewer_id) {
		$this->db->where('interviewer_id', $interviewer_id);
		$this->db->where('user_id', $id);
		$data = array(
				'status' => 'Rejected'
			);
		$this->db->update('assigned',$data);
	}

	public function get_applicant($id) {
		$this->db->where('user_id', $id);
		$data = $this->db->get('assigned');
		$data = $data->result_array();
		return $data;
	}

	public function update_status($user_id, $interviewer_id, $data) {
		$this->db->where('user_id', $user_id);
		$this->db->where('interviewer_id', $interviewer_id);
		$this->db->update('assigned', $data);
	}

}