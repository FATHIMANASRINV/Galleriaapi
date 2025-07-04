<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_model extends Base_model {  
    public $WIDTH_CEILING = 0; 
    function __construct() {
        parent::__construct();
    } 
    public function registrationProcess($register,$type='') {
        $this->load->model(['Calculation_model', 'Network_model']);
        $select_arr = 'user_name_min_len,width_ceiling,matrix_bonus,referral_amount,referal_status';
        $config = $this->Base_model->getConfig($select_arr);
        if($type!='web'){
            $register['username'] = 'BC'.$this->getRandomString($config['user_name_min_len'],'user_info','user_name') ;
        }
        $return_data = array(
            'username'   => $register['username'],
            'status' => false
        );
        $update_total_income=$this->Signup_model->updateTotalIncome($register['package'],$register['package_amount']);
        $placement_details = array();
        $this->WIDTH_CEILING = $config['width_ceiling'];
        $placement_details = $this->getPlacementUnilevel($register['sponsor_id']);
        if ($placement_details) {
            $register = array_merge($register, $placement_details);
        } else {
            $url = 'signup/';
            $url .= element('sponsor_name', $register) ? ( 
                element('placement_name', $register) ? $register['sponsor_name'].'/'.$register['placement_name'] : $register['sponsor_name']
            ) : null;
            $response['msg'] ='Placement Details Not Found';
            $response['success'] = False;
            $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
            exit(); 
        } 
        // $register['password'] = random_int(100000,999999);
        if($type!='web'){
            $register['password'] = $register['wallet_address'];
        }else{
            $register['password'] = '123456';
        }
        $register['secure_pin'] = random_int(10000000, 99999999);
        $update_referral_count=$this->updateRefCount($register['sponsor_id']);
        $register['user_level'] = $this->getTreeLevel($register['placement_id']) + 1;
        $register['sponsor_level'] = $register['sponsor_info']['sponsor_level'] + 1;
        $new_user_id = $this->insertUserInfo($register);
        $register['user_id'] = $new_user_id;
        if ( $new_user_id ) {
            $this->insertUserWallet($new_user_id);
            $this->load->model('Member_model');
            $this->Member_model->insertUpgradeHistory( $register['user_id'], 0, $register['package'], 'Signup', $register['package_amount'], $register['joining_date']);
            $referral_count= $register['sponsor_info']['referral_count']+1;
            $global_bonus=($register['package_amount']*40/100)/20;
            $insert_monoline=$this->InsertMonolineStructure($register,$global_bonus);
            $this->Calculation_model->InsertGlobalCommunityBonus($global_bonus,$register['package'],$register['user_id'],'signup');
            $this->Calculation_model->insertLevelBonus( $register['sponsor_id'], $register['package_amount'], $register['user_id'], $register['joining_date'],$register['package']);
            $return_data['transaction_password'] =  $register['secure_pin'];
            // if(SEND_EMAIL){
            //     $this->load->model('Mail_model'); 
            //     $send_mail = $this->Mail_model->sendEmails('registration', $register);
            // }
            $this->Base_model->insertIntoActivityHistory($new_user_id, log_user_id(),'user_registered',serialize($register));
            $return_data['username'] = $register['username'];
            $return_data['password'] = $register['password'];
            $this->session->set_userdata('signup_password', $register['password']);
            $return_data['user_id'] = $new_user_id;
            $return_data['status'] = true;
            $this->db->cache_delete('admin', 'dashboard');
            $this->db->cache_delete('user', 'dashboard');
            $this->db->cache_delete('admin', 'report');
            $this->db->cache_delete('user', 'report');
            $this->db->cache_delete('admin', 'autocomplete');
            $this->db->cache_delete('admin', 'network');
            $this->db->cache_delete('user', 'network');
            $this->db->cache_delete('admin', 'business');
            $this->db->cache_delete('user', 'business');
            $this->db->cache_delete('admin', 'member');
            $this->db->cache_delete('user', 'member');
        }
        return $return_data;

    }

    function generateQRcode($web_link,$name) {

        //start- Generate Replication QR code
        $this->load->library('ciqrcode');
        $name =$name.'.png';
        $params['data'] = $web_link;
        $params['level'] = 'H';
        $params['size'] = 5;
        $params['savename'] = './assets/images/qrcode/'.$name;
        
        // $this->ciqrcode->generate($params);
        //end- Generate Replication QR code
        if($this->ciqrcode->generate($params)){
            return $name;

            
        }
    }

    public function insertUserInfo($register) {
        $this->config->load('bcrypt');
        $this->load->library('bcrypt');
        $hashed_password = $this->bcrypt->hash_password( $register['password'] );        
        $left_sponsor = $register['sponsor_info']['right_sponsor']; 
        $right_sponsor = $left_sponsor + 1;

        $father_left_right = $this->Network_model->getUserLeftAndRight($register['placement_id'], 'father');
        $left_father = $father_left_right['right_father']; 
        $right_father = $left_father + 1;

        $this->updateTreeLeftRightNode($left_sponsor, $left_father);

        $data = array(
            'user_name' => $register['username'],
            'password' => $hashed_password,
            'transaction_id' => $register['transaction_id'],
            // 'first_name' => $register['firstname'],
            // 'second_name' => $register['lastname'],
            // 'position' => $register['position'],
            // 'father_id' => $register['placement_id'],
            'sponsor_id' => $register['sponsor_id'],
            // 'email' => $register['email'],
            // 'mobile' => $register['mobile'],
            'left_father' => $left_father,
            'right_father' => $right_father,
            'left_sponsor' => $left_sponsor,
            'right_sponsor' => $right_sponsor,
            'date_of_joining' => $register['joining_date'],
            'secure_pin' => $register['secure_pin'],
            'user_level' => $register['user_level'],
            'sponsor_level' => $register['sponsor_level'],
            'wallet_address' => $register['wallet_address'],
        );

        if(element('package',$register)) {
            $data['package_id'] = $register['package'];
        }
        $result = $this->db->insert('user_info', $data);
        if ($result) {
            return $this->db->insert_id();
        }
        return $result;
    }public function InsertMonolineStructure($register,$global_bonus='') {
        $data = array(
            'user_id' => $register['user_id'],
        );
        $result = $this->db->insert('monoline_structure', $data);

        $data = array(
            'user_id' => $register['user_id'],
            'amount' => $global_bonus,
            'package' => $register['package'],
        );
        $result = $this->db->insert('missed_amount', $data);
        if ($result) {
            return $this->db->insert_id();
        }
        return $result;
    }
    public function getPlacementUnilevel($sponsor_id) {
        $sponsor_array = NULL;
        $this->db->select("position");
        $this->db->from("user_info");
        $this->db->where('father_id', $sponsor_id);
        // $this->db->where('status', 'server');
        $res = $this->db->get();
        $row_count = $res->num_rows();
        if ($row_count > 0){
            foreach ($res->result() as $row) {
                $position = $row->position;
                $sponsor_array['placement_id'] = $sponsor_id;
                $sponsor_array['position'] = $position;
                return $sponsor_array;
            }
        }else{
         $sponsor_array['placement_id'] = $sponsor_id;
         $sponsor_array['position'] = 1;
         return $sponsor_array;
     }


 }

 public function checkPosition($downlineuser) {

    $p = 0;
    $child_arr = array();
    for ($i = 0; $i < count($downlineuser); $i++) {
        $sponsor_id = $downlineuser["$i"];
        $this->db->select("user_id, position, left_father");
        $this->db->from("user_info");
        $this->db->where('father_id', $sponsor_id);
        $res = $this->db->get();

        $row_count = $res->num_rows();
        if ($row_count > 0) {
            foreach ($res->result_array() as $row) {
                if ($row_count < $this->WIDTH_CEILING) {
                    $sponsor['placement_id'] = $sponsor_id;
                    $sponsor['position'] = $row_count + 1;
                    return $sponsor;
                } else {
                    $child_arr[$p] = $row["user_id"];
                    $p++;
                }
            }
        } else {           
            $sponsor['placement_id'] = $sponsor_id;
            $sponsor['position'] = 1;
            return $sponsor;
        }
    }

    if (count($child_arr) > 0) {
        $position = $this->checkPosition($child_arr);
        return $position;
    }
} 

public function getRightChildren($user_id, $tree_type = 'tree') {
    if($tree_type == 'tree') {
        $this->db->select('right_father as right');

    } elseif($tree_type == 'sponsor_tree') {
        $this->db->select('right_sponsor as right');
    }
    $this->db->where('user_id', $user_id);
    $query = $this->db->get('user_info'); 
    return $query->row_array()['right'];
}

public function updateTreeLeftRightNode($left_sponsor, $left_father) {

        // if($tree_type == 'tree') {

    $this->db->set('right_father', 'right_father + 2', FALSE);
    $this->db->where('right_father >= ', $left_father);
    $this->db->update('user_info');

    $this->db->set('left_father', 'left_father + 2', FALSE);
    $this->db->where('left_father > ', $left_father);
    $this->db->update('user_info');

        // } elseif($tree_type == 'sponsor_tree') {
    $this->db->set('right_sponsor', 'right_sponsor + 2', FALSE);
    $this->db->where('right_sponsor >= ', $left_sponsor);
    $this->db->update('user_info');

    $this->db->set('left_sponsor', 'left_sponsor + 2', FALSE);
    $this->db->where('left_sponsor > ', $left_sponsor);
    $this->db->update('user_info');
        // }
}

public function isUserAvailable($user_name) {
    $this->db->select("COUNT(user_id) as count");
    $this->db->from("user_info");
    $this->db->where('user_name', $user_name);
    $this->db->where('status','active');
    $query = $this->db->get();
    foreach ($query->result()AS $row) {
        return $count = $row->count;
    }
    return 0;
}

public function isUserLevelFull($father_id, $width_ceiling) {

    $this->db->select("COUNT(*) AS cnt");
    $this->db->from("user_info");
    $this->db->where('father_id', $father_id);
    $qr = $this->db->get();

    foreach ($qr->result() as $row) {
        $cnt = $row->cnt;
    }
    $current_users = $cnt;
    if ($current_users >= $width_ceiling) {
        $flag = true;
    } else {
        $flag = false;
    }

    return $flag;
}

public function insertUserWallet($user_id) {
    $this->db->set('user_id', $user_id);
    $this->db->set('wallet', '0');
    $result = $this->db->insert('user_wallet');
    return $result;
}

public function getEmailContents($id = '',$type=''){

    $mail_contents = array();
    $this->db->select('*')
    ->from('mail_contents')
    ->order_by('status');

    if($id){
        $this->db->where('id' , $id);
    }
    if($type){
        $this->db->where('type' , $type);
    }
    $query  = $this->db->get();
    foreach($query->result_array() as $row){

        $row['id'] = $row['id'];
        $row['enc_id'] = $this->encrypt_decrypt( 'encrypt' ,$row['id']);
        if($id || $type){ 
            return $row;
        }else{
            $mail_contents[] = $row;
        }
    }
    return $mail_contents;

}

public function updateRefCount($sponsor_id){
    $this->db->set('referral_count','referral_count +1 ' , FALSE);
    $this->db->where('user_id',$sponsor_id);
    $result =  $this->db->update('user_info');
    return $result;
}

public function updateUserRank($id, $rank) {
    $this->db->set('rank_id', $rank);
    $this->db->where('user_id', $id);
    $result = $this->db->update('user_info');
    return $result;
}

public function insertIntoRankHistory($old_rank, $new_rank, $user_id, $date) {
    $this->db->set('user_id', $user_id);
    $this->db->set('current_rank', $old_rank);
    $this->db->set('new_rank', $new_rank);
    $this->db->set('date', $date);
    $res = $this->db->insert('rank_history');
    return $res;
}

public function insertCryptoRequest($register,$type = 'signup')
{
    $date = date('Y-m-d H:i:s');
    $register_arr = serialize($register);
    $this->db->set('post_array',$register_arr)
    ->set('type',$type)
    ->set('date',$date);
    if(element('order_id',$register))
    {
        $this->db->set('order_id',$register['order_id']); 
    }
    $res = $this->db->insert('crypto_request_history');
    return $this->db->insert_id();

}

public function updateBitcoinRequestStatus($req_id,$invoice_id='', $status='',$user_id='')
{

    if($invoice_id){
        $this->db->set( 'invoice_id', $invoice_id );
    }
    if($status){
        $this->db->set( 'status', $status );
    }
    if($user_id){
        $this->db->set( 'user_id', $user_id );
    }
    $this->db->where( 'id', $req_id );
    $res = $this->db->update('crypto_request_history');
    return $res;
}


public function getRequestDetails($id) {

    $details = array();
    $this->db->select('*')
    ->from("crypto_request_history")
    ->where("id", $id);
    $query = $this->db->get();
    foreach ($query->result_array() as $row) {
        $details = $row;
    }
    return $details;
}  

public function CheckUserId($id)
{   
    $user_id = 0; 
    $this->db->select('user_id')
    ->from('crypto_request_history')
    ->where('id',$id);
    $query = $this->db->get();
    foreach ($query->result() as $row) {
        $user_id = $row->user_id;
    }
    return $user_id;
}

public function getCashFreeDetails($order_id)
{
    $details=[];
    $res=$this->db->select('*')
    ->where('order_id',$order_id)
    ->get('crypto_request_history');
    foreach($res->result_array() as $row){
        $details=$row;
    }
    return $details;
}

public function updateCashFreeRequestStatus($req_id,$status='',$user_id='')
{
    if($status)
    {
        $this->db->set( 'status', $status );
    }
    if($user_id)
    {
        $this->db->set( 'user_id', $user_id );
    }
    $res =$this->db->where( 'id', $req_id )
    ->update('crypto_request_history');
    return $res;
}

public function getInvoiceId()
{
    $count = $this->db->from('crypto_request_history')
    ->where('invoice_id',$charge_id)
    ->count_all_results();
    return $count;
}

public function getRequestDetailsOrder($id) {

    $details = array();
    $query =$this->db->select('*')
    ->from("crypto_request_history")
    ->where("order_id", $id)
    ->get();
    foreach ($query->result_array() as $row) {
        $row['enc_id'] = $this->encrypt_decrypt( 'encrypt' ,$row['id']);
        $details = $row;
    }
    return $details;
}  

public function getSponsorDetails($user_name) 
{
    $user_details = array(); 

    $query = $this->db->select('user_name, user_id, referral_count, rank_id, right_sponsor, left_sponsor, right_father, left_father,sponsor_level')
    ->select('CONCAT(first_name, " ", second_name) AS full_name')
    ->from("user_info")
    ->where("user_name", $user_name)
    ->limit("1")
    ->get();

    foreach ($query->result_array() as $row) 
    {
        return $row;
    }
    return $user_details;
} 

public function updateTotalIncome($package_id, $package_amount) {
    $query =$this->db->set('total_income', 'total_income + ' . $package_amount, FALSE)
    ->where('package_id', $package_id)
    ->limit(1)
    ->update('package_details');
    return $this->db->affected_rows();
}

}
