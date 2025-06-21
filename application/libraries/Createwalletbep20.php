<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once './libs/phpqrcode/qrlib.php';
include_once './vendors/bsc/autoload.php';
use FurqanSiddiqui\BIP39\BIP39;
class Createwalletbep20 {
	protected $CI;
	public $contract_address = '0x55d398326f99059ff775485246999027b3197955';
	public $TATUM_API_KEY= 't-64f72e110c34f3d88de9f677-4562b03782a445d9b62155f1';
	public $URI = 'https://api.tatum.io/v3/bsc/wallet';
	function __construct($config = array()) {
		$this->initialize($config);
	}
	public function initialize($config = array()) {    
		$this->contract_address = (isset($config['contract_address'])) ? $config['contract_address'] : $this->contract_address;
		$this->TATUM_API_KEY = (isset($config['TATUM_API_KEY'])) ? $config['TATUM_API_KEY'] : $this->TATUM_API_KEY;
		$this->URI = (isset($config['URI'])) ? $config['URI'] : $this->URI;
	}
	function createWallet()
	{
		$mnemonic = BIP39::Generate(12);
		$mnemonic = implode(' ', $mnemonic->words);

		$curl = curl_init();

		$curl_url=$this->URI;


		curl_setopt_array($curl, array(
			CURLOPT_URL => $curl_url."/?mnemonic=".urlencode($mnemonic),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array("accept: application/json",
				"x-api-key: ".$this->TATUM_API_KEY),
		));

		$response = curl_exec($curl);
		curl_close($curl);

		$json = json_decode($response, true);


		if($json['xpub'])
		{

			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://api-eu1.tatum.io/v3/bsc/address/'.$json['xpub']."/1",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'GET',
				CURLOPT_HTTPHEADER => array("accept: application/json",
					"x-api-key: ".$this->TATUM_API_KEY),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			$address_json = json_decode($response, true);


			if($address_json['address'])
			{
				$curl = curl_init();

				$payload = array(
					"index" => 1, 
					"mnemonic" => $json['mnemonic']
				);

				curl_setopt_array($curl, [
					CURLOPT_HTTPHEADER => [
						"Content-Type: application/json",
						"x-api-key:".$this->TATUM_API_KEY
					],
					CURLOPT_POSTFIELDS => json_encode($payload),
					CURLOPT_URL => 'https://api-eu1.tatum.io/v3/bsc/wallet/priv',
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_CUSTOMREQUEST => "POST",
				]);

				$response = curl_exec($curl);

				curl_close($curl);
				$key_json=json_decode($response);

				$data['key_json'] = $key_json;
				$data['address_json'] = $address_json;
				$data['json'] = $json;

				return $data;

			}           
		}
		


	}


	
	function sendTransactionBep20($user_wallet,$destination,$user_private_key,$payable_coin){
		$adm_wallets =  array(
			'address' => '0xC01b72F3021921641c30cC27755337FB441eE6C9ss',
			'private_key'=>'4f393970852f7a0a4c8d98bd31dd8059394ce2dc136ef724d75d882537081f51ss'
		);
		$bep_balance=$this->checkBalance($user_wallet);
		if (array_key_exists('balance', $bep_balance)) 
		{
			$balance=$bep_balance['balance'];
		}
		if($balance < 0.00055)
		{
			$to_pay = 0.00055-$balance;
			$to_pay = strval($to_pay);
			$address=$adm_wallets['address'];
			$adm_private_key=$adm_wallets['private_key'];
			$curl = curl_init();
			$payload = array(
				"to" => $user_wallet,
				"currency" => "BSC",
				"amount" => $to_pay,
				"fromPrivateKey" => $adm_private_key
			);
			curl_setopt_array($curl, [
				CURLOPT_HTTPHEADER => [
					"Content-Type: application/json",
					"x-api-key:". $this->TATUM_API_KEY
				],
				CURLOPT_POSTFIELDS => json_encode($payload),
				CURLOPT_URL => "https://api.tatum.io/v3/bsc/transaction",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CUSTOMREQUEST => "POST",
			]);
			$response = curl_exec($curl);
			$error = curl_error($curl);
			curl_close($curl);
			if ($error) {
				return TRUE;
			} else {
				return TRUE;
			}
		}
		if($payable_coin > 0 && $destination)
		{
			$curl = curl_init();
			$payload = array(
				"chain" => "BSC",
				"to" => $destination,
				"amount" => $payable_coin,
				"contractAddress" => $this->contract_address,
				"digits" => 18,
				"fromPrivateKey" => $user_private_key
			);
			curl_setopt_array($curl, [
				CURLOPT_HTTPHEADER => [
					"Content-Type: application/json",
					"x-api-key:". $this->TATUM_API_KEY
				],
				CURLOPT_POSTFIELDS => json_encode($payload),
				CURLOPT_URL => "https://api-eu1.tatum.io/v3/blockchain/token/transaction",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CUSTOMREQUEST => "POST",
			]);
			$response_trx = curl_exec($curl);
			$error = curl_error($curl);
			curl_close($curl);
			log_message( 'error', ' BSC transaction: ' . $response_trx );
			$response_trx = json_decode($response_trx, TRUE);
			return $response_trx;
		}
	}


	function PayoutReleaseBep20($destination,$payable_coin,$adm_private_key){

		$curl = curl_init();

		$payload = array(
			"chain" => "BSC",
			"to" => $destination,
			"amount" => $payable_coin,
			"contractAddress" => $this->contract_address,
			"digits" => 18,
			"fromPrivateKey" => $adm_private_key
		);


		curl_setopt_array($curl, [
			CURLOPT_HTTPHEADER => [
				"Content-Type: application/json",
				"x-api-key:". $this->TATUM_API_KEY
			],
			CURLOPT_POSTFIELDS => json_encode($payload),
			CURLOPT_URL => "https://api-eu1.tatum.io/v3/blockchain/token/transaction",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
		]);

		$response = curl_exec($curl);
		$error = curl_error($curl);

		print_r($response);

		curl_close($curl);

		log_message( 'error', ' BSC transaction: ' . $response );

		$response = json_decode($response, TRUE); 

		return $response;


		
	}

	function checkTransactionBep20($response){

		$curl = curl_init();

		curl_setopt_array($curl, [

			CURLOPT_HTTPHEADER => [
				"Content-Type: application/json",
				"x-api-key:". $this->TATUM_API_KEY
			],
			CURLOPT_URL => "https://api.tatum.io/v3/bsc/transaction/" . $response['txId'],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "GET",
		]);


		$response_trx = curl_exec($curl);
		$error = curl_error($curl);

		curl_close($curl);


		$response_trx = json_decode($response_trx, TRUE); 

		return $response_trx;
	}


	function sendManualTransactionBep20($adm_wallets,$destination,$user_private_key,$user_wallet,$payable_coin)
	{

		$curl = curl_init();

		$balance=$this->checkBalance($user_wallet);
		if (array_key_exists('balance', $bep_balance)) 
		{
			$balance=$bep_balance['balance'];
		}
		print_r($balance);

		if($balance < 0.00055)
		{
			$to_pay = 0.00055-$balance;
			$to_pay = strval($to_pay);

			echo   $address=$adm_wallets['address'];
			$adm_private_key=$adm_wallets['private_key'];

			$curl = curl_init();

			$payload = array(
				"to" => $user_wallet,
				"currency" => "BSC",
				"amount" => $to_pay,
				"fromPrivateKey" => $adm_private_key
			);

			curl_setopt_array($curl, [
				CURLOPT_HTTPHEADER => [
					"Content-Type: application/json",
					"x-api-key:". $this->TATUM_API_KEY
				],
				CURLOPT_POSTFIELDS => json_encode($payload),
				CURLOPT_URL => "https://api.tatum.io/v3/bsc/transaction",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CUSTOMREQUEST => "POST",
			]);

			$response = curl_exec($curl);

			print_r($response);
			$error = curl_error($curl);

			curl_close($curl);

			if ($error) {
				return TRUE;
			} else {

				return TRUE;
			}

		}

		if($payable_coin > 0 && $destination)
		{
			$curl = curl_init();

			$payload = array(
				"chain" => "BSC",
				"to" => $destination,
				"amount" => $payable_coin,
				"contractAddress" => $this->contract_address,
				"digits" => 18,
				"fromPrivateKey" => $user_private_key
			);

			curl_setopt_array($curl, [
				CURLOPT_HTTPHEADER => [
					"Content-Type: application/json",
					"x-api-key:". $this->TATUM_API_KEY
				],
				CURLOPT_POSTFIELDS => json_encode($payload),
				CURLOPT_URL => "https://api-eu1.tatum.io/v3/blockchain/token/transaction",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CUSTOMREQUEST => "POST",
			]);

			$response = curl_exec($curl);
			print_r($response);
			$error = curl_error($curl);

			curl_close($curl);

			log_message( 'error', ' BSC transaction: ' . $response );

			$response = json_decode($response, TRUE);

			if(element('txId',$response)){
				$value['transaction']=$response['txId'];
				$value['response']=$response;

				return $value;

			}

			return $response;



		}
	}



	function paymentStausBep20($address)
	{


		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.bscscan.com/api?module=account&action=tokentx&contractaddress='.$this->contract_address.'&apikey=5F9EZJDCYAGQCKFFWY1X5XCBFXD3V85226&address='.$address.'&sort=asc',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
		));

		$response = curl_exec($curl);
		curl_close($curl);

		return $response;
	}




	function checkBalance($wallet_address)
	{

		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL =>"https://api.tatum.io/v3/bsc/account/balance/".$wallet_address,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"accept: application/json",
				"x-api-key: ".$this->TATUM_API_KEY,
			],
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$err = json_decode($err, true);
			return $err;
		} else {
			$response = json_decode($response, true);
			return $response;
		}
	}


	function createSubscription()
	{

		
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://api.tatum.io/v4/subscription",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode([
				'type' => 'INCOMING_NATIVE_TX',
				'attr' => [
					'chain' => 'BSC',
					'address' => '0x62fcf606fF007f14a1B719816Cd33049D5dFa0E3',
					'url' => 'https://webhook.site/e19e1e2a-e216-4f99-8923-86cd949ec42f'
				]
			]),
			CURLOPT_HTTPHEADER => [
				"accept: application/json",
				"content-type: application/json",
				"x-api-key: t-64f72e110c34f3d88de9f677-4562b03782a445d9b62155f1"
			],
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}



	}

	


	function monitorTransactionsIntervels($from_adddress,$to_address,$startTimestamp,$endTimestamp)
	{


		$filteredTransactions = [];

		while (time() < $endTimestamp) {

			$filteredTransactions = $this->checkTransactionTestNetBep20($to_address);

			$startTimestampMillis = $startTimestamp * 1000;
			$endTimestampMillis = $endTimestamp * 1000;


			$founded_transaction=array();


			if ($filteredTransactions) {

				foreach ($filteredTransactions as $key => $value) {

					if ($startTimestampMillis <= $value['timestamp'] && $endTimestampMillis >= $value['timestamp'] && $to_address == $value['address']  &&  $from_adddress == $value['counterAddress']) {
						
						print_r('Transaction found:');
						print_r('<br>');

						$founded_transaction=$value;

						return $founded_transaction;

					}

				}

				sleep(10); 
			}
			
		}

		return false;

		
		

		
	}




	function testNetLabelTransaction(){

		$string = "Testransfer@2024";
		$label = bin2hex($string);
		echo $label; 

		$send_bep20Test=$this->sendTransxTestnetBep20();

		$tx_id['txId']=$send_bep20Test['txId'];

		$response=$this->checkTransactionTestNetBep20($tx_id);

		$label=$response['input'];

		if (substr($label, 0, 2) === "0x") {
			$label = substr($label, 2);
		}
		$originalString = hex2bin($label);

		echo $originalString; 

		die();
	}

	function sendTransxTestnetBep20($private_key='',$bnb='')
	{
		
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://api.tatum.io/v3/bsc/transaction",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode([
				'currency' => 'BSC',
				'data' => '5465737472616e7366657240326e6474696d65',
				"contractAddress" => $this->contract_address,
				"digits" => 18,
				'to' => '0x5780D195a8bdDa725F3B6CB9BFE32a0D55488DF5',
				'amount' => $bnb,
				'fromPrivateKey' => $private_key
			]),
			CURLOPT_HTTPHEADER => [
				"accept: application/json",
				"content-type: application/json",
				"x-api-key:t-64f72e110c34f3d88de9f677-b8dcdc7c8c1241239df8b4f9"
			],
		]);

		$response = curl_exec($curl);

		print_r($response);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$response = json_decode($response, true);
			return $response;
		}

	}

	

	function checkTransactionTestNetBep20($response){

		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_HTTPHEADER => [
				"Content-Type: application/json",
				"x-api-key:t-64f72e110c34f3d88de9f677-b8dcdc7c8c1241239df8b4f9"
			],
			CURLOPT_URL => "https://api.tatum.io/v3/bsc/transaction/" . $response['txId'],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "GET",
		]);
		$response_trx = curl_exec($curl);
		$error = curl_error($curl);
		curl_close($curl);
		$response_trx = json_decode($response_trx, TRUE); 

		return $response_trx;
	}




	// Another way to find a transaction occured or not within a time peried

	function CheckTransactionStatus($from_adddress,$to_address)
	{


	 //accept both from and to as parameters.

		$to_address=strtolower($to_address);
		$from_adddress=strtolower($from_adddress);
		$startTimestamp= time(); 

		//adjest start end end for testing.
	   // default make it 1 as start and 3 as end, then the user will get 2 minutes to complete transaction.

		$startTimestamp = $startTimestamp - (1 * 60); 
		$endTimestamp = $startTimestamp + (3 * 60); 


		$transactions = $this->monitorTransactionsIntervels($from_adddress,$to_address,$startTimestamp,$endTimestamp);
		
		if ($transactions) {
			
			print_r($transactions);
			return $transactions;
			
		}


		else{
			print_r('No transactions Found');

			return false;
		}



	}



}


