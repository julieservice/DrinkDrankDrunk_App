<?php
	class drinksModel extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		function getAllTypes() {
			$this->db->from('tbl_drinktype');
			$query = $this->db->get();
			return $query->result_array();
		}

		function getType($typeid) {
			$this->db->from('tbl_drinktype');
			$this->db->where('drinktype_id = '.$typeid);
			$query = $this->db->get();
			return $query->row_array();
		}

		function getDrinksByType($typeid){
			$this->db->from('tbl_drinks, tbl_drinktype, tbl_drink_drinktype');
			$this->db->where('tbl_drink_drinktype.drinktype_id = tbl_drinktype.drinktype_id AND tbl_drink_drinktype.drink_id = tbl_drinks.drink_id AND tbl_drinktype.drinktype_id = '.$typeid);
			$drinkQuery = $this->db->get();
			return $drinkQuery->result_array();
		}

		function getSessionAlcoholPercent() {
			$user = $this->session->userdata('userid');

			$this->db->select('(SELECT SUM(aamount_in_oz) FROM tbl_user_drink WHERE user_id = '.$user.') AS percent');
			$query = $this->db->get();
			return $query->row_array();
		}

		function getSessionOunces() {
			$user = $this->session->userdata('userid');

			$this->db->select('(SELECT SUM(quantity) FROM tbl_user_drink WHERE user_id = '.$user.') AS oz');
			$query = $this->db->get();
			return $query->row_array();
		}
		function getDrinkInfo() {
			$user = $this->session->userdata('userid');
			$this->db->from('tbl_user_drink');
			$this->db->where('user_id = '.$user);
			$query = $this->db->get();
			return $query->result_array();
		}

		function getBAC() {
			$user = $this->session->userdata('userid');

			$this->db->from('tbl_user_drink');
			$this->db->where('user_id = '.$user);
			$query = $this->db->get();
			return $query->result_array();
		}

	}