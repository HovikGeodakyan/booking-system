<?php
	class api_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function getFreeTables($outlet_id, $date) {

			$weekday = date('N', strtotime($date));

			$outlet_info = $this->db->query('SELECT * FROM outlets WHERE id = "'.$outlet_id.'"');
			if ($outlet_info->num_rows() === 0) {
				return "Wrong outlet id!";
			}
			$outlet_info = $outlet_info->row_array();

			$open_time = ($outlet_info['open_time_'.$weekday] !== "00:00:00") ? $outlet_info['open_time_'.$weekday] : $outlet_info['open_time'];
			$close_time = ($outlet_info['close_time_'.$weekday] !== "00:00:00") ? $outlet_info['close_time_'.$weekday] : $outlet_info['close_time'];
			$break_start_time = ($outlet_info['break_start_time_'.$weekday] !== "00:00:00") ? $outlet_info['break_start_time_'.$weekday] : $outlet_info['break_start_time'];
			$break_end_time = ($outlet_info['break_end_time_'.$weekday] !== "00:00:00") ? $outlet_info['break_end_time_'.$weekday] : $outlet_info['break_end_time'];

			$start = $date."T".$open_time;
			$end = $date."T".$close_time;

			$query = $this->db->query('SELECT start, count(resource) as tables FROM reservations WHERE NOT ((end <= "'.$start.'") OR (start >= "'.$end.'")) AND outlet_id = "'.$outlet_id.'" GROUP BY start');
			$query = $query->result_array();

			$concert_info = $this->db->query('SELECT * FROM info WHERE outlet_id = "'.$outlet_id.'" AND concert_date = "'.$date.'"');
			$concert_info = $concert_info->row_array();


			foreach ($query as $value) {
				$reservations[$value['start']] = $value;
			}


			$time_range = array();
			$i=0;
			$start = date("Y-m-d H:i:s", strtotime($start));
			$end = date("Y-m-d H:i:s", strtotime($end));
			while ($start < $end) {
				$time_range[$i] = $start;
				$start = date("Y-m-d H:i:s", strtotime($start." + 15 minute"));
				if($start === date("Y-m-d H:i:s", strtotime($break_start_time))) {
					$start = date("Y-m-d H:i:s", strtotime($break_end_time));
				}
				$i++;
			}

			foreach ($time_range as $value) {
				if (!isset($res['concert_info']['concert_name'])) {
					if($value <= $break_end_time) {
						$hidden_tables = $concert_info['not_bookable_table_lunch'];
					} else {
						$hidden_tables = $concert_info['not_bookable_table_dinner'];
					}
				} else {
					if($value <= $concert_info['concert_start'] && $value <= $break_end_time) {
						$hidden_tables = $concert_info['not_bookable_table_lunch'];
					} else if ($value <= $concert_info['concert_start']) {
						$hidden_tables = $concert_info['not_bookable_table_pre_concert'];
					} else if ($value >= $concert_info['concert_start'] && $value <= $concert_info['concert_end']) {
						$hidden_tables = $concert_info['not_bookable_table_concert'];
					} else {
						$hidden_tables = $concert_info['not_bookable_table_post_concert'];
					}
				}
				if( !array_key_exists($value, $reservations) ) {
					$reservations[$value]['start'] = $value;
					$reservations[$value]['tables'] = 0;
				}
			 
				
				$reservations[$value]['tables'] = $outlet_info['tables_number'] - $hidden_tables - $reservations[$value]['tables'];
			}	
			ksort($reservations);		

			return $reservations;
		}



		public function reserveTable($data) {

			$weekday = date('N', strtotime($data['date']));

			$outlet_info = $this->db->query('SELECT * FROM outlets WHERE id = "'.$data['outletID'].'"');
			if ($outlet_info->num_rows() === 0) {
				return "Wrong outlet id!";
			}
			$outlet_info = $outlet_info->row_array();

			$open_time = ($outlet_info['open_time_'.$weekday] !== "00:00:00") ? $outlet_info['open_time_'.$weekday] : $outlet_info['open_time'];
			$close_time = ($outlet_info['close_time_'.$weekday] !== "00:00:00") ? $outlet_info['close_time_'.$weekday] : $outlet_info['close_time'];
			$break_start_time = ($outlet_info['break_start_time_'.$weekday] !== "00:00:00") ? $outlet_info['break_start_time_'.$weekday] : $outlet_info['break_start_time'];
			$break_end_time = ($outlet_info['break_end_time_'.$weekday] !== "00:00:00") ? $outlet_info['break_end_time_'.$weekday] : $outlet_info['break_end_time'];

			$start = $data['date']."T".$open_time;
			$end = $data['date']."T".$close_time;

			$concert_info = $this->db->query('SELECT * FROM info WHERE outlet_id = "'.$data['outletID'].'" AND concert_date = "'.$data['date'].'"');
			$concert_info = $concert_info->row_array();
			
			$tables = $this->db->query('SELECT * FROM tables WHERE outlet_id = "'.$data['outletID'].'"');
			$tables = $tables->row_array();

			if ($data['time'] <= $break_start_time) {
				$staying_time = $outlet_info['staying_time_lunch'];
			} else if (isset($concert_info['cocnert_start']) && $data['time'] <= $concert_info['cocnert_start']) {
				$staying_time = $outlet_info['staying_time_pre_concert'];
			} else if(isset($concert_info['cocnert_end']) && $data['time'] <= $concert_info['cocnert_end']) {
				$staying_time = $outlet_info['staying_time_concert'];
			} else if (isset($concert_info['cocnert_end']) && $data['time'] > $concert_info['cocnert_end']) {
				$staying_time = $outlet_info['staying_time_post_concert'];
			} else {
				$staying_time = $outlet_info['staying_time_dinner'];
			}
			
			$tables = $this->db->query('SELECT id FROM tables WHERE outlet_id = "'.$data['outletID'].'"');
			$tables = $tables->result_array();
			
			$staying_time = date("H:i:s", strtotime($staying_time." + ".substr($data['time'], 3, 2)." minute + ".substr($data['time'], 0, 2)." hour"));
			
			$reservation_start = $data['date']."T".$data['time'].":00";
			$reservation_end = $data['date']."T".$staying_time;
			$reservations = $this->db->query('SELECT resource FROM reservations WHERE NOT ((end <= "'.$reservation_start.'") OR (start >= "'.$reservation_end.'")) AND outlet_id = "'.$data['outletID'].'" AND status != "cancelled" AND status !="not_show"');
			
			$reservations = $reservations->result_array();

			$reservKeys = [];
			foreach($tables as $key => $val) {
				array_push($reservKeys, $val['id']);
			}
			$tablesKeys = [];
			foreach($reservations as $key => $val) {
				array_push($tablesKeys, $val['resource']);
			}
			$freeTables =  array_diff($reservKeys,$tablesKeys);
			$randKey = array_rand($freeTables);
			
			$insertedTable = $freeTables[$randKey];
			$reservationData = array(
				'outlet_id'=> $data['outletID'],
				'start'=>$reservation_start ,
				'end'=>$reservation_end,
				'resource'=> 0,
				'guest_name'=>'API'
			);
			$this->db->insert('reservations', $reservationData);


			// var_dump('<pre>', $freeTables[$randKey],'</pre>'); 

		}

	}
?>