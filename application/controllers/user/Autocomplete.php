<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Autocomplete extends Base_Controller {

	function __construct()
	{
		parent::__construct(); 	
	}

	public function get_user_message()
	{
		if ($this->input->is_ajax_request()) {

			$draw = $this->input->post('draw');

			$data['recent_message'] = $this->Mail_model->getUserMessages(log_user_id(),'','no');
			$response['success'] = TRUE; 
			$response['recent_message'] = $this->smarty->view(log_user_type()."/dashboard/notification.tpl", $data, TRUE);
			$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
			exit();   
		} 
	}
	function getAmountType_ajax()
	{ 
		if ($this->input->is_ajax_request()) {
			$post = $this->input->post();
			$this->load->model('Report_model');
			$json = $this->Report_model->getAllAmtTypes($post);
			echo json_encode($json);
		}
	}
	function getUserDownline_ajax()
	{ 
		if ($this->input->is_ajax_request()) {
			$post = $this->input->post();
			$user_id=log_user_id();
			$users = $this->Base_model->getDownlineUserSearch($user_id,$post);
			echo json_encode($users);
		}
	}
	function getState_ajax()
	{ 
		if ($this->input->is_ajax_request()) {
			$post = $this->input->post();
			$this->load->model('Member_model');
			$json = $this->Member_model->getAllStates($post);
			echo json_encode($json);
		}
	}

}