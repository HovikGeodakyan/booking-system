<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class statistics extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/statistics
	 *	- or -  
	 * 		http://example.com/index.php/statistics/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/statistics/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($page="statistics")
	{
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('statistics', $data);
		$this->load->view('templates/footer', $data);
	}

	public function seat_utilization(){
		$this->load->model('statistics/seat_utilization_model');
		$this->load->model('outlet_model');
		$outlet_id = $this->outlet_model->get_active_outlet();
		$res['reservations'] = $this->seat_utilization_model
									->set($outlet_id, $this->input->post('start'), $this->input->post('end'))
									->seat_utilization($this->input->post('timestamp'));
		//$res['reservations'] = $this->full_the_array($res['reservations'], $this->input->post('start'), $this->input->post('end'));
		$res['outlet'] = $this->outlet_model->load_one_outlet($outlet_id);
		echo json_encode($res);
	}

	public function table_utilization(){
		$this->load->model('statistics/table_utilization_model');
		$this->load->model('outlet_model');
		$outlet_id = $this->outlet_model->get_active_outlet();
		$res['reservations'] = $this->table_utilization_model
									->set($outlet_id, $this->input->post('start'), $this->input->post('end'))
									->table_utilization($this->input->post('timestamp'));
		//$res['reservations'] = $this->full_the_array($res['reservations'], $this->input->post('start'), $this->input->post('end'));
		$res['outlet'] = $this->outlet_model->load_one_outlet($outlet_id);
		echo json_encode($res);
	}

	public function no_show_statistics(){
		$this->load->model('statistics/no_show_statistics_model');
		$this->load->model('outlet_model');
		$outlet_id = $this->outlet_model->get_active_outlet();
		$res['reservations'] = $this->no_show_statistics_model
									->set($outlet_id, $this->input->post('start'), $this->input->post('end'))
									->no_show_statistics($this->input->post('timestamp'));
		//$res['reservations'] = $this->full_the_array($res['reservations'], $this->input->post('start'), $this->input->post('end'));
		$res['outlet'] = $this->outlet_model->load_one_outlet($outlet_id);
		echo json_encode($res);
	}

	public function cancellation_statistics(){
		$this->load->model('statistics/cancellation_statistics_model');
		$this->load->model('outlet_model');
		$outlet_id = $this->outlet_model->get_active_outlet();
		$res['reservations'] = $this->cancellation_statistics_model
									->set($outlet_id, $this->input->post('start'), $this->input->post('end'))
									->cancellation_statistics($this->input->post('timestamp'));
		//$res['reservations'] = $this->full_the_array($res['reservations'], $this->input->post('start'), $this->input->post('end'));
		$res['outlet'] = $this->outlet_model->load_one_outlet($outlet_id);
		echo json_encode($res);
	}
}

/* End of file statistics.php */
/* Location: ./application/controllers/statistics.php */