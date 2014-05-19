<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends CI_Controller{

	public function __construct() {
		parent::__construct();			
		if(!$this->session->userdata('logged_in')){
			redirect('/login');
		}
	}

	public function render($view, $data) {

		$langauge = $this->session->userdata('user_language');
		$this->lang->load($langauge, $langauge);

	 	$this->load->model('general_model');
		$data['settings'] = $this->general_model->read();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view($view, $data);
		$this->load->view('templates/footer', $data);
	}
}

?>
