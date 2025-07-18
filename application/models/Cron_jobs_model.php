<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_jobs_model extends Base_model {
   function __construct() {
      parent::__construct();

  } 

  public function isCronAlreadyRun($date,$cron_name) {
    $count = 0;
    $this->db->select("count(id) as count");
    $this->db->where('cron', $cron_name);
    $this->db->like('start_time', $date, "after");
    $this->db->where('status', "finished");
    $this->db->from("cron_history");
    $query = $this->db->get();
    foreach ($query->result() AS $row) {
        $count = $row->count;
    }

    if($count > 0)
        return TRUE;
    else
        return FALSE;            
}

public function insertUsers()
{
    $this->load->model(['Signup_model','Calculation_model']);
    $admin_id = $this->Base_model->getAdminId();
    $this->config->load('bcrypt');
    $this->load->library('bcrypt');
    $hashed_password = $this->bcrypt->hash_password( '123456' );


    $register= [
        array ( 
            "user_name"=>"AG57430",
            "password"=>"123456",
            "position"=>"1",
            "first_name"=>"Ram",
            "second_name"=>"Mohan",
            "email"=>"member1@gmail.com",
            "mobile"=>"5589654789",
            "password"=> $hashed_password,
            "country"=>"99",
            "address"=> "Neo MLM Software",
            "country"=>"99",
            "state"=>"19",
            "city"=> "Cochin",
            "zip_code"=> "123456",
            'user_level'=>1,
            'sponsor_level'=>1,
            'status'=>'active',
            'user_type'=>'user',
            'secure_pin'=>'12345678',
            "father_id"=> $admin_id,
            "sponsor_id"=> $admin_id,
            "package_id"=> 1,

        ), 
        array (

            "user_name"=>"NEO73109",
            "password"=>"123456",
            "position"=>"2",
            "first_name"=>"Susanna",
            "second_name"=>"Abraham",
            "email"=>"member1@gmail.com",
            "mobile"=>"8545454555",
            "password"=> $hashed_password,
            "country"=>"99",
            "address"=> "Neo MLM Software",
            "country"=>"99",
            "state"=>"19",
            "city"=> "Cochin",
            "zip_code"=> "123456",
            'user_level'=>1,
            'sponsor_level'=>1,
            'status'=>'active',
            'user_type'=>'user',
            'secure_pin'=>'12345678',
            "father_id"=> $admin_id,
            "sponsor_id"=> $admin_id,
            "package_id"=> 2,
        ), 
    ];


    $info= array (
        "user_id"=> $admin_id,
        "user_name"=> "admin",
        "user_type"=> "admin",
        "first_name"=> "Matrix",
        "second_name"=> "Neo",
        "status"=> "active",
        "password"=> $hashed_password,
        "address"=> "Neo MLM Software",
        "country"=>"99",
        "state"=>"19",
        "city"=> "Cochin",
        "zip_code"=> "123456",
        "mobile"=> "5589654789",
        "email"=> "admin@neomlm.com",
        "date_of_joining"=>date('Y-m-d H:i:s'),
        "referral_count"=>"0",
        "rank_id"=>"0",
        "secure_pin"=>"12345678"
    );
    $udpate_admin_details = $this->db->update('user_info',$info);

    $users_array = array(); 
    for ($temp = 1; $temp < 5; $temp++) {

        $user_name = 'NEO'.$this->getRandomString(5, 'user_info', 'user_name');
        $first_name = $this->random_string('alpha', 5);
        $second_name = $this->random_string('alpha', 3);
        $hashed_password = password_hash("123456", PASSWORD_DEFAULT); 
        $user_data = array(
            "user_name" => $user_name,
            "password" => $hashed_password,
            "first_name" => $first_name,
            "second_name" => $second_name,
            "email" => "member1@gmail.com",
            "mobile" => "5589654789",
            "country" => "99",
            "address" => "Neo MLM Software",
            "state" => "19",
            "city" => "Cochin",
            "zip_code" => "123456",
            'sponsor_level' => 1,
            'status' => 'active',
            'user_type' => 'user',
            'secure_pin' => '12345678',
            "sponsor_id"=> 17,
            "package_id" => 3,
        );

        $users_array[] = $user_data;
    }
    for ($temp = 1; $temp <3; $temp++) {

        $user_name = 'NEO'.$this->getRandomString(5, 'user_info', 'user_name');
        $first_name = $this->random_string('alpha', 5);
        $second_name = $this->random_string('alpha', 3);
        $hashed_password = password_hash("123456", PASSWORD_DEFAULT);
        $user_data = array(
            "user_name" => $user_name,
            "password" => $hashed_password,
            "first_name" => $first_name,
            "second_name" => $second_name,
            "email" => "member1@gmail.com",
            "mobile" => "5589654789",
            "country" => "99",
            "address" => "Neo MLM Software",
            "state" => "19",
            "city" => "Cochin",
            "zip_code" => "123456",
            'sponsor_level' => 1,
            'status' => 'active',
            'user_type' => 'user',
            'secure_pin' => '12345678',
            "sponsor_id"=> 18,
            "package_id" => 3,
        );

        $users_array[] = $user_data;
    }
    for ($temp = 1; $temp < 3; $temp++) {

        $user_name = 'NEO'.$this->getRandomString(5, 'user_info', 'user_name');
        $first_name = $this->random_string('alpha', 5);
        $second_name = $this->random_string('alpha', 3);
        $hashed_password = password_hash("123456", PASSWORD_DEFAULT);
        $user_data = array(
            "user_name" => $user_name,
            "password" => $hashed_password,
            "first_name" => $first_name,
            "second_name" => $second_name,
            "email" => "member1@gmail.com",
            "mobile" => "5589654789",
            "country" => "99",
            "address" => "Neo MLM Software",
            "state" => "19",
            "city" => "Cochin",
            "zip_code" => "123456",
            'sponsor_level' => 1,
            'status' => 'active',
            'user_type' => 'user',
            'secure_pin' => '12345678',
            "sponsor_id"=> 19,
            "package_id" => 3,
        );

        $users_array[] = $user_data;
    }
    for ($temp = 1; $temp <3; $temp++) {

        $user_name = 'NEO'.$this->getRandomString(5, 'user_info', 'user_name');
        $first_name = $this->random_string('alpha', 5);
        $second_name = $this->random_string('alpha', 3);
        $hashed_password = password_hash("123456", PASSWORD_DEFAULT);
        $user_data = array(
            "user_name" => $user_name,
            "password" => $hashed_password,
            "first_name" => $first_name,
            "second_name" => $second_name,
            "email" => "member1@gmail.com",
            "mobile" => "5589654789",
            "country" => "99",
            "address" => "Neo MLM Software",
            "state" => "19",
            "city" => "Cochin",
            "zip_code" => "123456",
            'sponsor_level' => 1,
            'status' => 'active',
            'user_type' => 'user',
            'secure_pin' => '12345678',
            "sponsor_id"=> 20,
            "package_id" => 3,
        );

        $users_array[] = $user_data;
    }
    for ($temp = 1; $temp < 3; $temp++) {

        $user_name = 'NEO'.$this->getRandomString(5, 'user_info', 'user_name');
        $first_name = $this->random_string('alpha', 5);
        $second_name = $this->random_string('alpha', 3);
        $hashed_password = password_hash("123456", PASSWORD_DEFAULT);
        $user_data = array(
            "user_name" => $user_name,
            "password" => $hashed_password,
            "first_name" => $first_name,
            "second_name" => $second_name,
            "email" => "member1@gmail.com",
            "mobile" => "5589654789",
            "country" => "99",
            "address" => "Neo MLM Software",
            "state" => "19",
            "city" => "Cochin",
            "zip_code" => "123456",
            'sponsor_level' => 1,
            'status' => 'active',
            'user_type' => 'user',
            'secure_pin' => '12345678',
            "sponsor_id"=> 21,
            "package_id" => 3,
        );

        $users_array[] = $user_data;
    }
    for ($temp = 1; $temp < 3; $temp++) {

        $user_name = 'NEO'.$this->getRandomString(5, 'user_info', 'user_name');
        $first_name = $this->random_string('alpha', 5);
        $second_name = $this->random_string('alpha', 3);
        $hashed_password = password_hash("123456", PASSWORD_DEFAULT);
        $user_data = array(
            "user_name" => $user_name,
            "password" => $hashed_password,
            "first_name" => $first_name,
            "second_name" => $second_name,
            "email" => "member1@gmail.com",
            "mobile" => "5589654789",
            "country" => "99",
            "address" => "Neo MLM Software",
            "state" => "19",
            "city" => "Cochin",
            "zip_code" => "123456",
            'sponsor_level' => 1,
            'status' => 'active',
            'user_type' => 'user',
            'secure_pin' => '12345678',
            "sponsor_id"=> 20,
            "package_id" => 3,
        );

        $users_array[] = $user_data;
    }
    for ($temp = 1; $temp < 3; $temp++) {

        $user_name = 'NEO'.$this->getRandomString(5, 'user_info', 'user_name');
        $first_name = $this->random_string('alpha', 5);
        $second_name = $this->random_string('alpha', 3);
        $hashed_password = password_hash("123456", PASSWORD_DEFAULT);
        $user_data = array(
            "user_name" => $user_name,
            "password" => $hashed_password,
            "first_name" => $first_name,
            "second_name" => $second_name,
            "email" => "member1@gmail.com",
            "mobile" => "5589654789",
            "country" => "99",
            "address" => "Neo MLM Software",
            "state" => "19",
            "city" => "Cochin",
            "zip_code" => "123456",
            'sponsor_level' => 1,
            'status' => 'active',
            'user_type' => 'user',
            'secure_pin' => '12345678',
            "sponsor_id"=> 25,
            "package_id" => 3,
        );

        $users_array[] = $user_data;

    }
    for ($temp = 1; $temp < 3; $temp++) {

        $user_name = 'NEO'.$this->getRandomString(5, 'user_info', 'user_name');
        $first_name = $this->random_string('alpha', 5);
        $second_name = $this->random_string('alpha', 3);
        $hashed_password = password_hash("123456", PASSWORD_DEFAULT);
        $user_data = array(
            "user_name" => $user_name,
            "password" => $hashed_password,
            "first_name" => $first_name,
            "second_name" => $second_name,
            "email" => "member1@gmail.com",
            "mobile" => "5589654789",
            "country" => "99",
            "address" => "Neo MLM Software",
            "state" => "19",
            "city" => "Cochin",
            "zip_code" => "123456",
            'sponsor_level' => 1,
            'status' => 'active',
            'user_type' => 'user',
            'secure_pin' => '12345678',
            "sponsor_id"=> 30,
            "package_id" => 3,
        );

        $users_array[] = $user_data;
        
    }
    for ($temp = 1; $temp <3; $temp++) {

        $user_name = 'NEO'.$this->getRandomString(5, 'user_info', 'user_name');
        $first_name = $this->random_string('alpha', 5);
        $second_name = $this->random_string('alpha', 3);
        $hashed_password = password_hash("123456", PASSWORD_DEFAULT);
        $user_data = array(
            "user_name" => $user_name,
            "password" => $hashed_password,
            "first_name" => $first_name,
            "second_name" => $second_name,
            "email" => "member1@gmail.com",
            "mobile" => "5589654789",
            "country" => "99",
            "address" => "Neo MLM Software",
            "state" => "19",
            "city" => "Cochin",
            "zip_code" => "123456",
            'sponsor_level' => 1,
            'status' => 'active',
            'user_type' => 'user',
            'secure_pin' => '12345678',
            "sponsor_id"=> 35,
            "package_id" => 3,
        );

        $users_array[] = $user_data;
        
    }
    for ($temp = 1; $temp <3; $temp++) {

        $user_name = 'NEO'.$this->getRandomString(5, 'user_info', 'user_name');
        $first_name = $this->random_string('alpha', 5);
        $second_name = $this->random_string('alpha', 3);
        $hashed_password = password_hash("123456", PASSWORD_DEFAULT);
        $user_data = array(
            "user_name" => $user_name,
            "password" => $hashed_password,
            "first_name" => $first_name,
            "second_name" => $second_name,
            "email" => "member1@gmail.com",
            "mobile" => "5589654789",
            "country" => "99",
            "address" => "Neo MLM Software",
            "state" => "19",
            "city" => "Cochin",
            "zip_code" => "123456",
            'sponsor_level' => 1,
            'status' => 'active',
            'user_type' => 'user',
            'secure_pin' => '12345678',
            "sponsor_id"=> 40,
            "package_id" => 3,
        );

        $users_array[] = $user_data;
        
    }
    $register= array_merge($register, $users_array);
    // print_r($register);die();
    $left_sponsor = 2 ;
    $left_father = 2 ;

    $select_arr = 'referral_amount,referal_status,width_ceiling';
    $config = $this->Base_model->getConfig($select_arr);
    $referral_amount =  $config['referral_amount'];
    $referal_status = $config['referal_status'];
    $this->Signup_model->WIDTH_CEILING = $config['width_ceiling'];
    foreach($register as $v)
    {

        $right_sponsor = $left_sponsor + 1; 
        $right_father = $left_father + 1;
        $this->Signup_model->updateTreeLeftRightNode($left_sponsor, $left_father);
        $placement_details = $this->Signup_model->getPlacementUnilevel($v['sponsor_id']);

        $v['left_sponsor'] = $left_sponsor;
        $v['right_sponsor'] = $right_sponsor;

        $v['left_father'] = $left_father;
        $v['right_father'] = $right_father;
        $v['father_id'] = $placement_details['placement_id'];
        $query = $this->db->insert('user_info', $v);

        $new_user_id = $this->db->insert_id();

        if($new_user_id)
        {
            $v['user_id'] = $new_user_id;
            $this->Signup_model->insertUserWallet($new_user_id);

            if ($referal_status == "yes") 
            {
                if ( $referral_amount > 0) {

                    $comm = [
                        'user_id' => $admin_id,
                        'total_amount' => $referral_amount,
                        'date_of_submission' => $info['date_of_joining'],
                        'from_id' => $new_user_id,
                        'fund_transfer_type' => 'credit',
                    ];
                    $result = $this->Calculation_model->insertCommissionDetails( $comm,'referral_bonus','referral_bonus');
                }
            }

            $placement_details = $this->Signup_model->getPlacementUnilevel($v['sponsor_id']);
            if($placement_details['position']==$this->Signup_model->WIDTH_CEILING)
            {

                $comm = [
                    'user_id' => $placement_details['placement_id'],
                    'total_amount' => value_by_key('matrix_bonus'),
                    'date_of_submission' => $info['date_of_joining'],
                    'from_id' => $v['user_id'],
                    'fund_transfer_type' => 'credit',
                ];
                $up_date = $this->Calculation_model->insertCommissionDetails( $comm, 'matrix_bonus','matrix_bonus');
            }
            $v['sponsor_name'] = $info['user_name'];
            $v['sponsor_info'] = $info;
            $referral_count= $v['sponsor_info']['referral_count']+1;
            $old_rank = $v['sponsor_info']['rank_id'];
            $new_rank = $this->Base_model->checkNewRank($referral_count);
            if ($old_rank != $new_rank) {
                $this->Signup_model->updateUserRank($v['sponsor_id'], $new_rank);

                $rank_bonus = $this->Base_model->getRankBonus($new_rank);
                $this->Signup_model->insertIntoRankHistory($old_rank, $new_rank, $v['sponsor_id'], $info['date_of_joining']);
                $comm = [
                    'user_id' => $v['sponsor_id'],
                    'total_amount' => $rank_bonus,
                    'date_of_submission' => $info['date_of_joining'],
                    'from_id' => $v['user_id'],
                    'fund_transfer_type' => 'credit',
                ];
                $result = $this->Calculation_model->insertCommissionDetails( $comm,'rank_bonus','rank_bonus'); 
            }
            $v['package_amount'] = $this->Base_model->getPackageAmountbyId($v['package_id']);
            $this->Calculation_model->insertLevelBonus( $v['sponsor_id'], $v['package_amount'], $v['user_id'], $info['date_of_joining']);

        }
    }            

    return $query;
}

public function updateCronHistory($cron_id, $status) {
    $this->db->set("status", $status);
    $this->db->set('end_time', date("Y-m-d H:i:s"));
    $this->db->where('id', $cron_id);
    $this->db->limit(1);
    $this->db->update('cron_history');
    return TRUE;
}


public function insertCronHistory($cron_name) {
    $this->db->set("cron", $cron_name);
    $this->db->set('start_time', date("Y-m-d H:i:s"));
    $this->db->set("status", "started");
    $this->db->insert('cron_history');
    $cron_id = $this->db->insert_id();
    return $cron_id;
}

function getUserDetail($user_id) {
    $user_details = array();
    $this->db->select("*");
    $this->db->from('user_info');
    $this->db->where('user_id', $user_id);
    $res = $this->db->get();
    foreach ($res->result_array() as $row) {
        $user_details = $row;
    }
    return $user_details;
}
public function getAllUsers($status='all') {
    $user_array = array();
    $this->db->select("user_id,package_id");
    if($status != 'all')
        $this->db->where("status", "$status");
    $this->db->where("user_type !=", 'admin');
    $this->db->where("status !=", 'server');
    $res=$this->db->get('user_info');
    $i= 0;
    foreach ($res->result_array() as $row) {
        $user_array[$i] = $row;
        $i++;
    }
    return $user_array;
}


public function runDailyBonus($user_details) {

    $this->db->cache_delete();
    $this->load->model('Calculation_model');
    $result = TRUE;
    $count = count($user_details);
    $amount_type = $this->getAmountTypeIdByString('roi_amount');
    $daily_percentage = value_by_key('roi_percent');


    $date = date("Y-m-d H:i:s");
    foreach ($user_details as $key => $row) {

        $user_id = $row['user_id'];
        $package_id = $row['new_package'];
        $total_amount = $this->Base_model->getPackageAmountbyId($package_id);
        $roi_count=$row['roi_count'];
        $earn_amount=$row['earn_amount'];
        $roi_days=$row['roi_days'];

        $daily_commission = round((($total_amount * $daily_percentage) / 100),2);
        $total_earned=$earn_amount+$daily_commission;
        if($total_earned < $daily_commission * $roi_days)
        {

            $comm = [
                'user_id' => $user_id,
                'total_amount' => $daily_commission,
                'date_of_submission' => $date,
                'from_id' => $user_id,
                'transaction_note' => 'roi_bonus',
                'fund_transfer_type' => 'credit',
            ];

            $insert_id=$this->Calculation_model->insertCommissionDetails( $comm,'commission_details','roi_bonus');

            $sponsor_id = $this->Base_model->getSponsorID($user_id);
            $insert_level = $this->Calculation_model->insertLevelBonus($sponsor_id,$daily_commission, $user_id,$date);
            $this->updateRoiCount($row['id'],$daily_commission);

        }
        else {

            $this->changeRoiStatus($row['id']);
            
        }
    } 
    return $result;
}

public function updateRoiCount($id,$daily_commission) {
    $date = date("Y-m-d H:i:s");
    $this->db->set('roi_count', 'roi_count + 1', FALSE);
    $this->db->set('earn_amount', 'earn_amount + ' . $daily_commission, FALSE);
    $this->db->set('update_date', $date);
    $this->db->where('id', $id);
    $this->db->limit(1);
    $res = $this->db->update('package_upgrade_history');
        // echo $this->db->last_query();die();
}

public function changeRoiStatus($id) {
    $this->db->set('roi_status', 1);
    $this->db->where('id', $id);
    $this->db->limit(1);
    $res = $this->db->update('package_upgrade_history');
}
public function getRoiUsers() {
    $details = array();
    $this->db->select('id, user_id, roi_count,roi_status,roi_days,package_amount,new_package,earn_amount');
    $this->db->where('roi_status', 0);
    $res=$this->db->get('package_upgrade_history');
    foreach ($res->result_array() as $row) {
        $details[] = $row;
    }
    return $details;
}
public function getTotalTransactionFee() {
    $details = 0;
    $this->db->select('SUM(transaction_fee) as total_amount');
    $res=$this->db->get('user_wallet');
    foreach ($res->result_array() as $row) {
        $details = $row['total_amount'];
    }
    return $details;
}
public function TransferFeeAndMissedProfit()
{
    $total_amount=$this->getTotalTransactionFee();
    $admin_id=$this->Base_model->getAdminId();
    $date = date("Y-m-d H:i:s");
    $trans_destination=''; 
    $this->load->library('CreatePolygonTrasaction');
    if ($trans_destination && $total_amount > 0) {
        $user_id = $admin_id;
        $this->begin();
        $result2 = $this->updateUSDTTransactionAdminDetails($user_id, null, 'Processing', 'Processing', 'transactionfee', '', $total_amount, $trans_destination); 
        if (!$result2) {
            $this->rollback();
            return True; 
        }
        $response = $this->createpolygontrasaction->SendTransactionWBTC($trans_destination, $total_amount);
        if (element('txId', $response)) {
            $this->commit();
            $this->begin();
            $updateTx     = $this->updateUSDTTTransactionId($result2, $response, 'finished');
            $result1      = $this->insertUSDTPaymentHistory($user_id, $total_amount, 'transactionfee', $response['txId']);
            $updateStatus = $this->UpdateUserwallettransactionFee();
            if ($updateTx && $result1 && $updateStatus) {
                $this->commit();
            } else {
                $this->rollback();
                $updateStatus = $this->UpdateUserwallettransactionFee();
                $v = [
                    'crypto_id'              => $result2,
                    'user_id'         => $admin_id,
                    'amount_payable'  => $total_amount,
                    'wallet_address'  => $trans_destination,
                ];
                $this->AfterSuccesfulPaymentDbError($v, $response['txId'], 'transactionfee');
            }
        } else 
        {
           $this->rollback();
           log_message('error', 'Transaction failed ' . json_encode($response));
       }
   }
   $missed_income = $this->getMissedIncomeCommissions(); 
   $total_amount_missed= $missed_income['total_amount'];
   $missed_ids= array_column($missed_income['records'],'id');
   $missed_destination=''; 
   if ($missed_destination  && $total_amount_missed > 0)
   {
       $this->begin();
       $result2 = $this->updateUSDTTransactionAdminDetails($admin_id, null, 'Processing', 'Processing', 'missedincome','',$total_amount_missed,$missed_destination,$missed_ids);
       $updateStatus = $this->markMissedIncomeAsPaid($missed_ids,'level_bonus','Processing'); 
       if (!$result2) 
       {
        $this->rollback();
    }
    $response = $this->createpolygontrasaction->SendTransactionWBTC($missed_destination,$total_amount_missed);
    if (element('txId', $response)) {
        $this->commit();
        $this->begin();
        $updateTx = $this->updateUSDTTTransactionId($result2,$response,'finished');
        $updateStatus = $this->markMissedIncomeAsPaid($missed_ids,'level_bonus','released'); 
        $result1 = $this->insertUSDTPaymentHistory($admin_id, $total_amount_missed, 'missedincome', $response['txId']);
        if ($updateTx && $result1 && $updateStatus) {
            $this->commit();
        } else 
        {
            $this->rollback();
            $v = [
                'crypto_id'              => $result2,
                'user_id'         => $admin_id,
                'amount_payable'  => $total_amount_missed,
                'wallet_address'  => $missed_destination,
            ];
            $this->AfterSuccesfulPaymentDbError($v, $response['txId'], 'missed_income');
        }
    } 
    else {
        $this->rollback();
        log_message('error', 'Transaction failed ' . json_encode($response));
    }
}
return TRUE;
}
public function UpdateUserwallettransactionFee() {
    $this->db->set('transaction_fee','0');
    $res = $this->db->update('user_wallet');
    return $res;
}
public function getUsersCommissions() {
    $details = [];

    $this->db->select('lb.id, lb.user_id, lb.amount_payable, "level_bonus" as bonus_type, ui.wallet_address');
    $this->db->from('level_bonus lb');
    $this->db->join('user_info ui', 'ui.user_id = lb.user_id');
    $this->db->where('lb.release_status', 'pending');
    $this->db->where('lb.missed_income_status!=', '1');
    $level = $this->db->get()->result_array();

    $this->db->select('rb.id, rb.user_id, rb.amount_payable, "referral_bonus" as bonus_type, ui.wallet_address');
    $this->db->from('referral_bonus rb');
    $this->db->join('user_info ui', 'ui.user_id = rb.user_id');
    $this->db->where('rb.release_status', 'pending');
    $referral = $this->db->get()->result_array();

    $this->db->select('gb.id, gb.user_id, gb.amount_payable, "global_bonus" as bonus_type, ui.wallet_address');
    $this->db->from('global_bonus gb');
    $this->db->join('user_info ui', 'ui.user_id = gb.user_id');
    $this->db->where('gb.release_status', 'pending');
    $this->db->where('gb.status', 'Released');
    $global = $this->db->get()->result_array();

    $details = array_merge($level, $referral,$global);
    return $details;
}
public function MoveCommissionsToUserwallet($details)
{
    $date = date("Y-m-d H:i:s");
    $this->load->library('CreatePolygonTrasaction');
    foreach ($details as $v) {
        if (!$v['wallet_address']) continue;
        $this->begin();
        $result2 = $this->updateUSDTTransactionAdminDetails($v['user_id'], null, 'Processing', 'Processing', 'commission', $v);
        $updateStatus = $this->UpdateReleaseStatus($v['id'], $v['bonus_type'], $v['user_id'], 'Processing');
        if (!$result2 || !$updateStatus) {
            $this->rollback();
            continue;
        }
        $response = $this->createpolygontrasaction->SendTransactionWBTC($v['wallet_address'], $v['amount_payable']);
        if (element('txId', $response)) {
            $this->commit(); 
            $this->begin(); 
            $updateTx     = $this->updateUSDTTTransactionId($result2, $response, 'finished');
            $result1      = $this->insertUSDTPaymentHistory($v['user_id'], $v['amount_payable'], 'commission', $response['txId']);
            $updateStatus = $this->UpdateReleaseStatus($v['id'], $v['bonus_type'], $v['user_id'], 'released');
            if ($updateTx && !empty($result1) && $updateStatus) {
                $this->commit();
            } else {
                $this->rollback();
                $v['crypto_id'] = $result2;
                $this->AfterSuccesfulPaymentDbError($v, $response['txId'], 'commission');
            }
        } else {
            $this->rollback();
        }
    }
    return True;
}
public function AfterSuccesfulPaymentDbError($data, $txId, $type)
{
    $log = [
        'user_id' => $data['user_id'],
        'wallet_address' => $data['wallet_address'],
        'amount' => $data['amount_payable'],
        'txId' => $txId,
        'status' => 'FAILED_DB_UPDATE',
        'datas' => json_encode($data),
        'type' => $type,
        'crypto_id' => $data['crypto_id'],
        'date' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('send_token_error', $log);
}
public function updateUSDTTransactionAdminDetails($user_id, $trXdetails='', $transfer_status='',$where='pending',$type,$details='',$total_amount_missed='',$missed_destination='',$missed_ids='')
{ 
    $date = date('Y-m-d H:i:s');
    $result = false; 
    $this->db->set('transfer_status', $transfer_status);
    $this->db->set('type_amt', $type);
    if($trXdetails){
        if(element('txId',$trXdetails)){
            $this->db->set('transaction_id', $trXdetails['txId']);
            $this->db->set('transactions_data', json_encode($trXdetails));
        }
    }
    $this->db->set('updated_date ', $date);
    $this->db->set('user_id', $user_id);
    $this->db->set('date_added', date('Y-m-d H:i:s'));
    if($details){        
        if(element('wallet_address',$details)){
            $this->db->set('to', $details['wallet_address']);
        } if(element('id',$details)){
            $this->db->set('insert_id', $details['id']);
        } 
        if(element('bonus_type',$details)){
            $this->db->set('bonus_type', $details['bonus_type']);
        }if(element('amount_payable',$details)){
            $this->db->set('value', $details['amount_payable']);
        }
    }
    if($total_amount_missed){
        $this->db->set('value', $total_amount_missed);
    }if($missed_destination){
        $this->db->set('to', $missed_destination);
    }if($missed_ids){
        $this->db->set('missed_ids', json_encode($missed_ids));
    }
    $result = $this->db->insert('crypto_history');
    $result = $this->db->insert_id();
    return $result;
}
public function insertUSDTPaymentHistory($user_id, $amount, $type,$transaction_id)
{ 
    $date = date('Y-m-d H:i:s');
    $result = false; 
    $this->db->set('user_id', $user_id);
    $this->db->set('amount', $amount);
    $this->db->set('type', $type);
    if($transaction_id){
        $this->db->set('transaction_id ', $transaction_id);
    }
    $this->db->set('date ', $date);
    $result = $this->db->insert('wbtc_balance_sheet');
    $result = $this->db->insert_id();
    return  $result;
}
public function markMissedIncomeAsPaid($id,$table,$status) {
    $this->db->set('release_status',$status);
    $this->db->where_in('id',$id);
    $res = $this->db->update($table);
    return $res;
}
public function UpdateReleaseStatus($id,$table,$user_id,$status) {
    $this->db->set('release_status',$status);
    $this->db->where('id',$id);
    $this->db->where('user_id',$user_id);
    $res = $this->db->update($table);
    return $res;
}
public function updateUSDTTTransactionId($id,$response,$status) {
    $this->db->set('transfer_status', $status);
    $this->db->set('transaction_id', $response['txId']);
    $this->db->set('transactions_data', json_encode($response));
    $this->db->where('id',$id);
    $res = $this->db->update('crypto_history');
    return $res;
}public function updateUSDTPaymentHistoryTx($id,$response) {
    $this->db->set('transaction_id ',$response['txId']);
    $this->db->where('id',$id);
    $res = $this->db->update('wbtc_balance_sheet');
    return $res;
}
public function getMissedIncomeCommissions() {
    $this->db->select('lb.id, lb.total_amount');
    $this->db->from('level_bonus lb');
    $this->db->join('user_info ui', 'ui.user_id = lb.user_id');
    $this->db->where('lb.release_status', 'pending');
    $this->db->where('lb.missed_income_status', '1');
    $result = $this->db->get()->result_array();
    $sum = '0';
    foreach ($result as $row) {
        $sum = bcadd($sum, (string)$row['total_amount'], 30); 
    }
    $formatted_total = rtrim(rtrim($sum, '0'), '.');
    return [
        'records' => $result,
        'total_amount' => $formatted_total 
    ];
}
}