<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends Base_Controller {

	function __construct()
	{
		parent::__construct(); 	
	}

	public function user_joining() {

		$data['title'] = lang('user_joining');		
		$details =[];
		$post_arr = $this->input->post();
		if ($this->input->post('submit') == 'search')
		{
			$post_arr = $this->input->post();
			$from_date = $post_arr['from_date'];
			$end_date = $post_arr['end_date']; 
			if(element('country',$post_arr)) {
				$this->load->model('Zone_model');
				$country = $post_arr['country'];
				$post_arr['country_name'] = $this->Zone_model->IdToCountryName($post_arr['country']);
			}
			$data['post_arr'] = $post_arr;
		}
		$this->loadView($data);
	}
	public function get_UserJoining_ajax() {
		if ($this->input->is_ajax_request()) {
			$draw = $this->input->post('draw');
			$post_arr = $this->input->post();
			$post_arr['sponsor_id']=log_user_id();
			$count_without_filter = $this->Report_model->getActiveInactiveajaxCount('',$post_arr['sponsor_id']);
			$count_with_filter = $this->Report_model->getUserJoiningAjax($post_arr, 1);
			$result_data = $this->Report_model->getUserJoiningAjax($post_arr);
			$response = array(
				"draw" => intval($draw),
				"iTotalRecords" => $count_without_filter,
				"iTotalDisplayRecords" => $count_with_filter,
				"aaData" => $result_data,
			);

			echo json_encode($response);
		}
	}

	public function wallet_details() {

		$data['title'] = lang('wallet_details');
		$details = $post_arr = [];
		if ($this->input->post('submit') == 'search')
		{
			$post_arr = $this->input->post();
			$user_id = log_user_id();
			$wallet = '';

			if(element('amt_type',$post_arr)) {

				$wallet = implode(",", $post_arr['amt_type']);
				$post_arr['wallet']=$wallet;
			}
			$data['post_arr'] = $post_arr;
		}
		$post['type']='wallet_withdrawal';
		$post['transaction_fee']='yes';
		$data['amt_type']=$this->Report_model->getAllAmtTypes($post);
		$this->loadView($data);
	}
	public function get_WalletDetails_ajax() {
		if ($this->input->is_ajax_request()) {
			$draw = $this->input->post('draw');
			$post_arr = $this->input->post();
			$post_arr['user_id']=log_user_id();
			
			$count_without_filter = $this->Report_model->getWalletDetailsajaxCount($post_arr['user_id']);
			$count_with_filter = $this->Report_model->getUserWalletDetailsAjax($post_arr, 1);
			$result_data = $this->Report_model->getUserWalletDetailsAjax($post_arr,'');
			$response = array(
				"draw" => intval($draw),
				"iTotalRecords" => $count_without_filter,
				"iTotalDisplayRecords" => $count_with_filter,
				"aaData" => $result_data,
			);

			echo json_encode($response);
		}
	}

	public function add_deduct_amount() {

		$data['title'] = lang('add_deduct_amount');

		$user_id = log_user_id();
		$amount_type_id = $this->Base_model->getAmountTypeIdByString('add_fund');
		if ($this->input->post('submit') == 'search')
		{
			$post_arr = $this->input->post();
			$from_date = $post_arr['from_date'];
			$end_date = $post_arr['end_date']; 
			
			// $post_arr['amount_type_id']=$this->Base_model->getAmountTypeIdByString($post_arr['transaction_type']);
			$data['post_arr']=$post_arr;
		}
		$this->loadView($data);
	}
	public function get_AddDudct_ajax() {
		if ($this->input->is_ajax_request()) {
			$draw = $this->input->post('draw');
			$post_arr = $this->input->post();
			$post_arr['user_id']=log_user_id();
			$count_without_filter = $this->Report_model->getAddDuductajaxCount($post_arr['user_id']);
			$count_with_filter = $this->Report_model->getAddDeductReportAjax($post_arr, 1);
			$result_data = $this->Report_model->getAddDeductReportAjax($post_arr);
			$response = array(
				"draw" => intval($draw),
				"iTotalRecords" => $count_without_filter,
				"iTotalDisplayRecords" => $count_with_filter,
				"aaData" => $result_data,
			);

			echo json_encode($response);
		}
	}
	

	public function package_purchase_report() {

		$data['title'] = lang('package_purchase_report');
		$user_id = log_user_id();		
		if ($this->input->post('submit') == 'search')
		{
			$post_arr = $this->input->post();
			
			$from_date = $post_arr['from_date'];
			$end_date = $post_arr['end_date']; 
			$data['post_arr'] = $post_arr;
		}
		$this->loadView($data);
	}
	public function get_PackagePurchase_ajax() {
		if ($this->input->is_ajax_request()) {
			$draw = $this->input->post('draw');
			$post_arr = $this->input->post();
			$post_arr['user_id']=log_user_id();
			$count_without_filter = $this->Report_model->getPackagePurchaseajaxCount($post_arr['user_id']);
			$count_with_filter = $this->Report_model->getPackagePurchaseHistoryAjax($post_arr, 1);
			$result_data = $this->Report_model->getPackagePurchaseHistoryAjax($post_arr);
			$response = array(
				"draw" => intval($draw),
				"iTotalRecords" => $count_without_filter,
				"iTotalDisplayRecords" => $count_with_filter,
				"aaData" => $result_data,
			);

			echo json_encode($response);
		}
	}
	

	public function wallet_summary() {
		$account_details = array(); 
		$user_id=log_user_id();
		$total=0;
		$table = '';

		$category_name='';
		$this->load->model('Business_model');
		if($this->input->post('view_details') )
		{ 
			$post_arr = $this->input->post();
			$data['category_id'] = $post_arr['category'];
			if(element('category',$post_arr)) {

				$category_name = $this->Base_model->getAmountTypeName($post_arr['category']);
			}
			// print_r($post_arr);die();
			$post_arr['category_name'] = $category_name;
			if($post_arr['category_name'] =='fund_transfer' ){
				$table = 'fund_transfer';
			}elseif($post_arr['category_name'] =='referral_bonus' ){
				$table = 'referral_bonus';	
			}elseif($post_arr['category_name'] =='rank_bonus' ){
				$table = 'rank_bonus';	
			}elseif($post_arr['category_name'] =='level_bonus'|| $post_arr['category_name'] =='missed_income' ){
				$table = 'level_bonus';	
			}elseif($post_arr['category_name'] =='add_fund' || $post_arr['category_name'] =='deduct_fund')
			{
				$table = 'add_deduct_fund';	
			}elseif($post_arr['category_name'] =='global_bonus'){
				$table = 'global_bonus';	
			}elseif($post_arr['category_name'] =='global_pending_bonus'){
				$table = 'global_bonus';	
			}
			elseif($post_arr['category_name'] =='payout_request' || $post_arr['category_name'] =='payout_delete'|| $post_arr['category_name'] =='wallet_withdrawal')
			{
				$table = 'payout_fund';	
			}elseif($post_arr['category_name'] =='matrix_bonus'){
				$table = 'matrix_bonus';	
			}
			$total = $this->Report_model->getSummaryDetail($user_id,$post_arr['category_name'],$table);	
			// 
		}
		$data['category_name'] = $category_name;
		$data['total']=$total;
		$data['table']=$table;
		$category_details = $this->Business_model->getCategoryDetails(); 
		$data['category_details'] = $category_details;
		$data['title'] = lang('summary'); 
		$this->loadView($data);
	}

	public function get_WalletSummary_ajax() {
		if ($this->input->is_ajax_request()) {
			$table = '';
			$draw = $this->input->post('draw');
			$post_arr = $this->input->post();
			$post_arr['user_id']=log_user_id();
			$table = $post_arr['table'];
			$count_without_filter = $this->Report_model->getWalletSummaryCount($post_arr['user_id'],$table);
			$count_with_filter = $this->Report_model->getSummaryDetailAjax($post_arr, 1,$table);
			$result_data = $this->Report_model->getSummaryDetailAjax($post_arr,'',$table);

			$response = array(
				"draw" => intval($draw),
				"iTotalRecords" => $count_without_filter,
				"iTotalDisplayRecords" => $count_with_filter,
				"aaData" => $result_data,
			);

			echo json_encode($response);

		}
	}
	
	public function rank_report() {
		$data['title'] = lang('rank_report');
		$post_arr = $this->input->post();
		$post_arr['end_date'] = date('Y-m-d'); 
		$post_arr['from_date'] = date("Y-m-d", strtotime("-1 month", strtotime($post_arr['end_date'])));
		if ($this->input->post('submit') == 'search')
		{
			$post_arr = $this->input->post();
			$user_id = $sponsor_id = '';
		}
		$data['post_arr'] = $post_arr;
		$data['rank_details'] = $this->Base_model->getRankDetail(); 
		$this->loadView($data);
	}

	public function get_RankReport_ajax() {
		if ($this->input->is_ajax_request()) {
			$draw = $this->input->post('draw');
			$post_arr = $this->input->post();
			$post_arr['user_id']=log_user_id();
			$count_without_filter = $this->Report_model->getRankReportajaxCount();
			$count_with_filter = $this->Report_model->getRankReportAjax($post_arr, 1);
			$result_data = $this->Report_model->getRankReportAjax($post_arr);
			$response = array(
				"draw" => intval($draw),
				"iTotalRecords" => $count_without_filter,
				"iTotalDisplayRecords" => $count_with_filter,
				"aaData" => $result_data,
			);
			echo json_encode($response);
		}
	}
	public function change_sponsor_name_report() {

		$data['title'] = lang('change_sponsor_name_report');

		
		$post_arr = $this->input->post();
		if ($this->input->post('submit') == 'search')
		{
			$user_id = log_user_id();
			
			$from_date = $post_arr['from_date'];
			$end_date = $post_arr['end_date']; 
			$details=$this->Report_model->getSponsorNameUpdations($user_id,$from_date,$end_date);
			$data['post_arr'] = $post_arr;
			$data['details'] = $details;
		}


		$this->loadView($data);
	}
	public function roi_details() {
		$data['title'] = lang('roi_details');
		if ($this->input->post('submit') == 'search')
		{
			$post_arr = $this->input->post();
			$user_id = log_user_id();
			
			$post_arr['user_names'] = $this->Base_model->getUserName($user_id);
			
			$post_arr['from_date'] = ($post_arr['from_date']) ? $post_arr['from_date'] : date('Y-m-01');

			$post_arr['end_date'] = ($post_arr['end_date']) ? $post_arr['end_date'] : date('Y-m-t');
			
			$from_date = $post_arr['from_date'];
			$end_date = $post_arr['end_date']; 
			$data['roi_details']=$this->Report_model->getRoiDetails($user_id,$from_date,$end_date);
			$data['post_arr'] = $post_arr;
		}

		$this->loadView($data);
	}
	public function block_roi_users_history() {
		$data['title'] = lang('block_roi_users_history');
		if ($this->input->post('submit') == 'search')
		{
			$post_arr = $this->input->post();
			$user_id = log_user_id();
			
			$post_arr['from_date'] = ($post_arr['from_date']) ? $post_arr['from_date'] : date('Y-m-01');

			$post_arr['end_date'] = ($post_arr['end_date']) ? $post_arr['end_date'] : date('Y-m-t');
			
			$from_date = $post_arr['from_date'];
			$end_date = $post_arr['end_date']; 
			$data['roi_users']=$this->Report_model->getBlockRoiUsersDetails($user_id,$from_date,$end_date);
			$data['post_arr'] = $post_arr;
		}

		$this->loadView($data);
	}
	public function pending_global() {
		$account_details = array(); 
		$post_arr['user_id']='';
		$user_name = log_user_name(); 
		$post_arr['category_name']='';
		$table = '';
		$this->load->model('Business_model');
		if($this->input->post('view_details') )
		{ 
			$post_arr = $this->input->post();
			if(element('user_name',$post_arr)) {
				$post_arr['user_names'] = $this->Base_model->getUserName($post_arr['user_name']);
				$post_arr['user_id'] = $post_arr['user_name'];
			}
		} 
		$data['post_arr']=$post_arr;
		$data['title'] = 'Pending Global Bonus'; 
		$this->loadView($data);
	}
	public function monoline_users() {
		$admin_id=$this->Base_model->getAdminid();
		$data['users']=$this->Report_model->getMonolinesUsers(log_user_id(),'',$admin_id);
		$data['title'] = 'Monoline Users'; 
		$this->loadView($data);
	}
}