<?php
	class Outlet_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function load_outlets(){
			$query	 = $this->db->query('SELECT * FROM outlets WHERE deleted = 0');
			$query	 = $query->result_array();
			$outlets = array();
			
			foreach ($query as $row) {
				$outlet = array();
				foreach ($row as $key => $value) {
					$temp = 'outlet_'.$key;
					$outlet[$temp] = $value;
				}
				$outlets[] = $outlet;
			}
			return $outlets;
		}


		public function load_one_outlet($id){
			$query = $this->db->query('SELECT * FROM outlets WHERE deleted=0 AND id="'.$id.'"');
			$row = $query->row_array();
			$outlet = array();
			foreach ($row as $key => $value) {
				$temp = 'outlet_'.$key;
				$outlet[$temp] = $value;
			}

			return $outlet;
		}


		public function load_holidays($outlet_id){
			$query	 = $this->db->query('SELECT * FROM holidays WHERE `outlet_id` = '.$outlet_id.'');
			$query	 = $query->result_array();
			$holidays = array();
			
			foreach ($query as $row) {
				$h=array();
				$h['holiday_id'] 	     = $row['id'];
				$h['holiday_name'] 		 = $row['name'];
				$h['holiday_start_date'] = $row['start-date'];
				$h['holiday_end_date']   = $row['end-date'];
				$h['holiday_message']    = $row['message'];
				
				$holidays[] = $h;
			}
			
			return $holidays;			
		}

		public function load_tables($outlet_id){
			$query	 = $this->db->query('SELECT * FROM tables WHERE `outlet_id` = '.$outlet_id.'');
			$query	 = $query->result_array();
			$tables = array();
			
			foreach ($query as $row) {
				$t=array();
				$t['table_id'] 	                  = $row['id'];
				$t['table_seats_standart_number'] = $row['seats_standart_number'];
				$t['table_seats_max_number']      = $row['seats_max_number'];
				$t['table_combinable']            = $row['combinable'];
				$t['table_location']   			  = $row['location'];
				
				$tables[] = $t;
			}
			return $tables;			
		}

		public function create_outlet($outlet){
			$this->db->insert('outlets', $outlet);
			return $this->db->insert_id();
		}

 		public function insert_tables ($outled_id, $tables) {

 			foreach ($tables as $i => $js){
 				foreach ($js as $j => $value){
 					$t_tables[$j][$i] = $value;
 				}
 			}
 			foreach ($t_tables as $table) {
 				$table['outlet_id'] = $outled_id;
 				$this->db->insert('tables', $table);
 			}

 		}


 		public function insert_holidays ($outled_id, $holidays) {
 			if(empty($holidays)){
 				return false;
 			}
 			foreach ($holidays as $i => $s){
 				foreach ($s as $j => $value){
 					$t_holidays[$j][$i] = $value;
 				}
 			}
 			foreach ($t_holidays as $holiday) {
 				$holiday['outlet_id'] = $outled_id;
 				$this->db->insert('holidays', $holiday);
 			}
 		}


		public function update_outlet($id, $outlet) {

			$this->db->where('id', $id);
			$this->db->update('outlets', $outlet);

		}

		public function delete_outlet($id){
			$this->db->set('deleted', 1);
			$this->db->where('id', $id);
			$this->db->update('outlets');
		}

	}
?>