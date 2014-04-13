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
				$o=array();
				$o['outlet_id'] 		    = $row['id'];
				$o['outlet_name'] 		    = $row['name'];
				$o['outlet_email']          = $row['email'];
				$o['outlet_description']    = $row['description'];
				$o['outlet_seats_number']   = $row['seats-number'];
				$o['outlet_tables_number']  = $row['tables-number'];
				$o['outlet_default_not_bookable_table_lunch']        = $row['default-not-bookable-table-lunch'];
				$o['outlet_default_not_bookable_table_dinner']       = $row['default-not-bookable-table-dinner'];
				$o['outlet_default_not_bookable_table_pre_concert']  = $row['default-not-bookable-table-pre-concert'];
				$o['outlet_default_not_bookable_table_concert']      = $row['default-not-bookable-table-concert'];
				$o['outlet_default_not_bookable_table_post_concert'] = $row['default-not-bookable-table-post-concert'];
				$o['outlet_open_time']        = $row['open-time'];
				$o['outlet_close_time']       = $row['close-time'];
				$o['outlet_break_start_time'] = $row['break-start-time'];
				$o['outlet_break_end_time']   = $row['break-end-time'];
				$o['outlet_day_off'] 		  = $row['day-off'];
				$o['no_show_limit'] 		  = $row['no-show-limit'];
				$o['outlet_staying_time_lunch']        = $row['staying-time-lunch'];
				$o['outlet_staying_time_dinner']       = $row['staying-time-dinner'];
				$o['outlet_staying_time_pre_concert']  = $row['staying-time-pre-concert'];
				$o['outlet_staying_time_concert']      = $row['staying-time-concert'];
				$o['outlet_staying_time_post_concert'] = $row['staying-time-post-concert'];
				//Monday
				$o['outlet_open_time_1']        = $row['open-time-1'];
				$o['outlet_close_time_1']       = $row['close-time-1'];
				$o['outlet_break_start_time_1'] = $row['break-start-time-1'];
				$o['outlet_break_end_time_1']   = $row['break-end-time-1'];				
				//Thuesday
				$o['outlet_open_time_2']        = $row['open-time-2'];
				$o['outlet_close_time_2']       = $row['close-time-2'];
				$o['outlet_break_start_time_2'] = $row['break-start-time-2'];
				$o['outlet_break_end_time_2']   = $row['break-end-time-2'];				
				//Wednesday
				$o['outlet_open_time_3']        = $row['open-time-3'];
				$o['outlet_close_time_3']       = $row['close-time-3'];
				$o['outlet_break_start_time_3'] = $row['break-start-time-3'];
				$o['outlet_break_end_time_3']   = $row['break-end-time-3'];				
				//Thursday
				$o['outlet_open_time_4']        = $row['open-time-4'];
				$o['outlet_close_time_4']       = $row['close-time-4'];
				$o['outlet_break_start_time_4'] = $row['break-start-time-4'];
				$o['outlet_break_end_time_4']   = $row['break-end-time-4'];				
				//Friday
				$o['outlet_open_time_5']        = $row['open-time-5'];
				$o['outlet_close_time_5']       = $row['close-time-5'];
				$o['outlet_break_start_time_5'] = $row['break-start-time-5'];
				$o['outlet_break_end_time_5']   = $row['break-end-time-5'];				
				//Saturday
				$o['outlet_open_time_6']        = $row['open-time-6'];
				$o['outlet_close_time_6']       = $row['close-time-6'];
				$o['outlet_break_start_time_6'] = $row['break-start-time-6'];
				$o['outlet_break_end_time_6']   = $row['break-end-time-6'];				
				//Sunday
				$o['outlet_open_time_7']        = $row['open-time-7'];
				$o['outlet_close_time_7']       = $row['close-time-7'];
				$o['outlet_break_start_time_7'] = $row['break-start-time-7'];
				$o['outlet_break_end_time_7']   = $row['break-end-time-7'];

				$o['online-bookable'] = $row['online-bookable'];
				
				$outlets[] = $o;
			}
			return $outlets;
		}


		public function load_one_outlet($id){
			$query = $this->db->query('SELECT * FROM outlets WHERE deleted=0 AND id="'.$id.'"');
			$row = $query->row_array();
			$o['outlet_id'] 		    = $row['id'];
			$o['outlet_name'] 		    = $row['name'];
			$o['outlet_email']          = $row['email'];
			$o['outlet_description']    = $row['description'];
			$o['outlet_seats_number']   = $row['seats-number'];
			$o['outlet_tables_number']  = $row['tables-number'];
			$o['outlet_default_not_bookable_table_lunch']        = $row['default-not-bookable-table-lunch'];
			$o['outlet_default_not_bookable_table_dinner']       = $row['default-not-bookable-table-dinner'];
			$o['outlet_default_not_bookable_table_pre_concert']  = $row['default-not-bookable-table-pre-concert'];
			$o['outlet_default_not_bookable_table_concert']      = $row['default-not-bookable-table-concert'];
			$o['outlet_default_not_bookable_table_post_concert'] = $row['default-not-bookable-table-post-concert'];
			$o['outlet_open_time']        = $row['open-time'];
			$o['outlet_close_time']       = $row['close-time'];
			$o['outlet_break_start_time'] = $row['break-start-time'];
			$o['outlet_break_end_time']   = $row['break-end-time'];
			$o['outlet_day_off'] 		  = $row['day-off'];
			$o['no_show_limit'] 		  = $row['no-show-limit'];
			$o['outlet_staying_time_lunch']        = $row['staying-time-lunch'];
			$o['outlet_staying_time_dinner']       = $row['staying-time-dinner'];
			$o['outlet_staying_time_pre_concert']  = $row['staying-time-pre-concert'];
			$o['outlet_staying_time_concert']      = $row['staying-time-concert'];
			$o['outlet_staying_time_post_concert'] = $row['staying-time-post-concert'];
			//Monday
			$o['outlet_open_time_1']        = $row['open-time-1'];
			$o['outlet_close_time_1']       = $row['close-time-1'];
			$o['outlet_break_start_time_1'] = $row['break-start-time-1'];
			$o['outlet_break_end_time_1']   = $row['break-end-time-1'];				
			//Thuesday
			$o['outlet_open_time_2']        = $row['open-time-2'];
			$o['outlet_close_time_2']       = $row['close-time-2'];
			$o['outlet_break_start_time_2'] = $row['break-start-time-2'];
			$o['outlet_break_end_time_2']   = $row['break-end-time-2'];				
			//Wednesday
			$o['outlet_open_time_3']        = $row['open-time-3'];
			$o['outlet_close_time_3']       = $row['close-time-3'];
			$o['outlet_break_start_time_3'] = $row['break-start-time-3'];
			$o['outlet_break_end_time_3']   = $row['break-end-time-3'];				
			//Thursday
			$o['outlet_open_time_4']        = $row['open-time-4'];
			$o['outlet_close_time_4']       = $row['close-time-4'];
			$o['outlet_break_start_time_4'] = $row['break-start-time-4'];
			$o['outlet_break_end_time_4']   = $row['break-end-time-4'];				
			//Friday
			$o['outlet_open_time_5']        = $row['open-time-5'];
			$o['outlet_close_time_5']       = $row['close-time-5'];
			$o['outlet_break_start_time_5'] = $row['break-start-time-5'];
			$o['outlet_break_end_time_5']   = $row['break-end-time-5'];				
			//Saturday
			$o['outlet_open_time_6']        = $row['open-time-6'];
			$o['outlet_close_time_6']       = $row['close-time-6'];
			$o['outlet_break_start_time_6'] = $row['break-start-time-6'];
			$o['outlet_break_end_time_6']   = $row['break-end-time-6'];				
			//Sunday
			$o['outlet_open_time_7']        = $row['open-time-7'];
			$o['outlet_close_time_7']       = $row['close-time-7'];
			$o['outlet_break_start_time_7'] = $row['break-start-time-7'];
			$o['outlet_break_end_time_7']   = $row['break-end-time-7'];

			$o['outlet_online_bookable'] = $row['online-bookable'];

			return $o;
		}


		public function load_holidays($outlet_id){
			$query	 = $this->db->query('SELECT * FROM holidays WHERE `outlet-id` = '.$outlet_id.'');
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
			$query	 = $this->db->query('SELECT * FROM tables WHERE `outlet-id` = '.$outlet_id.'');
			$query	 = $query->result_array();
			$tables = array();
			
			foreach ($query as $row) {
				$t=array();
				$t['table_id'] 	                  = $row['id'];
				$t['table_seats_standart_number'] = $row['seats-standart-number'];
				$t['table_seats_max_number']      = $row['seats-max-number'];
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
 				$table['outlet-id'] = $outled_id;
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
 				$holiday['outlet-id'] = $outled_id;
 				$this->db->insert('holidays', $holiday);
 			}
 		}


		public function update_outlet($id){

			$this->db->set('name',             $_POST['outlet_name']);
			$this->db->set('capacity',         $_POST['outlet_capacity']);
			$this->db->set('tables',           $_POST['outlet_tables']);
			$this->db->set('open-time',        $_POST['outlet_open_time']);
			$this->db->set('close-time',       $_POST['outlet_close_time']);
			$this->db->set('break-start-time', $_POST['outlet_break_start_time']);
			$this->db->set('break-end-time',   $_POST['outlet_break_end_time']);
			$this->db->set('avg-duration',     $_POST['outlet_avg_duration']);
			$this->db->set('day-off',          $_POST['outlet_day_off']);
			$this->db->set('season-start',     $_POST['outlet_season_start']);
			$this->db->set('season-end',       $_POST['outlet_season_end']);
			$this->db->set('description',      $_POST['outlet_description']);
			$this->db->set('online-booking',   $_POST['outlet_if_bookable']);
			$this->db->set('email',            $_POST['outlet_email']);
			$this->db->where('id', $id);
			$this->db->update('outlets');
		}

		public function delete_outlet($id){
			$this->db->set('deleted', 1);
			$this->db->where('id', $id);
			$this->db->update('outlets');
		}

	}
?>