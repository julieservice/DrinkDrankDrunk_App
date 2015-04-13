<?php


	class addDrinkModel extends CI_Model{


		public function __construct(){
			parent::__construct();
		}

		public function addOtherDrink() {
			
			$type_id = $this->input->post('type');
		
			$drink = array(
				'drink_id' => NULL,
				'title' => $this->input->post('dname'),
				'alcohol_percent' => $this->input->post('apercent'),
				'quantity' => $this->input->post('quantity')
			);

			$this->db->insert('tbl_drinks',$drink);
			$addeddrink_id = $this->db->insert_id();

			$drink_drinktype = array(
				'drink_drinktype_id' => NULL,
				'drink_id' => $addeddrink_id,
				'drinktype_id' => $type_id
			);
			
			$this->db->insert('tbl_drink_drinktype',$drink_drinktype);
		}
	} 