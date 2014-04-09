<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->load->model('user_model');
	}

	//default method
	public function index($page="users"){

		$data['title'] = ucfirst($page); //pass the title to view
		$data['users']=$this->read();  //pass list of users to view

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('user/list');
		$this->load->view('templates/footer');
		
	}

	public function edit($id, $page="edit"){
		$data['title'] = ucfirst($page);
		$data['user']=$this->read($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('user/edit');
		$this->load->view('templates/footer');
	}

	public function newuser($page="new user"){
		$data['title'] = ucfirst($page);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('user/new');
		$this->load->view('templates/footer');
	}

	//create a user
	public function create(){
		//$this->user_model->create_user();
	}

	//get list of all users or a single user
	public function read($id=NULL){

		if($id==NULL){
			$res=$this->user_model->load_users();
		}else{
			$res=$this->user_model->load_one_user($id);
		}

		return $res;
	}

	//update a user
	public function update(){}

	//delete a user
	public function delete(){}
}

/* End of file setup.php */
/* Location: ./application/controllers/setup.php */