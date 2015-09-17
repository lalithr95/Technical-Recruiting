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

	public function update_answers($id, $question_id, $answer) {
		$this->db->where('interview_id', $id);
		$this->db->where('id', $question_id);
		$this->db->update('questions', array('answer' => $answer));
	}

	public function get_all_count($id) {
		$this->db->where('interview_id', $id);
		$data = $this->db->get('questions');
		return $data->num_rows();
	}

	public function update_rating($question_id, $rate) {
		$this->db->where('id', $question_id);
		$this->db->update('questions', array('rate' => $rate));
	}
}