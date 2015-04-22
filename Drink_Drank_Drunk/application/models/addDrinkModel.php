<?php


	class addDrinkModel extends CI_Model{


		public function __construct(){
			parent::__construct();
		}

		public function addOtherDrink() {
			$user = $this->session->userdata('userid');
			
			$type_id = $this->input->post('type');
			$ml = $this->input->post('quantity');
			$percent = $this->input->post('apercent');

			$oz = round($ml/29.5735296875, 1);
			$alcoholOz = ($percent/100) * $oz;

			$now = time();
			//$time = unix_to_human($now, TRUE, 'us');
			$datestring = "%h:%i %a"; //%H: = 24 hour time %i = minute
			$time = mdate($datestring);
		
			$drink = array(
				'drink_id' => NULL,
				'title' => $this->input->post('dname'),
				'alcohol_percent' => $this->input->post('apercent'),
				'quantity' => $oz,
				'aamount_in_oz' => $alcoholOz
			);

			$this->db->insert('tbl_drinks',$drink);
			$addeddrink_id = $this->db->insert_id();

			$drink_drinktype = array(
				'drink_drinktype_id' => NULL,
				'drink_id' => $addeddrink_id,
				'drinktype_id' => $type_id
			);
			
			$this->db->insert('tbl_drink_drinktype',$drink_drinktype);

			$this->db->select('(SELECT SUM(aamount_in_oz) FROM tbl_user_drink WHERE user_id = '.$user.') AS percent');
			$query = $this->db->get();
			$result = $query->row_array();

			$gender = $this->session->userdata('gender');
			$weight = $this->session->userdata('weight');
			$sessionAlcohol = $result['percent'];
			$totalAlcohol = $sessionAlcohol + $alcoholOz;
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
			$BAC = round($BAC * 1000) / 1000;
			if ($BAC <= 0){
				$BAC = 0;
			}

			$drink01 = array(
				'user_drink_id' => NULL,
				'user_id' => $user,
				'drink_id' => $addeddrink_id,
				'aamount_in_oz' => $alcoholOz,
				'quantity' => $oz,
				'title' => $this->input->post('dname'),
				'time' => $time,
				'CurrentBAC' => $BAC
			);

			$this->db->insert('tbl_user_drink', $drink01);	
		}
	} 