<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct(){
			parent::__construct();
			$this->load->model('api_model');
		}

	public function freeTables () {
		// booking-system/api/freeTables?outletID=65&date=2014-04-26
		$data = $this->input->get();

		$output = [];
		$output['errors'] = [];
		$output['results'] = [];

		if(!isset($data['outletID'])) {
			array_push( $output['errors'] ,'You must specify outletID'); 	
		}
		if(!isset($data['date'])) {
			array_push( $output['errors'] ,'You must specify Start Time'); 				
		}

		if(!empty($output['errors'])) {
			$output['status'] = 'Wrong Request';
			var_dump($output);
			// return json_encode($output['errors']);
		} else {
			$output['status'] = 'Sucsess';
			$output['results'] = $this->api_model->getFreeTables($data['outletID'], $data['date']);			
		}		
		print '<pre>';
		var_dump($output['results']);
		print '</pre>';
	}

	public function reserveTable() { 
		$data = $this->input->get();
		$output = [];
		$output['errors'] = $this->api_model->reserveTable($data);
	}

	public function form(){
		$this->load->view('api_form');
	}
	
}