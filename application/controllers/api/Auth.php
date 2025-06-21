<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once ("Api_Controller.php"); 

class Auth extends Api_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Login_model');
    }

    public function login()
    {   
        $dataPost = $this->input->post();
        if($this->validate_login()){
            $this->load->model('Login_model');
            $user = $this->Login_model->apiLogin($dataPost['wallet']); 
            if ( !empty($user) ) {
                $tokenData = array();
                $tokenData['user_id'] = $user['user_id'];
                unset($user['user_id']); 
                unset($user['password']); 
                if($user['user_photo'])
                {
                    $user['user_photo'] = $user['user_photo'] == 'nophoto.png' ? null : assets_url('images/profile/') . $user['user_photo'];
                }
                else
                {
                    $user['user_photo']=null;
                }
                $response['success'] = TRUE;
                $response['msg'] = 'loginSuccess'; 
                $user['token'] = Authorization::generateToken($tokenData);
                $response['data'] = $user;
                $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
                exit(); 
            }
            $response['success'] = false;
            $response['msg'] ='Authentication Failed';
            $response['error_msg'] = ['Invalid Credentials'=>'Authentication Failed'];
            $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
            exit(); 
        }elseif($error_array = $this->form_validation->error_array()){ 
            $response['success']= false;
            $response['msg'] = join(", ",$error_array);
            $response['error_msg'] = $error_array;
            $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
            exit(); 
        }
        $response['success'] = false; 
        $response['msg'] = 'Unauthorized';
        $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
        exit();
    }
    function validate_login() 
    {
        $this->form_validation->set_rules('user_name',  'User Name' , 'trim|required');
        $this->form_validation->set_rules('password', 'Password' , 'trim|required');
        $val_res = $this->form_validation->run();
        return $val_res;
    }
    
}
