<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends Base_model {

	function __construct() {
		parent::__construct();

	}

	public function getUserJoiningAjax($post_arr=[],$count=0) {
		$details = array();
		$row = $post_arr['start'];
		$rowperpage = $post_arr['length'];
		$this->db->select('pk.name as package_name ,ui.user_id,ui.user_name,ui.date_of_joining,ui.sponsor_id,uis.user_name as sponsor_name,ui.package_id,uw.wallet');
		$this->db->from('user_info as ui');
		$this->db->join('package_details as pk','pk.package_id=ui.package_id');
		$this->db->join('user_info as uis','uis.user_id=ui.sponsor_id');
		$this->db->join('user_wallet as uw','uw.user_id=ui.user_id');
		$this->db->where('ui.status','active');
		if(element('user_id',$post_arr)) {
			$this->db->where('ui.user_id',$post_arr['user_id']);
		}	
		if (element('level',$post_arr)) {
			if (element('level',$post_arr)!='all') {
				$this->db->where('ui.left_father >=', $this->data['user_details']['left_father']);
				$this->db->where('ui.right_father <=', $this->data['user_details']['right_father']);
				$this->db->where('ui.user_level',  $this->data['user_details']['user_level']+$post_arr['level']);
			}
		}
		if (element('sponsor_id',$post_arr)) {
			$this->db->where('ui.sponsor_id',$post_arr['sponsor_id']);
		}

		if (element('country',$post_arr)) {
			$this->db->where('ui.country',$post_arr['country']);
		}
		if( element('start_date',$post_arr) ){
			$start_date = date("Y-m-d 00:00:00", strtotime($post_arr['start_date'])); 
			$this->db->where('ui.date_of_joining >=', $start_date); 
		}

		if( element('end_date',$post_arr) ){ 
			$end_date = date("Y-m-d 23:59:59", strtotime($post_arr['end_date']));  
			$this->db->where('ui.date_of_joining <=', $end_date);
		}
		if($count) {
			return $this->db->count_all_results();
		}
		$searchValue = element('search', $post_arr) ? (element('value', $post_arr['search'] ) ? $post_arr['search']['value']: FALSE ): FALSE;
		if($searchValue) { 

			$where = "(ui.user_name LIKE '%$searchValue%' )";
			$this->db->where($where);
		}
		$this->db->limit($rowperpage, $row);
		$m=1;
		$query = $this->db->get();
		foreach($query->result_array() as $row) {
			$row['index'] = $post_arr['start']+$m++;
			$row['date_of_joining'] =  date('d/M/Y H:i:s',strtotime($row['date_of_joining']));
			$row["wallet"] = $this->currency->format($row['wallet']);
			$details[] = $row;
		}
		return $details;
	}

	public function getUserWalletDetails($user_id='',$wallet='*')
	{
		$details = array();

		$this->db->select($wallet);
		$this->db->from('user_wallet');
		if($user_id)
		{
			$this->db->where('user_id',$user_id);
		}
		$query = $this->db->get(); 

		foreach($query->result_array() as $row){ 
			$row['user_name'] = $this->Base_model->getUserName($row['user_id']);
			$details[] = $row;
		}
        // print_r($details);die();
		return $details;
	}

	public function getAllAmtTypes($post_arr='' )
	{
		$this->db->select('db_amt_type as id,db_amt_type as text')
		->from('amount_type');
		if(element('transaction_fee',$post_arr)){
			$this->db->where('show_status','yes');
		}else{
			$this->db->where('show_status','yes');
			$this->db->where('id!=','16');
		}
		if($post_arr)
		{
			if(element('term',$post_arr))
				$this->db->where("db_amt_type LIKE '{$post_arr['term']}%'");

		}
		if(element('type',$post_arr))
		{
			$this->db->where('db_amt_type !=',$post_arr['type']);
		}
		$query = $this->db->get(); 
		$details = [];
		foreach($query->result_array() as $row){
			$row['text']=lang($row['text']);
			$details[]=$row;
		} 
		return $details;

	}

	public function getAddDeductReportAjax($post_arr=[],$count=0 )
	{

		$details = [];
		$row = $post_arr['start'];
		$rowperpage = $post_arr['length'];
		$this->db->select('cm.*');
		$this->db->from('add_deduct_fund as cm');
		$this->db->select('ui.user_name');
		$this->db->join('user_info as ui','ui.user_id=cm.from_id');
		if(element('user_id',$post_arr))
		{
			$this->db->where('cm.user_id',$post_arr['user_id']);

		}
		if( element('from_id',$post_arr)){
			$this->db->where('cm.from_id', $post_arr['from_id'] );
		}
		if(element('transaction_type',$post_arr)) {
			$this->db->where('cm.fund_transfer_type',$post_arr['transaction_type']);
		}
		// else {
		// 	$where = "(cm.amount_type_id = '6' OR cm.amount_type_id = '7')";
		// 	$this->db->where($where);
		// }
		if( element('start_date',$post_arr) ){
			$start_date = date("Y-m-d 00:00:00", strtotime($post_arr['start_date'])); 
			$this->db->where('cm.date_of_submission >=', $start_date); 
		}

		if( element('end_date',$post_arr) ){ 
			$end_date = date("Y-m-d 23:59:59", strtotime($post_arr['end_date']));
			$this->db->where('cm.date_of_submission <=', $end_date);
		}
		if($count) {
			return $this->db->count_all_results();
		}
		$searchValue = element('search', $post_arr) ? (element('value', $post_arr['search'] ) ? $post_arr['search']['value']: FALSE ): FALSE;
		if($searchValue) { 

			$where = "(ui.user_name LIKE '%$searchValue%' )";
			$this->db->where($where);
		}
		$this->db->limit($rowperpage, $row);
		$m=1;
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			$row['index'] = $post_arr['start']+$m++;
			$row['full_name'] = $this->Base_model->getFullName($row['from_id']);
			$row['date_of_submission'] =  date('d/M/Y',strtotime($row['date_of_submission']));
			$row["amount_payable"] = $this->currency->format($row['amount_payable']);

			$details[]=$row;
		} 
		return $details;

	}
	public function getUserCurrentStatusAjax($post_arr=[],$count=0)
	{
		$row = $post_arr['start'];
		$rowperpage = $post_arr['length'];
		$details = array();
		$this->db->select('user_name,status')
		->from('user_info');
		if(element('status',$post_arr) !='all')
		{
			if($post_arr['status']=='active'){
				$this->db->where('status',$post_arr['status']);
			}else{
				$this->db->where('status','inactive');
			}
		}
		if($count) {
			return $this->db->count_all_results();
		}
		$searchValue = element('search', $post_arr) ? (element('value', $post_arr['search'] ) ? $post_arr['search']['value']: FALSE ): FALSE;
		if($searchValue) { 

			$where = "(user_name LIKE '%$searchValue%' )";
			$this->db->where($where);
		}
		$this->db->limit($rowperpage, $row);
		$m=1;
		$query = $this->db->get();
		foreach($query->result_array() as $row){ 
			$row['index'] = $post_arr['start']+$m++;
			if($row['status']=="active"){
				$row['status1']=lang('active');
			}else{
				$row['status2']=lang('inactive');

			}
			$details[] = $row;
		}
		return $details;
	}

	public function getPackagePurchaseHistoryAjax($post_arr=[],$count=0)
	{
		$details = array();
		$row = $post_arr['start'];
		$rowperpage = $post_arr['length'];
		$this->db->select('ph.*');
		$this->db->from('package_upgrade_history as ph');
		$this->db->select('ui.user_name');
		$this->db->join('user_info as ui','ui.user_id=ph.user_id');
		if (element('user_id',$post_arr)) {
			$this->db->where('ph.user_id',$post_arr['user_id']);
		}
		if( element('start_date',$post_arr) ){
			$start_date = date("Y-m-d 00:00:00", strtotime($post_arr['start_date'])); 
			$this->db->where('ph.date >=', $start_date); 
		}

		if( element('end_date',$post_arr) ){ 
			$end_date = date("Y-m-d 23:59:59", strtotime($post_arr['end_date']));  
			$this->db->where('ph.date <=', $end_date);
		}
		if($count) {
			return $this->db->count_all_results();
		}
		$searchValue = element('search', $post_arr) ? (element('value', $post_arr['search'] ) ? $post_arr['search']['value']: FALSE ): FALSE;
		if($searchValue) { 

			$where = "(ui.user_name LIKE '%$searchValue%' )";
			$this->db->where($where);
		}
		$this->db->limit($rowperpage, $row);
		$m=1;
		$query = $this->db->get();
		foreach($query->result_array() as $row){ 
			$row['index'] = $post_arr['start']+$m++;
			$row['old_package_name'] = $this->getPackageNamebyId($row['old_package']);
			$row['new_package_name'] = $this->getPackageNamebyId($row['new_package']);
			$row['date'] =  date('d/M/Y H:i:s',strtotime($row['date']));
			$row["package_amount"] = $this->currency->format($row['package_amount']);
			$details[] = $row;
		}
		return $details;
	}

	public function getPackageNamebyId($package_id) {

		$output = '';
		$this->db->distinct(true)->select('*')
		->from('package_details');
		$this->db->where('status', 'active');
		$this->db->where('package_id', $package_id);
		$this->db->limit(1);
		$query = $this->db->get();
		foreach ($query->result_array() as $row) {
			$output = $row['name'];
		}

		return $output;
	}

	// public function getSummaryDetails($user_id='',$category_type='all')
	// {
	// 	$details = array();
	// 	$user_page_total_amount = 0;
	// 	$user_total_amount = 0;
	// 	$this->db->select('cd.*');
	// 	$this->db->from('commission_details as cd');
	// 	if($user_id)
	// 		$this->db->where('cd.user_id',$user_id);
	// 	if($category_type!='all' ){
	// 		$this->db->where('cd.amount_type_id',$category_type);
	// 	}
	// 	$query  = $this->db->get();
	// 	foreach($query->result_array() as $row){
	// 		$row["payout_status"] = "NA";
	// 		$user_page_total_amount += $row["amount_payable"];
	// 		$user_total_amount = $this->currency->format($user_page_total_amount);
	// 		$details[] =  $row;
	// 	}
	// 	return $user_total_amount;
	// }

	public function getSummaryDetailsAjax($post_arr=[],$count=0)
	{
		$details = array();
		$row = $post_arr['start'];
		$rowperpage = $post_arr['length'];
		$user_page_total_amount = 0;
		$user_total_amount = 0;
		$this->db->select('cd.*')
		->from('commission_details as cd')
		->select('ui.user_name')
		->select('li.user_name as from_name')
		->join('user_info as ui','ui.user_id=cd.user_id')
		->join('user_info as li','li.user_id=cd.from_id')
		->select('at.db_amt_type as category_name')
		->join('amount_type as at','at.id=cd.amount_type_id');
		if(element('user_id',$post_arr))
			$this->db->where('cd.user_id',$post_arr['user_id']);
		if(element('category_type',$post_arr)!='all' ){
			$this->db->where('cd.amount_type_id',$post_arr['category_type']);
		}
		if($count) {
			return $this->db->count_all_results();
		}
		$searchValue = element('search', $post_arr) ? (element('value', $post_arr['search'] ) ? $post_arr['search']['value']: FALSE ): FALSE;
		if($searchValue) { 
			$where = "(li.user_name LIKE '%$searchValue%')";
			$this->db->where($where);
		}

		$this->db->limit($rowperpage, $row);
		$m=1;
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			$row['index'] = $post_arr['start']+$m++;
			$row["payout_status"] = "NA";
			$user_page_total_amount += $row["amount_payable"];
			$row["user_page_total_amount"] = $this->currency->format($user_page_total_amount);
			$row["category_name"] = lang($row['category_name']);
			$row['date_of_submission'] =  date('d/M/Y',strtotime($row['date_of_submission']));
			$row["amount_payable"] = $this->currency->format($row['amount_payable']);
			$details[] =  $row;
		}
		return $details;
	}

	public function getUserWalletDetailsAjax($post_arr=[],$count=0)
	{
		$details = array();
		$total=0;
		$row = $post_arr['start'];
		$rowperpage = $post_arr['length'];
		$this->db->select($post_arr['wallet'])
		->select('uw.wallet,uw.user_id, ui.user_name')
		->from('user_wallet as uw');
		$this->db->join('user_info as ui','uw.user_id=ui.user_id');

		if(element('user_id',$post_arr))
		{
			$this->db->where('uw.user_id',$post_arr['user_id']);
		}
		if($count) {
			return $this->db->count_all_results();
		}
		$searchValue = element('search', $post_arr) ? (element('value', $post_arr['search'] ) ? $post_arr['search']['value']: FALSE ): FALSE;
		if($searchValue) { 

			$where = "(ui.user_name LIKE '%$searchValue%')";
			$this->db->where($where);
		}

		$this->db->limit($rowperpage, $row);
		$m=1;
		$query = $this->db->get();
		foreach($query->result_array() as $row){ 
			$row['index'] = $post_arr['start']+$m++;
			$columns=explode(',', $post_arr['wallet']);
			foreach($columns as $a){
				if($a){
					$value=$this->getvalue($a,$row['user_id']);
					$total=$total +  $value;
				}
			}
			$row['total']=$this->currency->format($total);
			$row['wallet']=$this->currency->format($row['wallet']);
			$details[] = $row;
		}
		return $details;
	}


	function getvalue($field_name, $user_id){

		$field_value = NULL;
		$query = $this->db->select($field_name)
		->where('user_id', $user_id)
		->from('user_wallet')
		->get();
		foreach ($query->result() as $row) {
			$field_value = $row->$field_name;
		}
		return $field_value;
	}

	public function getAddDuductajaxCount($user_id='')
	{

		$count = 0 ;
		$this->db->select('*')
		->from('add_deduct_fund');
		// ->where('amount_type_id',6)
		// ->where('amount_type_id',7);
		if( $user_id ){
			$this->db->where('user_id', $user_id );
		}
		$count = $this->db->count_all_results();
		return $count;
	}
	public function getPackagePurchaseajaxCount($user_id='')
	{

		$count = 0 ;
		$this->db->select('*')
		->from('package_upgrade_history');
		if( $user_id ){
			$this->db->where('user_id', $user_id );
		}
		$count = $this->db->count_all_results();
		return $count;
	}
	public function getWalletSummaryajaxCount($user_id='')
	{

		$count = 0 ;
		$this->db->select('*')
		->from('commission_details');
		if( $user_id ){
			$this->db->where('user_id', $user_id );
		}
		$count = $this->db->count_all_results();
		return $count;
	}
	public function getActiveInactiveajaxCount($user_id='',$sponsor_id='')
	{

		$count = 0 ;
		$this->db->select('*')
		->from('user_info');
		if( $user_id ){
			$this->db->where('user_id', $user_id );
		}
		if( $sponsor_id ){
			$this->db->where('sponsor_id', $sponsor_id );
		}
		$count = $this->db->count_all_results();
		return $count;
	}

	public function getWalletDetailsajaxCount($user_id='')
	{

		$count = 0 ;
		$this->db->select('*')
		->from('user_wallet');
		if( $user_id ){
			$this->db->where('user_id', $user_id );
		}
		$count = $this->db->count_all_results();
		return $count;
	}
	public function getRankReportajaxCount($user_id='')
	{

		$count = 0 ;
		$this->db->select('*')
		->from('rank_history');
		if( $user_id ){
			$this->db->where('user_id', $user_id );
		}
		$count = $this->db->count_all_results();
		return $count;
	}

	public function getRankReportAjax($post_arr=[],$count=0) {

		$details = array();
		$row = $post_arr['start'];
		$rowperpage = $post_arr['length'];
		$this->db->select('rh.*')
		->from('rank_history as rh')
		->select('rm.name as new_name')
		->join('rank_details as rm','rm.rank_id=rh.new_rank')
		->select('ui.user_name,CONCAT(ui.first_name, ui.second_name) as full_name')
		->join('user_info as ui','ui.user_id=rh.user_id')
		->select('mn.name as current_name')
		->join('rank_details as mn','mn.rank_id=rh.current_rank','left');
		if (element('user_id',$post_arr)) {
			$this->db->where('rh.user_id',$post_arr['user_id']);
		}
		if (element('rank_id',$post_arr)!='all') {
			$this->db->where('rh.new_rank',$post_arr['rank_id']);
		}
		if( element('start_date',$post_arr) ){
			$this->db->where('DATE_FORMAT(rh.date,"%Y-%m-%d") >=', $post_arr['start_date']); 
		}

		if( element('end_date',$post_arr) ){ 

			$this->db->where('DATE_FORMAT(rh.date,"%Y-%m-%d") <=', $post_arr['end_date']);
		}
		if($count) {
			return $this->db->count_all_results();
		}
		$searchValue = element('search', $post_arr) ? (element('value', $post_arr['search'] ) ? $post_arr['search']['value']: FALSE ): FALSE;
		if($searchValue) { 
			$where = "(ui.user_name LIKE '%$searchValue%' )";
			$this->db->where($where);
		}
		$this->db->limit($rowperpage, $row);
		$query = $this->db->get();
		$m=1;
		foreach($query->result_array() as $row) {
			$row['index'] = $post_arr['start']+$m++;
			$details[] = $row;
		}
		return $details;
	}


	public function getSummaryDetailAjax($post_arr=[],$count=0,$table)
	{
		$details = array();
		$row = $post_arr['start'];
		$rowperpage = $post_arr['length'];
		$user_page_total_amount = 0;
		$user_total_amount = 0;
		$this->db->select('cm.*,pd.name as package_name')
		->select('ui.user_name')
		->join('user_info as ui','ui.user_id=cm.user_id')
		->select('li.user_name as from_name')
		->join('user_info as li','li.user_id=cm.from_id')
		->join('package_details as pd','pd.package_id=cm.payout_ref_id','left')
		->from("$table"." as cm");
		if(element('category_type',$post_arr)=='level_bonus'){
			$this->db->where('cm.missed_income_status!=',1);
		}if(element('category_type',$post_arr)=='global_bonus'){
			$this->db->where('cm.status','Released');
		}if(element('category_type',$post_arr)=='missed_income'){
			$this->db->where('cm.missed_income_status',1);
		}if(element('category_type',$post_arr)=='global_pending_bonus'){
			$this->db->where('cm.status','Pending');
		}
		if(element('user_id',$post_arr))
			$this->db->where('cm.user_id',$post_arr['user_id']);
		
		if(element('category_type',$post_arr) =='add_fund' ){
			$this->db->where('cm.transaction_note','add_fund');
		}
		if(element('category_type',$post_arr) =='deduct_fund' ){
			$this->db->where('cm.transaction_note','deduct_fund');
		}
		if(element('category_type',$post_arr) =='payout_request' ){
			$this->db->where('cm.transaction_note','payout_request');
		}
		if(element('category_type',$post_arr) =='payout_delete' ){
			$this->db->where('cm.transaction_note','payout_delete');
		}
		if(element('category_type',$post_arr) =='wallet_withdrawal' ){
			$this->db->where('cm.transaction_note','wallet_withdrawal');
		}
		if($count) {
			return $this->db->count_all_results();
		}

		$searchValue = element('search', $post_arr) ? (element('value', $post_arr['search'] ) ? $post_arr['search']['value']: FALSE ): FALSE;
		if($searchValue) { 

			$where = "(ui.user_name LIKE '%$searchValue%')";
			$this->db->where($where);
		}
		$this->db->limit($rowperpage, $row);
		$query = $this->db->get();
		$m=1;
		foreach($query->result_array() as $row){
			$row['index'] = $post_arr['start']+$m++;
			$row["payout_status"] = "NA";
			$row["transaction_fee"] = $this->currency->format($row["total_amount"]-$row["amount_payable"]);
			$user_page_total_amount += $row["amount_payable"];
			$row["user_page_total_amount"] = $this->currency->format($user_page_total_amount);
			$row['category_name'] = lang($post_arr['category_type']);
			$row["amount_payable"] = $this->currency->format($row['amount_payable']);
			$details[] =  $row;
		}
		return $details;
	}

	public function getWalletSummaryCount($user_id='',$table)
	{

		$count = 0 ;
		$this->db->select('*');
		$this->db->from($table);
		if( $user_id ){
			$this->db->where('user_id', $user_id );
		}
		$count = $this->db->count_all_results();
		return $count;
	}
	public function getSummaryDetail($user_id='',$category_type='',$table)
	{
		// print_r($table);die;
		$user_page_total_amount = 0;
		$user_total_amount = 0;
		$this->db->select('user_id,amount_payable')
		->from($table);
		if($user_id)
			$this->db->where('user_id',$user_id);
		if($category_type =='add_fund' ){
			$this->db->where('fund_transfer_type','credit');
		}
		if($category_type =='deduct_fund' ){
			$this->db->where('fund_transfer_type','debit');
		}
		if($category_type =='payout_request' ){
			$this->db->where('transaction_note','payout_request');
		}
		if($category_type =='payout_delete' ){
			$this->db->where('transaction_note','payout_delete');
		}
		if($category_type =='wallet_withdrawal' ){
			$this->db->where('transaction_note','wallet_withdrawal');
		}
		if($category_type =='level_bonus'){
			$this->db->where('missed_income_status!=',1);
		}
		if($category_type =='global_bonus'){
			$this->db->where('status','Released');
		}
		if($category_type =='missed_income'){
			$this->db->where('missed_income_status',1);
		}
		if($category_type == 'global_pending_bonus'){
			$this->db->where('status','Pending');
		}
		$query  = $this->db->get();
		foreach($query->result_array() as $row){
			$row["payout_status"] = "NA";
			$user_page_total_amount += $row["amount_payable"];
			$user_total_amount = $this->currency->format($user_page_total_amount);
		}
		return $user_total_amount;
	}
	public function getSponsorNameUpdations($user_id='',$from_date='',$end_date='')
	{
		$details=array();
		$this->db->select('*');
		$this->db->from('change_sponsor_history');
		if($user_id){
			$this->db->where('user_id', $user_id );
		}
		if($from_date){
			$from_date = date("Y-m-d 00:00:00", strtotime($from_date)); 
			$this->db->where('updated_date >=', $from_date); 
		}

		if($end_date){ 
			$end_date = date("Y-m-d 23:59:59", strtotime($end_date));  
			$this->db->where('updated_date <=', $end_date);
		}
		$query=$this->db->get();
		foreach($query->result_array() as $row){
			$row["user_name"] = $this->Base_model->getUserName($row['user_id']);
			$row["full_name"] = $this->Base_model->getFullName($row['user_id']);
			$row["current_sponsor_name"] = $this->Base_model->getUserName($row['current_sponsor_id']);
			$row["previous_sponsor_name"] = $this->Base_model->getUserName($row['previous_sponsor_id']);
			$details[]=$row;
			
		}		
		return $details;
	}

	function getSponsorReport()
	{
		$details = array();
		$this->db->select('*');
		$this->db->from('activate_inactivate_history');
		
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			$row['user_name']= $this->Base_model->getUserName($row['user_id']);  
			$row['first_name']= $this->Base_model->getFullName($row['user_id']);     
			
			
			$details[] = $row;
		}
		return $details;


	}
	public function getRoiDetails($user_id='',$from_date='',$end_date='')
	{
		$details = array();

		$this->db->select('user_id,earn_amount,roi_days,roi_count,update_date');
		$this->db->from('package_upgrade_history');
		if($user_id)
		{
			$this->db->where('user_id',$user_id);
		}
		if($from_date){
			$from_date = date("Y-m-d 00:00:00", strtotime($from_date)); 
			$this->db->where('update_date >=', $from_date); 
		}

		if($end_date){ 
			$end_date = date("Y-m-d 23:59:59", strtotime($end_date));  
			$this->db->where('update_date <=', $end_date);
		}
		$query = $this->db->get(); 

		foreach($query->result_array() as $row){ 
			$row['user_name'] = $this->Base_model->getUserName($row['user_id']);
			$row['pending_days'] = $row['roi_days']-$row['roi_count'];
			$details[] = $row;
		}
        // print_r($details);die();
		return $details;
	}
	public function getBlockRoiUsersDetails($user_id='',$from_date='',$end_date='')
	{
		$details = array();

		$this->db->select('*');
		$this->db->from('blocked_roi_users');
		if($user_id)
		{
			$this->db->where('user_id',$user_id);
		}
		if($from_date){
			$from_date = date("Y-m-d 00:00:00", strtotime($from_date)); 
			$this->db->where('updated_date >=', $from_date); 
			$this->db->where('inserted_date >=', $from_date); 
		}

		if($end_date){ 
			$end_date = date("Y-m-d 23:59:59", strtotime($end_date));  
			$this->db->where('updated_date <=', $end_date);
			$this->db->where('inserted_date <=', $end_date);
		}
		$query = $this->db->get(); 

		foreach($query->result_array() as $row){ 
			$row['user_name'] = $this->Base_model->getUserName($row['user_id']);
			$row['full_name'] = $this->Base_model->getFullName($row['user_id']);
			$details[] = $row;
		}
        // print_r($details);die();
		return $details;
	}
	public function getMonolinesUsers($user_id,$type,$admin_id) {
		$sponsor_name = array();
		$this->db->select('ms.*,ui.package_id,ui.user_name,ui.date_of_joining,pkd.name as package_name')
		->from('monoline_structure as ms')
		->join('user_info as ui','ui.user_id=ms.user_id')
		->join('package_details as pkd','pkd.package_id=ui.package_id')
		->where('ms.user_id!=',$user_id)
		->where('ms.user_id <',$user_id)
		->order_by('ms.id','DESC')
		->limit(20);
			$this->db->where('ms.user_id <',$user_id);
			$this->db->where('ms.user_id !=',$admin_id);
		
		$query = $this->db->get();
		foreach ($query->result_array() as $row) {
			$sponsor_name[] = $row;
		}
		return $sponsor_name;
	}
}