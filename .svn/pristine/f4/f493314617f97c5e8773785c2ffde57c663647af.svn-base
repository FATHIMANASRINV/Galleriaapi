<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Business_model extends Base_model {

	function __construct() {
		parent::__construct();

	} 
	public function isSecurePinValid($user_id,$secure_pin) {
		$flag = false;
		$this->db->select('user_id');
		$this->db->where('user_id', $user_id);
		$this->db->where('secure_pin', $secure_pin);
		$this->db->from('user_info');
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows()) {
			return true;
		}
		return $flag;
	}
	public function getAccountDetails($user_id,$category_type)
	{
		$details = array();
		$user_page_total_amount = 0;
		$user_total_amount = 0;
		$this->db->select('from_id,total_amount,amount_type_id,amount_payable,payout_ref_id');
		$this->db->select('date_of_submission,fund_transfer_type,transaction_note');
		$this->db->from('commission_details');
		$this->db->where('user_id',$user_id);
		if($category_type != "all"){
			$this->db->where('amount_type_id',$category_type);
		}
		$query  = $this->db->get();
		foreach($query->result_array() as $row){
			$row["payout_status"] = "NA";
			
			$user_page_total_amount += $row["amount_payable"];

			$row["user_page_total_amount"] = $this->currency->format($user_page_total_amount);
			$row["from_name"] = $this->Base_model->getUserName($row['from_id']);
			$row["amount_view"] = $this->currency->format($row['amount_payable']);
			$row["category_name"] = $this->Base_model->getAmountTypeName($row['amount_type_id']);
			if($row["payout_ref_id"] !=0){
				$row["payout_status"] = $this->getPayoutStatus($row['payout_ref_id']);
			}
			
			$details[] =  $row;
		}

		$details['user_total_amount'] =$this->currency->format($this->getTotalAmountByQuery($user_id,$category_type));
		return $details;
	}
	public function getCategoryDetails(){
		$details = array();
		$this->db->select('*');
		$this->db->from('amount_type');
		$this->db->where('show_status','yes');
		$this->db->where('id!=','16');
		$this->db->order_by('sort_order');
		$query = $this->db->get();
		foreach ($query->result_array() as $row) {
			$details[] = $row;

		}
		return $details; 
	}
	public function getPayoutStatus($payout_id){
		$payout_status = 'pending';
		$this->db->select('status');
		$this->db->from('payout_requests');
		$this->db->where('req_id',$payout_id);
		$query = $this->db->get();
		foreach($query->result() as $row){
			$payout_status = $row->status;
		}
		return $payout_status;
	}
	public function getTotalAmountByQuery($user_id,$category_type)
	{
		$amount_payable = 0;
		$this->db->select_sum('amount_payable');
		$this->db->from('commission_details');
		$this->db->where('user_id',$user_id);
		if($category_type != "all"){
			$this->db->where('amount_type_id',$category_type);
		}
		$query  = $this->db->get();
		foreach($query->result_array() as $row){
			$amount_payable =  $row["amount_payable"];
		}
		return $amount_payable;
	}

	public function getUserWalletSum($wallet,$user_id='') {

		$sum = 0;
		$this->db->select_sum($wallet);
		$this->db->from('user_wallet');
		$this->db->where('user_id',$user_id);
		$query  = $this->db->get();
		foreach($query->result_array() as $row){
			$sum =  $row[$wallet];
		}
		return $sum;
	}


	public function insertPayoutRequest($user_id, $amount,$transaction_fee,$by_using)
	{

		$date = date('Y-m-d H:i:s');
		$this->db->set('user_id',$user_id);
		$this->db->set('amount',$amount);
		$this->db->set('transaction_fee',$transaction_fee);
		$this->db->set('requested_date',$date);
		$this->db->set('by_using',$by_using);
		$this->db->set('status','pending');
		$result = $this->db->insert('payout_requests');
		return $result;
	}  

	public function getPayoutRequests($user_id=''){
		$details = array();
		$this->db->select('*');
		$this->db->from('payout_requests');
		if($user_id)
		{
			$this->db->where('user_id',$user_id);
		}
		else
		{
			$this->db->where('status','pending');
		}
		$this->db->order_by('req_id','DESC');
		$query = $this->db->get();
		foreach ($query->result_array() as $row) {
			$row['user_name']=$this->Base_model->getUserName($row['user_id']);
			
			$row['requested_amount']=$row['amount'];
			$row['released_amount']=$row['amount']-($row['amount']*($row['transaction_fee']/100));
			$details[] = $row;
		}

		return $details; 
	}



	public function updatePayout($id,$action) {
		$date = date('Y-m-d H:i:s');
		$this->db->set('status', $action);
		$this->db->set('updated_date', $date);
		$this->db->where('req_id',$id);
		$result =  $this->db->update('payout_requests');
		$this->db->cache_delete('admin', 'business');
        $this->db->cache_delete('user', 'business');
        $this->db->cache_delete('admin', 'dashboard');
        $this->db->cache_delete('user', 'dashboard');
        $this->db->cache_delete('admin', 'report');
        $this->db->cache_delete('user', 'report');
		return $result;

	}

	public function getPayoutById($id){
		$details = array();
		$this->db->select('user_id,amount,transaction_fee');
		$this->db->from('payout_requests');
		$this->db->where('req_id',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		foreach ($query->result_array() as $row) {

			$details = $row;

		}
		return $details; 
	}

	public function getPayoutCount()
	{
		$this->db->select('id');
		$this->db->from('payout_requests');
		$this->db->where('status','pending');
		$count = $this->db->count_all_results();
		return $count;
	}

	public function getPayoutAjax($post_arr=[],$count=''){
		$details = array(); 
		$row = $post_arr['start'];
		$rowperpage = $post_arr['length'];


		$this->db->select('pr.*, ui.user_name')
		->from('payout_requests pr')
		->where('pr.status','pending')
		->join('user_info ui','ui.user_id = pr.user_id');

		if (element('user_id',$post_arr)) { 
			$this->db->where('pr.user_id', $post_arr['user_id']);
		}
		if (element('user_name',$post_arr)) { 
			$this->db->where('ui.user_name', $post_arr['user_name']);
		}

		if ( element( 'from_date', $post_arr) ) {
			$this->db->where('DATE_FORMAT(pr.requested_date,"%Y-%m-%d") >=', $post_arr['from_date'] );
		}

		if ( element( 'end_date', $post_arr) ) {
			$this->db->where('DATE_FORMAT(pr.requested_date,"%Y-%m-%d") <=', $post_arr['end_date'] );
		}

		$searchValue = element('search', $post_arr) ? (element('value', $post_arr['search'] ) ? $post_arr['search']['value']: FALSE ): FALSE;
		if($searchValue) { 

			$where = "(pr.by_using LIKE '%$searchValue%' 
			OR pr.user_id LIKE '%$searchValue%'
			OR pr.amount LIKE '%$searchValue%'
			OR pr.requested_date LIKE '%$searchValue%' )";
			$this->db->where($where);
		}

		if($count) {
			return $this->db->count_all_results();
		}

		$this->db->limit($rowperpage, $row);
		$query = $this->db->get();  

		$i=1;
		foreach($query->result_array() as $row){
			$row['index'] =$post_arr['start']+$i;
			$row['release_amount'] = $row['amount']-($row['amount']*($row['transaction_fee'])/100); 
			$row['release_amount']= $this->currency->format($row['release_amount']);
			$row['amount']= $this->currency->format($row['amount']);     

			$details[] = $row;
			$i++;
		}
		return $details;

	}
	public function updatePayoutPackageDetails($package_id, $amount) {
		$query=0;
		$this->db->set('payout', 'payout + ' . $amount, FALSE);
		$this->db->where('package_id', $package_id);
		$this->db->limit(1);
		$query = $this->db->update('package_details');
		return $query;
	}


}