<?php
	class Reservations_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function load_reservations($outlet_id, $start, $end, $keyword){			
			$query = $this->db->query('SELECT * FROM reservations WHERE NOT ((end <= "'.$start.'") OR (start >= "'.$end.'")) AND outlet_id = "'.$outlet_id.'" AND (guest_name LIKE "%'.$keyword.'%" OR 	phone LIKE "%'.$keyword.'%" OR title LIKE "%'.$keyword.'%" OR email LIKE "%'.$keyword.'%" OR author LIKE "%'.$keyword.'%")');
			$query = $query->result_array();
			$reservations = array();
			foreach ($query as $row ) {
				$e=array();
				$e['id']           = $row['id'];
				$e['text']         = $row['guest_name'];
				$e['title']        = $row['title'];
				$e['guest_number'] = $row['guest_number'];
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

	}
?>