<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//$this->load->model('email_model');
	}


	public function index($page = 'email') {

		$data['title']    = ucfirst($page); 
		$data['title']    = ucfirst($page); 
		

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('email/index');
		$this->load->view('templates/footer');
	}


	public function create() {

	}

	public function read() {

	}

	public function update($id) {

	}
}

