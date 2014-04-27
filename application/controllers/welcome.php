<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends My_Controller {
	
	
	public function __construct() {		
		parent::__construct();
	}


	public function index($page="home")	{
		$data['title'] = ucfirst($page);
		$this->render('welcome', $data);
	}
}
