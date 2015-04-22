<?php


	class graphModel extends CI_Model{


		public function __construct(){
			parent::__construct();
		}

		function getBacTime($str){
			$user = $this->session->userdata('userid');

			$this->db->select('time, CurrentBAC FROM tbl_user_drink WHERE user_id = '.$user);
			$query = $this->db->get();
			return $query->result_array();
		}
	}


