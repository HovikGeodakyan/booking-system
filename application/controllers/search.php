<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class search extends My_Controller {


	public function __construct(){
		parent::__construct();
	 	$this->load->model('search_model');
	 	$this->load->model('outlet_model');
	}


	public function index($text) {
		$outlet_id = $this->outlet_model->get_active_outlet(); 
		echo json_encode($this->search_model->search_guests($text, $outlet_id ));
	}
}
