<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Base_Controller 
{

    public function index()
    { 
        $check=[];
        $id = $this->input->get('id');
        $token = $this->input->get('token');
        if($token)
        {
            $this->load->helper('authorization');
            try {
                $valid_token = Authorization::validateToken($token);
                if ($valid_token) {
                    $login_result = [json_decode(json_encode($this->Base_model->getUserDetails(
                        $valid_token->user_id, 
                        ['user_id', 'user_name', 'user_type', 'default_lang']
                    )))];
                    $this->session->set_userdata('site_social_login', NULL);
                    $this->Login_model->setUserSessionDatas($login_result);
                    if($this->session->userdata('site_logged_in')){
                        $this->Base_model->insertIntoActivityHistory(
                            $valid_token->user_id, 
                            $valid_token->user_id, 
                            'Successful login'
                        );
                        $redirect_url = base_url()."user/dashboard";
                        header("Location: $redirect_url");
                    }
                }
            } catch (Exception $e) {
               echo "Token Invalid";
           }
       }
       if($id)
       {
         $extra = base_url()."signup/index/$id";
         header("Location: $extra");
         exit;
     }
     $data['title'] = lang('button_login'); 
     $this->loadView($data);
 }
 public function authenticate_login() 
 {  


  if($this->input->is_ajax_request()){
     $this->form_validation->set_rules('user_name',  lang('username'), 'required');
     $this->form_validation->set_rules('pass', lang('password') , 'required');
     $val_res = $this->form_validation->run();
     if( $val_res ){
        $login_details = $this->input->post();  
        $user_name = $login_details['user_name'];
        $password = $login_details['pass'];
        $login_details = $this->security->xss_clean( $login_details );
        $login_result = $this->Login_model->login( $user_name, $password );

        if ($login_result) { 

           $log_user_type = $login_result[0]->user_type;

           if( ( $log_user_type != 'admin' ) && $this->MAINTENANCE_MODE == 1){

              $response['status'] = FALSE;
              $response['msg'] = $this->MAINTENANCE_TEXT;;
              $this->output
              ->set_status_header(200)
              ->set_content_type('application/json', 'utf-8')
              ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
              ->_display();
              exit();    
          }

          $auth_tocken=md5($user_name.':'.$login_result[0]->password);

          $set_session=$this->session->set_userdata('auth_tocken',$auth_tocken);

          $this->Login_model->setUserSessionDatas($login_result);
          $this->session->set_userdata('site_social_login', NULL);

          if($this->session->userdata('site_logged_in')){

              $this->Base_model->insertIntoActivityHistory($login_result[0]->user_id, $login_result[0]->user_id, 'Successfull login');

              $response['status'] = TRUE;
              $response['location'] = base_url(). $log_user_type.'/dashboard';
              $this->output
              ->set_status_header(200)
              ->set_content_type('application/json', 'utf-8')
              ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
              ->_display();
              exit();    
          } 

      } else {

       $response['status'] = FALSE;
       $response['msg'] = '<p class="text-red">'.lang('invalid_user_name_or_password').'</p>';
       $this->output
       ->set_status_header(200)
       ->set_content_type('application/json', 'utf-8')
       ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
       ->_display();
       exit();   
   } 
}else{

    $response['status'] = FALSE;
    $response['msg'] = validation_errors();
    $this->output
    ->set_status_header(200)
    ->set_content_type('application/json', 'utf-8')
    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    ->_display();
    exit();  
}

}

}


function logout() {

  $user_type = '';

  if ($this->hasSession()) { 
     $user_type=log_user_type();
 }
 foreach ($this->session->userdata as $key => $value) {
     if (strpos($key, 'site_') === 0) {
        $this->session->unset_userdata($key);
    }
}
foreach ($this->session->userdata as $key => $value) {
 if (strpos($key, 'sign_') === 0) {
    $this->session->unset_userdata($key);
}
}
$this->session->sess_destroy();
$path = "login";          
$msg = lang('successfully_logged_out');
$this->redirect("$msg", $path, true);
}

public function session_out()
{
  if($this->hasSession()){
     $this->redirect("", "dashboard", FALSE);
 }

 if( ! element( 'site_timeout_sess' ,$this->session->userdata())){
     $this->redirect("", "dashboard", FALSE);
 }

 $timeout_sess =  $this->session->userdata( 'site_timeout_sess' );

 $select_arr = ['user_photo'];
 $user_details = $this->Base_model->getUserDetails( $timeout_sess[ 'user_id'], $select_arr );  

 $data['title'] = lang('unlock'); 
 $timeout_sess['user_photo'] = $user_details['user_photo'];
 $data['timeout'] = $timeout_sess;

 if( $this->input->post("login") && $this->validate_timeout( ) ){
     $this->redirect( '', "dashboard", true );
 } 
 if( $this->input->post( 'logout' )){
     $this->redirect( '', "logout", true );
 } 
 $this->loadView($data);
}

private function validate_timeout() 
{
  $this->form_validation->set_rules('password', lang("password") , 'required|strip_tags|callback_valid_password'); 
  $this->form_validation->set_message('valid_password', lang('incorrect_password_entered')); 
  $val_res = $this->form_validation->run(); 
  return $val_res;
}

public function valid_password() 
{
  $flag = false; 
  $password = $this->input->post('password');
  $login_details = $this->security->xss_clean( $password );

  $timeout_sess =  $this->session->userdata( 'site_timeout_sess' );
  $login_result = $this->Login_model->login( $timeout_sess['user_name'], $password );

  if ($login_result) {
     $this->Login_model->setUserSessionDatas($login_result);
     $this->session->set_userdata('site_social_login', NULL);
     $this->session->unset_userdata( 'site_timeout_sess' );
     $flag = true;
 }
 return $flag;
}

public function under_maintenance()
{
  $data['title'] = lang('under_maintenance');  
  $this->loadView($data);
}

public function forgot_success()
{
  $data['title'] = lang('forgot_success');  
  $this->loadView($data);
}

public function forgot_password()
{
  if($this->hasSession()){
     $this->redirect("", "dashboard", FALSE);
 }

 if ($this->input->post('forgot') && $this->verify_forgot_password()) {
     $post_arr = $this->input->post();
     $user_name = $post_arr["user_name"];
     $email = $post_arr["mail"];
     $user_id = $this->Base_model->getUserId($user_name);
     $user_email = $this->Base_model->getUserInfoField('email', $user_id);
     $full_name=$this->Base_model->getFullName($user_id);
     if ($user_email == $email) {   
        $keyword = $this->Login_model->getKeyWord($user_id);
        $mail_arr = array(
           'user_id' => $user_id,
           'keyword' => $keyword,
           'email' => $user_email,
           'fullname'=>$full_name,
       );
        $this->load->model('Mail_model');
        $this->Mail_model->sendEmails('forgot_password', $mail_arr); 

        $this->redirect( lang('please_check_mail_for_reset_password'), "login/reset-password/$keyword", TRUE);

    } else { 
        $this->redirect( lang('failed_user_email_not_match'), 'forgot', FALSE);
    }
} 
$data['title'] = lang('forgot');  
$this->loadView($data);
}

private function verify_forgot_password() { 
  $this->form_validation->set_rules('user_name', lang('username'), 'trim|required|is_exist[user_info.user_name]');
  $this->form_validation->set_rules('mail',lang('email_address'), 'required|is_exist[user_info. email]');
  $result =  $this->form_validation->run();

  return $result;
}


function reset_password($keyword_encode ="") 
{
  if($this->hasSession()){
     $this->redirect("", "dashboard", FALSE);
 }
 if($keyword_encode == "" || !$this->Login_model->keywordAvailable($keyword_encode))
 {
     $msg = lang('text_invalid_url');
     $this->redirect($msg, 'login.php', FALSE);
 }

 if ($this->input->post('reset_password') && $this->validate_reset_pass()) {
     $post_arr = $this->input->post();
     $keyword = $post_arr["keyword_encode"];
     $new_password = $post_arr["newpass"];
     $confirm_password = $post_arr["conpass"];
     if($keyword == "" || !$this->Login_model->keywordAvailable($keyword))
     {
        $msg = lang('text_invalid_url');
        $this->redirect($msg, 'login', FALSE);
    }
    $user_id = $this->Login_model->getUserIdFromKeyword($keyword);
    $user_name=$this->Base_model->getUserName($user_id);
    if($user_id == "")
    {
        $msg = lang('text_invalid_url');
        $this->redirect($msg, 'login', FALSE);
    }
    else
    {
        $this->load->model('Mail_model');
        $this->config->load('bcrypt');
        $this->load->library('bcrypt');
        $hashed_password = $this->bcrypt->hash_password($confirm_password);
        $update = $this->Login_model->updatePassword($hashed_password, $user_id);
        $res = $this->Login_model->updateKeywordStatus($user_id,$keyword);
        $res1 = $this->Login_model->sendPasswordMail($user_id,$new_password,$user_name);
        if ($update) {
           $this->Base_model->insertIntoActivityHistory($user_id, $user_id,'reset_password');              
           $msg = lang('text_password_updated_successfully');
           $this->redirect($msg, 'login.php', TRUE);
       } else {
           $msg = lang('text_error_on_password_updation');
           $this->redirect($msg, 'login.php', FALSE);
       }
   }
}     

$data["keyword_encode"]= $keyword_encode;
$data["title"] = lang('button_reset');
$this->loadView($data);       
}

function validate_reset_pass() {

  $password_length = value_by_key('password_min_len');

  $this->form_validation->set_rules('newpass', lang('new_password'), 'required|min_length['. $password_length .']|alpha_numeric');
  $this->form_validation->set_rules('conpass', lang('confirm_password'), 'required|min_length['. $password_length .']|matches[newpass]');
  $result =  $this->form_validation->run();
  return $result;
}


function check_captcha() 
{ 
  $recaptcha = $this->input->post('g-recaptcha-response');
  $this->load->library('recaptcha');
  if (!empty($recaptcha)) 
  {
     $response = $this->recaptcha->verifyResponse($recaptcha);
     if (isset($response['success']) && $response['success'] === true){
        return true;
    }
}
return false;
}

public function switch_lang($language_code = "") {
  if($this->hasSession()){

     $logged_in_arr = $this->session->userdata('site_logged_in');
     $lang_arr = array_column($this->LANG_ARR, 'language_id', 'code');
     $logged_in_arr['lang_id'] = ($language_code != "") ? $lang_arr[$language_code] : log_lang_id();
     $this->Login_model->updateUserLangId(log_user_id(), $logged_in_arr['lang_id']);
     $this->session->set_userdata('default_login_lang_id', $logged_in_arr['lang_id']);
     $this->session->set_userdata('site_logged_in', $logged_in_arr);

 }else{

     $lang_arr = array_column($this->LOGIN_LANG_ARR, 'language_id', 'code');
     $lang_id = ($language_code != "") ? $lang_arr[$language_code] : $this->LOGIN_LANG_ID;

     $this->session->set_userdata('default_login_lang_id', $lang_id);
 }

 redirect($this->input->server('HTTP_REFERER'));

}
public function change_currency()
{
  if ($this->input->is_ajax_request()) {
     $post=$this->input->post();
     $currency_id=$post['currency_id'];
     $res=$this->session->set_userdata('currency_id', $currency_id);
     if ($res) {
        $response['status'] = TRUE;
        $response['msg'] = 'valid';
        $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
        exit();     
    }
    else{
        $response['status'] = FALSE;
        $response['msg'] = lang('invalid');
        $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
        exit(); 
    }

}
}

public function forgot_username()
{
  if($this->hasSession()){
     $this->redirect("", "dashboard", FALSE);
 }

 if ($this->input->post('forgot') && $this->verify_forgot_username()) {
     $post_arr = $this->input->post();
     $email = $post_arr["mail"];
     $user_name = $this->Base_model->getUserNameByEmail($email);
     $user_id = $this->Base_model->getUserId($user_name);
     $full_name = $this->Base_model->getFullName($user_id);
     $mail_arr = array(
        'user_id' => $user_id,
        'fullname' => $full_name,
        'email' => $email,
        'user_name'=>$user_name,
    );
     $this->load->model('Mail_model');
     $this->Mail_model->sendEmails('forgot_username', $mail_arr); 

// if ($sendmail) {
     $this->redirect( lang('please_check_mail_username'), "forgot-password", TRUE);

// } else { 
//  $this->redirect( lang('failed_to_send_email'), 'forgot-password', FALSE);
// }
 } 
 $data['title'] = lang('forgot_username');  
 $this->loadView($data);
}

private function verify_forgot_username() { 
  $this->form_validation->set_rules('mail',lang('email_address'), 'required|is_exist[user_info.email]');
  $result =  $this->form_validation->run();

  return $result;
}


public function login_With_otp()
{
  $data['title'] = lang('login_with_otp');  
  $site_details = $this->Base_model->getCompanyInformation();
  $this->load->model('Zone_model');
  $data['default_phone_code'] = $this->Zone_model->CountryIdToPhoneCodeAndName($site_details['country_id']);
  $this->loadView($data);
}
public  function CheckValidMobileNumber() {
  if ($this->input->is_ajax_request()) {
     $mobile=$this->input->post('mobile');
     $user_available = $this->Login_model->isUserMobileNumberAvailable($mobile);
     if ($user_available) {

        $response['status'] = TRUE;
        $response['msg'] = lang('valid_mobile_number');
        $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
        exit();     
    }
    else{
        $response['status'] = FALSE;
        $response['msg'] = lang('invalid_mobile_number');
        $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
        exit(); 
    }

} 

}
function get_Phone_ajax() {

  if ($this->input->is_ajax_request()) {
     $post = $this->input->post();
     $post['q'] = element('q', $post) ? $post['q'] : '';
     $json = $this->Base_model->getAllPhoneCodeAuto($post['q'],'');
     echo json_encode($json);
 }
}


public function OTP_login() 
{  
  if($this->input->is_ajax_request()){
     $login_details = $this->input->post(); 
     $mobile = $login_details['mobile'];
            // $login_details = $this->security->xss_clean( $login_details );
     $user_available = $this->Login_model->isUserMobileNumberAvailable($mobile);
     if($user_available){
        $login_result = $this->Login_model->login_otp( $mobile );
        if ($login_result) { 
           $log_user_type = $login_result[0]->user_type;
           if( ( $log_user_type != 'admin' ) && $this->MAINTENANCE_MODE == 1){

              $response['status'] = FALSE;
              $response['msg'] = $this->MAINTENANCE_TEXT;;
              $this->output
              ->set_status_header(200)
              ->set_content_type('application/json', 'utf-8')
              ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
              ->_display();
              exit();    
          }

          $this->Login_model->setUserSessionDatas($login_result);
          $this->session->set_userdata('site_social_login', NULL);
          if($this->session->userdata('site_logged_in')){
              $this->Base_model->insertIntoActivityHistory($login_result[0]->user_id, $login_result[0]->user_id, 'Successfull login');

              $response['status'] = TRUE;
              $response['location'] = base_url(). $log_user_type.'/dashboard';
              $this->output
              ->set_status_header(200)
              ->set_content_type('application/json', 'utf-8')
              ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
              ->_display();
              exit();    
          } 

      } else {
       $response['status'] = FALSE;
       $response['msg'] = '<p class="text-red">'.lang('invalid_user').'</p>';
       $this->output
       ->set_status_header(200)
       ->set_content_type('application/json', 'utf-8')
       ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
       ->_display();
       exit();   
   }    
}else{
    $response['status'] = FALSE;
    $response['msg'] = lang('invalid_mobile_number');
    $this->output
    ->set_status_header(200)
    ->set_content_type('application/json', 'utf-8')
    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    ->_display();
    exit(); 
}

}
}
public function lock_screen()
{
  $data['title'] = lang('lock_screen');
  $this->session->unset_userdata('site_logged_in');
  $data['datas'] = $this->session->userdata('item');
  $data['details'] = $this->Base_model->getUserDetails($data['datas']['user_id'],'user_photo');
  $this->loadView($data);
}
}