<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends My_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}

	//default method
	public function index($page="users"){

		$data['title'] = ucfirst($page); //pass the title to view
		$data['users']=$this->read();  //pass list of users to view

		$this->render('user/list', $data);

		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/sidebar');
		// $this->load->view('user/list');
		// $this->load->view('templates/footer');
		
	}

	public function edit($id, $page="edit"){
		$data['title'] = ucfirst($page);
		$data['user']=$this->read($id);

		$this->render('user/edit', $data);

		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/sidebar');
		// $this->load->view('user/edit');
		// $this->load->view('templates/footer');
	}

	public function newusr($page="new user"){
		$data['title'] = ucfirst($page);

		$this->render('user/new', $data);
		
		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/sidebar');
		// $this->load->view('user/new');
		// $this->load->view('templates/footer');
	}

	//create a user
	public function create(){
		$this->user_model->create_user();
		redirect(URL.'user');
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
	public function update($id){
		$this->user_model->update_user($id);
		redirect(URL.'user');
	}

	//delete a user
	public function delete($id){
		$this->user_model->delete_user($id);
	}
}

/* End of file setup.php */
/* Location: ./application/controllers/setup.php */