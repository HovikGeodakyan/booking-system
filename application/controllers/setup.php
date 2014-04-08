<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class setup extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/setup
	 *	- or -  
	 * 		http://example.com/index.php/setup/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/setup/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('setup_model');
	}

	public function index($page="settings")
	{
		$data['title'] = ucfirst($page); 
		$data['outlets']=$this->setup_model->load_outlets();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('settings/outlets');
		$this->load->view('templates/footer');
	}

	public function outlet($id) {
		$data['outlet'] = $this->setup_model->load_one_outlet($id);
		$data['title']  = ucfirst($data['outlet']['outlet_name']);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('settings/outlet');
		$this->load->view('templates/footer');
	}

	public function users($id=NULL, $page="settings"){

		$data['title'] = ucfirst($page); 
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');

		if($id == NULL) { ///if there is no id load all users list
			$data['users']=$this->setup_model->load_users();
			$this->load->view('settings/users', $data);
		} else {//if there is an if load that user
			$data['user']=$this->setup_model->load_one_user($id);
			$this->load->view('settings/user', $data);
		}

		$this->load->view('templates/footer');
	}
}

/* End of file setup.php */
/* Location: ./application/controllers/setup.php */