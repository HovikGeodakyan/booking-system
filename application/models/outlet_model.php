<?php
	class Outlet_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function load_outlets() {
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

 			foreach ($tables as $i => $js) {
 				foreach ($js as $j => $value) {
 					$t_tables[$j][$i] = $value;
 				}
 			}
 			$count = count($t_tables);
 			for($i=0; $i<$count; $i++) {
 				$t_tables[$i]['outlet_id'] = $outled_id;	
 				if(!isset($t_tables[$i]['combinable'])){
 					$t_tables[$i]['combinable']=0;
 				}	
 			}

 			$this->db->insert_batch('tables', $t_tables);
 		}

 		public function remove_table($id) {
			$this->db->where_in('id', $id);
 			$result = $this->db->delete('tables');
 			if($result) {
 				return  array(
		 					'status'=>'sucsess',
		 					'code' => 200
		 				);
 			}
 		}



 		public function update_tables ($outled_id, $tables) {
			foreach ($tables as $i => $s) {
 				foreach ($s as $j => $value) {
 					$t_tables[$j][$i] = $value;
 				}
 			} 			
			
			$keys   = ["id", "seats_standart_number", "seats_max_number",  "location", "combinable", "outlet_id"];			
			$duplicates = array();
			for($i = 1; $i < count($keys); $i++) {
				$str = $keys[$i].'=VALUES('. $keys[$i] . ')';
				array_push($duplicates, $str);
			}
			
			$values = '';
			$results = array();
			foreach ($t_tables as $key => $value) {								
				$values ='('; 
				$res = array();	
				
				if(!array_key_exists('combinable', $value)){
					$value['combinable']=0;
				} else {
					$tmp=$value['combinable'];
					unset($value['combinable']);
					$value['combinable'] = $tmp;
				}
				$value['outlet_id'] = $outled_id;					
				foreach ($value as $k => $val) {						
					array_push($res, '"'.$val.'"');
				}
				$values .= implode(',', $res).')';	
				array_push($results, $values);			
			}	
 			
 			$query = "INSERT INTO tables (".implode(',',$keys).") VALUES".implode(',', $results)."  ON DUPLICATE KEY UPDATE ".implode(',', $duplicates);
 			$this->db->query($query);
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

		public function activate_outlet($id){
			$this->db->set('active', 1);
			$this->db->where('id', $id);
			$this->db->update('outlets');
		}

		public function deactivate_outlet($id){
			$this->db->set('active', 0);
			$this->db->where('id', $id);
			$this->db->update('outlets');
		}

		public function get_active_outlet(){
			$query = $this->db->query('SELECT id FROM outlets WHERE deleted = 0 AND active = 1');
			$row = $query->row_array();
			return $row['id'];
		}

	}
?>