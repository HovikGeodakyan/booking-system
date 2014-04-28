<?php
	class Scheduler_model extends CI_Model {


		public function __construct() {
			parent::__construct();
		}


		public function table_exists($table){
			$query = $this->db->query("SHOW TABLES LIKE '$table'");
			$query = $query->result();
			if($query == NULL){
				$create = $this->db->query(
					"CREATE TABLE IF NOT EXISTS $table (
						id INTEGER PRIMARY KEY AUTO_INCREMENT, 
						name TEXT, 
						start DATETIME, 
						end DATETIME,
						resource VARCHAR(30)
					)"
				);
				$data = array(
					'name' => 'Event 1',
					'start' => '2013-05-09T00:00:00',
					'end' => '2013-05-09T10:00:00',
					'resource' => 'B'
				);
				$this->db->insert($table, $data);
			}
		}


		public function load_reservations($outlet_id) {
			$start = $_POST['start'];
			$end = $_POST['end'];
			$query = $this->db->query('SELECT * FROM reservations WHERE NOT ((end <= "'.$start.'") OR (start >= "'.$end.'")) AND outlet_id = "'.$outlet_id.'" AND status != "cancelled"');
			$query = $query->result_array();
			$reservations=array();
			foreach ($query as $row ) {
				$e=array();
				$e['id']           = $row['id'];
				$e['text']         = $row['title']." ".$row['guest_name']." (".$row['guest_number'].")";
				$e['guest_name']   = $row['guest_name'];
				$e['title']        = $row['title'];
				$e['guest_number'] = $row['guest_number'];
				$e['guest_type']   = $row['guest_type'];
				$e['phone']        = $row['phone'];
				$e['email']        = $row['email'];
				$e['language']     = $row['language'];
				$e['author']       = $row['author'];
				$e['status']       = $row['status'];
		   		$e['confirm_via_email'] = $row['confirm_via_email'];
				$e['start']        = $row['start'];
				$e['end']          = $row['end'];
				$e['resource']     = $row['resource'];
				$e['bubbleHtml']   = "Reservation details: <br/>".$e['text'];
				$reservations[]    = $e;
			}
			return $reservations;
		}


		public function load_not_assigned_reservations($start, $end, $outlet_id) {
			$query = $this->db->query('SELECT * FROM reservations WHERE NOT ((end <= "'.$start.'") OR (start >= "'.$end.'")) AND outlet_id = "'.$outlet_id.'" AND status != "cancelled" AND resource = 0');
			$query = $query->num_rows();

			return $query;
		}

		public function create_reservation($outlet_id, $data) {
			$data['outlet_id'] = $outlet_id;
			$this->db->insert('reservations', $data);
			$last_id=$this->db->insert_id();
			$response=array();
			$response['result'] = 'OK';
			$response['message'] = 'Created with id:'.$last_id;
			$response['id'] = $last_id;
			$response['reservation'] = $data;
			
			return $response;
		}		


		public function move_reservation($outlet_id) {
			$id = $_POST['id'];
			$data = array(
				'start' => $_POST['newStart'],
				'end' => $_POST['newEnd'],
				'resource' => $_POST['newResource']
			);
			$query=$this->db->query('SELECT * 
									FROM reservations 
									WHERE resource="'.$data['resource'].'" 
									AND outlet_id = "'.$outlet_id.'"
									AND id!="'.$id.'"
									AND status != "cancelled"
									AND (
										(start>="'.$data['start'].'" AND end<="'.$data['end'].'") 
										OR (start<="'.$data['start'].'" AND end>="'.$data['end'].'")
										OR (start<"'.$data['start'].'" AND end>"'.$data['start'].'")
										OR (start<"'.$data['end'].'" AND end>"'.$data['start'].'")
									)');
									
			$query = $query->result();
			$response=array();
			$current_time=date('Y-m-d')."T".date("H:i:s");
			if ($query!=NULL || $data['resource']=="D" || $data['start']<$current_time){
				$response['result'] = 'NOK';
				$response['message'] = 'Overlap';
			}else{
				$this->db->set('start', $data['start']);
				$this->db->set('end', $data['end']);
				$this->db->set('resource', $data['resource']);
				$this->db->where('id', $id);
				$this->db->update('reservations');
				$response=array();
				$response['result'] = 'OK';
				$response['message'] = 'Update successful';
			}
			return $response;
		}	


		public function resize_reservation($outlet_id) {
			$id = $_POST['id'];
			$data = array(
				'start' => $_POST['newStart'],
				'end' => $_POST['newEnd'],
				'resource' => $_POST['resource']
			);
			$query=$this->db->query('SELECT * FROM reservations WHERE resource="'.$data['resource'].'" AND start<"'.$data['end'].'" AND start>"'.$data['start'].'" AND outlet_id = "'.$outlet_id.'" AND status != "cancelled"');
			$query = $query->result();
			$response=array();

			if($query!=NULL){
				$response['result'] = 'NOK';
				$response['message'] = 'Overlap';
			}else{
				$this->db->set('start', $data['start']);
				$this->db->set('end', $data['end']);
				$this->db->where('id', $id);
				$this->db->update('reservations');
				$response['result'] = 'OK';
				$response['message'] = 'Update successful';
			}
			return $response;
		}


		public function change_status($outlet_id, $data) {

			$id = $data['id'];
			$status = $data['status'];
			$this->db->set('status', $status);
			$this->db->where('id', $id);
			$this->db->update('reservations');
			$response = array();
			$response['result'] = 'OK';
			$response['message'] = 'Status changed';
		}


		public function update_reservation($id, $data) {
			unset($data['date']);
			unset($data['time']);
			$this->db->where('id', $id);
			$this->db->update('reservations', $data);
		}

	}
?>