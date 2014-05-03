<?php
class Register_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function register_user() {
		if($_POST['password']==$_POST['re_password']) {

				$data = array(
					'username' => $_POST['username'],
					'realname' => ucfirst($_POST['realname']),
					'email'    => $_POST['email'],
					'active'   => 1,
					'role'     => 1,
					'created'  => date('Y-m-d H:i:s'),
					'modified' => date('Y-m-d H:i:s'),
					'password' => md5($_POST['password']),
					'language' => $_POST['language'],
					'avatar'   => "a0.png"
				);
				$this->db->insert('users', $data);
				$id = $this->db->insert_id();

				$newdata = array(
					'user_id'  => $id,
					'user_name'=> $data["username"],
					'logged_in'=> TRUE,
					'user_role'=> $data['role'],
					'user_email'=> $data['email'],
					'user_phone'=> $data['phone'],
					'user_language'=> $data['language'],
					'user_real_name'=> $data['realname'],
					'user_avatar'=> $data['avatar']
				);
				
				$this->session->set_userdata($newdata);
			}
	}
	
}

?>