<?php
	class userInfoModel extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		function getInfo($id) {
			$this->db->from('tbl_user');
			$this->db->where('user_id = '.$id);
			$query = $this->db->get();
			return $query->row_array();
		}


	}