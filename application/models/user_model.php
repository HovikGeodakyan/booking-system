<?php
	class User_model extends CI_Model {


		public function __construct() {
			parent::__construct();
		}


		public function load_users() {
			$query = $this->db->query('SELECT * FROM users WHERE deleted=0');
			$query = $query->result_array();
			$users=array();
			foreach ($query as $row) {
				$u=array();
				$u['user_id'] = $row['id'];
				$u['user_name'] = $row['username'];
				$u['user_real_name'] = $row['realname'];
				$u['user_email'] = $row['email'];
				$u['user_last_login'] = $row['last-login'];
				$u['user_if_active'] = $row['active'];
				$u['user_role'] = $row['role'];
				$u['user_modified'] = $row['modified'];
				$users[] = $u;
			}
			return $users;
		}


		public function load_one_user($id) {
			$query = $this->db->query('SELECT * FROM users WHERE deleted=0 AND id="'.$id.'"');
			$row = $query->row_array();

			$u=array();
			$u['user_id'] = $row['id'];
			$u['user_name'] = $row['username'];
			$u['user_real_name'] = $row['realname'];
			$u['user_email'] = $row['email'];
			$u['user_last_login'] = $row['last-login'];
			$u['user_if_active'] = $row['active'];
			$u['user_role'] = $row['role'];
			$u['user_language'] = $row['language'];

			return $u;
		}


		public function create_user() {
			if($_POST['user_password']==$_POST['user_re_password']){

				$data = array(
					'username' => $_POST['user_name'],
					'realname' => ucfirst($_POST['user_real_name']),
					'email'    => $_POST['user_email'],
					'active'   => $_POST['user_if_active'],
					'role'     => $_POST['user_role'],
					'created'  => date('Y-m-d H:i:s'),
					'modified' => date('Y-m-d H:i:s'),
					'password' => md5($_POST['user_password']),
					'language' => $_POST['user_language']
				);
				$this->db->insert('users', $data);
			}
		}


		public function update_user($id) {

			if($_POST['user_password']==$_POST['user_re_password']) {
				$this->db->set('username',         $_POST['user_name']);
				$this->db->set('realname',         ucfirst($_POST['user_real_name']));
				$this->db->set('email',            $_POST['user_email']);
				$this->db->set('active',           $_POST['user_if_active']);
				$this->db->set('role',             $_POST['user_role']);
				$this->db->set('modified',         date('Y-m-d H:i:s'));
				$this->db->set('password',         md5($_POST['user_password']));
				$this->db->set('language',         $_POST['user_language']);
				$this->db->where('id', $id);
				$this->db->update('users');
			}
		}


		public function delete_user($id) {
			$this->db->set('deleted', 1);
			$this->db->where('id', $id);
			$this->db->update('users');
		}
	}
?>