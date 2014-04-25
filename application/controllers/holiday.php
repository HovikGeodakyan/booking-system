<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Holiday extends My_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('holiday_model');
	}


	public function index($page = 'holidays') {

		$data['title']    = ucfirst($page); 
		$data['holidays'] = $this->read(); 
		 
		$this->render('holiday/list', $data);

		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/sidebar');
		// $this->load->view('holiday/list');
		// $this->load->view('templates/footer');
	}


	public function create() {
		$res = $this->holiday_model->update_holidays(0, $this->input->post());
		redirect(URL.'holiday');
		//$this->holiday_model->delete_holiday($id);
	}

	
	public function delete($id) {
		// echo $this->input->post('name');
		$this->holiday_model->delete_holiday($id);
	}

	

	public function read() {
		$res = $this->holiday_model->load_general_holidays();
		return $res;
	}


	public function update($id) {
		$holiday = $this->input->post();
		$this->holiday_model->update_a_holiday($id, $holiday);
	}
}

