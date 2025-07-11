<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once ("Api_Controller.php");
class User extends Api_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Member_model');
		$this->load->model('Login_model');
		$this->load->model('Settings_model');
		$this->load->model('Signup_model');
		$this->load->model('Dashboard_model');
		$this->load->model('Calculation_model');
	}  
	function Dashbaord_analytics() {
		try
		{
			$token = $this->check_header(); 
			$details=$this->Base_model->getUserDetails($token->user_id,['user_name','sponsor_id','date_of_joining','package_id','referral_count']);
			$details['package_details']=$this->Base_model->getpackagelastupgraded($details['package_id'],$token->user_id);
			unset($details['full_name']);
			unset($details['sponsor_id']);
			unset($details['package_id']);
			$details['wallet_balance'] = $this->currency->format($this->Base_model->getUserWallet($token->user_id));
			// $details['direct_refferal'] = $this->Dashboard_model->getrefferalAmountTotal($token->user_id);
			$user_wallet = $this->Dashboard_model->getUserWalletDetails($token->user_id);
			$details['missed_income']= $this->currency->format($user_wallet['missed_level_income']);
			$details['direct_refferal']= $this->currency->format($user_wallet['referral_bonus']);
			$details['global_pool_bonus']= $this->currency->format($user_wallet['global_bonus']);
			$details['community_matrix']= $this->currency->format($user_wallet['level_bonus']);
			$details['pending_bonus']= $this->currency->format($this->Base_model->getPendingGLobalBonus($token->user_id));
			$details['total_income_btc']= $this->currency->format($user_wallet['referral_bonus']+$user_wallet['level_bonus']+$user_wallet['global_bonus']);
			
			$response['success'] = true;
			$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($details, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
			exit();
		}
		catch( Exception $e )
		{
			log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
		}
	}

	function getPackages() {
		try
		{
			$post_arr=$this->input->post();
			$response['packages'] = $this->Base_model->getAllPackagesAPI($post_arr); 
			$response['success'] = true;
			$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
			exit();
		}
		catch( Exception $e )
		{
			log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
		}
	}
	public function Upgrade()
	{
		try{
			// log_message('error', ' POST: ' . json_encode($this->input->post()) );

			$token = $this->check_header(); 
			if($this->input->post())
			{
				$post_arr=$this->input->post();
				$this->load->model('Member_model');
				if ($this->validate_upgrade()) {
					$register = $this->input->post(); 
					$register['package']=$this->Base_model->encrypt_decrypt('decrypt', $register['package_id']);
					$current_package=$this->Base_model->getUserInfoField('package_id',$token->user_id);
					$package_details = $this->Base_model->getPackageAmountbyIds($register['package'],$current_package);
					$sum = array_sum(array_map('floatval', array_column($package_details, 'amount')));
					if (empty($package_details) || round($sum, 8) != round($register['total_amts'], 8)) {
						$response['msg'] ='Invalid Package';
						$response['success'] = False;
						$this->output
						->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
						->_display();
						exit(); 
					}
					$next_package=$this->Base_model->getNextPackage($current_package,$register['package']);
					if (!empty($next_package) && $next_package['package_id'] > $register['package']) 
					{
						$response['msg'] ='Invalid Package Your Next Package Is'.$next_package['name'];
						$response['success'] = False;
						$this->output
						->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
						->_display();
						exit(); 
					}
					$this->Member_model->begin();
					foreach ($package_details as $key => $value) {
						$current_package=$this->Base_model->getUserInfoField('package_id',$token->user_id);
						$this->Member_model->insertUpgradeHistory($token->user_id,$current_package, $value['package_id'],'Upgrade',$value['amount'],date('Y-m-d H:i:s'),$register['transactionid']);
						$global_bonus=($value['amount']*40/100)/20;
						$insert=$this->Base_model->InsertPAckageAPIMIssed($value['package_id'],$global_bonus,$token->user_id);
						$global_bonuss=$this->Calculation_model->InsertGlobalCommunityBonus($global_bonus,$value['package_id'],$token->user_id);
						$this->Base_model->updateUserInfoField('package_id',$value['package_id'],$token->user_id);
						$sponsor_id=$this->Base_model->getSponsorId($token->user_id);
						$level=$this->Calculation_model->insertLevelBonus($sponsor_id, $value['amount'], $token->user_id, date('Y-m-d H:i:s'),$value['package_id']);
					}
					if($global_bonuss && $level){
						$this->Member_model->commit();
						$response['msg'] ='Upgraded successfully';
						$response['success'] = True;
						$response['current_package']=$register['package'];
						$this->output
						->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
						->_display();
						exit(); 
					}else{
						$this->Member_model->rollback();
						$response['msg'] ='Error On Upgrading';
						$response['success'] = False;
						$this->output
						->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
						->_display();
						exit(); 
					}
				}
				else
				{
					$response = [
						'success' => FALSE,
						'msg' => lang('Check_the_fields'),
					];
					$response['errors'] = $this->form_validation->error_array();
					$this->output
					->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
					->_display();
					exit();
				}

			}
		}
		catch( Exception $e )
		{
			log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
		} 
	}
	private function validate_upgrade() {
		$this->form_validation->set_rules('package_id', 'Package ID', 'required');
		$this->form_validation->set_rules('transactionid', 'Transaction ID', 'required|is_unique[package_upgrade_history.transaction_id]');
		$result =  $this->form_validation->run();
		return $result;
	}
}
