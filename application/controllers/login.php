<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->lang->load('en', 'en');
		$this->load->model('login_model');

		// if(empty($this->login_model->checkFirstLogin())) {			
		// 	redirect('/register');
		// }
		
	}

	public function index(){
		$this->session->sess_destroy();
		$data['title'] = "LogIn";
		$this->load->view('login', $data);
	}

	public function signin(){
		$res = $this->login_model->sign();
		if($res){
			$newdata = array(
				'user_id'  => $res["id"],
				'user_name'=> $res["username"],
				'logged_in'=> TRUE,
				'user_role'=> $res['role']
			);
			$this->session->set_userdata($newdata);
			redirect('/welcome');
		}else{
			$data['error']="Not valid login.";
			redirect('/login');
		}
	}

	public function signout(){
		$this->session->sess_destroy();
		redirect('/login');
	}

}