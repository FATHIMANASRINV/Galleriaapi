<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Calculation_model extends Base_model {

    function __construct() {
        parent::__construct();

    } 
    public function insertCommissionDetails($data, $table, $wallet) {
        $transaction_fee = $data['total_amount'] * 10 / 100;
        $data['amount_payable'] = $data['total_amount'] - $transaction_fee;
        $data['service_charge'] = $transaction_fee;

        if (!empty($data['amount_payable']) && $data['amount_payable'] > 0) {
            $result = $this->db->insert($table, $data);
            if($result) {
                if(element('missed_income_status', $data) != 1 && $wallet != 'global_bonus_pending') {
                    $this->Base_model->addUserWalletAmount($data['user_id'], $data['amount_payable'], $wallet);
                    if($transaction_fee > 0){
                        $this->Base_model->addUserSpeicficWalletAmount($data['from_id'],$transaction_fee,'transaction_fee');
                        $this->Base_model->addUserSpeicficWalletAmount($data['from_id'],$transaction_fee,'transaction_fee_total');
                    }
                }
            }
            $this->db->cache_delete('admin', 'business');
            $this->db->cache_delete('user', 'business');
            $this->db->cache_delete('admin', 'dashboard');
            $this->db->cache_delete('user', 'dashboard');
            $this->db->cache_delete('admin', 'report');
            $this->db->cache_delete('user', 'report');

            return $result;
        }

        return TRUE;
    }


    public function insertLevelBonus($upline_id, $level_bonus, $from_user_id,$date,$package='') {
     $this->db->cache_delete();
     $result = TRUE;
     $this->load->model('Settings_model');
     if ($upline_id != "") {
        $level_info = $this->Settings_model->getlevelDetails();
        $uplines = $this->getUplineUsersUnilevel($upline_id, count($level_info), true);
        if($level_info){
            foreach ($uplines as $level => $users) {
                $referal_count=$this->Base_model->getUserInfoField('referral_count',$users['user_id']);
                $current_package=$this->Base_model->getUserInfoField('package_id',$users['user_id']);
                $level_details = $level_info[$level+1];
                $level_percentage =$level_details['level_commission'];
                if($level_percentage > 0) {
                    $amount = $level_bonus * $level_percentage / 100;
                    // if ($level_details['level_no'] >= 2){
                    if ($referal_count < $level_details['level_no']  || $current_package < $package ){
                        $missed_income=$this->Base_model->addUserSpeicficWalletAmount($users['user_id'],$amount,'missed_level_income');
                        $comm = [
                            'user_id' => $users['user_id'],
                            'total_amount' => $amount,
                            'date_of_submission' => $date,
                            'from_id' => $from_user_id,
                            'fund_transfer_type' => 'credit',
                            'level_percentage' => $level_percentage,
                            'payout_ref_id' => $package,
                            'transaction_note' => 'Level'.$level_details['level_no'],
                            'missed_income_status' => 1,
                            'release_status' => 'pending',
                        ];
                        $result = $this->Calculation_model->insertCommissionDetails( $comm,'level_bonus','level_bonus');
                        continue; 

                    }
                    // }
                    $comm = [
                        'user_id' => $users['user_id'],
                        'total_amount' => $amount,
                            // 'amount_type_id' => $amount_type_level,
                        'date_of_submission' => $date,
                        'from_id' => $from_user_id,
                        'fund_transfer_type' => 'credit',
                        'level_percentage' => $level_percentage,
                        'payout_ref_id' => $package,
                        'transaction_note' => 'Level'.$level_details['level_no'],
                        'release_status' => 'pending',
                    ];
                    if($level_details['level_no']==1){
                        $result = $this->Calculation_model->insertCommissionDetails( $comm,'referral_bonus','referral_bonus');
                    }else{
                     $comm['missed_income_status']=0;
                     $result = $this->Calculation_model->insertCommissionDetails( $comm,'level_bonus','level_bonus'); 
                 }

             }

         }
     }
 }
 return $result;
}
public function InsertGlobalCommunityBonus($global_bonus, $package, $user_id, $type = '',$packages='') {
    $this->db->cache_delete();
    $result = TRUE;
    $admin_id = $this->Base_model->getAdminId();
    $uplines = $this->Base_model->getMonolinesUsers($user_id, $type, $admin_id);
    if ($type == 'signup') {
        foreach ($uplines as $level => $users) {
            for ($i = 1; $i <= $users['package_id']; $i++) {
                $details = $this->CheckLevelCompleted($users['user_id'], $i);
                if ($details && $details['level'] < 20) {
                    $comm = [
                        'user_id' => $user_id,
                        'total_amount' => $details['amount'],
                        'date_of_submission' => date('Y-m-d H:i:s'),
                        'from_id' => $users['user_id'],
                        'fund_transfer_type' => 'credit',
                        'payout_ref_id' => $i,
                        'status' => ($i <= $package) ? 'Released' : 'Pending',
                        'release_status' => 'pending',
                    ];
                    if ($i <= $package) {
                        $result = $this->Calculation_model->insertCommissionDetails($comm, 'global_bonus', 'global_bonus');
                    } else {
                        $result = $this->Calculation_model->insertCommissionDetails($comm, 'global_bonus', 'global_bonus_pending');
                        $transaction_fee = $comm['total_amount'] * 10 / 100;
                        $bonus = $comm['total_amount'] - $transaction_fee;
                        $this->Base_model->addUserSpeicficWalletAmount($user_id, $bonus, 'global_bonus_pending');
                    }
                    $this->UpdateLevel($details['id'], $users['user_id']);
                    // $result = $this->Calculation_model->insertCommissionDetails($comm, 'global_bonus', 'global_bonus');
                    // $this->UpdateLevel($details['id'], $users['user_id']);
                }
            }
        }
    } else {
        $details = $this->CheckLevelCompleted($user_id, $package);
        foreach ($uplines as $level => $users) {
            $data_dot = $this->CheckLevelCompleted($users['user_id'], $package);
            if($users['user_id'] > $user_id){
                $check=$this->CheckALreadyHave($users['user_id'],$package, $user_id);
                if($check==0 || $check==''){
                    $comm = [
                        'user_id' => $users['user_id'],
                        'total_amount' => $global_bonus,
                        'date_of_submission' => date('Y-m-d H:i:s'),
                        'from_id' => $user_id,
                        'fund_transfer_type' => 'credit',
                        'payout_ref_id' => $package,
                        'status' => ($users['package_id'] >= $package) ? 'Released' : 'Pending',
                        'release_status' => 'pending',
                    ];
                    if ($users['package_id'] >= $package) {
                        $result = $this->Calculation_model->insertCommissionDetails($comm, 'global_bonus', 'global_bonus');
                    } else {
                        $result = $this->Calculation_model->insertCommissionDetails($comm, 'global_bonus', 'global_bonus_pending');
                        $transaction_fee = $comm['total_amount'] * 10 / 100;
                        $bonus = $comm['total_amount'] - $transaction_fee;
                        $this->Base_model->addUserSpeicficWalletAmount($users['user_id'], $bonus, 'global_bonus_pending');
                    }
                    $this->UpdateLevel($details['id'], $user_id);
                }
            }
        }
        $signupUplines = $this->Base_model->getMonolinesUsers($user_id, 'upgrade', $admin_id);
        foreach ($signupUplines as $level => $users) {
            $details = $this->CheckLevelCompleted($users['user_id'], $package);
            if ($details && $details['level'] < 20) {
                $check=$this->CheckALreadyHave($user_id,$package, $users['user_id']);
                if($check==0 || $check==''){
                    // if($users['user_id'] > $user_id){
                   if ($users['package_id'] >= $package) {
                    $comm = [
                        'user_id' => $user_id,
                        'total_amount' => $details['amount'],
                        'date_of_submission' => date('Y-m-d H:i:s'),
                        'from_id' =>$users['user_id'],
                        'fund_transfer_type' => 'credit',
                        'payout_ref_id' => $package,
                        'status' => 'Released',
                        'release_status' => 'pending',
                    ];
                    $result = $this->Calculation_model->insertCommissionDetails($comm, 'global_bonus', 'global_bonus');
                    $this->UpdateLevel($details['id'], $users['user_id']);
                }
            }

        }
    }
}
$this->CheckPendingGlobalCommunityBonus($global_bonus, $package, $user_id);
return $result;
}
public function CheckALreadyHave($user_id,$package,$from_id) {
    $update=0;
    $this->db->select('COUNT(id) as count');
    $this->db->from('global_bonus');
    $this->db->where('user_id', $user_id);
    $this->db->where('from_id', $from_id);
    $this->db->where('payout_ref_id', $package);
    $res = $this->db->get();
    foreach ($res->result_array() as $row) {
        $update=$row['count'];
    }
    return $update;
}

public function CheckPendingGlobalCommunityBonus($global_bonus,$package,$user_id) {
    $this->db->select('id,total_amount,amount_payable,from_id,service_charge,user_id');
    $this->db->from('global_bonus');
    $this->db->where('payout_ref_id', $package);
    $this->db->where('user_id', $user_id);
    $this->db->where('status', 'Pending');
    $res = $this->db->get();
    foreach ($res->result_array() as $row) {
       // $this->addUserSpeicficWalletAmount($user_id,$row['amount_payable'],'wallet');
       // $this->addUserSpeicficWalletAmount($user_id,$row['amount_payable'],'global_bonus');
       // $this->Base_model->addUserSpeicficWalletAmount($row['from_id'],$row['service_charge'],'transaction_fee');
       // $this->Base_model->addUserSpeicficWalletAmount($row['from_id'],$row['service_charge'],'transaction_fee_total');
     $this->UpdatePendingUserWalletAmount($user_id,$row['amount_payable'],$row['from_id'],$row['service_charge']);
     $update=$this->UpdateStatus($row['id'],$user_id,'Released');
 }
 return True;
}
public function UpdatePendingUserWalletAmount($user_id, $amount,$from_id='',$service_charge='') {
  $this->db->set('global_bonus', 'global_bonus + ' .$amount, FALSE);
  $this->db->set('wallet', 'wallet + ' .$amount, FALSE);
  $this->db->set('global_bonus_pending', 'global_bonus_pending - ' .$amount, FALSE);
  $this->db->where('user_id', $user_id);
  $this->db->update('user_wallet');

  $this->db->set('transaction_fee', 'transaction_fee + ' .$service_charge, FALSE);
  $this->db->set('transaction_fee_total', 'transaction_fee_total + ' .$service_charge, FALSE);
  $this->db->where('user_id', $from_id);
  $this->db->update('user_wallet');
  return True;
}
public function CheckLevelCompleted($user_id,$package) {
    $update=[];
    $this->db->select('mi.id,mi.level,mi.amount,ui.package_id');
    $this->db->from('missed_amount as mi');
    $this->db->join('user_info as ui','ui.user_id=mi.user_id');
    $this->db->where('mi.user_id', $user_id);
    $this->db->where('mi.package', $package);
    $this->db->where('mi.level <', 20);
    $res = $this->db->get();
    foreach ($res->result_array() as $row) {
        $update=$row;
    }
    return $update;
}
public function UpdateStatus($id,$user_id,$status){
    $this->db->set('status', $status);
    $this->db->where('user_id', $user_id);
    $this->db->where('id', $id);
    $result =  $this->db->update('global_bonus');
    return $result;
}
public function UpdateLevel($id,$user_id){
   $this->db->set('level', 'level + ' . 1, FALSE);
   $this->db->where('user_id', $user_id);
   $this->db->where('id', $id);
   $result =  $this->db->update('missed_amount');
   return $result;
}
public function getUplineUsersUnilevel($user_id, $level = 15, $child=false) {
    $i = 0;
    $admin_id = 16;
    $uplines = array();
    if($child) {
        $info = [
            'user_id' => $user_id,
            'status' => 1,
        ];
        $uplines[$i] = $info;
        $i++;
    }       
    if($user_id != $admin_id){
        while ($user_id != 0 && $user_id != "" && $i < $level) {

            $user_arr = [];
            $this->db->select('sponsor_id as user_id, status')
            ->from('user_info')
            ->where('user_id', $user_id)
            ->limit(1);
            $query = $this->db->get();
            $user_id = 0;
            foreach ($query->result_array() as $row) {
                if($row['user_id']){
                    $user_arr = $row; 
                    $uplines[$i] = $row; 
                    $user_id = $row['user_id'];
                }
            }
            $i++;
        }
    }
    return $uplines;
}

public function getLevelPercentage($level) {

    $this->db->select('level_commission');
    $this->db->from('level_commission');
    $this->db->where('id', $level);
    $res = $this->db->get();

    if($res->row()) {
        return $res->row()->level_commission;
    }

    return 0;
}
public function getBscWalletAddress($user_id)
{
    $details=[];
    $this->db->select('*');
    $this->db->from('bep_crypto_wallet_details');
    $this->db->where('user_id', $user_id);
    $this->db->limit(1);
    $query = $this->db->get();
    foreach ($query->result_array() as $row) {  
        $row['address'] = $this->encrypt_decrypt('decrypt',$row['address']);
        $row['private_key'] = $this->encrypt_decrypt('decrypt',$row['private_key']);
        $details = $row;
    }
    return $details;
}
public function insertUSDTPaymentHistory($user_id, $amount, $type,$transaction_id)
{ 
    $date = date('Y-m-d H:i:s');
    $result = false; 
    $this->db->set('user_id', $user_id);
    $this->db->set('amount', $amount);
    $this->db->set('type', $type);
    $this->db->set('transaction_id ', $transaction_id);
    $this->db->set('date ', $date);
    $result = $this->db->insert('wbtc_balance_sheet');

    return $result;
}
public function InsertHistorys($response,$user_id,$amount,$type)
{ 
    if(element('txId',$response)){
        $this->begin();
        $result1 = $this->updateUSDTTransactionAdminDetails($user_id, $response, 'finished','pending',$type);
        $result2 = $this->insertUSDTPaymentHistory($user_id, $amount,$type,$response['txId']);
        if (!$result1 || !$result2) {
            {
                $this->rollback();
                return FALSE;
            }
            $this->commit();
            return True;
        }
    }
}
public function updateUSDTTransactionAdminDetails($user_id, $trXdetails, $transfer_status='',$where='pending',$type,$insert_id='',$bonus_type='')
{ 
    $date = date('Y-m-d H:i:s');
    $result = false; 
    $this->db->set('transfer_status', $transfer_status);
    $this->db->set('type_amt', $type);
    $this->db->set('transactions_data', json_encode($trXdetails));
    if($transfer_status == 'transfered')
        $this->db->set('to_admin_trx_id', $trXdetails['txId']);
    else
        $this->db->set('to_main_trx_id', $trXdetails['txId']);
    $this->db->set('updated_date ', $date);
    $this->db->set('user_id', $user_id);
    if($insert_id){
        $this->db->set('insert_id', $insert_id);
    } if($bonus_type){
        $this->db->set('bonus_type', $bonus_type);
    }
    // $this->db->where('transfer_status', $where);
    $result = $this->db->insert('crypto_history');
    return $result;
}
}