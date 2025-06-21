<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends Base_Controller 
{

	public function index( $default_sponsor = null, $placement_name = null )
	{  
		$data['title'] = lang('signup'); 
		$post_arr=[];
		if($default_sponsor)
		{
			$default_sponsor =$default_sponsor ;
		}
		elseif(log_user_name())
		{
			$default_sponsor = log_user_name();
		}

		if($this->data[ 'MAINTENANCE_MODE' ] == 1 && log_user_name() != 'admin')
		{
			$this->redirect( $this->data['MAINTENANCE_TEXT'], "login/under-maintenance", FALSE);
		}
		
		if($this->input->post("register"))
		{
			$post_arr=$this->input->post();
			if ($this->validate_signup()) {
				$this->registerAction();
			}
		}
		$data['single_details'] = $this->Signup_model->getEmailContents('','T&C');
		$data['policy_details'] = $this->Signup_model->getEmailContents('','privacy_policy');
		$data['post_arr']=$post_arr;
		$data['default_sponsor'] = $default_sponsor; 
		$data['placement_name'] = $placement_name; 
		$this->loadView($data); 
	}

	function validate_signup() {

		$len_mob = value_by_key("phone_number_length");
		$this->form_validation->set_rules('sponsor_name', lang('sponsor_name'), 'required|is_exist[user_info.user_name]');
		$this->form_validation->set_rules('username', lang('username'), 'required|is_unique[user_info.user_name]');
		// $this->form_validation->set_rules('lastname', lang('lastname'), 'required');
		// $this->form_validation->set_rules('address', lang('address'), 'required');
		// $this->form_validation->set_rules('country', lang('country'), 'required');
		// $this->form_validation->set_rules('mobile', lang('mobile'), 'required|min_length['.$len_mob.']|max_length['.$len_mob.']|numeric');
		// $this->form_validation->set_rules('email', lang('email'), 'required|valid_email|is_unique[user_info.email]');
		
		$result =  $this->form_validation->run();

		return $result;
	}

	function registerAction() 
	{ 
		$register = $this->input->post(); 
		$register['joining_date'] = date('Y-m-d H:i:s');
		$sponsor_info = $this->Signup_model->getSponsorDetails($register['sponsor_name']);
		if(empty($sponsor_info)){
			$this->redirect(lang('referral_is_not_exist'), "signup", FALSE);
		}
		$register['sponsor_info'] = $sponsor_info;
		$register['sponsor_id'] = $sponsor_info['user_id'];

		if($register['register'] == 'free_join')
		{
			$register['payment_type'] = 'free_join';
			$register['registration_type'] = 'free_join';
			$register['package'] = 1;
			$package_amount = $this->Base_model->getPackageAmountbyId($register['package']);
			$register['total_amount'] = $register['package_amount'] = $package_amount;
			$register_type = $register['register'];
			$this->Signup_model->begin();
			 $register['transaction_id']='';
			 $register['wallet_address']='';
			$response = $this->Signup_model->registrationProcess($register,'web');
			if ($response['status']) { 
				$this->Signup_model->commit();
				$ecn_user_id = $this->Base_model->encrypt_decrypt( 'encrypt', $response['user_id'] );
				$password = $response['password'];
				$transaction_password = $response['transaction_password'];
				$user_name = $response['username'];
				$msg =  lang('signup_completed_successfully').','.lang('user_name').' :'. $user_name .',<br>'. lang('password').' :'. $password .','. lang('transaction_psw') .':'. $transaction_password ;
				$this->redirect("<b>$msg </b>", "signup/success/" . $ecn_user_id,TRUE);
			} else {
				$this->Signup_model->rollback();
				$this->redirect(lang('registration_failed'), "signup", FALSE);
			}
		}
		elseif($register['register'] == 'crypto')
		{

			$register['payment_type'] = 'BTC';
			$register['registration_type'] = 'payment_gateway';


			$register_type = $register['register'];

			$req_id = $this->Signup_model->insertCryptoRequest($register);
			$enc_id = $this->Base_model->encrypt_decrypt('encrypt',$req_id);

			$orderID_date = date('md-Hi').rand(0,10);


			$curl = curl_init();

			$this->load->config('ssl');

			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://coinremitter.com/api/v3/get-coin-rate',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'GET',
				CURLOPT_HTTPHEADER => array(
					'Accept: application/json',
				),
			));

			$currency_rate = curl_exec($curl);

			curl_close($curl);

			$currency_rate = json_decode($currency_rate, true);

			if($currency_rate['flag'] == '1'){

				$conversion_rate = $currency_rate['data']['DOGE']['price']* 25;

				$options = [
					'api_key' => $this->config->item('api_key', 'coinremitter'),
					'password' => $this->config->item('password', 'coinremitter'),
					'amount' => $this->config->item('currency_code', 'coinremitter')=='TCN' ? 1 : $conversion_rate,
					'name' => $orderID_date,
					'currency' => 'USD',
					'expire_time' => 30, 
					'custom_data1' =>  'Matrix',
					/*'notify_url'    => base_url().'signup',*/
					'fail_url' =>  base_url().'signup/payment-failed/'.$enc_id,  
					'suceess_url' => base_url().'signup/payment-success/'.$enc_id,  
					'description' => 'Matrix Demo',


				];

				$curl = curl_init();

				curl_setopt_array($curl, array(
					CURLOPT_URL => 'https://coinremitter.com/api/v3/'.$this->config->item('currency_code', 'coinremitter').'/create-invoice',
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => '',
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => 'POST',
					CURLOPT_POSTFIELDS => $options,
					CURLOPT_HTTPHEADER => array( 
						'Accept: application/json',
					),
				));

				$res = curl_exec($curl);

				curl_close($curl);
				$res = json_decode($res, true);

			}
			if($res)
			{
				if($res['flag'] == 1){ 
					$this->Signup_model->updateBitcoinRequestStatus($req_id,$res['data']['invoice_id']);
					header('Location: '.$res['data']['url'], TRUE);
				}
				else{
					$this->redirect('Retry', "signup", FALSE);
				}
			}
		}
		elseif($register['register'] == 'cash_free')
		{
			$this->load->config('ssl');

			$register['payment_type'] = 'Cash Free';
			$register['registration_type'] = 'payment_gateway';
			$register_type = $register['register'];

			$orderID = date('md-Hi').rand(0,10);
			$customer_id=date('Y').rand(15,250000);
			$register['order_id']=$orderID;
			$req_id = $this->Signup_model->insertCryptoRequest($register,'cash_free');

			$enc_id = $this->Base_model->encrypt_decrypt('encrypt',$req_id);
			$register_amount=$register['total_amount'];
			$curl = curl_init();

			$request=[
				'order_id'=>$orderID,
				'order_amount'=>$register_amount,
				'order_currency'=>$this->config->item('currency_code', 'cash_free'),
				'customer_details'=>[
					'customer_id'=>$customer_id,
					'customer_email'=>$register['email'],
					'customer_phone'=>$register['mobile']
					
				],
				'order_meta'=>[
					'return_url'=>base_url().'signup/cashfree-response/{order_id}',
					'notify_url'=>base_url().'signup/cashfree-callback'
				]

			];

			$request1=json_encode($request);
			curl_setopt_array($curl, array(
				CURLOPT_URL => $this->config->item('url', 'cash_free'),
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>$request1,
				CURLOPT_HTTPHEADER => array(
					'x-client-id:'.$this->config->item('appId', 'cash_free'),
					'x-client-secret:'.$this->config->item('secretKey', 'cash_free'),
					'x-api-version: 2022-01-01',
					'Content-Type: application/json'
				),
			));

			$response = curl_exec($curl);
			curl_close($curl);
			$json=json_decode($response,true);

			if($json)
			{

				if(element('order_status',$json))
				{
					if($json['order_status']=='ACTIVE'&&$json['payment_link']!='')
					{
						redirect($json['payment_link']);
					}

				}
				else
				{
					$this->redirect($json['message'],'signup',FALSE);
				}
				
			}
			else{
				$this->redirect(lang('invalid_payment_details'),'signup',FALSE);
			}

		}
		elseif($register['register'] == 'coin_base')
		{

			
			$register['register'] = 'coin_base'; 
			$this->config->load('ssl');
			$req_id = $this->Signup_model->insertCryptoRequest($register,'coin_base');
			$package_name=$this->Base_model->packageIdToPackageName($register['package']);
			$register_amount=$register['total_amount'];
			$curl = curl_init();
			$request=[

				"name"=>'Hi, '.$register['firstname'],
				"description"=> 'Purchase of pacakge '.$package_name. ' worth : '. cur_format($register_amount),
				"pricing_type"=> "fixed_price",
				"local_price"=> [ 
					"amount"=> $register['total_amount'],
					"currency"=> "USD"
				],
				"metadata"=>$register,
				"redirect_url"=> base_url()."signup/coin-base-payment-success",
				"cancel_url"=> base_url()."signup/coin-base-payment-failed"
			];

			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://api.commerce.coinbase.com/charges',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>json_encode($request),
				CURLOPT_HTTPHEADER => array(
					'X-CC-Api-Key: '.$this->config->item('api_key'),					
					'X-CC-Version: 2018-03-22',
					'Content-Type: application/json'
				),
			));

			$response = curl_exec($curl);

			$data=json_decode($response,true);
			if(element('data', $data))
			{
				$url = $data['data']['hosted_url'];
				$request['charge_id'] = $data['data']['code'];
				log_message( 'error', 'COINBASE :  ' . json_decode($request));
				$this->session->set_userdata('charge_id', $data['data']['code']);
				redirect($url);
			}else{
				$this->redirect(lang('payment_gateway_not_responding'), "signup", FALSE);
			}
		}
		elseif($register['register'] == 'stripe')
		{

			$register['register'] = 'stripe'; 
			$this->config->load('ssl');
			$req_id = $this->Signup_model->insertCryptoRequest($register,'stripe');
			$package_name=$this->Base_model->packageIdToPackageName($register['package']);
			$register_amount=$register['total_amount'];
			$enc_id = $this->Base_model->encrypt_decrypt('encrypt',$req_id);


			// $stripeToken = $register['stripeToken'];
			// $custName = $register['firstname'];
			// $custEmail = $register['email'];
			// $cardNumber = $register['cardNumber'];
			// $cardCVC = $register['cardCVC'];
			// $cardExpMonth = $register['cardExpMonth'];
			// $cardExpYear = $register['cardExpYear'];
			ini_set('display_errors', 1);

			$stripe = array(
				"secret_key" => "sk_test_51L7dJ3SGsGyRwWY1I7X2vFHf5iA9DGWZG2Fx3foXBJabNtpp6PJ5bQ2ZCWhC73DaZY53S7bloTKPBHp1sypmVJbW00veArF4DH",
				"publishable_key" => "pk_test_51L7dJ3SGsGyRwWY1B4jXspDVrHIK8wv3CoGsGTj4CuoRWV8lD2b2hkfFfZpKJQJBl36UWztOuLREbk44i9Q8ehPE00G5XyUMuo"
			);
			require_once(FCPATH . "application/libraries/vendor/autoload.php" );
			\Stripe\Stripe::setApiKey($stripe['secret_key']);
			header('Content-Type: application/json');

			$checkout_session = \Stripe\Checkout\Session::create([
				'payment_method_types' => ['card'],
				'line_items' => [[
					'price_data' => [
						'currency' => 'inr',
						'unit_amount' => $register_amount*100,
						'product_data' => [
							'name' => $package_name,
							'images' => ["https://i.imgur.com/EHyR2nP.png"],
						],
					],
					'quantity' => 1,
				]],
				'mode' => 'payment',
				'success_url' => base_url() ."signup/stripe-payment-success/".$enc_id,
				'cancel_url' => base_url(). '/signup',
			]);
			

			if($checkout_session)
			{
				if($checkout_session->url)
				{
					redirect($checkout_session->url);
				}
			}
			// echo json_encode(['id' => $checkout_session->id]);
			// $customer = \Stripe\Customer::create(array(
			// 	'email' => $custEmail,
			// 	'source' => $stripeToken
			// ));
			// $itemName = $package_name;
			// $itemNumber = $register['package'];
			// // $itemPrice = $used_amount*100;
			// $currency = "usd";
			// $orderID = date('YmdHis');

			// $payDetails = \Stripe\Charge::create(array(
			// 	'customer' => $customer->id,
			// 	'amount' => 100,
			// 	'currency' => $currency,
			// 	'description' => $itemName,
			// 	'metadata' => array(
			// 		'order_id' => $orderID
			// 	)
			// ));


			// $paymenyResponse = $payDetails->jsonSerialize();
			// print_r($payDetails);die();
		}
	}

	public function success( $ecn_user_id = null)
	{

		if( !$ecn_user_id ){
			$this->redirect( lang('text_no_permission'), "signup", FALSE );
		}
		$user_id = $this->Base_model->encrypt_decrypt('decrypt',$ecn_user_id);
		$preview_details = $this->Base_model->getUserDetails($user_id, 'mobile,email,user_name,secure_pin,rank_id'); 
		$preview_details['password'] =  $this->session->userdata( 'signup_password' );
		$preview_details['invoice_number'] = str_pad($user_id, 8, '0', STR_PAD_LEFT);

		$this->load->model('Settings_model');
		$single_details = $this->Settings_model->getEmailContents('','welcome_letter');

		if($preview_details ){

			$single_details = str_replace("{title}", $this->data[ 'site_details' ]['name'], $single_details);
			$single_details = str_replace("{username}", $preview_details['user_name'], $single_details);
			$single_details = str_replace("{full_name}", $preview_details['full_name'], $single_details);
			$single_details = str_replace("{phone}", $preview_details['mobile'], $single_details);
			$single_details = str_replace("{email}", $preview_details['email'], $single_details);
			$single_details = str_replace("{password}", $preview_details['password'], $single_details);
			$single_details = str_replace("{transaction_password}", $preview_details['secure_pin'], $single_details);
		// $single_details = str_replace("{password}", $password, $single_details);
		// $single_details = str_replace("{transaction_password}", $pin, $single_details);
		}

		$data['title'] = lang('success');
		$data['single_details'] = $single_details;
		$this->session->unset_userdata( 'signup_password' );
		$data['preview_details'] = $preview_details;
		$this->loadView($data);

	}

	public  function checkUsernameAvailability($username = '', $check_type = 'sponsor') {

		if ($username) {
			$user_available = $this->Signup_model->isUserAvailable($username);

			if ($user_available && $check_type == 'sponsor') { 
				$user_available = TRUE;                
			}elseif (!$user_available && $check_type == 'usercheck') {
				$user_available = TRUE;
			}else{
				$user_available = FALSE;
			}
			return $user_available;
		} else {
			$user_available = 'no';
			$username = $this->input->post('username', TRUE);
			if ($this->Signup_model->isUserAvailable($username)) {
				$user_available = "yes";
			}
			if (preg_match('/\s/',$username) ){
				$user_available = "yes";
			}
			echo $user_available;
			exit();
		}
	} 

	function get_country_ajax() {

		if ($this->input->is_ajax_request()) {
			$post = $this->input->post();
			$post['q'] = element('q', $post) ? $post['q'] : '';
			$json = $this->Base_model->getAllCountriesAuto($post['q'],'');
			echo json_encode($json);
		}
	}

	function get_package_ajax() {

		if ($this->input->is_ajax_request()) {
			$post = $this->input->post();
			$post['q'] = element('q', $post) ? $post['q'] : '';
			$json = $this->Base_model->getAllPackagesAuto($post['q'],'');
			echo json_encode($json);
		}
	}


	public function payment_success($enc_id)
	{            
		$req_id = $this->Base_model->encrypt_decrypt('decrypt',$enc_id);

		$check_user_id = $this->Signup_model->CheckUserId($req_id);

		if($check_user_id == 0)
		{

			$details = $this->Signup_model->getRequestDetails($req_id);

			$register = unserialize($details['post_array']);

			$this->Signup_model->begin();
			$response = $this->Signup_model->registrationProcess($register);

			if ($response['status']) {

				$this->Signup_model->commit();


				$update = $this->Signup_model->updateBitcoinRequestStatus($req_id,'',1, $response['user_id']);


				$ecn_user_id = $this->Base_model->encrypt_decrypt( 'encrypt', $response['user_id'] );
				$password = $response['password'];
				$transaction_password = $response['transaction_password'];
				$user_name = $response['username'];

				$msg =  lang('signup_completed_successfully').','.lang('user_name').' :'. $user_name .',<br>'. lang('password').' :'. $password .','. lang('transaction_psw') .':'. $transaction_password ;

				$this->redirect("<b>$msg </b>", "signup/success/" . $ecn_user_id,TRUE);


			} else {
				$this->Signup_model->rollback();
				$this->redirect(lang('registration_failed'), "signup", FALSE);
			}
		}
		else
		{
			$this->redirect(lang('login_here'), "login", TRUE);
		}


	}

	public function payment_failed($enc_id)
	{
		$req_id = $this->Base_model->encrypt_decrypt('decrypt',$enc_id);
		$update = $this->Signup_model->updateBitcoinRequestStatus($req_id,'',2);
		if($update)
		{
			$this->redirect(lang('payment_failed'), "signup", FALSE);
		}
	}


	public function cashfree_response($order_id)
	{
		
		$post_arr=$this->input->post();
		if(element('txStatus',$post_arr))
		{


			if($post_arr['txStatus']=='FAILED')
			{
				$this->redirect(lang('payment_failed'), "signup", FALSE);
			}
		}
		if ($order_id) {
			$enc=$this->Signup_model->getRequestDetailsOrder($order_id);
			$data['enc_id']=$enc['enc_id'];
			// $req_id = $this->Base_model->encrypt_decrypt('decrypt',$enc_id);
			$req_details=$this->Signup_model->getRequestDetailsOrder($order_id);
			// print_r($order_id);die();
			if($req_details['STATUS']== 1)
			{
				$user_id=$req_details['user_id'];
				$response=$this->Base_model->getUserDetails($user_id);

				$response['transaction_password']=$this->Base_model->getUserInfoField('secure_pin',$user_id);
				$ecn_user_id = $this->Base_model->encrypt_decrypt( 'encrypt', $user_id );
				$transaction_password = $response['transaction_password'];
				$user_name = $response['user_name'];
				$msg =  lang('signup_completed_successfully').','.lang('user_name').' :'. $user_name .'<br>'. lang('transaction_psw') .':'. $transaction_password ;

				$this->redirect("<b>$msg </b>", "signup/success/" . $ecn_user_id,TRUE);

			}
			else
			{
				$req_details=$this->Signup_model->getRequestDetailsOrder($order_id);
				// print_r($req_details);die();
				$data['req_details'] = $req_details; 
				// $this->redirect("Payment Successfull", "signup", FALSE);
				$this->loadView($data);	

			}



		} else {
			$this->Signup_model->rollback();
			$this->redirect(lang('registration_failed'), "signup", FALSE);
		}


	}


	public function get_payment_status()
	{
		if($this->input->is_ajax_request()){      
			$this->form_validation->set_rules('enc_id',  'payment id' , 'trim|required');

			if($this->form_validation->run()){
				$req_id = $this->Base_model->encrypt_decrypt('decrypt',$this->input->post('enc_id'));
				$req_details=$this->Signup_model->getRequestDetails($req_id);
				$register_amount=$this->session->userdata('total_amount');
				if($req_details['STATUS']== 1)
				{
					$user_id=$req_details['user_id'];
					$response=$this->Base_model->getUserDetails($user_id);
					$response['transaction_password']=$this->Base_model->getUserInfoField('secure_pin',$user_id);
					$ecn_user_id = $this->Base_model->encrypt_decrypt( 'encrypt', $user_id );
					$transaction_password = $response['transaction_password'];
					$user_name = $response['user_name'];
					$msg =  lang('signup_completed_successfully').','.lang('user_name').' :'. $user_name .'<br>'. lang('transaction_psw') .':'. $transaction_password ;

					$this->redirect("<b>$msg </b>", "signup/success/" . $ecn_user_id,TRUE);

					$response['success'] = true; 
					$response['url'] = "signup/success/" . $ecn_user_id; 
					$this->output
					->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
					->_display();
					exit(); 

				}
				else{

					$response['success'] = false; 
					$this->output
					->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
					->_display();
					exit();
				}


			}elseif($error_array = $this->form_validation->error_array()){ 

				$response['success'] = FALSE;
				$response['msg'] = implode(', ',$this->form_validation->error_array());

				$this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ))
				->_display();
				exit();
			}else{

				$response['success'] = false; 
				$response['msg'] = lang('unauthorized');

				$this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
				->_display();
				exit();
			}
		}


	}

	public function cashfree_callback()
	{

		log_message( 'error', ' POST: ' . $this->input->raw_input_stream ); 
		$payment_details=json_decode($this->input->raw_input_stream,TRUE);
		if(!empty($payment_details))
		{

			$payment_details=$payment_details['data'];

			$checkout_data = $this->Signup_model->getCashFreeDetails($payment_details['order']['order_id']);

			if($payment_details['payment']['payment_status']=='SUCCESS')
			{


				$check_user_id = $this->Signup_model->CheckUserId($checkout_data['id']);

				if($check_user_id == 0)
				{

					$details = $this->Signup_model->getRequestDetails($checkout_data['id']);

					$register = unserialize($details['post_array']);

					$this->Signup_model->begin();
					$response = $this->Signup_model->registrationProcess($register);
					$this->Signup_model->commit();
					$update = $this->Signup_model->updateCashFreeRequestStatus($checkout_data['id'],1, $response['user_id']);
				}
				else
				{
					$this->Signup_model->rollback();
					log_message( 'error', ' Invalid user'); 
				}



			}
			else{
				log_message( 'error', ' Payment status is not sucess'); 
			}


		}
		else
		{
			log_message( 'error', ' empty payment details '); 
		}


	}


	public function coin_base_payment_success()
	{

		$this->config->load('ssl');
		$this->session->set_userdata('charge_id', 'D945VELV');
		$charge_id = $this->session->userdata('charge_id');

		if($this->Signup_model->getInvoiceId($charge_id)){
			$this->redirect(lang('action_on_the_payment_is_already_done'), 'signup', FALSE);
		}

		$curl = curl_init(); 
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.commerce.coinbase.com/charges/'.$charge_id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'X-CC-Api-Key: '.$this->config->item('api_key'),
				'X-CC-Version: 2018-03-22',
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$data=json_decode($response,true);

		if(element('data', $data))
		{
			if(element('payments', $data['data']))
			{
				if(!empty($data['data']['payments']) && $data['data']['payments'][0]['status'] == 'CONFIRMED')
				{

					$register = $data['data']['metadata'];  
					$this->Signup_model->begin(); 
					$response = $this->Signup_model->registrationProcess($register);

					if ($response['status']) {



						$this->Signup_model->commit();

						$ecn_user_id = $this->Base_model->encrypt_decrypt( 'encrypt', $response['user_id'] );
						$password = $response['password'];
						$transaction_password = $response['transaction_password'];
						$user_name = $response['username'];

						$msg =  lang('signup_completed_successfully').','.lang('user_name').' :'. $user_name .',<br>'. lang('password').' :'. $password .','. lang('transaction_psw') .':'. $transaction_password ;

						$this->redirect("<b>$msg </b>", "signup/success/" . $ecn_user_id,TRUE);


					} else {
						$this->Signup_model->rollback();
						$this->redirect(lang('registration_failed'), "signup", FALSE);
					}

				}else {
					$this->Signup_model->rollback();
					$this->redirect(lang('pending_wating_for_approval'), 'signup', FALSE);
				}


			}

		}else{
			$this->redirect(lang('payment_is_pending'), "signup", FALSE);
		}


		if(!empty($_POST)){
			log_message( 'error', 'POST:  ' . json_decode($_POST));
			$post_arr = $_POST;
			if(element('data', $post_arr)){

				

			}else{

				log_message( 'error', 'No DATA:  ' );

			}

		}else{
			log_message( 'error', 'NO POST:  ');
		}
	}



	public function coin_base_payment_failed()
	{
		$this->redirect(lang('payment_is_failed'), "signup", FALSE);
	}


	public function stripe_payment_success($enc_id)
	{
		// $req_id = $this->Base_model->encrypt_decrypt('decrypt',$enc_id);
		// $req_details=$this->Signup_model->getRequestDetails($req_id);
		// $register = unserialize($req_details['post_array']);
		// print_r($register);die();
		$req_id = $this->Base_model->encrypt_decrypt('decrypt',$enc_id);

		$check_user_id = $this->Signup_model->CheckUserId($req_id);

		if($check_user_id == 0)
		{

			$details = $this->Signup_model->getRequestDetails($req_id);

			$register = unserialize($details['post_array']);

			$this->Signup_model->begin();
			$response = $this->Signup_model->registrationProcess($register);

			if ($response['status']) {

				$this->Signup_model->commit();


				$update = $this->Signup_model->updateBitcoinRequestStatus($req_id,'',1, $response['user_id']);


				$ecn_user_id = $this->Base_model->encrypt_decrypt( 'encrypt', $response['user_id'] );
				$password = $response['password'];
				$transaction_password = $response['transaction_password'];
				$user_name = $response['username'];

				$msg =  lang('signup_completed_successfully').','.lang('user_name').' :'. $user_name .',<br>'. lang('password').' :'. $password .','. lang('transaction_psw') .':'. $transaction_password ;

				$this->redirect("<b>$msg </b>", "signup/success/" . $ecn_user_id,TRUE);


			} else {
				$this->Signup_model->rollback();
				$this->redirect(lang('registration_failed'), "signup", FALSE);
			}
		}
		else
		{
			$this->redirect(lang('login_here'), "login", TRUE);
		}
	}
}
