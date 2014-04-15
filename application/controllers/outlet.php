<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Outlet extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('outlet_model');
		$this->load->model('holiday_model');
	}


	public function index($page = 'outlets') {

		$data['title']   = ucfirst($page); //page title
		$data['outlets'] = $this->read();  //list of outlets

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('outlet/list');
		$this->load->view('templates/footer');
	}


	// Render View 
	public function add($page = 'new outlet'){
		$data['title'] = ucfirst($page);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('outlet/new');
		$this->load->view('templates/footer');
	}


	public function edit($id, $page = 'edit') {

		$data['title']   = ucfirst($page);
		$data['outlet']  = $this->read($id);
		$data['holiday'] = $this->read_holidays($id);
		$data['table']   = $this->read_tables($id);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('outlet/edit');
		$this->load->view('templates/footer');
	}


	// Create an outlet
	public function create() {
		$form = $this->input->post();		
		$outlet   = $this->remove_prefix($form, 'outlet');
		$tables   = $this->remove_prefix($form, 'table');
		$holidays = $this->remove_prefix($form, 'holiday');

		$outlet_id = $this->outlet_model->create_outlet($outlet);
		
		if(!empty($tables)) {
			$this->outlet_model->insert_tables($outlet_id, $tables);
		}

		// if(!empty($holidays)) {
		// 	$this->outlet_model->insert_holidays($outlet_id, $holidays);
		// }

		redirect(URL.'outlet');

	}


	//Update an Outlet
	public function update($id) {
		$form = $this->input->post();		
		
		$outlet   = $this->remove_prefix($form, 'outlet');
		$tables   = $this->remove_prefix($form, 'table');
		$holidays = $this->remove_prefix($form, 'holiday');

		// var_dump('<pre>',$tables );exit;
		$this->outlet_model->update_outlet($id, $outlet);	
		// $this->holiday_model->update_holidays($id, $holidays);
		if(!empty($tables)) {
			$this->outlet_model->update_tables($id, $tables);
		}
		
		redirect(URL.'outlet');

	}


	// Remove an Outlet
	public function delete($id) {
		$this->outlet_model->delete_outlet($id);
		// redirect(URL.'outlet');

	}


	public function read_tables($outlet_id){
		$res = $this->outlet_model->load_tables($outlet_id);
		return $res;
	}


	public function remove_table($id) {
		$res = $this->outlet_model->remove_table($id);
		return $res;
	}


	public function read_holidays($outlet_id){
		$res = $this->holiday_model->load_outlet_holidays($outlet_id);
		return $res;
	}


	// Get All outlets
	public function read($id = NULL) {

		if($id == NULL) {
			$res = $this->outlet_model->load_outlets();
		} else {
			$res = $this->outlet_model->load_one_outlet($id);
		}

		return $res;
	}

	
	public function remove_prefix($data, $prefix) {		
		$result = array();
		
		foreach ($data as $key => $value) {			
			$temp = explode('_', $key, 2);
			if($temp[0] == $prefix) {
				$result[$temp[1]] = $value;
			}
		}

		return $result;
	}
	

}

