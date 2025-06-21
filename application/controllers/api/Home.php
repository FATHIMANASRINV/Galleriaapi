<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ("Api_Controller.php");
class Home extends Api_Controller {
	function __construct() {
		parent::__construct();  
	}
	public function signup()
	{
		try{
			log_message('error', ' POST: ' . json_encode($this->input->post()) );
			if($this->input->post())
			{
				$post_arr=$this->input->post();
				$this->load->model('Signup_model');
				if ($this->validate_signup()) {
					$register = $this->input->post(); 
					$register['joining_date'] = date('Y-m-d H:i:s');
					$sponsor_info = $this->Signup_model->getSponsorDetails($register['sponsor_name']);
					if(empty($sponsor_info)){
						$response['msg'] ='Invalid Sponsor';
						$response['success'] = False;
						$this->output
						->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
						->_display();
						exit(); 
					}
					$register['sponsor_info'] = $sponsor_info;
					$register['sponsor_id'] = $sponsor_info['user_id'];
					$register['package'] = 1;
					$package_amount = $this->Base_model->getPackageAmountbyId($register['package']);
					if(!$package_amount){
						$response['msg'] ='Invalid Package';
						$response['success'] = False;
						$this->output
						->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
						->_display();
						exit(); 
					}
					$register['total_amount'] = $register['package_amount'] = $package_amount;
					if($register['register'] == 'free_join')
					{
						$register['payment_type'] = 'free_join';
						$register['registration_type'] = 'free_join';
						$register_type = $register['register'];
						$this->Signup_model->begin();
						$response = $this->Signup_model->registrationProcess($register);
						if ($response['status']) { 
							$this->Signup_model->commit();
							$ecn_user_id = $this->Base_model->encrypt_decrypt( 'encrypt', $response['user_id'] );
							$msg =  'Signup Completed Successfully'.','.lang('user_name').' :'. $response['username']  ;
							unset($response['transaction_password']);
							// unset($response['username']);
							unset($response['password']);
							unset($response['user_id']);
							unset($response['status']);
							$response['success'] = True;
							$response['msg'] = $msg;
							$this->output
							->set_status_header(200)
							->set_content_type('application/json', 'utf-8')
							->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
							->_display();
							exit();
						} else {
							$response['success'] = false;
							$response['msg'] = 'Registration Failed';
							$this->output
							->set_status_header(200)
							->set_content_type('application/json', 'utf-8')
							->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
							->_display();
							exit();
						}
					}
				}
				else
				{
					$response = [
						'success' => FALSE,
						'msg' => lang('Check_the_fields'),
					];
					$response['error_msg'] = $this->form_validation->error_array();
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
	private function validate_signup() {
		$len_mob = value_by_key("phone_number_length");
		$this->form_validation->set_rules('sponsor_name','Sponsor Name', 'required|is_exist[user_info.user_name]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user_info.email]');
		$this->form_validation->set_rules('first_name','First Name','required'); 
		$this->form_validation->set_rules('last_name','Last Name','required'); 
		$this->form_validation->set_rules('password','Password','required'); 
		$this->form_validation->set_rules('cpassword','Confirm password','required|matches[password]'); 
		$result =  $this->form_validation->run();
		return $result;
	}
	function CheckWalletAddresUnique() {
		try
		{
			$post_arr=$this->input->post();
			$wallet = $this->input->post('wallet_address');
			$response['success'] = false;
			if (!empty($wallet)) {
				$isUnique = $this->Base_model->CheckWalletAddressUnique($wallet) ;
				if($isUnique ==0){
					$response['success'] = true;
				}
			}
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
}
