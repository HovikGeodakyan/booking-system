<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends My_Controller {

	public function __construct(){
		parent::__construct();
		//$this->load->model('email_model');
	}


	public function index($page = 'email') {

		$data['title']    = ucfirst($page); 
		$data['title']    = ucfirst($page); 
		
		$this->render('email/index', $data);		
	}


	public function create() {

	}

	public function read() {

	}

	public function update($id) {

	}
}

