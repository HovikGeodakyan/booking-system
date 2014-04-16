<?php
	class Email_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function load_email(){
			$query = $this->db->query('SELECT * FROM email WHERE');
		}
	}
?>