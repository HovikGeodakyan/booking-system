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

		// $this->load->view('templates/header', $data);		
		// $this->load->view('templates/sidebar');
		// $this->load->view('settings/outlets');
		// $this->load->view('templates/footer');
	}


	public function outlet($id) {
		$data['outlet'] = $this->setup_model->load_one_outlet($id);
		$data['title']  = ucfirst($data['outlet']['outlet_name']);
		
		$this->render('settings/outlet', $data);

		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/sidebar');
		// $this->load->view('settings/outlet');
		// $this->load->view('templates/footer');
	}


	public function users($id=NULL, $page="settings") {

		$data['title'] = ucfirst($page); 
		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/sidebar');

		if($id == NULL) { ///if there is no id load all users list
			$data['users']=$this->setup_model->load_users();
			$template = 'settings/users';
		} else {//if there is an if load that user
			$data['user']=$this->setup_model->load_one_user($id);
			$template = 'settings/user';
		}

		$this->render($template, $data);
		// $this->load->view('templates/footer');
	}

	
}

