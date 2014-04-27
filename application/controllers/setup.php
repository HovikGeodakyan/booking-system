<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class setup extends My_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('setup_model');
	}


	public function index($page="settings")	{
		$data['title'] = ucfirst($page); 
		$data['outlets']=$this->setup_model->load_outlets();
		$this->render('settings/outlets', $data);	
	}


	public function outlet($id) {
		$data['outlet'] = $this->setup_model->load_one_outlet($id);
		$data['title']  = ucfirst($data['outlet']['outlet_name']);		
		$this->render('settings/outlet', $data);
	}


	public function users($id = NULL, $page = "settings") {
		$data['title'] = ucfirst($page); 		

		if($id == NULL) {
			$data['users']=$this->setup_model->load_users();
			$template = 'settings/users';
		} else {
			$data['user']=$this->setup_model->load_one_user($id);
			$template = 'settings/user';
		}

		$this->render($template, $data);		
	}
	
}

