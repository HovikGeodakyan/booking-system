<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class scheduler extends CI_Controller {

	public function index(){
		$this->load->model('scheduler_model');
		$this->scheduler_model->table_exists('events');
	}

	public function create() {
		$this->load->model('scheduler_model');
		$response = $this->scheduler_model->create_event();
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function events() {
		$this->load->model('scheduler_model');
		$events=$this->scheduler_model->load_events();
		header('Content-Type: application/json');
		echo json_encode($events);
	}

	public function move() {
		$this->load->model('scheduler_model');
		$response=$this->scheduler_model->move_event();
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function resize() {
		$this->load->model('scheduler_model');
		$response=$this->scheduler_model->resize_event();
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}

/* End of file statistics.php */
/* Location: ./application/controllers/statistics.php */