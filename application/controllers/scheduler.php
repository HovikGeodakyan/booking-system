<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class scheduler extends CI_Controller {

	public function __construct(){
		parent::__construct();
	 	$this->load->model('scheduler_model');
	}


	public function index(){
		$this->scheduler_model->table_exists('reservations');
	}


	public function create($outlet_id) {
		$data = $this->input->post();
		$data['outlet_id'] = $outlet_id;
		$response = $this->scheduler_model->create_reservation($outlet_id, $data);
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}


	public function reservations($outlet_id) {
		$reservations = $this->scheduler_model->load_reservations($outlet_id);
		
		header('Content-Type: application/json');
		echo json_encode($reservations);
	}


	public function move($outlet_id){		
		$response = $this->scheduler_model->move_reservation($outlet_id);
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}


	public function resize($outlet_id) {
		$response = $this->scheduler_model->resize_reservation($outlet_id);
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}


	public function status($outlet_id){
		$data = $this->input->post();
		$response = $this->scheduler_model->change_status($outlet_id, $data);
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}
