<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}

	public function save($data) {
		$this->db->insert('users', $data);
		return TRUE;
	}

	public function get_all() {
		$this->db->select('*')->from('users');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function record_count() {
		$query = $this->db->query("SELECT * FROM users");
		return $query->num_rows();
	}

	public function get_records($per_page) {
		$query = $this->db->get('users',$per_page,$this->uri->segment(3));
		return $query->result();
	}

	public function get_user($id) {
		$this->db->select('*')->from('users');
		$this->db->where('id', $id);
		$query = $this->db->get();
		if ($query->result_array()) {
			return $query->result_array();
		}
		return NULL;
	}

	public function update_status($data) {
		$this->db->update('users',array('status' => $data));
	}

	public function update_reject($id) {
		$this->db->where('id', $id);
		$data = array(
				'status' => 'Rejected'
			);
		$this->db->update('users', $data);
	}

	public function get_email($id) {
		$this->db->select('email');
		$this->db->where('id', $id);
		$data = $this->db->get('users');
		$data = $data->result_array();
		return $data[0]['email'];
	}

	public function get_user_id($email) {
		$this->db->select('id');
		$this->db->where('email', $email);
		$data = $this->db->get('users');
		$data = $data->result_array();
		return $data[0]['id'];
	}

}