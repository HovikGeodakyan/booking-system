<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class statistics extends My_Controller {

	public function __construct() {
		parent::__construct();
		var_dump($this->session->userdata('user_role'));
		if($this->session->userdata('user_role') != '1') {
			redirect('/welcome');
		}
		
	}

	public function index($page="statistics") {		
		$data['title'] = ucfirst($page); 		
		$this->render('statistics', $data);
	}


	public function seat_utilization(){
		$this->load->model('statistics/seat_utilization_model');
		$this->load->model('outlet_model');
		$outlet_id = $this->outlet_model->get_active_outlet();
		$res['reservations'] = $this->seat_utilization_model
									->set($outlet_id, $this->input->post('start'), $this->input->post('end'))
									->seat_utilization($this->input->post('timestamp'));
		$res['outlet'] = $this->outlet_model->load_one_outlet($outlet_id);
		echo json_encode($res);
	}


	public function table_utilization(){
		$this->load->model('statistics/table_utilization_model');
		$this->load->model('outlet_model');
		$outlet_id = $this->outlet_model->get_active_outlet();
		$res['reservations'] = $this->table_utilization_model
									->set($outlet_id, $this->input->post('start'), $this->input->post('end'))
									->table_utilization($this->input->post('timestamp'));
		$res['outlet'] = $this->outlet_model->load_one_outlet($outlet_id);
		echo json_encode($res);
	}


	public function no_show_statistics(){
		$this->load->model('statistics/no_show_statistics_model');
		$this->load->model('outlet_model');
		$outlet_id = $this->outlet_model->get_active_outlet();
		$res['reservations'] = $this->no_show_statistics_model
									->set($outlet_id, $this->input->post('start'), $this->input->post('end'))
									->no_show_statistics($this->input->post('timestamp'));
		$res['outlet'] = $this->outlet_model->load_one_outlet($outlet_id);
		echo json_encode($res);
	}


	public function cancellation_statistics(){
		$this->load->model('statistics/cancellation_statistics_model');
		$this->load->model('outlet_model');
		$outlet_id = $this->outlet_model->get_active_outlet();
		$res['reservations'] = $this->cancellation_statistics_model
									->set($outlet_id, $this->input->post('start'), $this->input->post('end'))
									->cancellation_statistics($this->input->post('timestamp'));
		$res['outlet'] = $this->outlet_model->load_one_outlet($outlet_id);
		echo json_encode($res);
	}	


	public function over_reserved_statistics(){
		$this->load->model('statistics/over_reserved_statistics_model');
		$this->load->model('outlet_model');
		$outlet_id = $this->outlet_model->get_active_outlet();
		$res['reservations'] = $this->over_reserved_statistics_model
									->set($outlet_id, $this->input->post('start'), $this->input->post('end'))
									->over_reserved_statistics($this->input->post('timestamp'));
		$res['outlet'] = $this->outlet_model->load_one_outlet($outlet_id);
		echo json_encode($res);
	}
}
