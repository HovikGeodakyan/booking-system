<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General extends My_Controller {


	public function __construct(){
		parent::__construct();
	 	$this->load->model('general_model');
	 	if($this->session->userdata('user_role') !== "1") {
	 		redirect(URL.'welcome');
	 	}
	}

	public function index($page="general") {		
		$data['title'] = ucfirst($page);
		$this->render('general', $data);	
	}

	public function update() {
		$message = $this->general_model->update();
		$this->session->set_flashdata($message);
		redirect(URL.'general');
	}

}
