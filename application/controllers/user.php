<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends My_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');

	}

	
	public function index($page="users") {
		if($this->session->all_userdata('user_role') === 1) {
			$data['title'] = ucfirst($page); 
			$data['users']=$this->read();
			$this->render('user/list', $data);		
		} else {
			redirect(URL);
		}

	}


	public function edit($id, $page = "edit") {
		if($this->session->all_userdata('user_role') === 1) {
			$data['title'] = ucfirst($page);
			$data['user']=$this->read($id);
			$this->render('user/edit', $data);
		} else {
			redirect(URL);
		}

	}	

	public function settings($page = "Personal settings") {
		$data['title'] = ucfirst($page);
		$data['user'] = $this->session->all_userdata();

		if(!empty($data['user'])){
			$this->render('user/settings', $data);
		}
	}


	public function newusr($page="new user") {
		$data['title'] = ucfirst($page);
		$this->render('user/new', $data);		
	}
	

	public function create(){
		$this->user_model->create_user();
		redirect(URL.'user');
	}

	

	public function read($id = NULL) {
		if($id==NULL){
			$res=$this->user_model->load_users();
		}else {
			$res=$this->user_model->load_one_user($id);
		}

		return $res;
	}


	public function update($id) {
		$this->user_model->update_user($id);
		redirect(URL);
	}

	
	public function delete($id) {
		$this->user_model->delete_user($id);
	}
}

