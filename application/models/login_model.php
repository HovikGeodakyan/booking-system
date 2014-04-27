<?php
class Login_model extends CI_Model {


	public function __construct() {
		$this->load->database();
	}


	public function sign() {
		$username=$_POST["username"];
		$password=$_POST["password"];
		$this->db->select('id, username, password');
		$this->db->from('users');
		$this->db->where('username', $username);
		$this ->db->where('password', $password);
		$query=$this->db->get();

		if($query->num_rows()==1) {
			$query=$query->row_array();
			return $query;
		}else{
			return false;
		}
	}


	public function checkFirstLogin() {
		$query = $this->db->query('SELECT * FROM users');
		$query_result = $query->result_array();
		return $query_result;
	}
	
}

?>