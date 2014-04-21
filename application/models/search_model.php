<?php
class Search_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function search_guests($keyword, $outlet_id) {
		$query	 = $this->db->query('SELECT * FROM reservations WHERE outlet_id = "'.$outlet_id.'" AND guest_name LIKE "%'.$keyword.'%"');
		$query	 = $query->result_array();
		return $query; 
	}
}

?>