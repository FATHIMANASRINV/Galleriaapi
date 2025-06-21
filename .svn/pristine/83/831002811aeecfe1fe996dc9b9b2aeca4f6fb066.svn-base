<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Base_Controller {

	function __construct()
	{
		parent::__construct(); 	
	}

	function index()
	{  
		$data['title'] = lang('dashboard'); 
		$data['total_users'] = $this->Base_model->getTotalUsers();
		$data['wallet_details'] = $this->Dashboard_model->getUserWalletDetails();
		$data['pending_bonus']= $this->Base_model->getPendingGLobalBonus();
		$this->loadView($data);
	}
}

