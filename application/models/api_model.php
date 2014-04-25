<?php
	class api_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function getFreeTables($outlet_id, $start, $end) {
			$start ='2014-03-01T00:00:00';
			$end ='2014-04-30T00:00:00';
			$query = $this->db->query('SELECT * FROM reservations WHERE NOT ((end <= "'.$start.'") OR (start >= "'.$end.'")) AND outlet_id = "'.$outlet_id.'"');
			$query = $query->result_array();
			
			return $query;			
		
		}

		public function hide_tables($data) {
			
		}
	}
?>