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

		function getDrinksByType($typeid){
			$this->db->from('tbl_drinks, tbl_drinktype, tbl_drink_drinktype');
			$this->db->where('tbl_drink_drinktype.drinktype_id = tbl_drinktype.drinktype_id AND tbl_drink_drinktype.drink_id = tbl_drinks.drink_id AND tbl_drinktype.drinktype_id = '.$typeid);
			$drinkQuery = $this->db->get();
			return $drinkQuery->result_array();
		}

	}