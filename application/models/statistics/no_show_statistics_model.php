<?php
class No_show_statistics_model extends CI_Model {
	private $outlet_id;
	private $start;
	private $end;

	public function __construct() {
		$this->load->database();
	}

	private function no_shows_for_day() {
		$query	 = $this->db->query('SELECT start, count(resource) as no_shows FROM reservations WHERE NOT ((end <= "'.$this->start.'") OR (start >= "'.$this->end.'")) AND outlet_id = "'.$this->outlet_id.'" AND status = "not_show" GROUP BY start');
		$query	 = $query->result_array();
		$reservations = array();
		foreach ($query as $value) {
			$reservations[$value['start']] = $value;
		}
		$this->start = substr($this->start, 0, 13). ":00:00";
		$reservations = $this->fill_the_array("day", $reservations);
		return $reservations; 
	}
	private function no_shows_for_week(){
		$query	 = $this->db->query('SELECT DATE(start) as start, count(resource) as no_shows FROM reservations WHERE NOT ((end <= "'.$this->start.'") OR (start >= "'.$this->end.'")) AND outlet_id = "'.$this->outlet_id.'" AND status = "not_show" GROUP BY DAY(start)');
		$query	 = $query->result_array();
		$reservations = array();
		foreach ($query as $value) {
			$reservations[$value['start']] = $value;
		}
		$this->start = substr($this->start, 0, 10);
		$reservations = $this->fill_the_array("week", $reservations);
		return $reservations;
	}

	private function no_shows_for_month(){
		$query	 = $this->db->query('SELECT DATE(start) as start, count(resource) as no_shows FROM reservations WHERE NOT ((end <= "'.$this->start.'") OR (start >= "'.$this->end.'")) AND outlet_id = "'.$this->outlet_id.'" AND status = "not_show" GROUP BY DAY(start)');
		$query	 = $query->result_array();
		$reservations = array();
		foreach ($query as $value) {
			$reservations[$value['start']] = $value;
		}
		$this->start = substr($this->start, 0, 10);
		$reservations = $this->fill_the_array("month", $reservations);
		return $reservations;
	}

	private function no_shows_for_year(){
		$query	 = $this->db->query('SELECT DATE(start) as start, count(resource) as no_shows FROM reservations WHERE NOT ((end <= "'.$this->start.'") OR (start >= "'.$this->end.'")) AND outlet_id = "'.$this->outlet_id.'" AND status = "not_show" GROUP BY MONTH(start)');
		$query	 = $query->result_array();
		$reservations = array();
		foreach ($query as $value) {
			$reservations[$value['start']] = $value;
		}
		$this->start = substr($this->start, 0, 10);
		$reservations = $this->fill_the_array("year", $reservations);
		return $reservations;
	}

	public function no_show_statistics($timestamp){
		$function = 'no_shows_for_'.$timestamp;		
		$reservations = $this->$function();
		return $reservations;
	}

	public function set($outlet_id, $start, $end) {
		$this->outlet_id = $outlet_id;
		$this->start = $start;
		$this->end = $end;
		return $this;
	}

	private function fill_the_array($timestamp, $reservations){

		$format = "Y-m-d";

		switch ($timestamp) {
			case "day": 
				$step = " + 15 minute";
				$format = "Y-m-d H:i:s";
				$limit = 96;
				break;
			case "week":
				$step = " + 1 day";
				$limit = 7; 
				break;
			case "month":
				$step = " + 1 day";
				$limit = 30;
				break;
			case "year":
				$step = " + 1  month";
				$limit = 12;
				break;
		}

		$start = $this->start;
		$time_range = array();
		for ($i = 0; $i < $limit; $i++) {
			$time_range[$i] = $start;
			$start = date($format, strtotime($start. $step));
		}
		$end = $start;
		$no_shows = 0;
		foreach ($time_range as $value) {
			if(!array_key_exists($value, $reservations)) {
				$reservations[$value]['start'] = $value;
				$reservations[$value]['no_shows'] = "0";
			}
		}
		ksort($reservations);
		return $reservations;
	}

}

?>