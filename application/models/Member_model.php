<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends Base_model {

	function __construct() {
		parent::__construct();

	} 
	public function updateUserProfile($user_details, $user_id) {


		$this->db->set('first_name', $user_details['first_name'])
		->set('second_name', $user_details['second_name'])
		->set('address', $user_details['address'])
		->set('mobile', $user_details['mobile'])
		->set('zip_code', $user_details['zip_code'])
		->set('email', $user_details['email'])
		->set('city', $user_details['city'])
		// ->set('state', $user_details['state'])
		->set('country', $user_details['country'])
		->where('user_id',$user_id);

		if(array_key_exists('file_name',$user_details)){
			$this->db->set('user_photo', $user_details['file_name']);
		}if(array_key_exists('state',$user_details)){
			$this->db->set('state', $user_details['state']);
		}
		if(array_key_exists('facebook', $user_details)){
			$this->db->set('facebook', $user_details['facebook']);
		}if(array_key_exists('linked_in', $user_details)){
			$this->db->set('linked_in', $user_details['linked_in']);
		}if(array_key_exists('instagram', $user_details)){
			$this->db->set('instagram', $user_details['instagram']);
		}

		if(array_key_exists('twitter', $user_details)){
			$this->db->set('twitter', $user_details['twitter']);
		}

		$result = $this->db->update('user_info');
		$this->db->cache_delete('admin', 'member');
		$this->db->cache_delete('user', 'member');
		$this->db->cache_delete('admin', 'report');
		$this->db->cache_delete('user', 'report');
		
		return $result;    
	}
	public function updateSecurePin($new_pin, $user_id) {
		$res = $this->db->set('secure_pin', $new_pin)
		->where('user_id', $user_id)
		->limit(1)
		->update('user_info');
		
		$this->db->cache_delete('admin', 'member');
		$this->db->cache_delete('user', 'member');
		return $res;
	}

	public function getActivityHistory($user_id='',$limit='')
	{
		$activity = array(); 
		$this->db->select('ah.*, ui.user_name, CONCAT(ui.first_name, " ", ui.second_name) AS full_name')
		->from("activity_history ah")
		->join("user_info ui", 'ui.user_id=ah.done_by')
		->select('CONCAT(li.first_name, " ", li.second_name) AS full_name_to')
		->join("user_info li", 'li.user_id=ah.user_id','left')
		->order_by('ah.date','DESC');

		if($user_id)
			$this->db->where("ah.done_by", $user_id);
		if($limit)
			$this->db->limit($limit);
		$query = $this->db->get();
		foreach ($query->result_array() as $row) 
		{
			$activity[] = $row;
		}
		return $activity;

	}  
	

	public function updatePassword($new_psw, $user_id) {
		$res = $this->db->set('password', $new_psw)
		->where('user_id', $user_id)
		->limit(1)
		->update('user_info');
		$this->db->cache_delete('admin', 'member');
		$this->db->cache_delete('user', 'member');
		return $res;
	}

	public function updateStatus($post) {
		$res = $this->db->set('status', 'active')
		->where('user_id', $post)
		->limit(1)
		->update('user_info');
		$this->db->cache_delete('admin', 'member');
		$this->db->cache_delete('user', 'member');
		return $res;
	}

	public function updateStatusinactive($post) {
		$res = $this->db->set('status', 'inactive')
		->where('user_id', $post)
		->limit(1)
		->update('user_info');
		$this->db->cache_delete('admin', 'member');
		$this->db->cache_delete('user', 'member');
		return $res;
	}

	public function getPackageDetails($type, $package_id=''){

		$package_details = array();
		if($package_id){
			$this->db->where('package_id',$package_id);
		}

		$query = $this->db->select('*')
		->from('package_details')
		->order_by('sort_order')
		->where('type',$type)
		->where('status','active')
		->get();
		
		foreach($query->result_array() as $row){
			$row['enc_id'] = $this->encrypt_decrypt( 'encrypt' , $row['package_id'] );
			if($package_id){
				return $row;
			}
			$package_details[] = $row;
		}

		return $package_details;

	}

	public function insertUpgradeHistory($user_id, $package_id, $new_package_id, $payment_method, $package_amount, $date, $transactionid = '') {
		$this->db->set('user_id', $user_id)
		->set('old_package', $package_id)
		->set('new_package', $new_package_id)
		->set('method', $payment_method)
		->set('package_amount', $package_amount)
		->set('date', $date);
		if ($transactionid) {
			$this->db->set('transaction_id', $transactionid);
		}
		$result = $this->db->insert('package_upgrade_history');
		return $result;
	}

	public function upgradeUserPackage($user_id , $new_package_id){
		
		$result =$this->db->set('package_id',$new_package_id)
		->where('user_id',$user_id)
		->limit(1)
		->update('user_info');
		$this->db->cache_delete('admin', 'member');
		$this->db->cache_delete('user', 'member');
		$this->db->cache_delete('admin', 'dashboard');
		$this->db->cache_delete('user', 'dashboard');
		$this->db->cache_delete('admin', 'business');
		$this->db->cache_delete('user', 'business');
		$this->db->cache_delete('admin', 'report');
		$this->db->cache_delete('user', 'report');
		return $result;
	}

	public function getallstatus($data){
		$this->db->select('status')
		->from('user_info')
		->where('user_name',$data['username']);
		$query  = $this->db->get();
		foreach($query->result() as $row){
			$package_details = $row->status;
			
		}
		return $package_details;
	}

	public function getCountryCode($country_code)
	{
		$res=$this->db->select('phone_code')
		->where('country_id',$country_code)
		->from('countries')
		->get();

		foreach ($res->result() as $row) {
			$country_code=$row->phone_code;
		}
		return $country_code;
	}

	public function getAllStates($post_arr='' )
	{
		$this->db->select('state_id, state_title as text')
		->from('state');
		if($post_arr)
		{
			if(element('country_id',$post_arr))
				$this->db->where('country_id',$post_arr['country_id']);
			$this->db->where('status','Active');

			if(element('search',$post_arr))
				$this->db->like('state_title',$post_arr['search'], 'after');

		}

		$query = $this->db->get(); 
		$details = [];
		foreach($query->result_array() as $row){
			$details[]=['id'=>$row['state_id'],'text'=>$row['text']];
		} 
		return $details;

	}
	public function getKycPendingDetails($user_id="",$status='all',$not_status='') {
		$details = array();
		$this->db->select('ky.*,ui.user_name,ui.first_name as full_name');
		$this->db->from('kyc_approval as ky');
		$this->db->join('user_info as ui','ui.user_id=ky.user_id');
		if($user_id )
		{
			$this->db->where('ky.user_id', $user_id);  
		}
		if($status !='all')
		{
			$this->db->where('ky.status',$status); 
		}if($not_status)
		{
			$this->db->where('ky.status!=',$not_status); 
		}
		$query = $this->db->get();
		// echo this->db->
		foreach ($query->result_array() as $row) {
			$details[]= $row;
		}
		return $details;
	}
	public function insertKyc($user_id,$data)
	{
		$this->db->set('user_id',$user_id);
		$this->db->set('account_no',$data['account_no']);
		$this->db->set('userfile',$data['file_name']);
		$this->db->set('passbook',$data['passbook']);
		$this->db->set('account_name',$data['account_name']);
		$this->db->set('customer_name',$data['customer_full_name']);
		$this->db->set('ifsc',$data['ifsc']);
		$this->db->set('branch',$data['branch']);
		$this->db->set('aadhaar_no',$data['adhar_no']);
		$this->db->set('pan_no',$data['pan_no']);
		$this->db->set('status','pending');
		$this->db->set('added_date',date('Y-m-d H:i:s'));
		$result = $this->db->insert('kyc_approval');
		return $result;
	}
	public function getKycApproval($id="") {
		$details = array();
		$this->db->select('*');
		$this->db->from('kyc_approval');
		$this->db->where('status','approved');

		if ($id) {
			$this->db->where('user_id',$id);
			$this->db->limit('1');
		}

		$query  = $this->db->get();
        // echo $this->db->last_query();die();

		foreach($query->result_array() as $row){
			$row['user_name']=$this->Base_model->getUserName($row['user_id']);
			if ($id) {
				return $row;
			}
			$details[] = $row;
		}
		return $details;
	}
	public function getKycDetails($id="") {
		$details = array();
		$this->db->select('*');
		$this->db->from('kyc_approval');
		$this->db->where('status','pending');

		if ($id) {
			$this->db->where('id',$id);
			$this->db->limit('1');
		}

		$query  = $this->db->get();
        // echo $this->db->last_query();die();

		foreach($query->result_array() as $row){
			$row['user_name']=$this->Base_model->getUserName($row['user_id']);
			$row['customer_fullname']=$row['customer_name'];
			if ($id) {
				return $row;
			}
			$details[] = $row;
		}
		return $details;
	}
	function getPendingKycDetails($id,$status) 
	{
		$date = date('Y-m-d');
		$this->db->set('status',$status);
		$this->db->set('updated_date',$date);
		$this->db->where('id',$id);
		$res = $this->db->update('kyc_approval');
		return $res;
	}  
	public function UpdateKycDetailsUserInfo($user_id,$user_details)
	{
	// print_r($user_details);die();
		if(array_key_exists('ifsc', $user_details)){
			$this->db->set('ifsc', $user_details['ifsc']);
		} if(array_key_exists('account_no', $user_details)){
			$this->db->set('account_no', $user_details['account_no']);
		}if(array_key_exists('account_name', $user_details)){
			$this->db->set('account_name', $user_details['account_name']);
		}
		
		if(array_key_exists('branch', $user_details)){
			$this->db->set('branch', $user_details['branch']);
		}

		if(array_key_exists('pan_no', $user_details)){
			$this->db->set('pan_no', $user_details['pan_no']);
		}
		if(array_key_exists('userfile', $user_details)){
			$this->db->set('pan_card', $user_details['userfile']);
		}   if(array_key_exists('aadhaar_no', $user_details)){
			$this->db->set('aadhaar_no', $user_details['aadhaar_no']);
		} 
		if(array_key_exists('passbook', $user_details)){
			$this->db->set('passbook', $user_details['passbook']);
		}
		$this->db->where('user_id',$user_id);
		$result = $this->db->update('user_info');
		return $result;

	}
	public function updateKycStatusUserinfo($user_id){

		$this->db->set('kyc_status', '1');
		$this->db->where('user_id' , $user_id);
		$this->db->limit(1);
		$result = $this->db->update('user_info');
		return $result;

	}
	public function getKycCount()
	{
		$this->db->select('id');
		$this->db->from('kyc_approval');
		$count = $this->db->count_all_results();
		return $count;
	}
	public function getKYCDetailsAjax($search_arr=[], $count = 0) {
		$details = array();
		$this->db->select('ky.*,ui.user_name,ui.first_name as full_name');
		$this->db->from('kyc_approval as ky');
		$this->db->join('user_info as li','ky.user_id=li.user_id');
		$this->db->join('user_info as ui','ky.user_id=ui.user_id');
		if(element('status',$search_arr))
		{
			if(element('status',$search_arr)!='all'){
				$this->db->where('ky.status',$search_arr['status']);
			}else{
				$this->db->where('ky.status','pending');
			}
		}else{
			$this->db->where('ky.status','pending');
		}
		if(element('id',$search_arr))
		{
			$this->db->where('ky.id',$search_arr['id']);
			$this->db->limit(1);
		}
		if($count) {
			return $this->db->count_all_results();
		}

		$query  = $this->db->get();
		$i=1;

		foreach($query->result_array() as $row){
			$row['index'] =$search_arr['start']+$i;

			$row['customer_fullname']=$row['customer_name'];

			$details[] = $row;
			$i++;

			if (element('id',$search_arr))
			{
				return $row;
			}
		}
		return $details;
	}
}
