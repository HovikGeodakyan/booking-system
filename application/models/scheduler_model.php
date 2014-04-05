<?php
	class Scheduler_model extends CI_Model{

		public function __construct(){
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

		public function load_events(){
			$start = $_POST['start'];
			$end = $_POST['end'];
			$query = $this->db->query('SELECT * FROM events WHERE NOT ((end <= "'.$start.'") OR (start >= "'.$end.'"))');
			$query = $query->result_array();
			$events=array();
			foreach ($query as $row ) {
				$e=array();
				$e['id'] = $row['id'];
				$e['text'] = $row['name'];
				$e['start'] = $row['start'];
				$e['end'] = $row['end'];
				$e['resource'] = $row['resource'];
				$e['bubbleHtml'] = "Event details: <br/>".$e['text'];
				$events[] = $e;
			}
			return $events;
		}

		public function create_event(){

			$data = array(
				'name' => $_POST['name'],
				'start' => $_POST['start'],
				'end' => $_POST['end'],
				'resource' => $_POST['resource']
			);

			$this->db->insert('events', $data);
			$last_id=$this->db->insert_id();
			$response=array();
			$response['result'] = 'OK';
			$response['message'] = 'Created with id:'.$last_id;
			$response['id'] = $last_id;
			return $response;
		}		

		public function move_event(){
			$id = $_POST['id'];
			$data = array(
				'start' => $_POST['newStart'],
				'end' => $_POST['newEnd'],
				'resource' => $_POST['newResource']
			);
			$this->db->set('start', $data['start']);
			$this->db->set('end', $data['end']);
			$this->db->set('resource', $data['resource']);
			$this->db->where('id', $id);
			$this->db->update('events');
			$response=array();
			$response['result'] = 'OK';
			$response['message'] = 'Update successful';
			return $response;
		}	

		public function resize_event(){
			$id = $_POST['id'];
			$data = array(
				'start' => $_POST['newStart'],
				'end' => $_POST['newEnd'],
				'resource' => $_POST['resource']
			);
			$query=$this->db->query('SELECT * FROM events WHERE resource="'.$data['resource'].'" AND start<"'.$data['end'].'" AND start>"'.$data['start'].'"');
			$query = $query->result();
			$response=array();

			if($query!=NULL){
				$response['result'] = 'NOK';
				$response['message'] = 'Overlap';
			}else{
				$this->db->set('start', $data['start']);
				$this->db->set('end', $data['end']);
				$this->db->where('id', $id);
				$this->db->update('events');
				$response['result'] = 'OK';
				$response['message'] = 'Update successful';
			}
			return $response;
		}
	}
?>