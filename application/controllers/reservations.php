<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservations extends My_Controller {
	

	public function index($page = "reservations") {
		$data['title'] = ucfirst($page); 
		$this->render('reservations/index', $data);		
	}


	public function load() {
		$this->load->model('reservations_model');
		$this->load->model('outlet_model');
		$outlet_id = $this->outlet_model->get_active_outlet();
		
		$res = $this->reservations_model->load_reservations($outlet_id, $this->input->post('start'), $this->input->post('end'), $this->input->post('keyword'));
		echo json_encode($res);
	}
}
