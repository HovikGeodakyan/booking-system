<?php
	class Scheduler_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function table_exists($table){
			$query = $this->db->query("SHOW TABLES LIKE '$table'");
			
			var_dump($query->result()); 
		}
	}
?>