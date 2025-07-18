<?php  
class Base_Model extends CI_Model 
{

    function __construct()
    {   
        parent::__construct();
    }

    public function begin() {
        $this->db->trans_start();
    }

    public function commit() {
        $this->db->trans_commit();
    }

    public function rollback() {
        $this->db->trans_rollback();
    }

    public function redirect($message, $page_to_reload, $message_type = false) {
        $details = array();
        $redirect_message["flashdata"] = $message;
        $redirect_message["type"] = $message_type;
        $redirect_message["box"] = true;
        $this->session->set_flashdata('redirect_message', $redirect_message);
        redirect($page_to_reload, 'refresh');
    }


    public function getUserDetails($user_id, $select_arr ='*') 
    {
        $user_details = array(); 
        $this->db->select($select_arr)
        ->select('CONCAT(first_name, " ", second_name) AS full_name')
        ->from("user_info")
        ->where("user_id", $user_id);
        $query = $this->db->get();
        $this->load->model('Zone_model');
        foreach ($query->result_array() as $row) 
        { 
            if( element('sponsor_id', $row )){
              $row['sponsor_name']=$this->Base_model->getUserName($row['sponsor_id']);
          }
          if( element( 'user_photo', $row )){
            $img_path = $this->config->item('assets_folder').'/images/profile/'. $row['user_photo'] ;
            if (!file_exists( $img_path)) {
                $row['user_photo'] = 'nophoto.png';
            } 
        }
        if(element( 'package_id',$row)){
            $row['rank'] = $this->Base_model->getPackageNamebyId($row['package_id']);
        }
        return $row;
    }
    return $user_details;
} 

public function getConfig($select='*') 
{
    $details = array(); 

    $query = $this->db->select('key,value')
    ->where_in("key", explode(',', $select))
    ->get("settings");
        // echo $this->db->last_query();
        // print_r($query->result_array());
    foreach ($query->result_array() as $row) 
    {  
        $details[$row['key']] = $row['value'];
    }
    return $details;
} 


public function getUserId($username) {
    $user_id = 0;
    $this->db->select('user_id')
    ->from('user_info')
    ->where('user_name', $username)
    ->limit(1);
    $query = $this->db->get();
    foreach ($query->result() as $row) {
        $user_id = $row->user_id;
    }
    return $user_id;
} 

public function getUserName($user_id) {
    $user_name = NULL;
    $this->db->select('user_name')
    ->from('user_info')
    ->where('user_id', $user_id)
    ->limit(1);
    $query = $this->db->get();
    foreach ($query->result() as $row) {
        $user_name = $row->user_name;
    }
    return $user_name;
}
public function getSponsorName($user_id) {
    $sponsor_name = NULL;
    $this->db->select('sponsor_id')
    ->from('user_info')
    ->where('user_id', $user_id)
    ->limit(1);
    $query = $this->db->get();
    foreach ($query->result_array() as $row) {
        $sponsor_name = $this->getUserName($row['sponsor_id']);
    }
    return $sponsor_name;
}

public function insertIntoActivityHistory($user_id, $done_by, $purpose='NA', $data = array())
{
    $date = date('Y-m-d H:i:s');
    $this->db->set('user_id',$user_id)
    ->set('ip',$this->input->server('REMOTE_ADDR'))
    ->set('done_by',$done_by)
    ->set('date',$date);
    if($data)
        $this->db->set('data',$data);
    $this->db->set('activity',$purpose);
    $result = $this->db->insert('activity_history');
    return $result;
}  

public function getFullUserSelect2($post_arr, $limit = 20)
{
    $result = array();

    $this->db->select("first_name as text, user_id as id");
    if($post_arr)
    {

        if(element('term',$post_arr))
            $this->db->where("first_name LIKE '{$post_arr['term']}%'");
    }

    $this->db->from("user_info");
    $this->db->limit($limit);
    $this->db->order_by("id", 'ASC');
    $query = $this->db->get();
    foreach ($query->result_array() as $row) {
            // $row['user_id'] = $this->Base_model->getUserName($row['user_id']);
        $result[] = $row;
    }
    return $result;
} 


public function getRandomString($length,$check_table,$field_name) {

    $key = NULL;
    $charset = "0123456789";
    for ($i = 0; $i < $length; $i++)
        $key .= $charset[(mt_rand(0, (strlen($charset) - 1)))];
    $randum_id = $key;
    if($field_name == 'user_name' && $check_table == 'user_info'){
        $user_name_prefix = value_by_key('user_name_prefix');
        $user_name_postfix = value_by_key('user_name_postfix');
        $randum_id = $user_name_prefix . $randum_id . $user_name_postfix;

    }

    $this->db->select('*')
    ->from("$check_table")
    ->where("$field_name", $randum_id);
    $query = $this->db->get();

    $count = $query->num_rows();
    if ($count == 0){
        return $key;
    }
    else
        return $this->getRandomString($length,$check_table,$field_name);
}



public function getLanguageDetails($language_id="", $type='site_perm', $status = 1)
{
    $langauge_details = array();
    $this->db->select("*");

    if($status != '-1'){
        $this->db->where($type, $status);
    }

    if($language_id){   
        $this->db->where("language_id", $language_id)
        ->limit(1);
    }
    $query = $this->db->get("language");

    foreach ($query->result_array() as $result) {

        $result['encrypted_id'] = $this->encrypt_decrypt('encrypt', $result['language_id']);
        if($language_id){ 
            return  $result;
        }else{
            $langauge_details[] = $result;
        }
    }
    return $langauge_details;
} 

public function encrypt_decrypt($action, $string) 
{
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = '123';
    $secret_iv = '123';
// hash
    $key = hash('sha256', $secret_key);

    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}  

function getUserInfoArray($select, $user_id){

    $details = [];
    $this->db->select($select)
    ->where('user_id', $user_id)
    ->from('user_info')
    ->limit(1);
    $query = $this->db->get();
    foreach ($query->result_array() as $row) {
        $details = $row;
    }
    return $details;
}

function getUserInfoField($field_name, $user_id) {
    $field_value = NULL;

    if (is_array($field_name)) {
        $this->db->select(implode(',', $field_name));
    } else {
        $this->db->select($field_name);
    }

    $this->db->where('user_id', $user_id)
    ->from('user_info');
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $row = $query->row();

        if (is_array($field_name)) {

            $field_value = [];
            foreach ($field_name as $field) {
                $field_value[$field] = $row->$field;
            }
        } else {

            $field_value = $row->$field_name;
        }
    }

    return $field_value;
}

function getLangCode( $language_id, $type='site_perm', $status = TRUE){
    $lang_code = "en";
    $this->db->select("code")
    ->where($type, $status)
    ->where("language_id", $language_id)
    ->order_by("sort_order");
    $query = $this->db->get("language");
    if ($query->num_rows() > 0) {
        foreach ($query->result_array() as $row) 
        {
            $lang_code = $row['code'];
        }            
    }
    return $lang_code;
}

function getSideMenu($user_type, $type= 'site', $status ='1')
{
    $LANG_CODE = $this->getLangCode($this->software->LANG_ID);
    $permission_type = 'perm_' . $user_type;
    $path_root = base_url() . $user_type."/";
    $current_url = current_uri();
    $menu_arr = [];

    $user_type = $this->getLoginnedUserType(log_user_id());
    if($user_type == 'privileged_user')
    {
        $permitted_menus = $this->getEmployeePermittedMenus(log_user_id());
        $perm_menus = unserialize($permitted_menus);
            // print_r(current_url());die();
        $menu_status = FALSE;
        $permission_type = 'perm_pre_user';


            // $link=array();
            // foreach ($perm_menus as $key => $v)
            // {
            //     $this->db->select('m.link');
            //     $this->db->from('menu m');
            //     $this->db->where('m.id',$v);
            //     $res=$this->db->get();
            //     foreach($res->result_array() as $row)
            //     {
            //         $link[]=$row['link'];
            //     }
            // }

            //     if(!in_array($current_url,$link))
            //     { 


            //             redirect("no permission",'dashboard',true);

            //     }
    }
    else
    {
        $perm_menus = array();
        $menu_status = TRUE;
    }

    $this->db->select( '*' );
    if($status != 'all')
        $this->db->where( 'status', $status );
    $this->db->where( $permission_type, "1" )
    ->where( 'type', $type )
    ->where( 'parent_id', '#' )
    ->order_by( 'order' );
    $query = $this->db->get( 'menu' );
    $all_menu = $query->result_array();

    $common_pages = ['logout'];
    $common_pages =  array_merge( $common_pages, $this->software->COMMON_PAGES );



    foreach ( $all_menu as $index => $menu ) 
    {
        if(in_array($menu['id'], $perm_menus) || $menu_status)
        {
                //$ln=$menu['link'];
            $is_selected = null;
            $menu_link = $menu['link'];
            $split_pages = explode("/", $menu_link);
            $controller = $split_pages[0]; 
            if ( $menu_link == $current_url ) {
                $is_selected = 'active';
            }   

            $menu_link = str_replace('_', '-', $menu_link );
            if( in_array( $controller, $common_pages ) )
            {   
                $menu_link = base_url() . $menu_link;
            }else{
                $menu_link = $path_root . $menu_link;                
            }

            $menu["link"] = $menu_link;
            $menu["is_selected"] = $is_selected; 
            $menu["text"] = 'menu_'.$menu['en'];
            $menu["submenu"] = $this->getSubmenus( $menu['id'], $type, $permission_type, $status, $LANG_CODE, $current_url, $path_root );


            $arr = array_column( $menu["submenu"],'id', 'is_selected');

            if( array_key_exists( 'active', $arr )){
                $menu["is_selected"] = 'active';
            } 
            array_push( $menu_arr, $menu );
        }
            // if($user_type=='privileged_user')
            // {
            //     if(in_array($menu['id'],$perm_menus))
            //     {
            //         if($current_url!=$ln)
            //         {
            //             print_r("dfdg");
            //             // $this->redirect("no",'dashboard/index',FALSE);
            //         }
            //     }
            // }
    }
    $arr = array();

    foreach ($menu_arr as $key => $item) {
        $arr[$item['category']][$key] = $item;
    }

    ksort($arr, SORT_NUMERIC);
    return $arr;
}

private function getSubmenus( $menu_id, $type, $permission_type, $status , $lang_code ='en', $current_url, $path_root )
{

    $user_type = $this->getLoginnedUserType(log_user_id());
    if($user_type == 'privileged_user')
    {
        $permitted_menus = $this->getEmployeePermittedMenus(log_user_id());
        $perm_menus = unserialize($permitted_menus);
        $menu_status = FALSE;
        $permission_type = 'perm_pre_user';

    }
    else
    {
        $perm_menus = array();
        $menu_status = TRUE;
    }

    $menu_arr = [];
    $this->db->select( '*' );
    if($status != 'all')
        $this->db->where( 'status', $status );
    $this->db->where( $permission_type, "1" )
    ->where( 'type', $type )
    ->where( 'parent_id', $menu_id )
    ->order_by( 'order' );
    $query = $this->db->get( 'menu' );

    foreach ($query->result_array() as $key => $menu) {

        if(in_array($menu['id'], $perm_menus) || $menu_status)
        {
            $is_selected = null;
            $menu_link = $menu['link'];
            $split_pages = explode("/", $menu_link);
            $controller = $split_pages[0];  

            $current_url = str_replace('_', '-', $current_url );
            if ( $menu_link == $current_url ) {
                $is_selected = 'active';
            }              

            if( in_array( $controller, $this->software->COMMON_PAGES ) )
            {   
                $menu_link = base_url() . $menu_link;
            }else{
                $menu_link = $path_root . $menu_link;                
            }

            $menu["link"] = $menu_link;
            $menu["is_selected"] = $is_selected;
            $menu["text"] = 'menu_'.$menu['en'];
            if($menu['id'] == 52 || $menu['id'] == 54 || $menu['id'] == 76)
            {
                if($this->session->userdata['site_logged_in']['user_id'] >= 100)
                    array_push( $menu_arr, $menu );
            }
            else
                array_push( $menu_arr, $menu );
        }

    }  
    return $menu_arr;
}

public function getCompanyInformation() {
    $details = array();
    $this->db->select("*")
    ->from("site_info");
    $res = $this->db->get();
    foreach ($res->result_array() as $row) { 
        $details = $row;

        $logo_path = $this->config->item('assets_folder').'/images/logo/'. $row['logo'] ;
        if (!file_exists( $logo_path ) ) {
            $details['logo'] = 'default_logo.png';
        }

        $favicon_path = $this->config->item('assets_folder').'/images/logo/'. $row['logo'] ;
        if (!file_exists('assets/images/logo/' . $row['favicon'])) {
            $details['favicon'] = 'favicon.ico';
        }
        $details['email'] = $row['email'];
        $details['phone'] = $row['phone'];
        $details['address'] = $row['address'];
        $details['name'] = $row['name'];

    }
    return $details;
}

public function updateCompanyInformation($data) {
    $this->db->set('company_name', $data['company_name'])
    ->set('company_address', $data['company_address'])
    ->set('email', $data['email'])
    ->set('phone', $data['phone'])
    ->set('country_id', $data['country_id'])
    ->set('default_lang', $data['default_lang'])
    ->set('login_lang', $data['login_lang'])
    ->set('currency_id', $data['currency_id'])
    ->set('maintenance_mode', $data['maintenance_mode']);
    if($data['maintenance_mode']){
        $this->db->set('maintenance_mode_text', $data['maintenance_mode_text']);
    }
    if($data['logo']){
        $this->db->set('logo', $data['logo']);
    }
    if($data['favicon']){
        $this->db->set('favicon', $data['favicon']);
    }
    $result =  $this->db->update('company_information');
    return $result;

}

public function getFullName($user_id) {
    $name = '';
    $this->db->select('first_name, second_name')
    ->from('user_info')
    ->where('user_id', $user_id)
    ->limit(1);
    $query = $this->db->get();

    foreach ($query->result() as $row) {
        $name = $row->first_name. ' '.  $row->second_name;
    }
    return $name;
}

public function getAdminId() {
    $user_id = NULL;
    $this->db->select('user_id')
    ->where('user_type', 'admin')
    ->order_by('user_id', 'DESC')
    ->limit(1);
    $query = $this->db->get('user_info');
    foreach ($query->result() as $row) {
        $user_id = $row->user_id;
    }
    return $user_id;
}
public function getAllCountries($country_id = '') {
    $details = array();
    $this->db->select('*');
    if($country_id){
        $this->db->where('country_id', $country_id);
    }
    $this->db->from('countries');
    $query = $this->db->get();
    $i = 0;
    foreach ($query->result_array() as $row) {
        $details[$i]['country_id'] = $row['country_id'];
        $details[$i]['country_name'] = $row['country_name'];
        $details[$i]['country_code'] = $row['country_code'];
        $details[$i]['phone_code'] = $row['phone_code'];
        $i++;
    }
    return $details;
}
public function isUserExist($user_id) {
    $count = 0 ;
    $this->db->select("COUNT(user_id) as count")
    ->from("user_info")
    ->where('user_id', $user_id)
    ->where('status', 'active');
    $query = $this->db->get();
    foreach ($query->result()AS $row) {
        $count = $row->count;
    }
    return $count;
}
public function getPositionId($father_id, $postion, $active = 'server') {
    $id_child = NULL;
    $this->db->select("user_id")
    ->from("user_info")
    ->where('father_id', $father_id);
    if ($postion && $postion != "") {
        $this->db->where('position', $postion);
    }
    $this->db->where('status', $active);
    $qr = $this->db->get();
    foreach ($qr->result() as $row) {
        $id_child = $row->user_id;
    }
    return $id_child;
}
public function getTreeLevel($user_id, $tree_type = 'tree') {
    if($tree_type == 'tree') {
        $this->db->select('user_level level');
    } elseif($tree_type == 'sponsor_tree') {
        $this->db->select('sponsor_level level');
    }
    $this->db->where('user_id', $user_id);
    $query = $this->db->get('user_info');
    $level = $query->row_array()['level'];

    return $level;
}
public function getAllCountriesAuto($term='', $country_id='') {

    $output = [];
    $this->db->distinct(true)->select('*')
    ->from('countries');
    if($country_id){
        $this->db->where('country_id', $country_id);
    }
    if($term)
        $this->db->where("country_name LIKE '$term%'")
        // $this->db->limit(10)
    ->order_by('country_id','ASC');
    $query = $this->db->get();
    foreach ($query->result_array() as $row) {
        $output[] = ['id'=>$row['country_id'],
        'text'=>$row['country_name'].'  ('.$row['phone_code'].')'];
    }

    return $output;
}
public function getAmountTypeIdByString($amount_type_string)
{
    $amount_type_id = 0;

    $this->db->select("id")
    ->where("db_amt_type", $amount_type_string)
    ->from("amount_type")
    ->limit(1);
    $query = $this->db->get();
    foreach ($query->result_array() as $row) {
        $amount_type_id = $row["id"];
    }
    return $amount_type_id;
}
public function getSponsorID($user_id) {
    $sponsor_id = 0;
    $this->db->select('sponsor_id')
    ->from('user_info')
    ->where('user_id', $user_id)
    ->limit(1);
    $query = $this->db->get();
    foreach ($query->result() as $row) {
        $sponsor_id = $row->sponsor_id;
    }
    return $sponsor_id;
}

public function addUserWalletAmount($to_userid, $amount,$wallet='') {
    if($wallet){
        $this->db->set($wallet, $wallet.' + ' .$amount, FALSE);
    }
    $query = $this->db->set('wallet', 'wallet + ' . $amount, FALSE)
    ->where('user_id', $to_userid)
    ->update('user_wallet');
    return $query;
}
public function addUserSpeicficWalletAmount($to_userid, $amount,$wallet='') {
  $query =  $this->db->set($wallet, $wallet.' + ' .$amount, FALSE);
  $this->db->where('user_id', $to_userid);
  $this->db->update('user_wallet');
  return $query;
}
public function getUserWallet($user_id= "")
{
    $wallet = 0;
    $this->db->from('user_wallet');
    if($user_id){   
        $this->db->where('user_id',$user_id)
        ->select('wallet');
    }else{
        $this->db->select_sum('wallet');
    }
    $query = $this->db->get();
    foreach($query->result() as $row){
        $wallet = $row->wallet;
    }
    return $wallet;
}

public function getUserWalletsAmount($user_id='',$wallet)
{
    $amount = 0;
    $this->db->select_sum($wallet);
    $this->db->from('user_wallet');
    if($user_id){

        $this->db->where('user_id',$user_id);
    }
    $query = $this->db->get();
    foreach($query->result() as $row){
        $amount = $row->$wallet;
    }
    return (abs($amount));

}

public function getfilteredUsers($keyword, $limit = 20)
{
    $result = array();

    $this->db->select("user_name")
    ->where("status !=","server");
    if($keyword !="." && $keyword !="/")
        $this->db->like("user_name", $keyword, "after");
    $this->db->from("user_info")
    ->limit($limit)
// $this->db->order_by("joining_date",'ASC');
    ->order_by("user_name",'ASC');
    $query = $this->db->get();
    foreach ($query->result_array() as $row) {
        $result[]["result"] = $row["user_name"];
    }
    return $result;
}
public function getSignUserDetails($user_id) {
    $user_details = array();
    $query = $this->db->select('ui.*, sui.user_name as sponsor_name, fui.user_name as parent_name')
    ->from("user_info ui")
    ->where("ui.user_id", $user_id)
    ->join("user_info sui", 'sui.user_id = ui.sponsor_id', 'left')
    ->join("user_info fui", 'fui.user_id = ui.father_id', 'left')
    ->get();
    $this->load->model('Zone_model');
    foreach ($query->result_array() as $row) {
        if (!file_exists('assets/images/profile_pic/' . $row['user_photo'])) {
            $row['user_photo'] = 'nophoto.png';
        }
        $user_details = $row;
    }
    return $user_details;
}
public function rankIdToRankName($rank_id){
    $rank_name = "NA";
    $this->db->select('name')
    ->where('rank_id',$rank_id)
    ->from('rank_details');
    $query = $this->db->get();
    foreach($query->result() as $row){
        $rank_name = $row->name;
    }
    return $rank_name;
}
public function packageIdToPackageName($package_id){
    $rank_name = "NA";
    $this->db->select('name')
    ->where('package_id',$package_id)
    ->from('package_details');
    $query = $this->db->get();
    foreach($query->result() as $row){
        $name = $row->name;
    }
    return $name;
}  
public function getSponsorCount($id) {
    $count = NULL;
    $this->db->select("COUNT(*) AS cnt")
    ->from("user_info")
    ->where('sponsor_id', $id)
    ->where('status !=', 'server');
    $qr = $this->db->get();
    foreach ($qr->result() as $row) {
        $count = $row->cnt;
    }
    return $count;
}
public function getUserType($user_id) {
    $user_type = 0;
    $this->db->select('user_type')
    ->from('user_info')
    ->where('user_id', $user_id)
    ->limit(1);
    $query = $this->db->get();
    foreach ($query->result() as $row) {
        $user_type = $row->user_type;
    }
    return $user_type;
}
public function getAmountTypeName($amount_id)
{
    $view_amt_type = NULL;

    $this->db->select("db_amt_type")
    ->where("id", $amount_id)
    ->from("amount_type")
    ->limit(1);
    $query = $this->db->get();
    foreach ($query->result_array() as $row) {
        $view_amt_type = $row["db_amt_type"];
    }
    return $view_amt_type;
}
public function getAdminPassword() {
    $password = NULL;
    $this->db->select("password")
    ->from("user_info")
    ->where("user_type", 'admin')
    ->limit(1);
    $res = $this->db->get();
    foreach ($res->result() as $row) {
        $password = $row->password;
    }
    return $password;
}
public function getUserPackageId($user_id) {
    $package_id = 0;
    $this->db->select("package_id")
    ->from("user_info")
    ->where("user_id", $user_id)
    ->limit(1);
    $res = $this->db->get();
    foreach ($res->result() as $row) {
        $package_id = $row->package_id;
    }
    return $package_id;
}
public function getUserRankId($user_id){
    $user_rank_id = 0;
    $this->db->select('rank_id')
    ->where('user_id',$user_id)
    ->from('user_info');
    $query = $this->db->get();
    foreach($query->result() as $row){
        $user_rank_id = $row->rank_id;
    }
    return $user_rank_id;
}
public function checkNewRank($referral_count) {
    $rank_id = 0;
    $this->db->select('rank_id')
    ->where('referral_count <=', $referral_count)
    ->limit(1)
    ->order_by('sort_order', 'DESC');
    $res = $this->db->get('rank_details');
    foreach ($res->result() as $row) {
        $rank_id = $row->rank_id;
    }
    return $rank_id;
}
public function getUserStatus($user_id) {
    $status = "no";

    $this->db->select('status')
    ->from("user_info")
    ->where("user_id", $user_id);
    $qry = $this->db->get();
    foreach ($qry->result() as $row) {
        $status = $row->status;
    }

    return $status;
}
public function getRankBonus($rank_id){
    $rank_bonus = 0;
    $this->db->select('bonus')
    ->from('rank_details')
    ->where('rank_id',$rank_id);
    $query = $this->db->get();
    foreach($query->result() as $row){
        $rank_bonus = $row->bonus;
    }
    return $rank_bonus;
}
public function textAreaLineBreaker($text_area_data) {
    $str1 = str_replace(array('\r\n', '\r', '\n'), "<br/>", $text_area_data);
    $str2 = str_replace(array('\t'), "&nbsp;", $str1);
    return $str2;
}


public function numberTowords($amount)
{
    if(empty($amount))
    {
        return "Please Enter a amount";
    }

    $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
    $amt_hundred = null;
    $count_length = strlen($num);
    $x = 0;
    $string = array();
    $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $x < $count_length ) {
        $get_divider = ($x == 2) ? 10 : 100;
        $amount = floor($num % $get_divider);
        $num = floor($num / $get_divider);
        $x += $get_divider == 10 ? 1 : 2;
        if ($amount) {
            $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
            $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
            $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.' 
            '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. ' 
            '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
        }
        else $string[] = null;
    }
    $implode_to_Rupees = implode('', array_reverse($string));
    $get_paise = ($amount_after_decimal > 0) ? "Point " . ($change_words[$amount_after_decimal / 10] . " 
        " . $change_words[$amount_after_decimal % 10]) . ' ' : '';

    return ($implode_to_Rupees ? $implode_to_Rupees . ' ' : '') . $get_paise;
}  

public function getAllPackagesAuto($term='', $package_id='') {

    $output = [];
    $this->db->distinct(true)->select('*')
    ->from('package_details')
    ->where('status', 'active')
    ->where('type', 'registration');
    if($package_id){
        $this->db->where('package_id', $package_id);
    }
    if($term)
        $this->db->where("name LIKE '$term%'");
    $this->db->limit(10)
    ->order_by('sort_order','ASC');
    $query = $this->db->get();
    foreach ($query->result_array() as $row) {
        $output[] = ['id'=>$row['package_id'],
        'text'=>$row['name'].'  ('.cur_format($row['amount']).')'];
    }

    return $output;
}

public function getPackageAmountbyId($package_id) {
    $output = '';
    $this->db->distinct(true)->select('*')
    ->from('package_details')
    ->where('status', 'active')
    ->where('package_id', $package_id)
    ->limit(1);
    $query = $this->db->get();
    foreach ($query->result_array() as $row) {
        $output = $row['amount'];
    }
    return $output;
}
public function getPackageAmountbyIds($package_id,$current_package) {
    $output = array();
    $this->db->select('amount,package_id')
    ->from('package_details')
    ->where('status', 'active')
    ->where('package_id <=', $package_id)
    ->where('package_id >', $current_package);
    $query = $this->db->get();
    foreach ($query->result_array() as $row) {
        $output[] = $row;
    }
    return $output;
}
public function isPackageExist($package_id){

    $this->db->from('package_details')
    ->where('package_id', $package_id);
    return $this->db->count_all_results();
}  
public function getPackageNamebyId($package_id) {

    $output = '';
    $this->db->distinct(true)->select('*')
    ->from('package_details')
    ->where('status', 'active')
    ->where('package_id', $package_id)
    ->limit(1);
    $query = $this->db->get();
    foreach ($query->result_array() as $row) {
        $output = $row['name'];
    }

    return $output;
}

public function getFatherID($user_id) {
    $father_id = 0;
    $this->db->select('father_id')
    ->from('user_info')
    ->where('user_id', $user_id)
    ->limit(1);
    $query = $this->db->get();
    foreach ($query->result() as $row) {
        $father_id = $row->father_id;
    }
    return $father_id;
} 
public function sendSMS($user_id,$messagecontent)
{
    $this->load->model('Member_model');
    $country = $this->getUserInfoField('country', $user_id);

    $country_code = $this->Member_model->getCountryCode($country);

    $mobile = $this->getUserInfoField('mobile', $user_id);
    $mobile =$country_code.$mobile;
    if(SEND_SMS)
    {

        $senderID = '';

        $response = array();
        $headers = array('Content-Type: application/x-www-form-urlencoded');
        $url = 'https://www.bulksmsnigeria.com/api/v1/sms/create';
        $arr_params = [
            'from'      =>  $senderID,
            'to'        =>  $mobile,
            'body'      =>  $messagecontent,

                'append_sender' => 2, // Choose your Append Sender ID Option:
                    //1 for none,
                    // 2 for Hosted SIM Only
                    // and 3 for all

                'api_token' =>  'eAkLrOwJktLmhJMrvYBcuvNDZRDZ9yFow97rJBpyEZIsmrlsZgsvLk7LQYn7', //Todo: Replace with your API Token

                'dnd'       =>  4 //Choose your preferred DND Management Option:
                // 1 for Get a refund,
                // 2 for Direct hosted SIM,
                // 3 for Hosted SIM Only,
                // 4 for Dual-Backup and
                // 5 for Dual-Dispatch
            ];
            if (is_array($arr_params)) {
                $final_url_data = http_build_query($arr_params, '', '&');
            }
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $final_url_data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
            curl_setopt($ch, CURLOPT_VERBOSE, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            $response['body'] = curl_exec($ch);
            $response['code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);


            // return $response['body'];

            // end


            // $username    =    urlencode($username);
            // $password    =    urlencode($password);
            // $sender        =    urlencode($sender);
            // $message        =    urlencode($messagecontent);
            // $url="http://sms.signaturesoftwarelab.com/sendsms?uname=$username&pwd=$password&senderid=$sender&to=$mobile&msg=$message&route=T";
            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL, $url);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            // $response = curl_exec($ch);
            // curl_close($ch);
        }
        else
        {
            $response = 'SMS config is OFF';
        }

        $date = date('Y-m-d H:i:s');
        $this->db->set('user_id',$user_id)
        ->set('mobile',$mobile)
        ->set('message',$messagecontent)
        ->set('response',serialize($response))
        ->set('date',$date);
        $result = $this->db->insert('send_sms_history');

        return $result; 
    }
    public function getUserPosition($user_id) {
        $position = 1;
        $this->db->select('position')
        ->from('user_info')
        ->where('user_id', $user_id)
        ->limit(1);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $position = $row->position;
        }
        return $position;
    }

    public function getTotalUsers($referal_id=''){
        if($referal_id){
            $this->db->where('sponsor_id',$referal_id);
        }
        $this->db->where('user_type!=','admin');
        $where = "(status = 'active' AND user_type != 'admin')";
        $this->db->where($where)
        ->from('user_info');
        $count = $this->db->count_all_results();
        return $count; 
    }

    public function getStateName($state_id) {
        $state_title = NULL;
        $this->db->select('state_title')
        ->where('state_id', $state_id)
        ->limit(1);
        $query = $this->db->get('state');
        foreach ($query->result() as $row) {
            $state_title = $row->state_title;
        }
        return $state_title;
    }
    public function getAllCurrencyCode() {
        $codes=array();
        $this->db->select("*")
        ->where("status!=", 0);
        $query = $this->db->get("currency");

        foreach ($query->result_array() as $result) {
            $codes[]=$result;
        }
        return $codes;
    }
    public function getRankDetail(){
        $details = array();
        $this->db->select('*')
        ->from('rank_details')
        ->order_by('sort_order');
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details[] = $row;

        }
        return $details; 
    }
    public function addUserWalletDetails($to_userid, $amount,$wallet='') {
        if($wallet){
            $query=$this->db->set($wallet, $wallet.' + ' .$amount, FALSE);
        }
        $this->db->where('user_id', $to_userid)
        ->update('user_wallet');
        return $query;
    }
    public function getAmountTypeDetails($type=''){
        $details = array();
        $this->db->select('*')
        ->from('amount_type')
        ->where('show_status','yes');
        if($type){            
            $this->db->where('db_amt_type!=','wallet_withdrawal');
        }
        $this->db->order_by('sort_order');
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details[] = $row;

        }
        return $details; 
    }
    function getDownlineUserSearch($user_id,$post) {
        $details = array();
        $this->load->model('Settings_model');
        $user_left_right = $this->Settings_model->getUserLeftAndRight($user_id, $post['type']);
        $this->db->select('user_name text, user_id id')
        ->where('status', 'active')
        ->where("left_".$post['type']." >=",$user_left_right["left_".$post['type'].""])
        ->where("right_".$post['type']." <=",$user_left_right["right_".$post['type'].""])
        ->from('user_info');
        if(element('term',$post)){
            $this->db->where("user_name LIKE '{$post['term']}%'");
        }
        
        $query = $this->db->get();

        foreach($query->result_array() as $row){
            $details[] = $row;
        }
        return $details;
    }

    public function getUserNameByEmail($email) {
        $user_name = 0;
        $this->db->select('user_name')
        ->from('user_info')
        ->where('email', $email)
        ->limit(1);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $user_name = $row->user_name;
        }
        return $user_name;
    }

    public function getEmployeePermittedMenus($user_id) {
        $menu_ids = NULL;
        $this->db->select('menu_ids');
        $this->db->from('employee_menus');
        $this->db->where('emp_id', $user_id);
        $this->db->limit(1);
        $query = $this->db->get();
        // echo $this->db->last_query();die();
        foreach ($query->result() as $row) {
            $menu_ids = $row->menu_ids;
        }
        return $menu_ids;
    }

    public function getLoginnedUserType($user_id) {
        $user_type = "user";
        $this->db->select('user_type');
        $this->db->from('user_info');
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $user_type = $row->user_type;
        }
        if($user_id < 16 && $user_type == 'admin')
            $user_type = 'privileged_user';

        return $user_type;
    }
    public function getAllPhoneCodeAuto($term='') {

        $output = [];
        $this->db->distinct(true)->select('*')
        ->from('countries');
        if($term)
            $this->db->where("phone_code LIKE '$term%'");
        $this->db->limit(10)
        ->order_by('country_id','ASC');
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $output[] = ['id'=>'+'.$row['phone_code'],
            'text'=>'+'.$row['phone_code']];
        }
// print_r($output);
        return $output;
    }

    public function CleanupCache()
    {
        $this->db->cache_delete_all();
    }


    public function updateUserInfoField($field_name,$value,$user_id){

        $this->db->set($field_name, $value);
        $this->db->where('user_id', $user_id);

        $result =  $this->db->update('user_info');
        return $result;


    }

    public function getRankIdToName($rank_id){

        $rank_name = "Associate";
        $this->db->select('name');
        $this->db->from('rank_details');
        $this->db->where('rank_id',$rank_id);
        $this->db->limit(1);
        $query = $this->db->get();

        foreach($query->result() as $row){
            $rank_name = $row->name;
        }
        return $rank_name;
    }
    public function getCategoriesSelect2($post_arr, $limit = 20)
    {
        $result = array();

        $this->db->select("category_name text, id");
        if($post_arr)
        {

            if(element('term',$post_arr))
                $this->db->where("category_name LIKE '{$post_arr['term']}%'");
        }
        $this->db->from("category");
        $this->db->limit($limit);
        $this->db->order_by("category_name", 'ASC');
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $result[] = $row;
        }
        return $result;
    }  
    public function getCategoryInfo($id, $encrypted = TRUE)
    {
        if( $encrypted ){
            $id = $this->encrypt_decrypt('decrypt',$id);
        }
        $details=[];
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('id',$id);

        $this->db->limit(1);
        $res=$this->db->get();
        foreach ($res->result_array() as $row) {
            $row['parent_name'] = $this->Base_model->getCategoryName( $row['parent'] );
            $details = $row;
        }
        return $details;
    }
    public function getCategoryName($id)
    {
        $category_name=NULL;
        $this->db->select('category_name');
        $this->db->from('category');
        $this->db->where('id',$id);
        $this->db->limit(1);
        $res=$this->db->get();
        foreach ($res->result() as $row) {
            return $row->category_name;
        }
    }
    public function getDimensionsInfo($id, $encrypted = TRUE)
    {
        if( $encrypted ){
            $id = $this->encrypt_decrypt('decrypt',$id);
        }

        $details=[];
        $this->db->select('*');
        $this->db->from('dimensions');
        $this->db->where('id',$id);

        $this->db->limit(1);
        $res=$this->db->get();
        foreach ($res->result_array() as $row) {

            $row['category_name'] = $this->Base_model->getCategoryName( $row['category_id'] );
            $details = $row;
        }
        return $details;
    }
    public function getProductInfo($id='', $encrypted = TRUE)
    {
        if( $encrypted ){
            $id = $this->encrypt_decrypt('decrypt',$id);
        }

        $details=[];

        $this->db->select('*');
        $this->db->from('product_details');
        if($id){
         $this->db->where('id',$id);
     }
     $this->db->limit(1);
     $res = $this->db->get();
     foreach ($res->result_array() as $row) {
        $row['category_name']=$this->getCategoryName($row['category_id']);
            // $row['brand_name']=$this->getBrandName($row['brand']);
            // $row['offer_percentage_amt']=$this->getOfferPercentage($row['offer_percentage']);
        $row['color_ids']=explode(',', $row['color_id']);
        $row['dimension_id1']=explode(',', $row['dimension_id']);
        $row['dimension_ids'] = $this->getDimensionNames($row['dimension_id1']);
        $row['color_name']=$this->getColorName($row['color_id']);
        $row['dimension_name']=$this->getDimensionName($row['dimension_id']);
        $row['product_images']=$this->getproductImages($id);
        $details = $row;
    }
    return $details;
}
public function getDimensionName($id)
{
    $name=NULL;
    $this->db->select("CONCAT(name, ' - ', code)  as text");
    $this->db->from('dimensions');
    $this->db->where('id',$id);
    $this->db->limit(1);
    $res=$this->db->get();
    foreach ($res->result() as $row) {
        return $row->text;
    }
}
public function getDimensionNames($dimension_ids=[]){
    $details = array();
    // print_r($this->session->userdata('default_currency'));die();
    $def_currency=$this->session->userdata('default_currency');
    if($def_currency){
        $new_curr=$def_currency['currency_id'];
        $new_code=$def_currency['code'];
        $site_info= $this->Base_model->getCompanyInformation();
        $def_curr=$site_info['currency_id'];
        if($def_curr==$new_curr)
            $this->db->select('id,name');
        else
            $this->db->select('id,'.$new_code.' as name');
    }
    else{
        $this->db->select('id,name');
    }
    $this->db->from('dimensions');
    $this->db->where('status','yes');
    $this->db->order_by('sort_order','ASC');
    $this->db->where_in('id' , $dimension_ids);
    $query = $this->db->get();

    foreach($query->result_array() as $row){
        $details[$row['id']] = $row;

    }
    return $details;
}

public function getColorName($id)
{
    $name=NULL;
    $this->db->select('name');
    $this->db->from('colors');
    $this->db->where('id',$id);
    $this->db->limit(1);
    $res=$this->db->get();
    foreach ($res->result() as $row) {
        return $row->name;
    }
}
public function getproductImages($id)
{
    $name=array();
    $this->db->select("image,id");
    $this->db->from('product_images');
    $this->db->where('product_id',$id);
    $res=$this->db->get();
    foreach ($res->result_array() as $row) {
        $name[]=$row;
    }
    return $name;
}
public function getSubMenuDetails($current_url) {
    $details = array();
    $this->db->select('id,en,parent_id')
    ->where('link', $current_url)
    ->limit(1)
    ->from('menu');
    $query = $this->db->get();
    foreach($query->result_array() as $row){
        $row['sub_menu'] = 'menu_'.$row['en'];
        if($row['parent_id']!= 0){
            $main = $this->getIdToSideMenu($row['parent_id']);
            $row['main_menu'] = 'menu_'.$main ; 
        }
        $details[] = $row;
    }

    return $details;
}
public function getIdToSideMenu($id) {
    $menu = false;
    $this->db->select('en')
    ->from('menu')
    ->where('id', $id)
    ->limit(1);
    $query = $this->db->get();
    foreach ($query->result() as $row) {
        $menu = $row->en;
    }
    return $menu;
}


function random_string($type, $length) {
    $characters = '';
    if ($type == 'alpha') {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    } elseif ($type == 'numeric') {
        $characters = '0123456789';
    } elseif ($type == 'alnum') {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    }
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $string;
}
public function getAllPackagesAPI($term='', $package_id='') {

    $output = [];
    $this->db->distinct(true)->select('*')
    ->from('package_details');
    if($package_id){
        $this->db->where('package_id', $package_id);
    }
    $this->db->order_by('package_id','ASC');
    $query = $this->db->get();
    foreach ($query->result_array() as $row) {
        $output[] = ['id'=>$row['package_id'],
        'text'=>$row['name'],'amount'=>$row['amount'],'enc_id'=>$this->encrypt_decrypt('encrypt', $row['package_id'])];
    }
    return $output;
}
public function getMonolinesUsers($user_id,$type,$admin_id) {
    $sponsor_name = array();
    $this->db->select('ms.*,ui.package_id,ui.user_name')
    ->from('monoline_structure as ms')
    ->join('user_info as ui','ui.user_id=ms.user_id')
    ->where('ms.user_id!=',$user_id)
    // ->where('ms.user_id >',$user_id)
    ->limit(20);
    if($type=='signup'){
       $this->db->order_by('ms.id','DESC');
       $admin_id=$admin_id;
       $this->db->where('ms.user_id!=',$admin_id);
       $this->db->where('ms.user_id <',$user_id);
   }elseif($type=='upgrade'){
       $this->db->order_by('ms.id','DESC');
       $this->db->where('ms.user_id!=',$admin_id);
       $this->db->where('ms.user_id <',$user_id);
   }else{
       $this->db->order_by('ms.id','ASC');
       $this->db->where('ms.user_id >',$user_id);
   }
   $query = $this->db->get();
   foreach ($query->result_array() as $row) {
    $sponsor_name[] = $row;
}
return $sponsor_name;
}
public function getNextPackage($current_id='') {
    $output = 0;
    $this->db->distinct(true)->select('package_id,name,amount')
    ->from('package_details')
    ->where('status', 'active')
    ->limit(1);
    $this->db->where('package_id >', $current_id);
    $this->db->order_by('package_id','ASC');
    $query = $this->db->get();
    foreach ($query->result_array() as $row) {
        $output = $row;
    }
    return $output;
}
public function CheckTransactionIDUnique($id) {
    $rank_id = 0;
    $this->db->select('count(user_id) as count')
    ->where('transaction_id', $id);
    $res = $this->db->get('user_info');
    foreach ($res->result() as $row) {
        $rank_id = $row->count;
    }
    return $rank_id;
}public function InsertPAckageAPIMIssed($package,$global_bonus='',$user_id) {
    $data = array(
        'user_id' => $user_id,
        'amount' => $global_bonus,
        'package' => $package,
    );
    $result = $this->db->insert('missed_amount', $data);
}
public function CheckWalletAddressUnique($address) {
    $rank_id = 0;
    $this->db->select('user_id')
    ->where('wallet_address', $address);
    $res = $this->db->get('user_info');
    foreach ($res->result() as $row) {
        $rank_id = $row->user_id;
    }
    return $rank_id;
}
public function getadminFromwallet($user_id)
{
    $details=[];
    $this->db->select('*');
    $this->db->from('admin_wallet_details');
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
public function getpackagelastupgraded($package=''
    ,$user_id='') {

    $output = [];
    $this->db->distinct(true)->select('pd.package_amount,pds.name,pd.transaction_id,pd.id')
    ->from('package_upgrade_history as pd')
    ->where('pd.user_id',$user_id)
    ->join('package_details as pds','pds.package_id=pd.new_package');
    $this->db->order_by('pd.id','DESC');
    $this->db->limit('1');
    $query = $this->db->get();
    foreach ($query->result_array() as $row) {
        $output =  $row;
    }
    return $output;
}
public function getPendingGLobalBonus($user_id='')
{
    $amount = 0;
    $this->db->select_sum('amount_payable');
    $this->db->from('global_bonus');
    $this->db->where('status','Pending');
    if($user_id){
        $this->db->where('user_id',$user_id);
    }
    $query = $this->db->get();
    foreach($query->result() as $row){
        $amount = $row->amount_payable;
    }
    return $amount;

}
}
