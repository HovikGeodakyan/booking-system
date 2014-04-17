<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservations extends CI_Controller {
	
	public function index($page="reservations")
	{
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('reservations/index');
		$this->load->view('templates/footer');
	}

	public function load(){
		$this->load->model('reservations_model');
		$this->load->model('outlet_model');
		$outlet_id = $this->outlet_model->get_active_outlet();
		$res = $this->reservations_model->load_reservations($outlet_id, $this->input->post('start'), $this->input->post('end'), $this->input->post('keyword'));
		echo json_encode($res);
	}
}
