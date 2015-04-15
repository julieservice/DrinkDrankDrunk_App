<?php


	class Register extends CI_Model{


		public function __construct(){
			parent::__construct();
		}

		public function register() {
			$checkuser = $this->input->post('uname');
			$check = $this->db->get_where('tbl_user', array('username' => $checkuser));

			if($check->num_rows() > 0) {
				return TRUE;
			}

			$user = array(
				'user_id' => NULL,
				'username' => $this->input->post('uname'),
				'password' => $this->input->post('password'),
				'name' => $this->input->post('name'),
				'weight' => $this->input->post('weight'),
				'height' => $this->input->post('height'),
				'gender' => $this->input->post('gender'),
				'age' => $this->input->post('age'),
				'email' => $this->input->post('email'),
			);

			$this->db->insert('tbl_user',$user);
		}
	}