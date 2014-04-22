<?php
class Statistics_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function load_reservations($outlet_id, $start, $end) {
		$query	 = $this->db->query('SELECT distinct t.start, sum(s.guest_number) as size 
									FROM reservations t
									JOIN reservations s on t.start = s.start AND NOT ((t.end <= "'.$start.'") OR (t.start >= "'.$end.'")) AND t.outlet_id = "'.$outlet_id.'" AND t.status!="cancelled" 
									GROUP by t.start, t.guest_number');
		$query	 = $query->result_array();
		return $query; 
	}
}

?>