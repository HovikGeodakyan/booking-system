<?php
	class Holiday_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}


		public function load_general_holidays(){
			$query = $this->db->query('SELECT * FROM holidays WHERE outlet_id = 0');
			$holidays = $query->result_array();			
			return $holidays;			
		}


		public function load_outlet_holidays($outlet_id){
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

		public function load_current_holidays($start, $end, $outlet_id) {
			$start = substr($start, 0, 10);
			$end = substr($end, 0, 10);
			$query = $this->db->query('SELECT * FROM holidays WHERE (`outlet_id` = "'.$outlet_id.'" OR `outlet_id` = 0) AND (start <= "'.$start.'" AND end >= "'.$end.'")');
			$query = $query->row_array();

			return $query;
		}

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


 		public function update_a_holiday($id, $holiday){
 			$this->db->where('id', $id);
			$this->db->update('holidays', $holiday); 
 		}


		public function delete_holiday($id){
			$this->db->where_in('id', $id);
 			$this->db->delete('holidays');
		}
	}
?>