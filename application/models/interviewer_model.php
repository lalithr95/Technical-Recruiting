<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class interviewer_model extends CI_Model
{
    public function __construct()
    {
       parent::__construct();
    }

    public function is_email_exist($email) {
    	$this->db->where('email',$email);
        $data = $this->db->get('interviewer');
        if ($data->num_rows() > 0) {
    		return TRUE;
    	}
    	return FALSE;
    }

    public function register($data) {
    	$this->db->insert('interviewer', $data);
    	return TRUE;
    }

    public function get_id($email) {
        $this->db->select('id');
        $this->db->where('email', $email);
        $data = $this->db->get('interviewer');
        $data = $data->result_array();
        return $data[0]['id'];
    }

    public function authenticate($email, $password) {
        $arrayName = array('email' => $email,'password'=>$password );
        $query = $this->db->select('*')->from('interviewer')->where($arrayName)->get();
        return $query->num_rows();
    }
	
}
