
text/x-generic CreatePolygonTrasaction.php ( PHP script, ASCII text )
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CreatePolygonTrasaction extends Base_model{
	protected $CI;
	public $contract_address = '0x1bfd67037b42cf73acf2047067bd4f2c47d9bfd6';//WBTC
	public $TATUM_API_KEY= 't-683fea362ba6bcaf0703e85e-dc765189626f40edb99d8fe4';
	public $URI = 'https://api.tatum.io/v3/polygon';
	function __construct($config = array()) {

		$this->initialize($config);
	}
	public function initialize($config = array()) {    
		$this->contract_address = (isset($config['contract_address'])) ? $config['contract_address'] : $this->contract_address;
		$this->TATUM_API_KEY = (isset($config['TATUM_API_KEY'])) ? $config['TATUM_API_KEY'] : $this->TATUM_API_KEY;
		$this->URI = (isset($config['URI'])) ? $config['URI'] : $this->URI;
		$this->MaticMinBalance = 0.005;
		$this->adminPrivateKey="0x2cd4b95ae142486469ff61276a7c73ecc2ac331752a98ba5d30746865de07cb5"; //  must have MATIC Wallet

	}
	function createWallet()
	{
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => $this->URI."/wallet",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER => [
				"x-api-key: ".$this->TATUM_API_KEY
			]
		]);
		$response = curl_exec($curl);
		curl_close($curl);
		$json = json_decode($response, true);
		if($json['xpub']){	
			$xpub = $json['xpub'];
			$index = 1;

			$curl = curl_init();
			curl_setopt_array($curl, [
				CURLOPT_URL => "https://api.tatum.io/v3/polygon/address/$xpub/$index",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_HTTPHEADER => [
					"x-api-key: ".$this->TATUM_API_KEY
				]
			]);
			$response = curl_exec($curl);
			curl_close($curl);
			$address = json_decode($response, true);
			if($address['address']){
				$mnemonic = $json['mnemonic'];
				$index = 1;
				$curl = curl_init();
				curl_setopt_array($curl, [
					CURLOPT_URL => "https://api.tatum.io/v3/polygon/wallet/priv",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_CUSTOMREQUEST => "POST",
					CURLOPT_POSTFIELDS => json_encode([
						"mnemonic" => $mnemonic,
						"index" => $index
					]),
					CURLOPT_HTTPHEADER => [
						"x-api-key: ".$this->TATUM_API_KEY,
						"content-type: application/json"
					]
				]);
				$response = curl_exec($curl);
				curl_close($curl);
				$privatekey = json_decode($response, true);
				$data['privatekey'] = $privatekey['key'];
				$data['address'] = $address['address'];

				return $data;
			}
		}
	}
	function CheckBalance($senderAddress)
	{
		$balanceUrl = $this->URI."/account/balance/$senderAddress";
		$curl = curl_init($balanceUrl);
		curl_setopt_array($curl, [
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER => [
				"x-api-key: ".$this->TATUM_API_KEY
			]
		]);
		$response = curl_exec($curl);
		curl_close($curl);
		$data = json_decode($response, true);
		$currentBalance = floatval($data['balance']);
		return $currentBalance;
	}
	function TransferMaticAccountToAccount($userwallet,$balance)
	{
		if($balance < $this->MaticMinBalance){
			$curl = curl_init();
			curl_setopt_array($curl, [
				CURLOPT_URL => "https://api.tatum.io/v3/polygon/transaction",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => json_encode([
					"to" => $userwallet,
					"currency" => "MATIC",
					"amount" => "$this->MaticMinBalance",
					"fromPrivateKey" => $this->adminPrivateKey
					
				]),
				CURLOPT_HTTPHEADER => [
					"accept: application/json",
					"content-type: application/json",
					"x-api-key: ".$this->TATUM_API_KEY
				],
			]);
			$resp = curl_exec($curl);
			curl_close($curl);
			$data = json_decode($resp, true);
			return $data;
		}
	}


	function SendTransactionWBTC($userwallet,$amount)
	{
		$fromKey='0xe489cd837a37bc3dd501305e9b18700991108803803c5da46ba869c46bb8e0cc';
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => "https://api.tatum.io/v3/blockchain/token/transaction",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode([
				"chain" => "MATIC",
				"to" => $userwallet,
				"contractAddress" => $this->contract_address,
				"amount" => "{$amount}", 
				"digits" => 8,
				"fromPrivateKey" => $fromKey,
			]),
			CURLOPT_HTTPHEADER => [
				"accept: application/json",
				"content-type: application/json",
				"x-api-key: ".$this->TATUM_API_KEY
			],
		]);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		$data = json_decode($response, true);
		return $data;
	}
}

