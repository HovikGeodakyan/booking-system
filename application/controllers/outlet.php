<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Outlet extends My_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('outlet_model');
		$this->load->model('holiday_model');
		$this->load->model('scheduler_model');
		$this->load->model('concert_model');
	}


	public function index($page = 'outlets') {

		$data['title']   = ucfirst($page); //page title
		$data['outlets'] = $this->read();  //list of outlets

		$this->render('outlet/list', $data);

		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/sidebar');
		// $this->load->view('outlet/list');
		// $this->load->view('templates/footer');
	}


	// Render Add View 
	public function add($page = 'new outlet'){
		$data['title'] = ucfirst($page);

		$this->render('outlet/new', $data);

		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/sidebar');
		// $this->load->view('outlet/new');
		// $this->load->view('templates/footer');
	}

	// Render Edit View 
	public function edit($id, $page = 'edit') {

		$data['title']   = ucfirst($page);
		$data['outlet']  = $this->read($id);
		$data['holiday'] = $this->read_holidays($id);
		$data['general_holidays'] = $this->read_holidays();
		$data['table']   = $this->read_tables($id);

		$this->render('outlet/edit', $data);
		
		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/sidebar');
		// $this->load->view('outlet/edit');
		// $this->load->view('templates/footer');
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

		if(!empty($holidays)) {
			$this->holiday_model->update_holidays($outlet_id, $holidays);
		}

		redirect(URL.'outlet');

	}


	//Update an Outlet
	public function update($id) {
		$form = $this->input->post();		
		
		$outlet   = $this->remove_prefix($form, 'outlet');
		$tables   = $this->remove_prefix($form, 'table');
		$holidays = $this->remove_prefix($form, 'holiday');
		
		$this->outlet_model->update_outlet($id, $outlet);	
		
		if(!empty($tables)) {
			$this->outlet_model->update_tables($id, $tables);
		}

		if(!empty($holidays)) {
			$this->holiday_model->update_holidays($id, $holidays);
		}
		
		redirect(URL.'outlet');

	}


	// Remove an Outlet
	public function delete($id) {
		$this->outlet_model->delete_outlet($id);
	}


	public function read_tables($outlet_id){
		$res = $this->outlet_model->load_tables($outlet_id);
		return $res;
	}


	public function remove_table($id) {
		$res = $this->outlet_model->remove_table($id);
		return $res;
	}


	public function read_holidays($outlet_id = 0){
		if($outlet_id === 0) {
			$res = $this->holiday_model->load_general_holidays();
		} else {
			$res = $this->holiday_model->load_outlet_holidays($outlet_id);
		}
		return $res;
	}


	// Get outlets
	public function read($id = NULL) {

		if($id == NULL) {
			$res = $this->outlet_model->load_outlets();
		} else {
			$res = $this->outlet_model->load_one_outlet($id);
		}

		return $res;
	}

	public function get() {
		$currentStart = $this->input->post('start');
		$currentEnd = $this->input->post('end');

		$id = $this->outlet_model->get_active_outlet();
		$res = $this->outlet_model->load_one_outlet($id);
		$tables = $this->read_tables($id);
		$not_assigned = $this->scheduler_model->load_not_assigned_reservations($currentStart, $currentEnd, $res['outlet_id']);
		$res['header_info'] = $this->concert_model->load_header_info($id, substr($currentStart, 0, 10));

		$res['outlet_default_not_bookable_table_lunch'] = (isset($res['header_info']['not_bookable_table_lunch'])) ? $res['header_info']['not_bookable_table_lunch'] : $res['outlet_default_not_bookable_table_lunch'];
		$res['outlet_default_not_bookable_table_dinner'] = (isset($res['header_info']['not_bookable_table_dinner'])) ? $res['header_info']['not_bookable_table_dinner'] : $res['outlet_default_not_bookable_table_dinner'];
		$res['outlet_default_not_bookable_table_pre_concert'] = (isset($res['header_info']['not_bookable_table_pre_concert'])) ? $res['header_info']['not_bookable_table_pre_concert'] : $res['outlet_default_not_bookable_table_pre_concert'];
		$res['outlet_default_not_bookable_table_concert'] = (isset($res['header_info']['not_bookable_table_concert'])) ? $res['header_info']['not_bookable_table_concert'] : $res['outlet_default_not_bookable_table_concert'];
		$res['outlet_default_not_bookable_table_post_concert'] = (isset($res['header_info']['not_bookable_table_post_concert'])) ? $res['header_info']['not_bookable_table_post_concert'] : $res['outlet_default_not_bookable_table_post_concert'];

		if(! isset($res['header_info']['concert_name'])) {
			$res['header_info'] = NULL;
		}

		$res['tables'] = $tables;
		$res['not_assigned'] = $not_assigned;
		echo json_encode($res);
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

	public function hide_tables() {		
		$this->concert_model->hide_tables($this->input->post());
	}
	

}

