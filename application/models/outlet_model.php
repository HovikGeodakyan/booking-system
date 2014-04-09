<?php
	class Outlet_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}


		public function load_outlets(){
			$query = $this->db->query('SELECT * FROM outlets WHERE deleted=0');
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
				$o['outlet_day_off'] = $row['day-off'];
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
			$query = $this->db->query('SELECT * FROM outlets WHERE deleted=0 AND id="'.$id.'"');
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
				$o['outlet_day_off'] = $row['day-off'];
				$o['outlet_season_start'] = $row['season-start'];
				$o['outlet_season_end'] = $row['season-end'];
				$o['outlet_avg_duration'] = $row['avg-duration'];
				$o['outlet_if_bookable'] = $row['online-booking'];
				$o['outlet_description'] = $row['description'];
				$o['outlet_email'] = $row['email'];

				return $o;
		}


		public function create_outlet(){
			$data = array(
				'name'             => $_POST['outlet_name'],
				'capacity'         => $_POST['outlet_capacity'],
				'tables'           => $_POST['outlet_tables'],
				'open-time'        => $_POST['outlet_open_time'],
				'close-time'       => $_POST['outlet_close_time'],
				'break-start-time' => $_POST['outlet_break_start_time'],
				'break-end-time'   => $_POST['outlet_break_end_time'],
				'avg-duration'     => $_POST['outlet_avg_duration'],
				'day-off'          => $_POST['outlet_day_off'],
				'season-start'     => $_POST['outlet_season_start'],
				'season-end'       => $_POST['outlet_season_end'],
				'description'      => $_POST['outlet_description'],
				'online-booking'   => $_POST['outlet_if_bookable'],
				'email'            => $_POST['outlet_email']
			);
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