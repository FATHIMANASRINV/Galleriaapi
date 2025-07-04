<?php defined('BASEPATH') OR exit('No direct script access allowed');
include_once './libs/phpqrcode/qrlib.php';
class Member extends Base_Controller {

	function __construct()
	{
		parent::__construct(); 	
		$this->load->model('Calculation_model');
	}
	
	function profile($url_id='')
	{  
		$user_id = log_user_id();
		$user_name = log_user_name(); 
		if(isset($user_name)){
			$tempDir = './assets/images/qrcode/';  
			$codeContents = htmlentities(base_url('referral/'."$user_name"));
			QRcode::png($codeContents, $tempDir.''.$user_name.'.png', QR_ECLEVEL_L, 5); 
		}
		if($this->input->post('profile_update') && $this->validate_profile_update())
		{ 
			$this->load->config('ssl');
			$demo_mode=$this->config->item('demo_mode');
			if($demo_mode)
			{
				$msg=lang('site_under_maintenance');
				$this->redirect( $msg, "member/profile", FALSE);
			}

			$post_arr = $this->input->post();
			if($_FILES['userfile']['error'] != 4)
			{
				$config['upload_path'] = './assets/images/profile/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '10000';
				$config['remove_spaces'] = true;
				$config['overwrite'] = false;
				$config['encrypt_name'] = TRUE;

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

			$update_profile =  $this->Member_model->updateUserProfile( $post_arr, $user_id );
			if($update_profile){

				$this->redirect(lang("success_profile_updation"), "member/profile", TRUE);
			} else{
				$this->redirect(lang("failed_profile_updating"), "member/profile", FALSE);
			}
		}

		if($this->input->post('psw_update') && $this->validate_update_password())
		{ 

			$this->load->config('ssl');
			$demo_mode=$this->config->item('demo_mode');
			if($demo_mode)
			{
				$msg=lang('site_under_maintenance');
				$this->redirect( $msg, "member/profile", FALSE);
			}


			$post_arr = $this->input->post();
			$this->load->model('Login_model'); 
			$password_check = $this->Login_model->login( $user_name, $post_arr['old_password'] );
			if($password_check)
			{
				$this->config->load('bcrypt');
				$this->load->library('bcrypt');
				$hashed_password = $this->bcrypt->hash_password( $post_arr['new_password'] );
				if($this->Member_model->updatePassword(  $hashed_password, $user_id )){
					
					$auth_tocken=md5(log_user_name().':'.$hashed_password);
					$update_auth_tocken=$this->Base_model->updateUserInfoField('auth_tocken',$auth_tocken,log_user_id());
					if($update_auth_tocken){

						$this->redirect(lang('password_updated_successfully'), "member/profile", TRUE);
					}

				}else{
					$this->redirect(lang('password_updation_failed'), "member/profile", FALSE);
				}
			}else{
				$this->redirect(lang("invalid_old_psw"), "member/profile", FALSE);
			}
		}


		
		

		$data['title'] = lang('profile'); 
		$data['user_name'] = $user_name;
		$data['user_id'] = $user_id;
		$this->loadView($data);
	}

	function validate_update_password() {
		$password_length_min = value_by_key('password_min_len');
		$password_length_max = value_by_key('password_max_len');

		$this->form_validation->set_rules('old_password', lang('old_password'), 'required');
		$this->form_validation->set_rules('new_password', lang('new_password'), 'required|min_length['. $password_length_min .']|max_length['.$password_length_max.']|differs[old_password]');
		$this->form_validation->set_rules('confirm_password', lang('confirm_password'), 'required|min_length['. $password_length_min .']|max_length['.$password_length_max.']|matches[new_password]');
		$result =  $this->form_validation->run();
		return $result;
	}

	function validate_profile_update()
	{
		$len_mob = value_by_key("phone_number_length");
		$this->form_validation->set_rules('first_name', lang('firstname'), 'trim|required');
		$this->form_validation->set_rules('second_name', lang('lastname'), 'trim|required');
		$this->form_validation->set_rules('email', lang('email'), 'trim|required|valid_email');
		$this->form_validation->set_rules('mobile', lang('mobile'), 'required|min_length['.$len_mob.']|max_length['.$len_mob.']|numeric');
		$this->form_validation->set_rules('address', lang('address'), 'trim|required');
		$this->form_validation->set_rules('city', lang('city'), 'trim|required');
		$this->form_validation->set_rules('zip_code', lang('zipcode'), 'trim|required|numeric');
		// $this->form_validation->set_rules('state', lang('state'), 'trim|required');
		// $this->form_validation->set_rules('country', lang('country'), 'trim|required');
		$validate_form = $this->form_validation->run();
		return $validate_form;



	}


	function activity_log()
	{   
		$user_id=log_user_id();
		$data['title'] = lang('activity_log');  
		$data['activity_log'] = $this->Member_model->getActivityHistory($user_id);
		$this->loadView($data);
	}

	function validate_update_security_pin() {
		$password_length_min = value_by_key('password_min_len');
		$password_length_max = value_by_key('password_max_len');
		$this->form_validation->set_rules('old_pin', lang('old_pin'), 'required');

		$this->form_validation->set_rules('new_pin', lang('new_pin'), 'required|min_length[8]|max_length[8]|differs[old_pin]');
		$this->form_validation->set_rules('confirm_pin', lang('confirm_pin'), 'required|min_length[8]|max_length[8]|matches[new_pin]');
		$result =  $this->form_validation->run();
		return $result;
	}
	function validate_upgrade() {
		$this->form_validation->set_rules('package', 'Package Id', 'required');
		$result =  $this->form_validation->run();
		return $result;
	}

	public function upgrade_step()
	{
		$data['title']="Purchase Package";
		$user_id=log_user_id();
		if($this->input->post('purchase')&& $this->validate_upgrade()){
			$register=$this->input->post();
			$package_amount = $this->Base_model->getPackageAmountbyId($register['package']);
			if(!$package_amount){
				$this->redirect('Invalid Package', "member/upgrade-step", FALSE);
			}
			$current_package=$this->Base_model->getUserInfoField('package_id',$user_id);
			$next_package=$this->Base_model->getNextPackage($current_package);
			if (!empty($next_package) && $next_package['package_id'] != $register['package']) 
			{
				$this->redirect('Invalid Package Your Next Package Is'.$next_package['name'], "member/upgrade-step", FALSE);
			}
			$this->Member_model->begin();
			$this->Member_model->insertUpgradeHistory($user_id,$current_package, $register['package'],'Upgrade',$package_amount,date('Y-m-d H:i:s'));
			$global_bonus=($package_amount*40/100)/20;
			$insert=$this->Base_model->InsertPAckageAPIMIssed($register['package'],$global_bonus,$user_id);
			$global_bonuss=$this->Calculation_model->InsertGlobalCommunityBonus($global_bonus,$register['package'],$user_id);
			$sponsor_id=$this->Base_model->getSponsorId($user_id);
			$level=$this->Calculation_model->insertLevelBonus( $sponsor_id, $package_amount, $user_id, date('Y-m-d H:i:s'),$register['package']);
			$this->Base_model->updateUserInfoField('package_id',$register['package'],$user_id);
			if($global_bonuss && $level){
				$this->Member_model->commit();
				$this->redirect('Upgraded successfully', "member/upgrade-step", True);
			}else{
				$this->Member_model->rollback();
				$this->redirect('Error On Upgrading', "member/upgrade-step", False);
			}
		}
		$current_package = $this->Base_model->getUserInfoField('package_id',log_user_id());
		$next_package=$this->Base_model->getNextPackage($current_package);
		$data['next_package']=$next_package;
		$this->loadView($data);	
	}

	public function package_details()
	{
		$this->load->model('Settings_model');
		if ($this->input->is_ajax_request() && $this->input->method() == 'post') {
			$data['title']=lang('job_list');
			$post_arr = $this->input->post(); 
			$data['package'] = $this->Settings_model->getPackageDetails($post_arr['id']);
			$response['success'] = TRUE; 
			$response['html'] = 
			$this->smarty->view("user/member/upgrade_step2.tpl", $data, TRUE);
			$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
			exit();
		}else{
			die('No direct Access');
		} 

	}

	public function upgrade_step2($enc_id)
	{
		$this->load->config('ssl');
		$demo_mode=$this->config->item('demo_mode');
		if($demo_mode)
		{ 
			$this->redirect( lang('site_under_maintenance'), "member/upgrade-step", FALSE);
		}

		if($enc_id)
		{
			$user_id=log_user_id();
			$new_package_id = $this->Base_model->encrypt_decrypt('decrypt',$enc_id);
			$package_details = $this->Member_model->getPackageDetails('purchase', $new_package_id);
			
			if($package_details) {

				$data['new_package_amount'] = $package_details['amount'];
				$date=date('Y-m-d H-i-s');

				$package_id=$this->Base_model->getUserPackageId($user_id);

				if($this->input->post('payment_method'))
				{
					$post_arr=$this->input->post();
					if($post_arr['payment_method'] == 'Free') {

						$this->Member_model->begin();
						$user_info = $this->Base_model->getUserDetails($user_id); 
						$insertLevel = $this->Calculation_model->insertLevelBonus($user_info['father_id'], $data['new_package_amount'], $user_id, $date);

						$updatePackage = $this->Member_model->upgradeUserPackage($user_id ,$new_package_id);
						$roi_days=value_by_key('roi_days');

						$insertUpgradeHistory = $this->Member_model->insertUpgradeHistory($user_id ,$package_id ,$new_package_id , $post_arr['payment_method'], 'user', $data['new_package_amount'], $date,$roi_days);

						if( $insertLevel && $updatePackage && $insertUpgradeHistory ){

							$this->Member_model->commit();
							$this->Base_model->insertIntoActivityHistory('', log_user_id(),'upgrade_package', serialize($post_arr));

							$this->redirect(lang("package_upgrade_successfully"), "member/upgrade-step", TRUE);
						}
						else{
							$this->Member_model->rollback();
							$this->redirect(lang('upgrade_failed'), "member/upgrade-step", FALSE);
						}
					}
				}
			}else{
				$this->redirect(lang('invalid_package'), "member/upgrade-step", FALSE);
			}
		}else{
			$this->redirect(lang('invalid_package'), "member/upgrade-step", FALSE);
		}
	}
	function kyc($action = '')
	{ 
		$data['title'] = 'KYC Upload';
		$user_id=log_user_id();
		$kyc_pending = $this->Member_model->getKycPendingDetails($user_id,'pending');
		if($this->input->post('submit') && $this->validate_kyc_upload())
		{
			$post_arr=$this->input->post();
			if(!empty($kyc_pending))
			{
				$msg = 'Already have a pending request,please wait for its approval';
				$this->redirect($msg, "member/kyc", FALSE);
			}
			if($_FILES['userfile']['error'] != 4)
			{
				$config['upload_path'] = './assets/uploads/payment_proof/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '10000';
				$config['remove_spaces'] = true;
				$config['overwrite'] = false;
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);
				$msg = '';
				if (!$this->upload->do_upload('userfile')) {
					$msg = lang('logo_not_selected');
					$error = $this->upload->display_errors();
					$this->redirect( $error, "member/kyc", false );
				} else {
					$logo_arr = $this->upload->data();  
					$post_arr['file_name'] = $logo_arr['file_name'];

				}
			}
			else{
				$msg = "Please Select a Image";
				$this->redirect( $msg, "member/kyc", false );
			}
			if($_FILES['passbook']['error'] != 4)
			{
				$config['upload_path'] = './assets/uploads/payment_proof/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '10000';
				$config['remove_spaces'] = true;
				$config['overwrite'] = false;
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);
				$msg = '';
				if (!$this->upload->do_upload('passbook')) {
					$error = $this->upload->display_errors();
					$this->redirect( $error, "member/kyc", false );
				} else {
					$logo_arr = $this->upload->data();  
					$post_arr['passbook'] = $logo_arr['file_name'];
				}
			}
			else{
				$msg = "Please Select a Image";
				$this->redirect( $msg, "member/kyc", false );
			}
			$result=$this->Member_model->insertKyc($user_id,$post_arr);
			if($result)
			{
				$msg ='Please Wait For Admin Approval';
				$this->redirect($msg, 'member/kyc', TRUE);
			}
			else{
				$msg ='Error on kyc approval request..!!';
				$this->redirect($msg, 'member/kyc', FALSE);
			}
		}
		$user_id=log_user_id();
		$data['kyc_list']=$this->Member_model->getKycApproval($user_id);
		$data['kyc_pending']=$kyc_pending;
		$this->loadView($data);
	}

	public function validate_kyc_upload()
	{

		$this->form_validation->set_rules('account_no', 'Account No', 'trim|required');
		$this->form_validation->set_rules('account_name', 'Account Name', 'trim|required');
		$this->form_validation->set_rules('ifsc', 'Ifsc', 'trim|required');
		$this->form_validation->set_rules('branch', 'Branch', 'trim|required');
		$this->form_validation->set_rules('pan_no', 'Pan No', 'trim|required');
		$this->form_validation->set_rules('adhar_no', 'Adhar No', 'trim|required');
		$this->form_validation->set_rules('customer_full_name', 'Customer Full Name', 'trim');

		$result = $this->form_validation->run();
		return $result;
	}
}