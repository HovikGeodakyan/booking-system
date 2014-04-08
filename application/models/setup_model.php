<?php
	class Setup_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function load_outlets(){
			$query = $this->db->query('SELECT * FROM outlets');
			$query = $query->result_array();
			$outlets=array();
			foreach ($query as $row) {
				$o=array();
				$o['outlet_id'] = $row['id'];
				$o['outlet_name'] = $row['name'];
				$o['outlet_description'] = $row['description'];
				$o['outlet_capacity'] = $row['capacity'];
				$o['outlet_tables'] = $row['tables'];
				$o['outlet_open_time'] = $row['open-time'];
				$o['outlet_close_time'] = $row['close-time'];
				$o['outlet_break_start_time'] = $row['break-start-time'];
				$o['outlet_break_end_time'] = $row['break-end-time'];

				switch($row['day-off']){
					case 1: $dayOff="Monday";    break;
					case 2: $dayOff="Tuesday";   break;
					case 3: $dayOff="Wednesday"; break;
					case 4: $dayOff="Thursday";  break;
					case 5: $dayOff="Friday";    break;
					case 6: $dayOff="Saturday";  break;
					case 7: $dayOff="Sunday";    break;
				}

				$o['outlet_day_off'] = $dayOff;
				$o['outlet_season_start'] = $row['season-start'];
				$o['outlet_season_end'] = $row['season-end'];
				$o['outlet_avg_duration'] = $row['avg-duration'];
				$o['outlet_if_bookable'] = $row['online-booking'];
				$o['outlet_email'] = $row['email'];
				$outlets[] = $o;
			}
			return $outlets;
		}

		public function load_one_outlet($id){
			$query = $this->db->query('SELECT * FROM outlets WHERE id="'.$id.'"');
			$row = $query->row_array();
				$o['outlet_id'] = $row['id'];
				$o['outlet_name'] = $row['name'];
				$o['outlet_description'] = $row['description'];
				$o['outlet_capacity'] = $row['capacity'];
				$o['outlet_tables'] = $row['tables'];
				$o['outlet_open_time'] = $row['open-time'];
				$o['outlet_close_time'] = $row['close-time'];
				$o['outlet_break_start_time'] = $row['break-start-time'];
				$o['outlet_break_end_time'] = $row['break-end-time'];

				switch($row['day-off']){
					case 1: $dayOff="Monday";    break;
					case 2: $dayOff="Tuesday";   break;
					case 3: $dayOff="Wednesday"; break;
					case 4: $dayOff="Thursday";  break;
					case 5: $dayOff="Friday";    break;
					case 6: $dayOff="Saturday";  break;
					case 7: $dayOff="Sunday";    break;
				}

				$o['outlet_day_off'] = $dayOff;
				$o['outlet_season_start'] = $row['season-start'];
				$o['outlet_season_end'] = $row['season-end'];
				$o['outlet_avg_duration'] = $row['avg-duration'];
				$o['outlet_if_bookable'] = $row['online-booking'];
				$o['outlet_email'] = $row['email'];
				return $o;
		}

		public function load_users(){
			$query = $this->db->query('SELECT * FROM users');
			$query = $query->result_array();
			$users=array();
			foreach ($query as $row) {
				$u=array();
				$u['user_id'] = $row['id'];
				$u['user_name'] = $row['username'];
				$u['user_real_name'] = $row['realname'];
				$u['user_email'] = $row['email'];
				$u['user_time'] = $row['last-login'];
				$u['user_if_active'] = $row['active'];
				switch($row['role']){
					case 1: $role="SuperAdmin";    break;
					case 2: $role="Admin";   break;
					case 3: $role="Manager"; break;
					case 4: $role="Waiter";  break;
					case 5: $role="User";    break;
					case 6: $role="Guest";  break;
				}
				$u['user_role'] = $role;
				$users[] = $u;
			}
			return $users;
		}

		public function load_one_user($id){
			$query = $this->db->query('SELECT * FROM users WHERE id="'.$id.'"');
			$row = $query->row_array();

			$u=array();
			$u['user_id'] = $row['id'];
			$u['user_name'] = $row['username'];
			$u['user_real_name'] = $row['realname'];
			$u['user_email'] = $row['email'];
			$u['user_time'] = $row['last-login'];
			$u['user_if_active'] = $row['active'];
			switch($row['role']){
				case 1: $role="SuperAdmin";    break;
				case 2: $role="Admin";   break;
				case 3: $role="Manager"; break;
				case 4: $role="Waiter";  break;
				case 5: $role="User";    break;
				case 6: $role="Guest";  break;
			}
			$u['user_role'] = $role;

			return $u;
		}
	}
?>