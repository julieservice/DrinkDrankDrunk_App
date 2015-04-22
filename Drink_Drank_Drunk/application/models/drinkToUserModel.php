<?php

	class drinkToUserModel extends CI_Model {

		public function __construct() {
			parent::__construct();
			date_default_timezone_set('America/Toronto');
		}

		public function addDrinkToSession($id) {
			$user = $this->session->userdata('userid');

			$this->db->from('tbl_drinks');
			$this->db->where('drink_id = '.$id);
			$query = $this->db->get();
			$results = $query->row_array();
			
			$oz = $results['aamount_in_oz'];
			$totaloz = $results['quantity'];
			$title = $results['title'];

			$now = time();
			//$time = unix_to_human($now, TRUE, 'us');
			$datestring = "%h:%i %a"; //%H: = 24 hour time %i = minute
			$time = mdate($datestring);

			$this->db->select('(SELECT SUM(aamount_in_oz) FROM tbl_user_drink WHERE user_id = '.$user.') AS percent');
			$query = $this->db->get();
			$result = $query->row_array();

			$gender = $this->session->userdata('gender');
			$weight = $this->session->userdata('weight');
			$sessionAlcohol = $result['percent'];
			$totalAlcohol = $sessionAlcohol + $oz;

			$hours = 1;

			if ($gender == 'female'){
				$genderConstant = 0.66;
			}
			if ($gender == 'male'){
				$genderConstant = 0.73;
			}else{
				$genderConstant = 0.66;
			}

			$BAC = ((($totalAlcohol * 5.14) / ($weight * $genderConstant)) - ($hours * 0.015));
			$BAC = round($BAC * 100) / 100;
			if ($BAC <= 0){
				$BAC = 0;
			}

			$drink01 = array(
				'user_drink_id' => NULL,
				'user_id' => $user,
				'drink_id' => $id,
				'aamount_in_oz' => $oz,
				'quantity' => $totaloz,
				'title' => $title,
				'time' => $time,
				'CurrentBAC' => $BAC
			);

			$this->db->insert('tbl_user_drink', $drink01);
			
		}

		function deleteSessionDrinks(){
			$user = $this->session->userdata('userid');
			$this->db->delete('tbl_user_drink', array('user_id' => $user));
			return;


		}
	}


