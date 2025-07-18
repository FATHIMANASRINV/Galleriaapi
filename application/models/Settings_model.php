<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends Base_model {

	function __construct() {
		parent::__construct();
		// $this->db->cache_delete('admin', 'settings');

	}
	public function getSiteInfoDetails()
	{
		$details = array();
		$this->db->select('si.*')
		->select('def_language.name def_language_name')
		->select('log_language.name log_language_name')
		->from('site_info as si')
		->join('language as def_language','def_language.language_id = si.default_lang')
		->join('language as log_language','log_language.language_id = si.login_lang');
		$query = $this->db->get();
		foreach($query->result_array() as $row)
		{
			$details = $row;
		}
		return $details;
	} 

	function updateSiteInfo($data) 
	{
		$res = $this->db->set('name',$data['name'])
		->set('email',$data['email'])
		->set('phone',$data['phone'])
		->set('address',$data['address']) 
		->set('logo', $data['file_name'])
		->set('favicon', $data['fav'])
		->set('facebook',$data['facebook'])
		->set('twitter',$data['twitter'])
		->set('time_zone',$data['time_zone'])
		->update('site_info');
		$this->db->cache_delete('admin', 'settings');
		return $res;
	}  
	public function getPackageDetails($package_id = '', $status='active',$type=''){

		$package_details = array();
		$this->db->select('*')
		->from('package_details')
		->order_by('sort_order');
		if($status != 'all'){
			$this->db->where('status' , $status);
		}
		if($type)
		{
			$this->db->where('type' , $type);
		}
		if($package_id){
			$this->db->where('package_id' , $package_id);
		}
		$query  = $this->db->get();
		foreach($query->result_array() as $row){

			$row['pack_id'] = $row['package_id'];
			$row['enc_id'] = $this->encrypt_decrypt( 'encrypt' ,$row['package_id']);
			if($package_id){ 
				return $row;
			}else{
				$package_details[] = $row;
			}
		}
		return $package_details;

	}

	function updatePlan($key,$value) 
	{
		$this->db->set('value',$value)
		->where('key',$key);
		$res = $this->db->update('settings');
		$this->db->cache_delete('admin', 'settings');
		return $res;
	}
	function updatePackageDetails($data,$package_id) 
	{
		
		$this->db->set('name',$data['package_name'])
		// ->set('status',$data['status'])
		->set('amount',$data['amount']);
		// ->set('type',$data['type'])
		// ->set('roi',$data['roi'])
		// ->set('sort_order',$data['sort_order']);
		if(element('description',$data)){
			$this->db->set('description',$data['description']);
		}
		else{
			$this->db->set('description','');
		}
		
		$this->db->where('package_id',$package_id);
		$res = $this->db->update('package_details');
		$this->db->cache_delete('admin', 'settings');
		// echo $this->db->last_query();die();
		return $res;
	}
	public function insertPackageDetails($data){
		$date = date('y-m-d');
		$this->db->set('name',$data['package_name'])
		->set('status',$data['status'])
		->set('amount',$data['amount'])
		->set('type',$data['type'])
		->set('roi',$data['roi'])
		->set('sort_order',$data['sort_order'])
		->set('date',$date);
		$result = $this->db->insert('package_details');
		$this->db->cache_delete('admin', 'settings');
		return $result; 
	}

	public function getAllUsers($post_arr=[], $limit=20 )
	{ 
		$details = array();

		if(element('term',$post_arr))
			$this->db->like("user_name", $post_arr['term'], "after");

		$query = $this->db->select("user_name text, user_id id")
		->from("user_info")
		->limit($limit)
		->order_by("user_name",'ASC')
		->get();

		foreach ($query->result_array() as $row) {
			$details[]=$row;
		}

		return $details;

	}
	
	public function getEmailContents($id = '',$type=''){

		$mail_contents = array();
		$this->db->select('*')
		->from('mail_contents')
		->order_by('status');

		if($id){
			$this->db->where('id' , $id);
		}
		if($type){
			$this->db->where('type' , $type);
		}
		$query  = $this->db->get();
		foreach($query->result_array() as $row){

			$row['id'] = $row['id'];
			$row['enc_id'] = $this->encrypt_decrypt( 'encrypt' ,$row['id']);
			if($id || $type){ 
				return $row;
			}else{
				$mail_contents[] = $row;
			}
		}
		return $mail_contents;

	}


	public function getPrivacyEmailContents($id = '',$type=''){

		$mail_contents = array();
		$this->db->select('*')
		->from('privacy_policy')
		->order_by('status');

		if($id){
			$this->db->where('id' , $id);
		}
		if($type){
			$this->db->where('type' , $type);
		}
		$query  = $this->db->get();
		foreach($query->result_array() as $row){

			$row['id'] = $row['id'];
			$row['enc_id'] = $this->encrypt_decrypt( 'encrypt' ,$row['id']);
			if($id || $type){ 
				return $row;
			}else{
				$mail_contents[] = $row;
			}
		}
		return $mail_contents;

	}


	function updateEmailContents($data,$id) 
	{

		$this->db->set('type',$data['type'])
		->set('content',$data['content'])
		->set('date',date('Y-m-d H:i:s'))
		->where('id',$id);
		$res = $this->db->update('mail_contents');
		$this->db->cache_delete('admin', 'settings');

		return $res;
	}

	// function updatePrivacyEmailContents($data,$id) 
	// {

	// 	$this->db->set('type',$data['type'])
	// 	->set('content',$data['content'])
	// 	->set('date',date('Y-m-d H:i:s'))
	// 	->where('id',$id);
	// 	$res = $this->db->update('privacy_policy');

	// 	return $res;
	// }

	public function insertEmailContents($data){
		$date = date('y-m-d');
		$this->db->set('type',$data['type'])
		->set('status',0)
		->set('content',$data['content'])
		->set('date',$date);
		$result = $this->db->insert('mail_contents');
		$this->db->cache_delete('admin', 'settings');
		return $result; 
	}

	function deleteEmailContents($id,$status) 
	{

		$this->db->set('status',$status)
		->set('date',date('Y-m-d H:i:s'))
		->where('id',$id);
		$res = $this->db->update('mail_contents');
		$this->db->cache_delete('admin', 'settings');
		return $res;
	}

	public function getlevelDetails($id='') {

		$details = array();
		$this->db->select('*');
		$this->db->from("level_commission");
		if($id)
		{
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		foreach ($query->result_array() as $row) {
			if($id)
			{
				$details = $row;
				return $details;
			}
			$details[$row['id']] = $row;
		}
		return $details;
	}

	function updatelevelDetails($post_arr) 
	{
		$level=array();
		foreach($post_arr as $level_no=>$amount)
		{	
			$level1['id']=$level_no;
			$level1['level_no']=$level_no;
			$level1['level_commission']=$amount;
			$level[] = $level1;
		}
		$res = $this->db->update_batch('level_commission', $level, 'id');
		return $res;
	}  

	public function getRankDetails($rank_id = '', $status='yes'){

		$rank_details = array();
		$this->db->select('*')
		->from('rank_details');
		if($status != 'all'){
			$this->db->where('status' , $status);
		}

		if($rank_id){
			$this->db->where('rank_id' , $rank_id);
		}
		$query  = $this->db->get();
	// echo $this->db->last_query($query);die();
		foreach($query->result_array() as $row){

			$row['rank_id'] = $row['rank_id'];
			$row['enc_id'] = $this->encrypt_decrypt( 'encrypt' ,$row['rank_id']);
			if($rank_id){ 
				return $row;
			}else{
				$rank_details[] = $row;
			}
		}
		return $rank_details;

	}
	function updateRankDetails($data,$rank_id) 
	{
		$this->db->set('name',$data['rank_name'])
		->set('referral_count',$data['referral_count'])
		->set('bonus',$data['bonus'])
		->set('status',$data['status'])
		->where('rank_id',$rank_id);
		$res = $this->db->update('rank_details');
		$this->db->cache_delete('admin', 'settings');
		return $res;
	}
	public function insertRankDetails($data){
		$this->db->set('name',$data['rank_name'])
		->set('referral_count',$data['referral_count'])
		->set('bonus',$data['bonus'])
		->set('status',$data['status']);
		$result = $this->db->insert('rank_details');
		$this->db->cache_delete('admin', 'settings');
		return $result; 
	}
	public function getAllUsersName($post_arr='' )
	{
		$this->db->select('user_name as id,user_name as text')
		->from('login_info')
		->where('user_type !=','admin');
		if($post_arr)
		{
			if(element('term',$post_arr))
				$this->db->where("user_name LIKE '{$post_arr['term']}%'");

		}
		$query = $this->db->get(); 
		$details = [];
		// echo $this->db->last_qury();die();
		foreach($query->result_array() as $row){
			$details[]=$row;
		} 
		return $details;

	}
	function getPlan($key) 
	{
		$this->db->select('key,value');
		$this->db->where('key',$key);
		$query = $this->db->get('settings');
        // echo $this->db->last_query();die();
		foreach($query->result() as $row){
			$value = $row->value;
		}
		return $value;

	}
	function insertevoucherDetails($user_id,$date,$e_voucher_code='',$status) 
	{

		$this->db->set('user_id', $user_id);
		$this->db->set('date', $date);
		$this->db->set('e_voucher_code', $e_voucher_code);
		$this->db->set('status', $status);
		$res = $this->db->insert('evoucher_details');
		return $res;
	} 
	
	public function getUserLeftAndRight($user_id, $type) {
		$this->db->select("left_$type, right_$type");
		$this->db->where('user_id', $user_id);
		$result = $this->db->get('user_info');
		$result = $result->result_array();
		return $result[0];
	}

	public function updateMaintanMode($post_arr){
		// print_r($post_arr);die();

		$this->db->set('maintenance_mode' , $post_arr['main_mode']);
		$this->db->set('maintenance_mode_text' , $post_arr['title']);
		$this->db->limit(1);
		$result = $this->db->update('site_info');
		$this->db->cache_delete('admin', 'settings');
		// echo $this->db->last_query();die();
		return $result;
	}
	public function getBalanceSheetDetails($post_arr=[])
	{
		$details=[];
		$this->db->select('*');
		$this->db->from('package_details');
		$this->db->where('package_id>',0);
		$res=$this->db->get();
		// echo $this->db->last_query();die();	
		$transaction_fee = value_by_key('transaction_fee');

		foreach($res->result_array() as $row)
		{

			// $row['admin_fee']=$row['total_income']*3/100;
			$row['transaction_fee']=$row['payout']*$transaction_fee/100;
			$row['current_balance']=$this->getCurrentBalance($row['package_id']);
			$row['pending_amount']=$this->getPendingWalletAmount($row['package_id']);
			$row['earned_commission']=$this->getTotalCommission($row['package_id']);
			$details[]=$row;
		}
		return $details;
	}
	public function getCurrentBalance($package_id) {

		$sum = 0;
		$this->db->select('SUM(wallet) as total');
		$this->db->from('user_wallet uw');
		$this->db->join('user_info li','li.user_id=uw.user_id');
		$this->db->where('li.package_id',$package_id);
		$res = $this->db->get();
		if($res->row()) {
			$sum = $res->row()->total;
		}

		return $sum;

	}
	public function getPendingWalletAmount($package_id) {

		$sum = 0;
		$this->db->select('SUM(amount) as total');
		$this->db->where('uw.status','pending');
		$this->db->from('payout_requests uw');
		$this->db->join('user_info li','li.user_id=uw.user_id');
		$this->db->where('li.package_id',$package_id);
		$res = $this->db->get();
		if($res->row()) {
			$sum = $res->row()->total;
		}

		return $sum;

	}
	public function getTotalCommission($package_id='')
	{
		$total = 0;
		$this->db->select_sum('cm.total_amount');
		$this->db->from('commission_details cm');
		$this->db->join('user_info li','li.user_id=cm.user_id');
		$this->db->where('li.package_id',$package_id);
		$this->db->where('cm.amount_type_id!=',9);
		$this->db->where('cm.amount_type_id!=',10);
		$query = $this->db->get();
		foreach($query->result() as $row){
			$total = $row->total_amount;
		}
		if($total == NULL){
			return 0;
		}
		return (abs($total));
	}

	public function getEmpDetails($emp_id="")
	{
		$details = array();
		$admin_id = $this->Base_model->getAdminId();
		$this->db->select('user_id,first_name,second_name,user_name,date_of_joining,status,mobile,email')
		->from('user_info')
		->where('user_type','admin')
		->where('user_id <',$admin_id)
		->order_by('user_id','DESC')
		->where_in('status',['1', '0']);
		if($emp_id)
		{
			$this->db->where('user_id',$emp_id);
			$this->db->limit(1);
		}
		$query = $this->db->get();

		foreach ($query->result_array() as $row) {
			$row['full_name'] = $this->getFullName($row['user_id']);
			$row['enc_id'] = $this->Base_model->encrypt_decrypt('encrypt',$row['user_id']);
			if($emp_id)
				$details = $row;
			else
				$details[] = $row;
		}
		return $details;

	}
	public function getFirstUserId()
	{
		$user_id= NULL;
		$this->db->select('user_id');
		$this->db->from('user_info');

		$this->db->where('user_type','admin');
		$this->db->order_by('user_id','ASC');
		$this->db->limit(1);

		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$user_id = $row->user_id;
		}
		return $user_id-1;
	}
	public function insertEmpDetails($post_arr,$new_emp_id)
	{

		$this->config->load('bcrypt');
		$this->load->library('bcrypt');
		$hashed_password = $this->bcrypt->hash_password( $post_arr['password'] );

		$post_arr['emp_code'] = $this->getRandomString(value_by_key('user_name_min_len'),'user_info','user_name');

		$this->db->set('user_name', $post_arr['emp_code']);
		$this->db->set('password', $hashed_password );
		$this->db->set('first_name', $post_arr['first_name']);
		$this->db->set('second_name', $post_arr['second_name']);
		$this->db->set('mobile', $post_arr['mobile']);
		$this->db->set('email', $post_arr['email_id']);
		$this->db->set('register_by_using', 'free_join');
		$this->db->set('package_id', 0);
		$this->db->set('date_of_joining', date('Y-m-d H:i:s'));
		$this->db->set('user_type', "admin");
		$this->db->set('status', '1');
		$this->db->set('rank_id', 0);
		$this->db->set('secure_pin', '87654321');
        // $this->db->set('order_id', 0);
		$this->db->set('user_id', $new_emp_id);
		$result = $this->db->insert('user_info');
		$this->db->cache_delete('admin', 'settings');
		$this->insertEmployeeMenus($new_emp_id);

		return $result;
	}
	public function insertEmployeeMenus($emp_id){

		$this->db->set('menu_ids' , 'a:2:{i:0;s:1:"1";i:1;s:1:"2";}');
		$this->db->set('last_update' , date('Y-m-d H;i:s'));
		$this->db->set('emp_id' , $emp_id);
		$result = $this->db->insert('employee_menus');
		$this->db->cache_delete('admin', 'settings');
		return $result;

	}
	public function updateEmployeeMenus($emp_id,$allowed_menu){
		$this->db->set('menu_ids' , $allowed_menu);
		$this->db->set('last_update' , date('Y-m-d H;i:s'));
		$this->db->where('emp_id' , $emp_id);
		$this->db->limit(1);
		$result = $this->db->update('employee_menus');
		$this->db->cache_delete('admin', 'settings');
		return $result;

	}
	public function updateEmployeeDetails($post_arr,$employee_id)
	{

		$this->config->load('bcrypt');
		$this->load->library('bcrypt');
       // $hashed_password = $this->bcrypt->hash_password( $post_arr['password'] );

		$this->db->set('first_name', $post_arr['first_name']);
		$this->db->set('second_name', $post_arr['second_name']);
		$this->db->set('mobile', $post_arr['mobile']);
		$this->db->set('email', $post_arr['email_id']);
        //$this->db->set('password', $hashed_password );

		$this->db->set('status', $post_arr['status']);
		$this->db->where('user_id', $employee_id);
		$result = $this->db->update('user_info');
		$this->db->cache_delete('admin', 'settings');

		return $result;
	}
	public function update_Password($hashed_password,$id) {
		$res = $this->db->set('password', $hashed_password)
		->where('user_id', $id)
		->limit(1)
		->update('user_info');
		$this->db->cache_delete('admin', 'settings');
		// echo $this->db->last_query();die();
		return $res;
	}


	public function changeSponsorName($user_id,$previous_sponsor_id,$new_sponsor_id) {
		$this->Base_model->CleanupCache();
		$date=date('Y-m-d');
		$this->db->set('sponsor_id', $new_sponsor_id);
		$this->db->where('user_id', $user_id);       
		$result =  $this->db->update('user_info');
		// echo $this->db->last_query();die();
//insert history
		$this->db->set('user_id', $user_id);
		$this->db->set('previous_sponsor_id', $previous_sponsor_id);
		$this->db->set('current_sponsor_id', $new_sponsor_id);
		$this->db->set('updated_date', $date);
		$sponsor_updated = $this->db->insert('change_sponsor_history');
		return $result;

	}
	public function updateUserStatus($user_id,$status='active') {
		$this->db->set("status", $status);
		$this->db->where("user_id", $user_id);
		$this->db->limit(1);
		$res = $this->db->update('user_info');
		return $res;
	}

	public function insertActivationHistory($user_id,$current_status='active',$status='inactive',$reason='') {

		$this->db->set("current_status", $current_status);
		$this->db->set("new_status", $status);
		$this->db->set("user_id", $user_id);
		$this->db->set("date", date('Y-m-d H:i:s'));
		$this->db->set("reason",$reason);
		$res = $this->db->insert('activate_inactivate_history');
		return $res;
	}


	public function getBlockedUsers()
	{
		$details = array();
		$this->db->select('user_id,user_name,status');
		$this->db->from('user_info');
		$this->db->where('status','inactive');
		$this->db->where('status !=',"server");
		$this->db->where('user_type',"user");
		$query = $this->db->get();
     	// echo $this->db->last_query();die();
		foreach ($query->result_array() as $row) {

			$row['full_name'] = $this->Base_model->getFullName($row['user_id']);
        	// $row['reason']= $this->Base_model->getUserName($row['reason']);
			$active_details = $this->Settings_model->getActiveInactiveHistory($row['user_id']);
			if($active_details){
				
				$row['date'] = $active_details[0]['date'];
				$row['date'] = date("Y-m-d", strtotime($row['date']));
				$row['reason'] = $active_details[0]['reason'];
			}
			$details[] = $row;

		}
		return $details;
	}

	public function getActiveInactiveHistory($user_id)
	{
		$details = array();
		$this->db->select('*');
		$this->db->from('activate_inactivate_history');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		foreach ($query->result_array() as $row) {
			$details[] = $row;
		}
		return $details;
	}
	public function getAllRoiUsers($post_arr='' )
	{
		$this->db->select('ui.user_id as id,ui.user_name as text')
		->from('package_upgrade_history p')
		->where('p.roi_count >', 0)
		->group_by('p.user_id')
		->join('user_info ui', 'ui.user_id = p.user_id', 'left');	
		if($post_arr)
		{
			if(element('term',$post_arr))
				$this->db->where("ui.user_name LIKE '{$post_arr['term']}%'");

		}
		$query = $this->db->get(); 
		$details = [];
		foreach($query->result_array() as $row){
			$details[]=$row;
		} 
		return $details;

	}

	public function insertBlockedRoiUsers($user_id,$status) {

		$this->db->set("user_id", $user_id);
		$this->db->set("roi_status", $status);
		$this->db->set("inserted_date", date('Y-m-d H:i:s'));
		$res = $this->db->insert('blocked_roi_users');
		return $res;
	}
	
	public function updateBlockedRoiUsers($user_id,$status) {

		$this->db->set("roi_status", $status);
		$this->db->set("updated_date", date('Y-m-d H:i:s'));
		$this->db->where("user_id", $user_id);
		$res = $this->db->update('blocked_roi_users');
		return $res;
	}
	
	public function checkRoiBlockUsers($user_id) {

		$id='';
		$this->db->select('user_id');
		$this->db->where('user_id',$user_id);
		$res = $this->db->get('blocked_roi_users');
		// echo $this->db->last_query();die();
		foreach ($res->result() as $row) {
			$id = $row->user_id;
		}
		return $id;

	}


}
