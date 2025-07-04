<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends Base_model {

    function __construct() {
        parent::__construct();
    }


    function getToolsDetails($id="",$type="") 
    {

        $details = array();
        if($id)
            $this->db->where('id',$id);
        if($type)
            $this->db->where('type',$type);

        $query = $this->db
        ->where('DATE_FORMAT(start_date,"%Y-%m") >=',date('Y-m'))
        ->or_where('DATE_FORMAT(end_date,"%Y-%m") <=',date('Y-m'))
        ->get('tools'); 
        
        $event_class = ['primary', 'success','warning', 'danger'];

        foreach($query->result_array() as $row){

            $row['user_type'] = log_user_type();
            $row['enc_id'] = $this->Base_model->encrypt_decrypt('encrypt',$row['id']);

            $row['start'] =date('Y-m-d', strtotime($row['start_date']));
            $row['startTime'] =date('d M, Y', strtotime($row['start_date'])); 
            $row['end'] =date('Y-m-d', strtotime($row['end_date']));         
            $row['endTime'] =date('d M, Y', strtotime($row['end_date']));

            $row['classNames'] = $event_class[array_rand($event_class)];
            $row['extendedProps']['description'] = $row['content']; 
            $row['extendedProps']['location'] = $row['address'];
            $row['extendedProps']['organizer'] = 'Matrix Demo';

            $details[] = $row;

        } 
        return $details;
    }

    public function getUserWalletDetails($user_id = '')
    {
        $details = [];
        if ($user_id) {
            $details = $this->db
            ->where('user_id', $user_id)
            ->get('user_wallet')
            ->row_array();
            return $details;
        }
        $this->db->select('uw.*, ui.user_name');
        $this->db->from('user_wallet uw');
        $this->db->join('user_info ui', 'ui.user_id = uw.user_id', 'left');
        $query = $this->db->get();
        $total_wallet = $referral_total = $level_total = $global_bonus = $global_bonus_pending = $missed_level_income = 0;

        $details = [];
        foreach ($query->result_array() as $row) {
            $total_wallet += $row['wallet'];
            $referral_total += $row['referral_bonus'];
            $level_total += $row['level_bonus'];
            $global_bonus += $row['global_bonus'];
            $global_bonus_pending += $row['global_bonus_pending'];
            $missed_level_income += $row['missed_level_income'];
            $details[] = $row;
        }
        $details['total_wallet'] = $total_wallet;
        $details['referral_total'] = $referral_total;
        $details['level_total'] = $level_total;
        $details['global_bonus'] = $global_bonus;
        $details['global_bonus_pending'] = $global_bonus_pending;
        $details['missed_level_income'] = $missed_level_income;
        $details['wallet_withdrawal'] = 0;
        return $details;
    }
    public function getMonthly_joiners($month,$start_day="",$end_day="",$year)
    {
        $joiners=array();
        $this->db->select('user_id')
        ->where('status','active')
        ->where('user_type','user')
        ->where('YEAR(date_of_joining)',$year);
        $this->db->where('MONTH(date_of_joining)',$month);
        if ($start_day) {
            $this->db->where('DAY(date_of_joining) >=',$start_day);
        }
        if ($start_day) {
            $this->db->where('DAY(date_of_joining) <',$end_day);
        }

        $this->db->from('user_info');
        $query = $this->db->get();
        foreach($query->result_array() as $row){
            $joiners[]=$row;
        }
        return $joiners;

    }


    public function getUserReferrals($user_id,$month,$start_day='',$end_day='',$year)
    {
        $referrals=array();

        $this->db->select('user_id')
        ->where('status','active')
        ->where('sponsor_id',$user_id)
        ->where('YEAR(date_of_joining)',$year)
        ->where('MONTH(date_of_joining)',$month);
        if ($start_day) {
            $this->db->where('DAY(date_of_joining) >=',$start_day);
        }
        if ($end_day) {
            $this->db->where('DAY(date_of_joining) <',$end_day);
        }
        
        $this->db->from('user_info');
        $query = $this->db->get();

        foreach($query->result_array() as $row){
            $referrals[]=$row;
        }
        return $referrals;
    }

    public function getRecentJoiners()
    {
        $details= array();
        $this->db->select('ui.*')
        ->select('CONCAT(ui.first_name, " ", ui.second_name) AS full_name')
        ->from('user_info as ui')
        ->where('ui.status','active')
        ->select('cu.phone_code')
        ->join('countries as cu','cu.country_id=ui.country')
        ->order_by('ui.date_of_joining','DESC');
        $this->db->limit(4);

        $query = $this->db->get(); 
        foreach($query->result_array() as $row){
            $row['mobile']='+'.$row['phone_code'].$row['mobile'];
            $row['date_of_joining']=date('d-M-y',strtotime($row['date_of_joining']));
            $details[] = $row;
        } 
        return $details;
    }

    public function getRecentReferrals($user_id)
    {
        $details= array();
        $this->db->select('ui.user_name, ui.mobile, ui.email, ui.date_of_joining,ui.country,ui.user_photo')
        ->select('CONCAT(ui.first_name, " ", ui.second_name) full_name')
        ->from('user_info ui')
        ->where('ui.status','active')
        ->where('ui.sponsor_id',$user_id)
        ->order_by('ui.user_id','DESC')
        ->select('cu.phone_code')
        ->join('countries as cu','cu.country_id=ui.country')
        ->limit(10);

        $query = $this->db->get(); 

        foreach($query->result_array() as $row){
            $row['mobile']='+'.$row['phone_code'].$row['mobile'];
            $details[] = $row;
        } 
        return $details;
    }


    public function echartValues($m_days,$table)
    {
        $values=array();
        $this->db->select('total_amount');
        $this->db->from($table);


        $date = date('Y-m-d',strtotime('-'.$m_days.' days'));





        /*$this->db->like("DATE_FORMAT('date_of_submission','Y-m-d H-i-s')",$date);*/


        $this->db->like('date_of_submission',$date);

        // if($type == 'referral')
        // {
        //     $this->db->where('amount_type_id',1);

        // }
        // elseif($type=='level')
        // {
        //     $this->db->where('amount_type_id',5);
        // }
        // elseif($type=='rank')
        // {
        //     $this->db->where('amount_type_id',3);     
        // } elseif($type=='matrix')
        // {
        //     $this->db->where('amount_type_id',12);     
        // }




        $query = $this->db->get();

        /*       print_r($this->db->last_query());die();*/

        $sum = 0;
        foreach($query->result_array() as $row){

            $sum = $sum + $row['total_amount'];

            /*$values[]=$row;*/

        }
        /* print_r($sum);die();*/
        /* return sum($values);*/
        return $sum;

    }
    public function getTotalAmount($user_id="",$edate="",$status="") {
        // print_r($enddate);die();
        $sum = 0;
        $this->db->select('SUM(total_amount) as total_amount','order_date');
        $this->db->from('order_details');
        if($user_id) {
            $this->db->where('user_id', $user_id);  
        }
        if($status!="all") {
            $this->db->where('order_status', $status);  
        }
        if($edate) {
            $where1  = "(order_date >='$edate')";
            $this->db->where($where1);
        }
        $res = $this->db->get();
        // echo $this->db->last_query($res);die();
        if($res->row()) {
            $sum = $res->row()->total_amount;
        }

        return $sum;
    }
    public function getTotalPoint($user_id="",$status="") {

        $sum = 0;
        $this->db->select('SUM(total_point) as total_point');
        $this->db->from('order_details');
        if($user_id) {
            $this->db->where('user_id', $user_id);  
        }
        if($status!="all") {
            $this->db->where('order_status', $status);  
        }
        $res = $this->db->get();

        if($res->row()) {
            $sum = $res->row()->total_point;
        }

        return $sum;
    }
    public function getTotalInvestAmount($user_id='')
    {
        $total_amt = 0;
        $this->db->select_sum('wallet');
        $this->db->from('user_wallet');
        if ($user_id) {
            $this->db->where('user_id',$user_id);
        }

        $query = $this->db->get();
        foreach($query->result() as $row){
            $total_amt = $row->wallet;
        }
        if($total_amt == NULL){
            return 0;
        }
        return (abs($total_amt));

    }
    public function getUserPayoutAmount($user_id = '',$status){
        $total_amt = 0;
        $this->db->select_sum('amount');
        $this->db->from('payout_requests');
        $this->db->where('status',$status);
        if($user_id){
            $this->db->where('user_id' , $user_id);
        }

        $query = $this->db->get();
        foreach($query->result() as $row){
            $total_amt = $row->amount;
        }
        if($total_amt == NULL){
            return 0;
        }
        return $total_amt;
    }
    public function getCurrentRank($user_id = ''){
        $new_rank = 0;
        $this->db->select('rh.new_rank');
        $this->db->from('rank_history as rh');
        $this->db->order_by('rh.date','DESC');
        $this->db->select('rm.name');
        $this->db->join('rank_details as rm','rh.new_rank=rm.rank_id');
        $this->db->limit('1');
        if($user_id){
            $this->db->where('user_id' , $user_id);
        }

        $query = $this->db->get();
        foreach($query->result() as $row){
            $new_rank = $row->name;
        }
        if($new_rank == NULL){
            return 'None';
        }
        return $new_rank;
    }

    public function getRankUsersCount() {
        $details = [];
        $this->db->select('rd.name');
        $this->db->select('COUNT(ui.user_id) as count');
        $this->db->from('rank_details as rd');
        $this->db->order_by('rd.rank_id','ASC');
        $this->db->join('user_info as ui','rd.rank_id=ui.rank_id','LEFT');
        $this->db->group_by('rd.rank_id');

        $query = $this->db->get();
        foreach($query->result_array() as $row){
            $details[] = $row;
        }
        return $details;
    }

    public function getRecentCommissions($user_id)
    {
        $details= array();
        $this->db->select('ui.user_name, ui.mobile, ui.email, ui.date_of_joining,ui.country')
        ->select('CONCAT(ui.first_name, " ", ui.second_name) full_name')
        ->from('user_info ui')
        ->where('ui.status','active')
        ->where('ui.sponsor_id',$user_id)
        ->order_by('ui.user_id','DESC')
        ->select('cu.phone_code')
        ->join('countries as cu','cu.country_id=ui.country')
        ->limit(10);

        $query = $this->db->get(); 

        foreach($query->result_array() as $row){
            $row['mobile']='+'.$row['phone_code'].$row['mobile'];
            $details[] = $row;
        } 
        return $details;
    }
    public function getCountRecruiters()
    {
        $admin_id=$this->Base_model->getAdminId();
        $details = [];
        $this->db->select('count(sponsor_id) as cnt,sponsor_id');
        $this->db->from('user_info');
        $this->db->where('sponsor_id!=',0);
        $this->db->where('sponsor_id!=',$admin_id);
        $this->db->group_by('sponsor_id');
        $this->db->order_by('cnt','DESC');
        $this->db->limit(4);
        $query = $this->db->get();
        foreach($query->result_array() as $row){
            $row['sponsor_name'] = $this->Base_model->getUserName($row['sponsor_id']);
            $row['sponsor_fullname'] = $this->Base_model->getFullName($row['sponsor_id']);
            $row['user_photo'] = $this->Base_model->getUserInfoField('user_photo',$row['sponsor_id']);
            $details[]=$row;
        }
        return $details;
    }
    public function getTotalSales($user_id = '',$type='',$count=''){
        $new_rank = 0;
        $this->db->select_sum('total_amount');
        $this->db->from('order_details');
        if($type){
            $this->db->where('status',$type);

        }
        if($user_id){
            $this->db->where('customer_id',$user_id);
            // $this->db->where('status!=',$type);

        }
        if($count){
            return $this->db->count_all_results();  
        }

        $query = $this->db->get();
        foreach($query->result() as $row){
            $new_rank = $row->total_amount;
        }
        if($new_rank == NULL){
            return 0;
        }
        return $new_rank;
    }
    public function getTotalProducts(){
        $new_rank = 0;
        $this->db->select('count(id) as count');
        $this->db->from('product_details');
        $this->db->where('status','active');
        $query = $this->db->get();
        foreach($query->result() as $row){
            $new_rank = $row->count;
        }
        if($new_rank == NULL){
            return 0;
        }
        return $new_rank;
    }public function getTotalCategory(){
        $new_rank = 0;
        $this->db->select('count(id) as count');
        $this->db->from('category');
        $this->db->where('status','active');
        $query = $this->db->get();
        foreach($query->result() as $row){
            $new_rank = $row->count;
        }
        if($new_rank == NULL){
            return 0;
        }
        return $new_rank;
    }
    public function getrefferalAmountTotal($user_id = ''){
        $total_amt = 0;
        $this->db->select_sum('total_amount');
        $this->db->from('level_bonus');
        $this->db->where('transaction_note','Level1');
        if($user_id){
            $this->db->where('user_id' , $user_id);
        }

        $query = $this->db->get();
        foreach($query->result() as $row){
            $total_amt = $row->total_amount;
        }
        if($total_amt == NULL){
            return 0;
        }
        return $total_amt;
    }
}


