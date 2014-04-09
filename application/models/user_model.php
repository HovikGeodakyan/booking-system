<?php
	class User_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function load_users(){
			$query = $this->db->query('SELECT * FROM users');
			$query = $query->result_array();
			$users=array();
			foreach ($query as $row) {
				$u=array();
				$u['user_id'] = $row['id'];
				$u['user_name'] = $row['username'];
				$u['user_real_name'] = $row['realname'];
				$u['user_email'] = $row['email'];
				$u['user_time'] = $row['last-login'];
				$u['user_if_active'] = $row['active'];
				switch($row['role']){
					case 1: $role="SuperAdmin";    break;
					case 2: $role="Admin";   break;
					case 3: $role="Manager"; break;
					case 4: $role="Waiter";  break;
					case 5: $role="User";    break;
					case 6: $role="Guest";  break;
				}
				$u['user_role'] = $role;
				$users[] = $u;
			}
			return $users;
		}

		public function load_one_user($id){
			$query = $this->db->query('SELECT * FROM users WHERE id="'.$id.'"');
			$row = $query->row_array();

			$u=array();
			$u['user_id'] = $row['id'];
			$u['user_name'] = $row['username'];
			$u['user_real_name'] = $row['realname'];
			$u['user_email'] = $row['email'];
			$u['user_time'] = $row['last-login'];
			$u['user_if_active'] = $row['active'];
			switch($row['role']){
				case 1: $role="SuperAdmin";    break;
				case 2: $role="Admin";   break;
				case 3: $role="Manager"; break;
				case 4: $role="Waiter";  break;
				case 5: $role="User";    break;
				case 6: $role="Guest";  break;
			}
			$u['user_role'] = $role;

			return $u;
		}
	}
?>