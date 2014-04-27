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
	}


	public function create() {
		$res = $this->holiday_model->update_holidays(0, $this->input->post());
		redirect(URL.'holiday');		
	}

	
	public function delete($id) {		
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

