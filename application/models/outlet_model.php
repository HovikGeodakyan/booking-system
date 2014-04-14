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
				$h['holiday_start']      = $row['start'];
				$h['holiday_end']        = $row['end'];
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

 		// public function insert_tables ($outled_id, $tables) {

 		// 	foreach ($tables as $i => $js){
 		// 		foreach ($js as $j => $value){
 		// 			$t_tables[$j][$i] = $value;
 		// 		}
 		// 	}
 		// 	$count=count($t_tables);
 		// 	for($i=0; $i<$count; $i++) {
 		// 		$t_tables[$i]['outlet_id'] = $outled_id;	
 		// 		if(!isset($t_tables[$i]['combinable'])){
 		// 			$t_tables[$i]['combinable']=0;
 		// 		}	
 		// 	}

 		// 	$this->db->insert_batch('tables', $t_tables);
 		// }


 		// public function insert_holidays ($outled_id, $holidays) {
 		// 	foreach ($holidays as $i => $s){
 		// 		foreach ($s as $j => $value){
 		// 			$t_holidays[$j][$i] = $value;
 		// 		}
 		// 	}

 		// 	$count=count($t_holidays);
 		// 	for($i=0; $i<$count; $i++) {
 		// 		$t_holidays[$i]['outlet_id'] = $outled_id;
 		// 	}

 		// 	$this->db->insert_batch('holidays', $t_holidays);
 		// }

 		public function update_holidays ($outled_id, $holidays) {
 			foreach ($holidays as $i => $s){
 				foreach ($s as $j => $value){
 					$t_holidays[$j][$i] = $value;
 				}
 			}

			$keys   = array_keys($t_holidays[0]);
			$keys[] = 'outlet_id';
			$values = '';
			$results = array();
			$duplicates = array();
			for($i = 1; $i < count($keys); $i++) {
				$str = $keys[$i].'=VALUES('. $keys[$i] . ')';
				array_push($duplicates, $str);
			}
			
			foreach ($t_holidays as $key => $value) {								
					$values ='('; 
					$res = array();	
					$value['outlet_id'] = $outled_id;
					foreach ($value as $k => $val) {						
						array_push($res, '"'.$val.'"');
					}
					$values .= implode(',', $res).')';	
					array_push($results, $values);			
			}			
 			$query = "INSERT INTO holidays (".implode(',',$keys).") VALUES".implode(',', $results)."  ON DUPLICATE KEY UPDATE ".implode(',', $duplicates);
 			$this->db->query($query);
 		}

 		public function update_tables ($outled_id, $tables) {
 			foreach ($tables as $i => $s){
 				foreach ($s as $j => $value){
 					$t_tables[$j][$i] = $value;
 				}
 			}
 			$count=count($t_tables);
 			$n=0; $d=0; $e=0;
 			for($i=0; $i<$count; $i++) {
 				$t_tables[$i]['outlet_id'] = $outled_id;
 				if(!isset($t_tables[$i]['combinable'])){
 					$t_tables[$i]['combinable']=0;
 				}	

 				if(!isset($t_tables[$i]['id'])){
 					$new_tables[$n]=$t_tables[$i];
 					$n++;
 				}elseif($t_tables[$i]['location']=='deleted'){
 					$deleted_tables[$d]=$t_tables[$i]['id'];
 					$d++;
 				}else{
 					$existing_tables[$e]=$t_tables[$i];
 					$e++;
 				}
 			}

 			if(isset($existing_tables)){
 				$this->db->update_batch('tables', $existing_tables, 'id');
 			}

			if(isset($new_tables)){
 				$this->db->insert_batch('tables', $new_tables);
 			}

 			if(isset($deleted_tables)){
 				$this->db->where_in('id', $deleted_tables);
 				$this->db->delete('tables');
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