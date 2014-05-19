<?php
class General_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function read() {
		$query = $this->db->query('SELECT * FROM general_settings');
		$query = $query->row_array();
		return $query; 
	}

	public function update() {

		if (isset($_FILES['logo']) && is_uploaded_file($_FILES['logo']['tmp_name'])) {
			$upload = $this->upload_logo("logo");

			$res = array();
			if(isset($upload['error'])) {
				$res['message'] = $upload['error'];
				$res['status'] = 'error';
				$res['class'] = 'alert alert-danger';
			} else {
				$res['message'] = "Succesfully changed.";
				$res['status'] = 'success';
				$res['class'] = 'alert alert-success';
				$this->db->set('logo', $upload['upload_data']['file_name']);
				$this->db->update('general_settings');
			}
		}
		return $res;

	}

	public function upload_logo($file) {
		$config['upload_path'] = LOGOPATH;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1000';
		$config['max_width']  = '500';
		$config['max_height']  = '500';

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload($file))
		{
			$error = array('error' => $this->upload->display_errors());
			return $error;
		}
		else
		{
			$file_data = array('upload_data' => $this->upload->data());

			return $file_data;
		}
	}
}

?>