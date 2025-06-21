<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Autocomplete extends Base_Controller {

	function __construct()
	{
		parent::__construct(); 	
	}

	function user_filter()
	{ 
		$keyword = $this->input->post('keyword'); 
		$user_arr = $this->Base_model->getfilteredUsers($keyword,20);
		echo json_encode($user_arr);
	}
	function getUser_ajax()
	{ 
		if ($this->input->is_ajax_request()) {
			$post = $this->input->post();
			$this->load->model('Settings_model');
			$json = $this->Settings_model->getAllUsers($post);
			echo json_encode($json);
		}
	}
	
	function order_full_user()
	{ 
		$post_arr = $this->input->post(); 
		$user_arr = $this->Base_model->getFullUserSelect2($post_arr,20);
        // print_r($user_arr);die();
		echo json_encode($user_arr);
	}

	function getAllUser_ajax()
	{ 
		if ($this->input->is_ajax_request()) {
			$post = $this->input->post();
			$post['status'] = 'all';
			$this->load->model('Settings_model');
			$json = $this->Settings_model->getAllUsersName($post);
			echo json_encode($json);
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
	public function get_user_message()
	{
		if ($this->input->is_ajax_request()) {

			$draw = $this->input->post('draw');
			// sleep(3);
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
	function getState_ajax()
	{ 
		if ($this->input->is_ajax_request()) {
			$post = $this->input->post();
			$this->load->model('Member_model');
			$json = $this->Member_model->getAllStates($post);
			echo json_encode($json);
		}
	}

	function product_categories()
	{ 
		$post_arr = $this->input->post(); 
		$user_arr = $this->Base_model->getCategoriesSelect2($post_arr,20);
		echo json_encode($user_arr);
	}
	function getRoiUser_ajax()
	{ 
		if ($this->input->is_ajax_request()) {
			$post = $this->input->post();
			$this->load->model('Settings_model');
			$json = $this->Settings_model->getAllRoiUsers($post);
			echo json_encode($json);
		}
	}
}