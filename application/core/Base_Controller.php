<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends CI_Controller 
{
    public $data = array();      
    public $SUPPORT_MENU = NULL; 
    public $MAINTENANCE_TEXT = NULL; 
    public $MAINTENANCE_MODE = 0; 

    public $LANG_ARR = array();
    public $LOGIN_LANG_ARR = array();
    public $LOGIN_LANG_ID = NULL;

    function __construct()
    {
        parent::__construct();
        $this->set_default_data();
        $this->set_logged_user_data();
        $this->set_flash_message();
        $this->check_maintance_mode();
    }

    function set_default_data() { 
        $site_details = array(); 
        $site_details = $this->Base_model->getCompanyInformation();
        $timezone=date_default_timezone_get();
        $local_time = new DateTime("now", new DateTimeZone($timezone));
        $this->data['local_time']=$local_time;
        $this->data[ 'site_details' ] = $site_details;
        $timestamp = time();
        $server_time = date("d-m-Y (D) H:i:s", $timestamp);
        $this->data['server_time']=$server_time;
        $this->MAINTENANCE_MODE = $site_details["maintenance_mode"]; 
        $this->data[ 'MAINTENANCE_MODE' ] = $this->MAINTENANCE_MODE;
        date_default_timezone_set($site_details["time_zone"]);
        $this->MAINTENANCE_TEXT = $site_details["maintenance_mode_text"];
        $this->data[ 'MAINTENANCE_TEXT' ] = $this->MAINTENANCE_TEXT;
        $this->data['available_currencies'] = $this->currency->currencies;
        $this->data['currency_code']=$this->currency->currency_code;
        $this->data['currency_id']=$this->currency->currency_id;
        $this->data['symbol_left']=$this->currency->currencies[$this->data['currency_code']]['symbol_left'];
        if(element('default_login_lang_id', $this->session->userdata)){
            $this->LOGIN_LANG_ID = $this->session->userdata('default_login_lang_id');
        }else{
            $this->LOGIN_LANG_ID = $site_details["login_lang"];
        } 
    }

    function set_logged_user_data() {

        if ($this->hasSession()) {  
            $token = $this->input->get('token', TRUE); 
            if (current_uri() === 'login/index' && empty($token)) {
                    $this->redirect("", "dashboard", true);
            }
            $first_segments = $this->uri->segment(1);

            if (in_array($first_segments, ['admin','user'])) {
                if(log_user_type() != $first_segments){
                    foreach ($this->session->userdata as $key => $value) {
                        if (strpos($key, 'site_') === 0) {
                            $this->session->unset_userdata($key);
                        }
                    }
                    $this->redirect('Unauthorized Access', 'login', false);
                }
            }    
            $menu_arr=array();
            $this->data[ 'SIDE_MENU' ] = $this->Base_model->getSideMenu( log_user_type() );
            foreach ($this->data['SIDE_MENU']['main'] as $key => $value) {
                $menu_arr[]=$value['id']; 
            }
            $status=0;
            if(in_array(9,$menu_arr)){
                $status=1;
            }
            $this->data['status']=$status;
            $this->data[ 'logout_url' ] = base_url().'login/logout';
            if( current_uri() != 'member/profile'){
                $select_arr = ['user_name','first_name', 'second_name', 'user_photo', 'email','rank_id', 'country', 'city','state','zip_code', 'address', 'facebook', 'twitter','mobile','left_father','right_father','user_level','wallet_address'];
            }else{               
                $select_arr = ['user_name','first_name', 'second_name', 'user_photo', 'email', 'mobile','rank_id', 'facebook', 'status', 'twitter',' instagram', 'linked_in', 'city', 'zip_code', 'address', 'country', 'state', 'referral_count','left_father','right_father','user_level','wallet_address'];
            }
            $user_details = $this->Base_model->getUserDetails(log_user_id(), $select_arr );
            $this->lang->load('common', 'english');
            $this->data[ 'profile_pic' ] = $user_details['user_photo'];  
            $this->data[ 'user_details' ] = $user_details;  
        // $auth_tocken=$this->session->userdata('auth_tocken');
        // $auth_tocken_pass_update=$this->Base_model->getUserInfoField('auth_tocken',log_user_id());
        // $rank=$this->Base_model->getUserInfoField('rank_id',log_user_id());
        // $this->data['user_rank_name']=$this->Base_model->getRankIdToName($rank);
        // if($auth_tocken_pass_update !=''){
        //     if($auth_tocken != $auth_tocken_pass_update){

        //         $this->set_time_out('Your password changed! Login First..');
        //     }
        // }
        }else{

            $split_pages = explode("/", $this->uri->uri_string());
            $user_type = $split_pages[0];
            if(in_array($user_type, ['admin','user'])){
                $this->redirect("Session out, Please login", "login", FALSE);
            }
        }
    }

    function set_flash_message() {
        $flash_message = $this->session->flashdata('redirect_message');
        if (isset($flash_message)) {
            $this->data[ 'flashdata' ] = $flash_message["flashdata"];
            $this->data[ 'type' ] = $flash_message["type"];
            $this->data[ 'box' ] = $flash_message["box"]; 
        } else {
            $this->data[ 'box' ] = FALSE; 
        }
    }

    function set_session_flash_data($message, $message_type ) {
        $redirect_message["flashdata"] = $message;
        $redirect_message["type"] = $message_type;
        $redirect_message["box"] = true;
        $this->session->set_flashdata('redirect_message', $redirect_message);
    }

    function hasSession() {

        $flag = !empty($this->session->userdata['site_logged_in']) ? true : false;
        return $flag;
    }

    function loadView( $data ) {
        $data = array_merge( $this->data, $data );

        $this->load->view( '' , $data );
    }

    function redirect($message, $page_to_reload, $message_type = false, $redirect_message = array()) 
    {
        $redirect_message["flashdata"] = $message;
        $redirect_message["type"] = $message_type;
        $redirect_message["box"] = true;
        $this->session->set_flashdata('redirect_message', $redirect_message);

        $path = base_url();

        $split_pages = explode("/", $page_to_reload);
        $controller_name = $split_pages[0];

        if (in_array($controller_name, $this->software->COMMON_PAGES)) {
            

            $path .= $page_to_reload;
            redirect("$path", 'refresh');
            exit();
        } else {
            // echo"$page_to_reload";
            //       print_r($this->session->userdata('site_logged_in'));die();
            if ($this->hasSession()) {

                $user_type = $this->session->userdata['site_logged_in']['user_type'];

                if ($user_type == "admin" || $user_type == "employee") {
                    $path .= "admin/" . $page_to_reload;
                } else {
                    $path .= $user_type."/" . $page_to_reload;
                }

                redirect("$path", 'refresh');
                exit();
            } else {
                if (in_array($controller_name, $this->software->NO_LOGIN_PAGES)) {
                    $path .= $page_to_reload;
                    redirect("$path", 'refresh');
                    exit();
                } else {
                    $path .= "login";
                    redirect("$path", 'refresh');
                    exit();
                }
            }
        }
    }


    function checkUserLogged() {

        if ($this->hasSession() && !in_array($this->router->class, $this->software->NO_LOGIN_PAGES)) {

            $timeout = 30000;
            if ((time() - $this->session->userdata['last_login']) > $timeout)
            {
                $this->set_time_out();
            } else {
                $this->session->set_userdata( 'last_login', time() );
            }
        } else {
            if(!in_array($this->router->class, $this->software->NO_LOGIN_PAGES))
            {
                $this->set_time_out();
            }
        }
        return true;
    }

    function check_maintance_mode() {

        $blocked_uris = [
            'signup/index', 
            'business/fund_transfer', 
            'business/payout_request', 
            'member/upgrade_step', 
        ];

        if($this->data[ 'MAINTENANCE_MODE' ] == 1 && log_user_type() != 'admin' && in_array(current_uri(), $blocked_uris))
        {
            $this->redirect( $this->data['MAINTENANCE_TEXT'], "login/under-maintenance", FALSE);
        }

    }


    private function set_time_out($msg='Session timeout please login!'){

        $logged_in = $this->session->userdata('site_logged_in');

        $this->session->unset_userdata('site_logged_in');
        $this->session->unset_userdata('auth_tocken');
        
        $timeout_sess = array();

        if($this->hasSession()){

            $timeout_sess = array(
                'user_name' => $logged_in['user_name'],
                'user_id' => $logged_in['user_id']
            );
        }

        $this->session->set_userdata( 'site_timeout_sess', $timeout_sess );
        $this->redirect($msg, 'session-out', false );
    }
}
