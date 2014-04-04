<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->lang->load('en', 'en');
		$this->load->model('login_model');
	}
	public function index(){
		$this->session->sess_destroy();
		$data['title'] = "LogIn"; // Capitalize the first letter
		$this->load->view('login', $data);
	}
	public function signin(){
		$res=$this->login_model->sign();
		if($res){
			$newdata = array(
				'user_id'  => $res["id"],
				'user_name'=> $res["username"],
				'logged_in'=> TRUE
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
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
}