<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index($page="home")
	{
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('welcome', $data);
		$this->load->view('templates/footer', $data);
	}
}
