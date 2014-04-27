<?php
	class Concert_model extends CI_Model {


		public function __construct(){
			parent::__construct();
		}


		public function load_header_info($outlet_id, $date) {
			$row = $this->db->query('SELECT * FROM info WHERE concert_date = "'.$date.'" AND outlet_id = "'.$outlet_id.'"');

			if($row->num_rows() === 0) {
				$row = NULL;
			} else {
				$row = $row->row_array();
			}
			return $row;
		}


		public function hide_tables($data) {
			$this->db->set('not_bookable_table_'.$data['timebox'], $data['value']);
			$this->db->where('concert_date', substr($data['date'], 0, 10));
			$this->db->update('info');
		}
	}
?>