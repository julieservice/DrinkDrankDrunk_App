<?php

	class Login extends CI_Model{

		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function login(){
			
			$loguser = array(
				'username'=>$this->input->post('username'),
				'password'=>$this->input->post('password')
			);
			//getting username and password from tbl_user in an array
			$query = $this->db->get_where('tbl_user', array(
				'username'=>$loguser['username'],
				'password'=>$loguser['password']
			));

			if($query->num_rows() == 0){
				return FALSE;
			}else{
				return $query->row_array();
			}
		}
		//session
		public function session($user = NULL){
			if(!$user == NULL) {
				session_start();
				$this->db->from('tbl_user');
				$this->db->where('tbl_user.user_id = '.$user['user_id']);
				$query = $this->db->get();
				$results = $query->row_array();

				$userdata = array(
					'userid' => $results['user_id'],
					'name' => $results['name'],
					'username' => $results['username'],
					'password' => $results['password'],
				);

				$this->session->set_userdata($userdata);

				return;
			} else {
				return;
			}
		}


	}