<?php
	class carServiceModel extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		function getAllServices() {
			$this->db->from('tbl_carservices');
			$query = $this->db->get();
			return $query->result_array();
		}

		function getService($serviceid) {
			$this->db->from('tbl_carservices');
			$this->db->where('service_id = '.$serviceid);
			$query = $this->db->get();
			return $query->row_array();
		}

	}