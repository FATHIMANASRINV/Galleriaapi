<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Network extends Base_Controller {

	function __construct()
	{
		parent::__construct(); 	
	}

	function index()
	{    
		$data['title'] = lang('dashboard');  
		$this->loadView($data);
	}

	function referral_link()
	{    
		$data['title'] = lang('dashboard');  
		$this->loadView($data);
	}

	function genealogy_tree()
	{    
		$user_id = $this->input->get('user_id');
		if(!isset($user_id)){
			$user_id = log_user_id(); 
			$user_name = log_user_name();
		}
		else{
			$user_id = $this->Base_model->encrypt_decrypt('decrypt',$user_id);
			$user_name = $this->Base_model->getUserName($user_id);
		}
		if($this->input->post("view_user_tree") ){
			$this->form_validation->set_rules('user_id', lang('text_user'), 'trim|required'); 
			if($this->form_validation->run() ){
				$post_array = $this->input->post(); 
				$user_name = $this->Base_model->getUserName($post_array['user_id']);
				$user_id = $post_array['user_id'];
			}
		}

		$data['user_id'] = $user_id;
		$data['enc_id'] = $this->Base_model->encrypt_decrypt('encrypt',$user_id);
		$data['user_name'] = $user_name;
		$data['title'] = lang('genealogy_tree');  
		$this->loadView($data);
	}

	function referral_tree()
	{   
		$user_id = $this->input->get('user_id');
		if(!isset($user_id)){
			$user_id = log_user_id(); 
			$user_name = log_user_name();
		}
		else{
			$user_id = $this->Base_model->encrypt_decrypt('decrypt',$user_id);
			$user_name = $this->Base_model->IdToUserName($user_id);
		}
		if($this->input->post("view_user_tree") ){
			$this->form_validation->set_rules('user_id', lang('text_user'), 'trim|required'); 
			if($this->form_validation->run() ){
				$post_array = $this->input->post(); 
				$user_name = $this->Base_model->getUserName($post_array['user_id']);
				$user_id = $post_array['user_id'];
			}
		}

		$data['user_id'] = $user_id;
		$data['enc_id'] = $this->Base_model->encrypt_decrypt('encrypt',$user_id);
		$data['user_name'] = $user_name;
		$data['title'] = lang('referral_tree');  
		$this->loadView($data);
	}

	function level_base_list()
	{    
		$user_id = log_user_id();
		$user_name = log_user_name();
		$user_level = $this->Base_model->getTreeLevel($user_id,'sponsor_tree');


		if($this->input->post("view_user_tree") ){
			$this->form_validation->set_rules('user_id', lang('text_user'), 'trim|required'); 
			if($this->form_validation->run()){
				$post_array = $this->input->post(); 

				$user_name = $this->Base_model->getUserName($post_array['user_id']);
				// print_r($post_array);
				// die();

				if (element('level',$post_array)) {
					$users['level'.$post_array['level']] = $this->Network_model->TotalDownlineUsers($post_array['user_id'],$user_level,$post_array['level']);
					if(!empty($users['level'.$post_array['level']]))
					{
						$level_users['level'.$post_array['level']] = $users['level'.$post_array['level']];
						$level_users['level'.$post_array['level']]['count'] = count($users['level'.$post_array['level']]);
						$level_users['level'.$post_array['level']]['user_level'] = $post_array['level'];
					}
					else
					{
						$level_users = 0;

					}
					$data['post_array'] = $post_array;
					$data['level_users'] = $level_users;

				}else
				{
					$level_users=array();
					for($i=1 ;$i<=5;$i++){
						$users['level'.$i] = $this->Network_model->TotalDownlineUsers($user_id,$i);
						if(!empty($users['level'.$i]))
						{
							$level_users['level'.$i] = $users['level'.$i];
							$level_users['level'.$i]['count'] = count($users['level'.$i]);
							$level_users['level'.$i]['user_level'] = $i;
						}
					}
					$data['level_users'] = $level_users;
				}
			}
		}else
		{

			$level_users=array();
			for($i=1 ;$i<=5;$i++){
				$users['level'.$i] = $this->Network_model->TotalDownlineUsers($user_id,$user_level,$i);
				if(!empty($users['level'.$i]))
				{
					$level_users['level'.$i] = $users['level'.$i];
					$level_users['level'.$i]['count'] = count($users['level'.$i]);
					$level_users['level'.$i]['user_level'] = $i;
				}
			}
			$data['level_users'] = $level_users;
		}


		$data['user_id'] = $user_id;
		$data['user_name'] = $user_name;
		$data['title'] = lang('level_base_searching_list');  
		$this->loadView($data);
	}

	

	function view_network() {
		$post_array = $this->input->post(); 
		$user_id =  $this->Base_model->encrypt_decrypt('decrypt',$post_array['user_id']);

		if ($this->Base_model->isUserExist($user_id)) {
			$tree_type = $post_array['tree'];
			$this->Network_model->getAllTreeUsers($user_id, $tree_type);
			$data['tree_member'] = $this->Network_model->tree_member;
			$data['tree_type'] = $tree_type;
			$data['user_id'] = $user_id;
			$this->loadView($data);
		} else {
			echo lang('invalid_user_name');
			die();
		}
	}

	public function invite_friend(){
		$data=$this->Network_model->getReferralBonus();
		$data['referral_bonus'] = $data[5]['value'];

		if ($this->input->post('submit')) {

			$post_arr = $this->input->post(); 

			$mail_arr = array(
				'email' => $post_arr['email'],
				'first_name' => $post_arr['email']
			);

			$this->load->model('Mail_model');
			$result=$this->Mail_model->sendEmails('invite_mail', $mail_arr);

			if($result){
				$msg = lang('invitaion_send_successfully');
				$this->redirect($msg, 'network/invite-friend', TRUE);
			}
			else{ 
				$msg = lang('try_again');
				$this->redirect($msg, 'network/invite-friend', FALSE);
			}

		}
		$data['title'] = lang('invite_a_friend');
		$this->loadView($data);

	}

	function validate_invite()
	{
		$this->form_validation->set_rules('email', lang('email'), 'required|valid_email');

		$validation_result = $this->form_validation->run();

		return $validation_result;
	}

	function hierarchical_view()
	{  
		$data['title'] = lang('hierarchical_view');  
		$this->loadView($data);
	}

	function hierarchical_json(){ 
		
		$id=$this->Base_model->encrypt_decrypt('decrypt',$this->input->get('id'));
		if($id){
			$downlines=$this->Network_model->getUsersDowlinesnew($id);
		}else{
			$downlines=$this->Network_model->getUsersDowlinesnew(log_user_id());
		}
		echo $downlines;
	}
}

