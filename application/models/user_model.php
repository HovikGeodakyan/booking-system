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
				$u['user_avatar'] = $row['avatar'];
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
			$u['user_avatar'] = $row['avatar'];

			return $u;
		}


		public function create_user() {
			if($_POST['user_password']==$_POST['user_re_password']) {
				$data = array(
					'username' => $_POST['user_name'],
					'realname' => ucfirst($_POST['user_real_name']),
					'email'    => $_POST['user_email'],
					'active'   => $_POST['user_if_active'],
					'role'     => $_POST['user_role'],
					'created'  => date('Y-m-d H:i:s'),
					'modified' => date('Y-m-d H:i:s'),
					'password' => md5($_POST['user_password']),
					'language' => $_POST['user_language'],
					'avatar'   => "a0.png"
				);
				$this->db->insert('users', $data);
			}
		}


		public function update_user($id, $data) {
			if($data['password'] == $data['re_password']) {
				unset($data['re_password']);
				$data['password'] = md5($data['password'] );

				if (isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name'])) {
					$upload = $this->upload_avatar("avatar");
				} else {
					$upload['upload_data']['file_name'] = $this->session->userdata('avatar');
				}

				if(isset($upload['error'])) {
					return $upload['error'];
				} else {
					var_dump($upload);
					$data['avatar'] = $upload['upload_data']['file_name'];
					$this->db->where('id', $id);
					$this->db->update('users', $data);

					if($id === $this->session->userdata("user_id")) {
						$this->update_session($data);
					}

					return "Succesfully updated.";
				}


			}
		}


		public function delete_user($id) {
			$this->db->set('deleted', 1);
			$this->db->where('id', $id);
			$this->db->update('users');
		}

		public function upload_avatar($file) {
			$config['upload_path'] = AVATARPATH;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

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

		public function update_session($newData) {
			$newUserData = $this->session->all_userdata();
			$newUserData['user_name'] = $newData["username"];
			$newUserData['user_email'] = $newData["email"];
			$newUserData['user_language'] = $newData["language"];
			$newUserData['user_real_name'] = $newData["realname"];
			$newUserData['user_avatar'] = $newData["avatar"];
			$this->session->set_userdata($newUserData);
		}
	}
?>