<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Base_Controller {

    function __construct()
    {
        parent::__construct(); 	
    }

    function index()
    {   
        $user_id=log_user_id();
        $data['title'] = lang('dashboard');
        $data['total_users'] = $this->Base_model->getTotalUsers($user_id);
        $data['user_wallet'] = $this->Dashboard_model->getUserWalletDetails($user_id);
        $data['pending_bonus']= $this->Base_model->getPendingGLobalBonus(log_user_id());
        $this->loadView($data);
    }



}
