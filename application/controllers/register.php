<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->lang->load('en', 'en');
		$this->load->model('register_model');
		
	}

	public function index() {
		$data['title'] = "Register";
		$results = $this->register_model->checkUsers();
		if(empty($results)){
			$this->load->view('register', $data);
		} else {
			redirect(URL);
		}
		
	}


	public function create() {
		$this->register_model->register_user();
		redirect('outlet/add');
	}
	
}

