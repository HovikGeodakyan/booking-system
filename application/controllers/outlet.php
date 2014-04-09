<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Outlet extends CI_Controller {

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
		$this->load->model('outlet_model');
	}

	//default method
	public function index($page="outlets"){

		$data['title'] = ucfirst($page); //pass the title to view
		$data['outlets']=$this->read();  //pass list of users to view

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('outlet/list');
		$this->load->view('templates/footer');
		
	}

	public function edit($id, $page="edit"){
		$data['title'] = ucfirst($page);
		$data['outlet']=$this->read($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('outlet/edit');
		$this->load->view('templates/footer');
	}

	public function newout($page="new outlet"){
		$data['title'] = ucfirst($page);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('outlet/new');
		$this->load->view('templates/footer');
	}

	//create a user
	public function create(){
		var_dump($_POST); exit;
		$this->outlet_model->create_outlet();
		redirect(URL.'outlet');
	}

	//get list of all users or a single user
	public function read($id=NULL){

		if($id==NULL){
			$res=$this->outlet_model->load_outlets();
		}else{
			$res=$this->outlet_model->load_one_outlet($id);
		}

		return $res;
	}

	//update a user
	public function update($id) {
		$this->outlet_model->update_outlet($id);
		redirect(URL.'outlet');
	}

	//delete a user
	public function delete($id) {
		$this->outlet_model->delete_outlet($id);
	}
}

/* End of file setup.php */
/* Location: ./application/controllers/setup.php */