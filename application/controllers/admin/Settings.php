<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Base_Controller {

	function __construct()
	{
		parent::__construct(); 	
	}

	function site_info()
	{     

		$data['title'] = lang('site_info');
		$site_info = $this->data[ 'site_details' ];
		$data['timezones'] =  DateTimeZone::listIdentifiers(DateTimeZone::ALL);
		
		if( $this->input->post('update') && $this->validate_update_siteinfo() ){
			$this->load->config('ssl');
			$demo_mode=$this->config->item('demo_mode');
			if($demo_mode)
			{
				$msg=lang('site_under_demo_mode');

				$this->redirect( $msg, "settings/site-info", FALSE);

			} 
			$post_arr = $this->input->post();
			// print_r($post_arr);die();
			$post_arr['fav'] = $site_info['favicon'];

			$post_arr['file_name'] = $site_info['logo'];
			
			if($_FILES['userfile']['error'] != 4)
			{
				$config['upload_path'] = './assets/images/logo/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '10000';

				$config['file_name'] = 'logo';


				$this->load->library('upload', $config);
				$msg = '';

				if (!$this->upload->do_upload()) {
					$msg = lang('logo_not_selected');
					$error = $this->upload->display_errors();
					$this->redirect( $error, "settings/site-info", false );
				} else {
					$logo_arr = $this->upload->data();  
					$post_arr['file_name'] = $logo_arr['file_name'];

				}
			}


			
			if($_FILES['favicon']['error'] != 4)
			{
				$config['upload_path'] = './assets/images/logo/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '10000';
				
				$config['file_name'] = 'favicon';


				$this->load->library('upload', $config);
				$msg = '';
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('favicon')) {
					$msg = lang('logo_not_selected');
					$error = $this->upload->display_errors();
					$this->redirect( $error, "settings/site-info", false );
				} else {
					$fav_arr = $this->upload->data();  
					$post_arr['fav'] = $fav_arr['file_name'];
				}
			}

			$update = $this->Settings_model->updateSiteInfo($post_arr);
			if($update){
				$this->Base_model->insertIntoActivityHistory('',log_user_id(), 'site_info_update', serialize($post_arr));
				$this->redirect(lang('site_info_updated'), "settings/site-info", TRUE);
			}else{
				$this->redirect(lang('error_site_info_updation'), "settings/site-info", FALSE);
			}
		} 
	
		$this->loadView($data);
	}
	function validate_update_siteinfo(){

		$this->form_validation->set_rules('name',lang('name'),'required');
		$this->form_validation->set_rules('email',lang('email'),'required|valid_email');
		$this->form_validation->set_rules('phone',lang('phone'),'required|numeric');
		$this->form_validation->set_rules('address',lang('address'),'required');
		$this->form_validation->set_rules('facebook',lang('facebook'),'required');
		$this->form_validation->set_rules('twitter',lang('twitter'),'required');
		$this->form_validation->set_rules('time_zone',lang('time_zone'),'required');
		$result =  $this->form_validation->run();
		return $result;
		
		
	}

	function plan_management()
	{ 
		$data['title'] = lang('plan_management');
		if($this->input->post('referral') && $this->validate_plan())
		{
			$post_arr = $this->input->post();
			$select_arr = 'referral_amount,min_withdraw_amt,signup_amount,max_withdraw_amt,transaction_fee,global_community_pool_bonus';
			$config = $this->Base_model->getConfig($select_arr);
			if($post_arr['transaction_fee']==$config['transaction_fee']&& $post_arr['global_community_pool_bonus']==$config['global_community_pool_bonus']){
				$msg = lang('no_changes_made');
				$this->redirect($msg, "settings/plan-management", FALSE);
			}
			else
			{
				foreach($post_arr as $key=>$v)
				{	
					if($v !='Update')
						$update=$this->Settings_model->updatePlan($key,$v);
				}
				if($update){
					$this->Base_model->insertIntoActivityHistory('',log_user_id(), 'plan_settings', serialize($post_arr));
					$this->redirect(lang('updated_successfully'), "settings/plan-management", TRUE);
				}else{
					$this->redirect(lang('error_on_updation'), "settings/plan-management", FALSE);
				}

			}
		}
		if($this->input->post('Configuration') && $this->validate_config())
		{
			$post_arr = $this->input->post();
			$select_arr = 'tree_level,user_name_max_len,phone_number_length,matrix_bonus';
			$config = $this->Base_model->getConfig($select_arr);
			if($post_arr['tree_level']==$config['tree_level'] && $post_arr['user_name_max_len']==$config['user_name_max_len'] && $post_arr['phone_number_length']==$config['phone_number_length'] && $post_arr['matrix_bonus']==$config['matrix_bonus']){
				$msg = lang('no_changes_made');
				$this->redirect($msg, "settings/plan-management", FALSE);
			}
			else
			{
				foreach($post_arr as $key=>$v)
				{	
					if($v !='Update')
						$update=$this->Settings_model->updatePlan($key,$v);
				}
				if($update){
					$this->Base_model->insertIntoActivityHistory('',log_user_id(), 'configuration_updated', serialize($post_arr));
					$this->redirect(lang('updated_successfully'), "settings/plan-management", TRUE);
				}else{
					$this->redirect(lang('error_on_updation'), "settings/plan-management", FALSE);
				}

			}
		}
		if($this->input->post('level'))
		{
			$post_arr = $this->input->post();
			unset($post_arr['level']);
			if(!empty($post_arr)){

				$update=$this->Settings_model->updatelevelDetails($post_arr);
				if($update){
					$this->Base_model->insertIntoActivityHistory('',log_user_id(), 'level_managment', serialize($post_arr));
					$this->redirect(lang('updated_successfully'), "settings/plan-management", TRUE);
				}else{
					$this->redirect(lang('no_changes_made'), "settings/plan-management", FALSE);
				}
			}else{
				$this->redirect(lang('no_levels'), "settings/plan-management", TRUE);
			}
		}
		$data['level_details'] = $this->Settings_model->getlevelDetails();
		$this->loadView($data);
	}
	// function validate_plan_management($field)
	// {
		
	// 	if($field == 'referral'){
	// 		$this->form_validation->set_rules('referal_amount',lang('referral_amount'),'required|numeric');

	// 		$result =  $this->form_validation->run();
	// 		return $result; 
	// 	}
	// 	else if($field == 'minimum_withdraw_amount'){
	// 		$this->form_validation->set_rules('minimum_withdraw',lang('minimun_withdrawn_amount'),'required|numeric');

	// 		$result =  $this->form_validation->run();
	// 		return $result; 
	// 	}else if($field == 'minimum_withdraw_amount'){
	// 		$this->form_validation->set_rules('minimum_withdraw',lang('minimun_withdrawn_amount'),'required|numeric');

	// 		$result =  $this->form_validation->run();
	// 		return $result; 
	// 	}
	// 	else if($field == 'signup_amount_value'){
	// 		$this->form_validation->set_rules('signup_amount',lang('signup_amount'),'required|numeric');

	// 		$result =  $this->form_validation->run();
	// 		return $result; 
	// 	}
	// 	else if($field == 'tree_level_value'){
	// 		$this->form_validation->set_rules('tree_level',lang('tree_level'),'required|numeric');

	// 		$result =  $this->form_validation->run();
	// 		return $result; 
	// 	}
	// 	else if($field == 'user_name_maximum'){
	// 		$this->form_validation->set_rules('user_name_max_len',lang('user_name_max_len'),'required|numeric');

	// 		$result =  $this->form_validation->run();
	// 		return $result; 
	// 	}
	// 	else if($field == 'password_minimum'){
	// 		$this->form_validation->set_rules('password_min_len',lang('minimun_password_length'),'required|numeric');

	// 		$result =  $this->form_validation->run();
	// 		return $result; 
	// 	}
	// 	else if($field == 'password_maximum'){
	// 		$this->form_validation->set_rules('password_max_len',lang('maximum_password_length'),'required|numeric');

	// 		$result =  $this->form_validation->run();
	// 		return $result; 
	// 	}
	// 	else if($field == 'phone_number'){
	// 		$this->form_validation->set_rules('phone_number_length',lang('phone_num_len'),'required|numeric');

	// 		$result =  $this->form_validation->run();
	// 		return $result; 
	// 	}
	// }

	function validate_plan()
	{		
		// $this->form_validation->set_rules('min_withdraw_amt',lang('min_withdraw_amt'),'required|numeric|greater_than[0]');
		// $this->form_validation->set_rules('max_withdraw_amt',lang('max_withdraw_amt'),'required|numeric|greater_than[0]');
		// $this->form_validation->set_rules('signup_amount',lang('signup_amount'),'required|numeric|greater_than[0]');
		$this->form_validation->set_rules('global_community_pool_bonus',lang('global_community_pool_bonus'),'required|numeric|greater_than[0]');
		$this->form_validation->set_rules('transaction_fee',lang('transaction_fee'),'required|numeric|greater_than[0]');

		$result =  $this->form_validation->run();
		return $result; 
	}
	function validate_config()
	{		
		$this->form_validation->set_rules('tree_level',lang('tree_level'),'required|numeric|greater_than[0]');
		$this->form_validation->set_rules('user_name_max_len',lang('user_name_max_len'),'required|numeric|greater_than[0]');
		$this->form_validation->set_rules('phone_number_length',lang('phone_number_length'),'required|numeric|greater_than[0]');
		$this->form_validation->set_rules('matrix_bonus',lang('matrix_bonus'),'required|numeric|greater_than[0]');

		$result =  $this->form_validation->run();
		return $result; 
	}

function package_management()
{     
	$data['title'] = lang('package_management');
	$data['package_details'] = $this->Settings_model->getPackageDetails('', 'all','registration');
	$data['package_details_purchase'] = $this->Settings_model->getPackageDetails('', 'all','purchase');

	$this->loadView($data);
}
function add_package($enc_id='')
{  
	$package_id = $this->Base_model->encrypt_decrypt('decrypt', $enc_id);   
	$data['title'] = lang('edit_package');
	if($enc_id){
		$data['single_details'] = $this->Settings_model->getPackageDetails($package_id,'all');
		}// print_r($data['single_details']);die();
		if($this->input->post('update')&&$this->validate_package()){
			$this->load->config('ssl');
			$demo_mode=$this->config->item('demo_mode');
			if($demo_mode)
			{
				$msg=lang('site_under_demo_mode');

				$this->redirect( $msg, "settings/package-management", FALSE);

			}
			$post_arr = $this->input->post();
			$update = $this->Settings_model->updatePackageDetails($post_arr,$package_id);
			if($update){
				$this->redirect(lang('package_details'), "settings/package-management", TRUE);
			}
			else{
				$this->redirect(lang('error_on_package_details_updation'), "settings/package-management", FALSE);	
			}

		}
		if($this->input->post('add')){
			$this->load->config('ssl');
			$demo_mode=$this->config->item('demo_mode');
			if($demo_mode)
			{
				$msg='Site Under Demo Mode';

				$this->redirect( $msg, "settings/package-management", FALSE);

			}
			$post_arr = $this->input->post();
			// print_r($post_arr);die();
			$result = $this->Settings_model->insertPackageDetails($post_arr);
			if($result){
				$this->redirect(lang('package_details_inserted_successfully'), "settings/package-management", TRUE);
			}
			else{
				$this->redirect(lang('error_on_package_details_insertion'), "settings/package-management", FALSE);	
			}

		}

		$this->loadView($data);
	}

	function validate_package(){
		$this->form_validation->set_rules('package_name',lang('package'),'required');
		$this->form_validation->set_rules('amount',lang('amount'),'required|numeric');
		// $this->form_validation->set_rules('type',lang('type'),'required');
		// $this->form_validation->set_rules('sort_order',lang('sort_order'),'required|numeric');
		// $this->form_validation->set_rules('roi',"Roi",'required|numeric');
		$result =  $this->form_validation->run();
		return $result;
	}
	function email_template($enc_id='')
	{     
		$data['title'] = lang('email_template');
		$data['mail_contents'] = $this->Settings_model->getEmailContents();
		// print_r($data['mail_contents']);die();

		$this->loadView($data);
	}

	function add_email_template($enc_id='',$action='')
	{  
		$id = $this->Base_model->encrypt_decrypt('decrypt', $enc_id);   
		$data['title'] = lang('edit_mail');
		$data['single_details'] = $this->Settings_model->getEmailContents($id);
		if($this->input->post('update')){
			$this->load->config('ssl');
			$demo_mode=$this->config->item('demo_mode');
			if($demo_mode)
			{
				$msg=lang('site_under_demo_mode');

				$this->redirect( $msg, "settings/email-template", FALSE);

			}
			$post_arr = $this->input->post();
			$update = $this->Settings_model->updateEmailContents($post_arr,$id);
			if($update){
				$this->redirect(lang('email_template_update'), "settings/email-template", TRUE);
			}
			else{
				$this->redirect(lang('error_on_email'), "settings/email-template", FALSE);	
			}

		}
		if($action=='delete'){
			$this->load->config('ssl');
			$demo_mode=$this->config->item('demo_mode');
			if($demo_mode)
			{
				$msg=lang('site_under_demo_mode');

				$this->redirect( $msg, "settings/email-template", FALSE);

			}
			$delete = $this->Settings_model->deleteEmailContents($id,1);
			if($delete){
				$this->redirect(lang('email_template_update'), "settings/email-template", TRUE);
			}
			else{
				$this->redirect(lang('error_on_email'), "settings/email-template", FALSE);	
			}

		}
		if($action=='recover'){
			$this->load->config('ssl');
			$demo_mode=$this->config->item('demo_mode');
			if($demo_mode)
			{
				$msg=lang('site_under_demo_mode');

				$this->redirect( $msg, "settings/email-template", FALSE);

			}		
			$delete = $this->Settings_model->deleteEmailContents($id,0);
			if($delete){
				$this->redirect(lang('email_template_update'), "settings/email-template", TRUE);
			}
			else{
				$this->redirect(lang('error_on_email'), "settings/email-template", FALSE);	
			}

		}
		if($this->input->post('add') && $this->validate_email_template()){
			$this->load->config('ssl');
			$demo_mode=$this->config->item('demo_mode');
			if($demo_mode)
			{
				$msg=lang('site_under_demo_mode');

				$this->redirect( $msg, "settings/email-template", FALSE);

			}
			$post_arr = $this->input->post();
			$result = $this->Settings_model->insertEmailContents($post_arr);
			if($result){
				$this->redirect(lang('email_template_update'), "settings/email-template", TRUE);
			}
			else{
				$this->redirect(lang('error_on_email'), "settings/email-template", FALSE);	
			}

		}

		$this->loadView($data);
	}

	function welcome_letter($enc_id='')
	{     
		$data['title'] = lang('welcome_letter');
		$data['single_details'] = $this->Settings_model->getEmailContents('','welcome_letter');

		if(!empty($data['single_details'])){
			if($this->input->post('update')){
				$this->load->config('ssl');
				$demo_mode=$this->config->item('demo_mode');
				if($demo_mode)
				{
					$msg=lang('site_under_demo_mode');

					$this->redirect( $msg, "settings/welcome-letter", FALSE);

				}

				$post_arr = $this->input->post();
				$post_arr['type'] = 'welcome_letter';
				$update = $this->Settings_model->updateEmailContents($post_arr,$data['single_details']['id']);
				if($update){
					$this->redirect(lang('welcome_letter'), "settings/welcome-letter", TRUE);
				}
				else{
					$this->redirect(lang('error_on'), "settings/welcome-letter", FALSE);	
				}

			}

			$this->loadView($data);
		}
	}

	function t_and_c($enc_id='')
	{     
		$data['title'] = lang('terms_and_conditions');
		$data['single_details'] = $this->Settings_model->getEmailContents('','T&C'); 
		if(!empty($data['single_details'])){
			if($this->input->post('update')){
				$this->load->config('ssl');
				$demo_mode=$this->config->item('demo_mode');
				if($demo_mode)
				{
					$msg=lang('site_under_maintenance');

					$this->redirect( $msg, "settings/t-and-c", FALSE);

				}

				$post_arr = $this->input->post();
				$post_arr['type'] = 'T&C';
				$update = $this->Settings_model->updateEmailContents($post_arr,$data['single_details']['id']);
				
				if($update){
					$this->redirect(lang('updated_successfully'), "settings/t-and-c", TRUE);
				}
				else{
					$this->redirect(lang('error_on_updation'), "settings/t-and-c", FALSE);	
				}

			}

			$this->loadView($data);
		}
	}

	function privacy_policy($enc_id='')
	{     
		$data['title'] = lang('privacy_policy');
		$data['single_details'] = $this->Settings_model->getEmailContents('','privacy_policy'); 
		if(!empty($data['single_details'])){
			if($this->input->post('update')){

		// print_r($data['single_details']);die();
				$post_arr = $this->input->post();
				$post_arr['type'] = 'privacy_policy';
				$update = $this->Settings_model->updateEmailContents($post_arr,$data['single_details']['id']);
				
				if($update){
					$this->redirect(lang('updated_successfully'), "settings/privacy-policy", TRUE);
				}
				else{
					$this->redirect(lang('error_on_updation'), "settings/privacy-policy", FALSE);	
				}

			}

			$this->loadView($data);
		}
	}


	public function validate_email_template()
	{
		$this->form_validation->set_rules('type',lang('type'),'required');
		$this->form_validation->set_rules('content',lang('Content'),'required');
		
		$result =  $this->form_validation->run();
		return $result;
	}
	function rank_management()
	{     
		$data['title'] = lang('rank_management');
		$data['rank_details'] = $this->Settings_model->getRankDetails('', 'all');
		// print_r($data['rank_details']);die();

		$this->loadView($data);
	}


	function add_rank($enc_id='')
	{  
		$rank_id = $this->Base_model->encrypt_decrypt('decrypt', $enc_id);   
		$data['title'] = lang('edit_rank');
		if($enc_id){
			$data['single_details'] = $this->Settings_model->getRankDetails($rank_id,'all');
			// print_r($data['single_details']);die();
		}
		if($this->input->post('update')&&$this->validate_rank()){
			$this->load->config('ssl');
			$demo_mode=$this->config->item('demo_mode');
			if($demo_mode)
			{
				$msg=lang('site_under_maintenance');

				$this->redirect( $msg, "settings/rank-management", FALSE);

			}
			$post_arr = $this->input->post();
			// print_r($post_arr);die();
			$update = $this->Settings_model->updateRankDetails($post_arr,$rank_id);
			if($update){
				$this->redirect(lang("rank_details_updated_successfully"), "settings/rank-management", TRUE);
			}
			else{
				$this->redirect(lang('rank_details_updation'), "settings/rank-management", FALSE);	
			}

		}
		if($this->input->post('add')){
			$this->load->config('ssl');
			$demo_mode=$this->config->item('demo_mode');
			if($demo_mode)
			{
				$msg=lang('site_under_maintenance');

				$this->redirect( $msg, "settings/rank-management", FALSE);

			}
			$post_arr = $this->input->post();
			// print_r($post_arr);die();
			$result = $this->Settings_model->insertRankDetails($post_arr);
			if($result){
				$this->redirect(lang('rank_details_inserted_successfully'), "settings/rank-management", TRUE);
			}
			else{
				$this->redirect(lang('error_on_rank_details_insertion'), "settings/rank-management", FALSE);	
			}

		}

		$this->loadView($data);
	}
	function validate_rank(){

		$this->form_validation->set_rules('rank_name',lang('rank_name'),'required');
		$this->form_validation->set_rules('referral_count',lang('referral_count'),'required|numeric');
		$this->form_validation->set_rules('bonus',lang('bonus'),'required');
		$this->form_validation->set_rules('status',lang('status'),'required');

		
		$result =  $this->form_validation->run();
		return $result;
		
		
	}

	
	
	public function balance_sheet()
	{
		$data['title'] = lang('balance_sheet'); 
		

		$data['details']=$this->Settings_model->getBalanceSheetDetails();
		// print_r($data['details']);die();

		$this->loadView($data);
	}
	function validate_maintenance(){

		$this->form_validation->set_rules('title',lang('maintenance_mode_text'),'required');
		// $this->form_validation->set_rules('main_mode',lang('maintenance_mode'),'required');
		$result =  $this->form_validation->run();
		// print_r($this->form_validation->error_array());die();
		return $result;
		
		
	}
	function set_permission($employee_id="")
	{  

		$user_type = log_user_type();
		if($user_type == 'employee_id')
		{
			$this->redirect(lang('no_permission'), "dashboard/index", FALSE);
		}
		if(!$employee_id)
		{
			$msg = lang('invalid_employee_id');
			$this->redirect($msg, "settings/sub-admin", FALSE);
		}

		$data['title'] = lang('set_permission'); 
		$emp_id = $this->Base_model->encrypt_decrypt('decrypt',$employee_id);
		$emp_details = $this->Settings_model->getEmpDetails($emp_id);
		$data['emp_details'] = $emp_details;


		if ($this->input->post('set_permission'))
		{
			$post_arr = $this->input->post();
			$allowed_menu = serialize($post_arr["menus"]);
			$result = $this->Settings_model->updateEmployeeMenus($emp_id,$allowed_menu);
			if($result){
				$this->Base_model->insertIntoActivityHistory($emp_id,log_user_id(),'Employee permission updated',serialize($post_arr));
				$msg = lang('employee_permission_allocated_successfully');
				$this->redirect($msg, "settings/set-permission/$employee_id", TRUE);
			}
			else{
				$msg = lang('error_on_allocating_permission');
				$this->redirect($msg, "settings/set-permission/$employee_id", FALSE);
			}
		}

		$employee_menus = $this->Base_model->getSideMenu('pre_user');
		$data['employee_menus'] = $employee_menus;
		
		$permitted_menus = $this->Base_model->getEmployeePermittedMenus($emp_id);
		$perm_menus = unserialize($permitted_menus);
		$data['perm_menus'] = $perm_menus;

		$this->loadView($data);
	}
	function validate_update($email='')
	{
		$post_arr=$this->input->post();
		$len_mob = value_by_key("phone_number_length");
		$this->form_validation->set_rules('first_name', lang('firstname'), 'trim|required');
		$this->form_validation->set_rules('second_name', lang('Second_name'), 'trim|required');
		if($email!=$post_arr['email_id'])
			$this->form_validation->set_rules('email_id', lang('text_email_id'), 'trim|required|valid_email|is_unique[user_info.email]', array('is_unique' => 'Email already used'));
		$this->form_validation->set_rules('mobile', lang('mobile'), 'trim|required|min_length['.$len_mob.']|max_length['.$len_mob.']|numeric');
		
		
		$result =  $this->form_validation->run();
		//print_r($this->form_validation->error_array());die();
		return $result;
	}
	
	function validate_new_pswd()
	{
		$password_length_min = value_by_key('password_min_len');
		$password_length_max = value_by_key('password_max_len');

		$this->form_validation->set_rules('new_password', lang('new_password'), 'required|min_length['. $password_length_min .']|max_length['.$password_length_max.']|differs[old_password]|alpha_numeric');
		$this->form_validation->set_rules('confirm_password', lang('confirm_password'), 'required|min_length['. $password_length_min .']|max_length['.$password_length_max.']|matches[new_password]');
		$result =  $this->form_validation->run();

		return $result;
		
	}
	function validate_add_emp() 
	{
		$len_mob = value_by_key("phone_number_length");
		$this->form_validation->set_rules('first_name', lang('firstname'), 'trim|required');
		$this->form_validation->set_rules('second_name', lang('second_name'), 'trim|required');
		$this->form_validation->set_rules('email_id', lang('email_id'), 'trim|required|valid_email|is_unique[user_info.email]', array('is_unique' => 'Email already used' ));
		$this->form_validation->set_rules('mobile', lang('mobile'), 'trim|required|min_length['.$len_mob.']|max_length['.$len_mob.']|numeric');
		$this->form_validation->set_rules('password', lang('password'), 'trim|required|matches[cnf_password]');
		$this->form_validation->set_rules('cnf_password', lang('confirm_password'), 'trim|required');
		$result =  $this->form_validation->run();

		return $result;
	}
	function sub_admin()
	{  
		$data['title'] = lang('sub_admin'); 
		$emp_details = $this->Settings_model->getEmpDetails();
		$data['emp_details'] = $emp_details;
		$this->loadView($data);
	}
	function edit_employee($emp_id='')
	{  

		$data['title'] = lang('employee_details'); 
		$employee_id = $this->Base_model->encrypt_decrypt('decrypt',$emp_id);
		if($emp_id)
		{
			$data['emp_details']=$this->Settings_model->getEmpDetails($employee_id);
			
			if($this->input->post('update_employee') && $this->validate_update($data['emp_details']['email']))
			{

				$this->Settings_model->begin();
				$post_arr = $this->input->post();
				$result = $this->Settings_model->updateEmployeeDetails($post_arr,$employee_id);
				if($result){
					$this->Settings_model->commit();
					if ($result) {
						$serialized_data = serialize($post_arr);
						$result = $this->Base_model->insertIntoActivityHistory($employee_id, log_user_id(),'Employee updated',$serialized_data);
					}
					$msg = lang('employee_updated_successfully');
					$this->redirect($msg, "settings/sub-admin", TRUE);
				}
				else{
					$this->Settings_model->rollback();
					$msg = lang('error_on_editing_employee');
					$this->redirect($msg, "settings/sub-admin", FALSE);
				}

			}

			if($this->input->post('psw_update') && $this->validate_new_pswd())
			{ 

				$post_arr = $this->input->post();
				$this->config->load('bcrypt');
				$this->load->library('bcrypt');
				$hashed_password = $this->bcrypt->hash_password( $post_arr['new_password'] );
			// print_r($hashed_password);die();
				$update=$this->Settings_model->update_Password($hashed_password, $employee_id);
			// print_r($update);die();
				if($update){
					$this->redirect(lang('password_updated_successfully'), "settings/sub-admin", TRUE);
				}else{
					$this->redirect(lang('password_updation_failed'), "settings/sub-admin", FALSE);
				}
			}
			

		}
		
		
		if($this->input->post('add_employee') && $this->validate_add_emp() )
		{ 
			
			$post_arr = $this->input->post();
			//print_r($post_arr);die();
			$new_emp_id = $this->Settings_model->getFirstUserId();
			$this->Settings_model->begin();
			$result = $this->Settings_model->insertEmpDetails($post_arr,$new_emp_id);

			if($result){
				$this->Settings_model->commit();
				if ($result) {
					$serialized_data = serialize($post_arr);
					$result = $this->Base_model->insertIntoActivityHistory($new_emp_id, log_user_id(),'Employee registered',$serialized_data);
				}
				$msg = lang('employee_added_successfully');
				$this->redirect($msg, "settings/sub_admin", TRUE);
			}
			else{
				$this->Settings_model->rollback();
				$msg = lang('error_on_Adding_employee');
				$this->redirect($msg, "settings/sub_admin", FALSE);
			}
		}


		
		$this->loadView($data);
	}

	public function system_reset()
	{
		$data['title'] = lang('menu_system_reset');

		$this->load->model('Truncate_model');

		if($this->input->post('cleanup'))
		{

			$this->Truncate_model->begin();
			$result = $this->Truncate_model->truncateAll();

			if ($result['status']) { 
				$this->Truncate_model->commit(); 
				$this->redirect($result['message'], "settings/system-reset", TRUE);
			} else {
				$this->Truncate_model->rollback(); 
				$this->redirect($result['message'], "settings/system-reset", FALSE);
			}
			echo $result['message'];

		}
		if($this->input->post('clear'))
		{
			$this->Base_model->CleanupCache();
			$this->redirect(lang('cache_cleared'), "settings/system-reset", TRUE);
		}

		$this->loadView($data);
	}
	function change_sponsor()
	{     
		
		$data['title'] = lang('change_sponsorname');
		if($this->input->post('submit') && $this->validate_sponsor_name())
		{
			$this->Base_model->CleanupCache();
			$post_arr=$this->input->post();
			
			$user_id=$post_arr['user_name'];
			$previous_sponsor_id=$this->Base_model->getUserId($post_arr['sponsor']);
			$new_sponsor=$post_arr['new_sponsor'];
			if($previous_sponsor_id !=$new_sponsor && $new_sponsor != $user_id){
				$result=$this->Settings_model->changeSponsorName($user_id,$previous_sponsor_id,$new_sponsor);
				if ($result) { 

					$this->redirect('Sponsor Changed Successfully', "settings/change_sponsor", TRUE);
				} else {

					$this->redirect('Error on Updation', "settings/change_sponsor", FALSE);
				}
			}
			else{
				$this->redirect('No changes in Sponsorsor Name', "settings/change_sponsor", FALSE);
			}
			
		}
		
		$this->loadView($data);
	}

	
	function validate_sponsor_name() 
	{
		$this->form_validation->set_rules('new_sponsor', lang('new_sponsor'), 'trim|required');
		$this->form_validation->set_rules('user_name', lang('username'), 'trim|required');
		$result =  $this->form_validation->run();
		return $result;
	}
	function get_sponsor_name() {

		if($this->input->is_ajax_request()){
			$post = $this->input->post();
			$user_id =$post['user_id'];
			$sponsor_name=$this->Base_model->getSponsorName($user_id);
			$full_name=$this->Base_model->getFullName($user_id);

			$response['sponsor_name'] = $sponsor_name;
			$response['full_name'] = $full_name;
			$response['status'] = true;
			$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
			exit();
			
		}
	}


	function block_user()
	{  

		$data['title'] = "Block Users";



		if(log_user_type() == "sub_admin")
			$log_user_id = admin_user_id();
		else
			$log_user_id = log_user_id();
		if ($this->input->post('block_users')) {

			$post_arr = $this->input->post();
			$user_name = $post_arr['user_name'];
			$reason = $post_arr['reason'];
			//print_r($reason);die();
			$user_id = $this->Base_model->getUserId($user_name);
			if(!$user_id)
			{
				$msg = "Invalid User ID...";
				$this->redirect($msg, 'settings/block-user', FALSE);
			}

			$new_status = $this->Base_model->getUserStatus($user_id);
			if($new_status == 'no'){
				$msg = lang('user_already_inactive');
				$this->redirect($msg, "settings/block-user", FALSE);
			}else{
				$result = $this->Settings_model->updateUserStatus($user_id,'inactive');
				$activity=$this->Base_model->insertIntoActivityHistory($user_id,log_user_id(), 'user-blocked');
				if ($result && $activity) {
					$this->Settings_model->insertActivationHistory($user_id,'active','inactive',$reason);                       

					$msg ='user inactivated successfully';
					$this->redirect($msg, 'settings/block-user', TRUE);
				} else {
					$msg ='error on inactivate user';
					$this->redirect($msg, 'settings/block-user', FALSE);
				}
			}
		}
		$block_users_details = $this->Settings_model->getBlockedUsers();

		$data['block_users_details']=$block_users_details;
			// print_r($data['block_users_details']);die();
		$this->loadView($data);
	}

	function active_users() {
		$result = 0;
		$user_id = $this->input->post('user_id');
		if($user_id)
		{
			$result = $this->Settings_model->updateUserStatus($user_id,'active');
			$this->Settings_model->insertActivationHistory($user_id,'inactive','active');
		}
		echo $result;
	}

	function block_roi_users()
	{  

		$data['title'] = "Block ROI Users";
		
		if ($this->input->post('submit')== 'block') {

			$this->Base_model->CleanupCache();

			$post_arr = $this->input->post();

			$user_id = $post_arr['user_name'];
			$new_status = $this->Base_model->getUserStatus($user_id);

			if($new_status == 'inactive'){
				$msg = lang('user_already_inactive');
				$this->redirect($msg, "settings/block-roi-users", FALSE);
			}else{
				$result = $this->Settings_model->updateUserStatus($user_id,'inactive');
				$check_status = $this->Settings_model->checkRoiBlockUsers($user_id);
				if($check_status){
					$history = $this->Settings_model->updateBlockedRoiUsers($user_id,'inactive');

				}else{

					$history = $this->Settings_model->insertBlockedRoiUsers($user_id,'inactive');
				}

				$activity=$this->Base_model->insertIntoActivityHistory($user_id,log_user_id(), 'user-blocked');
				if ($result && $history) {

					$msg ='User Blocked';
					$this->redirect($msg, 'settings/block-roi-users', TRUE);
				} else {
					$msg ='error on inactivate user';
					$this->redirect($msg, 'settings/block-roi-users', FALSE);
				}
			}
		}

		if ($this->input->post('submit')== 'unblock') {

			$post_arr = $this->input->post();
			$user_id = $post_arr['user_name'];
			$new_status = $this->Base_model->getUserStatus($user_id);

			if($new_status == 'active'){
				$msg = lang('user_already_active');
				$this->redirect($msg, "settings/block-roi-users", FALSE);
			}else{


				$result = $this->Settings_model->updateUserStatus($user_id,'active');

				$check_status = $this->Settings_model->checkRoiBlockUsers($user_id);

				if($check_status){
					$history = $this->Settings_model->updateBlockedRoiUsers($user_id,'active');
				}else{

					$history = $this->Settings_model->insertBlockedRoiUsers($user_id,'active');
				}

				$activity=$this->Base_model->insertIntoActivityHistory($user_id,log_user_id(), 'user-unblocked');
				if ($result && $activity) {

					$msg ='User Activated';
					$this->redirect($msg, 'settings/block-roi-users', TRUE);
				} else {
					$msg ='error on activation user';
					$this->redirect($msg, 'settings/block-roi-users', FALSE);
				}
			}
		}
		
		$this->loadView($data);
	}

	function get_full_name() {

		if($this->input->is_ajax_request()){
			$post = $this->input->post();
			$user_id =$post['user_id'];
			$full_name=$this->Base_model->getFullName($user_id);
			$status=$this->Base_model->getUserStatus($user_id);
			$response['full_name'] = $full_name;
			$response['user_status'] = $status;
			$response['status'] = true;
			$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
			exit();
		}
	}


}

