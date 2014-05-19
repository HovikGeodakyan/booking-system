<?php
	class Email_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function read(){
			$query = $this->db->query('SELECT * FROM email');
			$query = $query->result_array();
			$emails = array();
			foreach ($query as $key => $value) {
				$emails [$value['language']] = $value;
			}
			return $emails;

		}

		public function update($data) {
			$data['text'] = $this->db->escape_str($data['text']);
			$data['treatment'] = $this->db->escape_str($data['treatment']);
			$data['ps'] = $this->db->escape_str($data['ps']);
			$data['subject'] = $this->db->escape_str($data['subject']);
			$query = $this->db->query("INSERT INTO email (treatment, subject, text, ps, language) VALUES ('".$data['treatment']."', '".$data['subject']."', '".$data['text']."', '".$data['ps']."', '".$data['language']."')  ON DUPLICATE KEY UPDATE treatment=VALUES(treatment), subject=VALUES(subject), text=VALUES(text), ps=VALUES(ps), language=VALUES(language)");
			$query = $query->result_array();
		}
	}
?>