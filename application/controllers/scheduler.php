<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class scheduler extends CI_Controller {

	public function __construct(){
		parent::__construct();
	 	$this->load->model('scheduler_model');
	}


	public function index(){
		$this->scheduler_model->table_exists('events');
	}


	public function create($outlet_id) {
		$response = $this->scheduler_model->create_event($outlet_id);
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}


	public function events($outlet_id) {
		$events = $this->scheduler_model->load_events($outlet_id);
		
		header('Content-Type: application/json');
		echo json_encode($events);
	}


	public function move($outlet_id){		
		$response = $this->scheduler_model->move_event($outlet_id);
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}


	public function resize($outlet_id) {
		$response = $this->scheduler_model->resize_event($outlet_id);
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}


	public function cancel($outlet_id){
		$response = $this->scheduler_model->cancel_event($outlet_id);
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}
