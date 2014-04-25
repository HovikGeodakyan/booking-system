<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct(){
			parent::__construct();
			$this->load->model('api_model');
		}

	public function freeTables() {
		$data = $this->input->get();

		$output = [];
		$output['errors'] = [];
		$output['results'] = [];

		if(!isset($data['outletID'])) {
			array_push( $output['errors'] ,'You must specify outletID'); 	
		}
		if(!isset($data['startTime'])) {
			array_push( $output['errors'] ,'You must specify Start Time'); 				
		}
		if(!isset($data['endTime'])) {
			array_push( $output['errors'] ,'You must specify  End Time'); 
		}
		
		if(!empty($output['errors'])) {
			$output['status'] = 'Wrong Request';
			var_dump($output);
			// return json_encode($output['errors']);
		} else {
			$output['status'] = 'Sucsess';
			$output['results'] = $this->api_model->getFreeTables($data['outletID'], $data['startTime'], $data['endTime']);			
		}		
		var_dump($output);
	}

	public function reserveTable() { 
		$data = $this->input->get();

	}
	
}