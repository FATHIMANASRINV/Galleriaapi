<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Truncate_model extends Base_model {
	
	function __construct()
	{
		parent::__construct();
		
	}

	public function truncateAll(){
		$return_arr = array();
		// $admin_id = log_user_id();
		$admin_id = $this->Base_model->getAdminId();
		$admin_details = $this->getUserDetail($admin_id);
		
		$dbprefix = $this->db->dbprefix;
		$name = $this->db->database;
		$table_list = $this->db->list_tables(); 

		$exceptions = [
			'amount_type', 
			'category', 
			'countries', 
			'currency', 
			'language',
			'level_commission',
			'mail_contents', 
			'menu', 
			'package_details', 
			'product_details', 
			'product_images', 
			'rank_details', 
			'settings', 
			'site_info',
			'state',
			'support_priority',
			'support_status',
			'support_topic',
			'admin_wallet_details',
		];

		$admin_details['date_of_joining'] = date("Y-m-d H:i:s");
		$admin_details['left_father'] = 1;
		$admin_details['right_father'] = 2;
		$admin_details['left_sponsor'] = 1;
		$admin_details['right_sponsor'] = 2;
		$admin_details['referral_count'] = 0;
		$admin_details['rank_id'] = 0;

		foreach ($table_list as $key => $table) { 
			if( !in_array( $dbprefix.$table, $exceptions) )
			{
				$this->db->truncate($table);
			} 

			$user_info = $dbprefix.'user_info';
			if($table == $user_info)
			{ 
				$this->db->query("ALTER TABLE ".$user_info." AUTO_INCREMENT = $admin_id");	

				$insert_ud = $this->db->insert('user_info', $admin_details);
				if(!$insert_ud)
				{
					$return_arr['status'] = FALSE;
					$return_arr['message'] = lang('user_info_insertion_failed');
					return $return_arr;
				}
			} 
			
			if($table == $dbprefix."tools")
			{ 

				$events = [
					[
						'title' => "Welcome To Our World..!!",
						'content' => "This is the good time to start a business.. we are with you",
						'start_date' => $admin_details['date_of_joining'],
						'end_date' => date("Y-m-d H:i:s", strtotime($admin_details['date_of_joining']." +1 days")),
						'location'=> 'Dubai',
						'address'=> 'B2 Builiding, Business Park, Duabi',
						'type' => 'events',
					],
					[
						'title' => "User Signup is started",
						'content' => "Good News, we are offically started the Signup",
						'start_date' => date("Y-m-d H:i:s", strtotime($admin_details['date_of_joining']." +1 days")),
						'end_date' => date("Y-m-d H:i:s", strtotime($admin_details['date_of_joining']." +10 days")),
						'location'=> 'Dubai',
						'address'=> 'B2 Builiding, Business Park, Duabi',
						'type' => 'events',
					],
					[
						'title' => "Weekly payout",
						'content' => "Payout will be processed on weekend days, probably Sunday",
						'start_date' => date("Y-m-d H:i:s", strtotime($admin_details['date_of_joining']." +1 days")),
						'end_date' => date("Y-m-d H:i:s", strtotime($admin_details['date_of_joining']." +1 days")),
						'location'=> 'Dubai',
						'address'=> 'B2 Builiding, Business Park, Duabi',
						'type' => 'events',
					],
					[
						'title' => "Bo",
						'content' => "Payout will be processed on weekend days, probably Sunday",
						'start_date' => date("Y-m-d H:i:s", strtotime($admin_details['date_of_joining']." +1 days")),
						'end_date' => date("Y-m-d H:i:s", strtotime($admin_details['date_of_joining']." +1 days")),
						'location'=> 'Dubai',
						'address'=> 'B2 Builiding, Business Park, Duabi',
						'type' => 'events',
					],
				];
  
				$events = $this->db->insert_batch($table, $events);	
			} 

			if($table == $dbprefix."user_wallet")
			{
				$user_wallet_data = array(
					"user_id" => $admin_id
				);
				$insert_user_wallet = $this->db->insert("user_wallet", $user_wallet_data);
			}
			if($table == $dbprefix."monoline_structure")
			{
				$user_wallet_data = array(
					"user_id" => $admin_id
				);
				$insert_user_wallet = $this->db->insert("monoline_structure", $user_wallet_data);
			}  
		}

		$return_arr['status'] = TRUE;
		$return_arr['message'] = "Truncate done successfully...";
		return $return_arr;
	}
	function getUserDetail($user_id) {
		$user_details = array();
		$this->db->select("*");
		$this->db->from('user_info');
		$this->db->where('user_id', $user_id);
		$res = $this->db->get();
		foreach ($res->result_array() as $row) {
			$user_details = $row;
		}
		return $user_details;
	}


}
