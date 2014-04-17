<?php
	class Reservations_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function load_reservations($outlet_id, $start, $end, $name){
					$query = $this->db->query('SELECT * FROM reservations WHERE NOT ((end <= "'.$start.'") OR (start >= "'.$end.'")) AND outlet_id = "'.$outlet_id.'" AND name LIKE "%'.$name.'%"');
					$query = $query->result_array();
					$reservations=array();
					foreach ($query as $row ) {
						$e=array();
						$e['id']           = $row['id'];
						$e['text']         = $row['name'];
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