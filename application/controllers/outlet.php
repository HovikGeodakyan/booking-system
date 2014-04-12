<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Outlet extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('outlet_model');
	}


	public function index($page = 'outlets') {

		$data['title']   = ucfirst($page); //page title
		$data['outlets'] = $this->read();  //list of outlets

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('outlet/list');
		$this->load->view('templates/footer');
	}


	public function edit($id, $page = 'edit') {

		$data['title']  = ucfirst($page);
		$data['outlet'] = $this->read($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('outlet/edit');
		$this->load->view('templates/footer');
	}

	// Render View 
	public function newout($page = 'new outlet'){
		$data['title'] = ucfirst($page);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('outlet/new');
		$this->load->view('templates/footer');
	}

	// Create an outlet
	public function create() {
		
		$outlet = array(
			'name'             => $this->input->post('outlet_name'),
			'email'            => $this->input->post('outlet_email'),
			'description'      => $this->input->post('outlet_description'),
			'seats-number'     => $this->input->post('outlet_seats_number'),
			'tables-number'    => $this->input->post('outlet_tables_number'),
			'default-not-bookable-table-lunch'        => $this->input->post('outlet_not_bookable_table_lunch'),
			'default-not-bookable-table-dinner'       => $this->input->post('outlet_not_bookable_table_dinner'),
			'default-not-bookable-table-pre-concert'  => $this->input->post('outlet_not_bookable_table_pre_concert'),
			'default-not-bookable-table-concert'      => $this->input->post('outlet_not_bookable_table_concert'),
			'default-not-bookable-table-post-concert' => $this->input->post('outlet_not_bookable_table_post_concert'),			
			'open-time'                 => $this->input->post('outlet_open_time'),
			'close-time'                => $this->input->post('outlet_close_time'),
			'break-start-time'          => $this->input->post('outlet_break_start_time'),
			'break-end-time'            => $this->input->post('outlet_break_end_time'),
			'day-off'                   => $this->input->post('outlet_day_off'),
			'no-show-limit'             => $this->input->post('outlet_no_show_limit'),
			'staying-time-lunch'        => $this->input->post('outlet_staying_time_lunch'),
			'staying-time-dinner'       => $this->input->post('outlet_staying_time_dinner'),
			'staying-time-pre-concert'  => $this->input->post('outlet_staying_time_pre_concert'),
			'staying-time-concert'      => $this->input->post('outlet_staying_time_concert'),
			'staying-time-post-concert' => $this->input->post('outlet_staying_time_post_concert'),
			//Monday
			'open-time-1'               => $this->input->post('outlet_open_time_1'),
			'close-time-1'              => $this->input->post('outlet_close_time_1'),
			'break-start-time-1'        => $this->input->post('outlet_break_start_time_1'),
			'break-end-time-1'          => $this->input->post('outlet_break_end_time_1'),
			//Thuesday
			'open-time-2'               => $this->input->post('outlet_open_time_2'),
			'close-time-2'              => $this->input->post('outlet_close_time_2'),
			'break-start-time-2'        => $this->input->post('outlet_break_start_time_2'),
			'break-end-time-2'          => $this->input->post('outlet_break_end_time_2'),
			//Wednesday
			'open-time-3'               => $this->input->post('outlet_open_time_3'),
			'close-time-3'              => $this->input->post('outlet_close_time_3'),
			'break-start-time-3'        => $this->input->post('outlet_break_start_time_3'),
			'break-end-time-3'          => $this->input->post('outlet_break_end_time_3'),
			//Thursday
			'open-time-4'               => $this->input->post('outlet_open_time_4'),
			'close-time-4'              => $this->input->post('outlet_close_time_4'),
			'break-start-time-4'        => $this->input->post('outlet_break_start_time_4'),
			'break-end-time-4'          => $this->input->post('outlet_break_end_time_4'),
			//Friday
			'open-time-5'               => $this->input->post('outlet_open_time_5'),
			'close-time-5'              => $this->input->post('outlet_close_time_5'),
			'break-start-time-5'        => $this->input->post('outlet_break_start_time_5'),
			'break-end-time-5'          => $this->input->post('outlet_break_end_time_5'),
			//Saturday
			'open-time-6'               => $this->input->post('outlet_open_time_6'),
			'close-time-6'              => $this->input->post('outlet_close_time_6'),
			'break-start-time-6'        => $this->input->post('outlet_break_start_time_6'),
			'break-end-time-6'          => $this->input->post('outlet_break_end_time_6'),
			//Sunday
			'open-time-7'               => $this->input->post('outlet_open_time_7'),
			'close-time-7'              => $this->input->post('outlet_close_time_7'),
			'break-start-time-7'        => $this->input->post('outlet_break_start_time_7'),
			'break-end-time-7'          => $this->input->post('outlet_break_end_time_7'),

			'online-bookable'  => $this->input->post('outlet_online_bookable')
		);

		$tables = array(
			"seats-standart-number" => $this->input->post("table_seats_standart_number"),
			"seats-max-number"      => $this->input->post("table_seats_max_number"),
			"combinable"            => $this->input->post("table_combinable"),
			"location"              => $this->input->post("table_location"),
		);

		$holidays = array(
			"holidays_names"    => $this->input->post("holiday_name"),
			"holidays_starts"   => $this->input->post("holiday_start"),
			"holidays_ends"     => $this->input->post("holiday_end"),
			"holidays_messages" => $this->input->post("holiday_message")
		);


		$outlet_id = $this->outlet_model->create_outlet($outlet);
		$this->outlet_model->insert_tables($outlet_id, $tables);
		//$this->outlet_model->insert_holidays($id, $holidays);
		redirect(URL.'outlet');
	}


	// Get All outlets
	public function read($id = NULL) {

		if($id == NULL) {
			$res = $this->outlet_model->load_outlets();
		}else {
			$res = $this->outlet_model->load_one_outlet($id);
		}

		return $res;
	}


	//Update an Outlet
	public function update($id) {
		$this->outlet_model->update_outlet($id);
		redirect(URL.'outlet');
	}


	// Remove an Outlet
	public function delete($id) {
		$this->outlet_model->delete_outlet($id);
	}

}

