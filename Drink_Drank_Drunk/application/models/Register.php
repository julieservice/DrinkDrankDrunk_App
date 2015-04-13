<?php


	class Register extends CI_Model{


		public function __construct(){
			parent::__construct();
		}

		public function register() {
			$checkuser = $this->input->post('username');
			$check = $this->db->get_where('tbl_user',array('username'=>$checkuser));
			if($check->num_rows() > 0){return "exist";}
			$user = array(
				'user_id' => NULL,
				'name' => $this->input->post('name'),
				'age' => $this->input->post('age'),
				'gender' => $this->input->post('gender'),
				'weight' => $this->input->post('weight'),
				'height' => $this->input->post('height'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email'),
				
			);
			$this->db->insert('tbl_user',$user);
		}
	}