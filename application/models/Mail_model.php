<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_model extends Base_Model 
{

	public function __construct() {
		parent::__construct();
	}

	public function sendEmails($type = 'notification', $mail_arr = array()) 
	{

		if($type=='user_checkout')
		{
			$user_id = $mail_arr["user_id"];
			$user_email_id = $this->getUserInfoField('email', $user_id);
		}
		else
			$user_email_id =$mail_arr['email'];
        // $user_id = $mail_arr["user_id"];
        // $user_email_id = $this->getUserInfoField('email', $user_id);
		if ( $user_email_id =="" || !SEND_EMAIL)
		{

			$data["message"] = "Mail Settings is off!";
			return $data;
		}
		$this->load->library('Phpmailer', NULL, 'phpmailer');

		$this->load->model("Settings_model");
		$language_name = "english";
		$this->lang->load('mail', $language_name);

		$user_full_name = element('fullname', $mail_arr) ? $mail_arr['fullname'] : null;


		$site_info = $this->getCompanyInformation();
		$attachments = NULL;
		$smtp_data = array();
		// $mail_details = $this->getMailSettings();

		$mail_details['type'] = "smtp";

		if ($mail_details['type'] == "smtp") {

			$smtp_data = array(
				"SMTPAuth" => TRUE,
				"SMTPDebug" => "0",
				"SMTPSecure" => 'ssl',
				"Host" => 'smtp.googlemail.com',
				"Port" => '465',
				"Username" => 'akhilsignaturelab@gmail.com',
				"Password" => 'ymhqgoyevsvxobpp',
				"Timeout" => '5',
				// "SMTPDebug" => 3 //uncomment this line to check for any errors
			);
		}


		$content = $this->getEmailContent($type);
		$mail_altbody = html_entity_decode($content);
		$mailBodyDetails = $mail_altbody; 

		$mail_to = array("email" => $user_email_id, "name" => $user_full_name);
		$mail_from = array("email" => $site_info['email'], "name" => $site_info['name']);
		$mail_reply_to = $mail_from;
		$mail_subject = "Notification";

		$mailBodyHeaderDetails = $this->getHeaderDetails($site_info);

		if ($type == "registration") {

			$full_name = $this->getFullName($mail_arr['user_id']);
			$mailBodyDetails = str_replace("{full_name}", $full_name, $mailBodyDetails);
			$mailBodyDetails = str_replace("{user_name}", $mail_arr["username"], $mailBodyDetails);
			$mailBodyDetails = str_replace("{password}", $mail_arr["password"], $mailBodyDetails);
			$mailBodyDetails = str_replace("{secure_pin}", $mail_arr["secure_pin"], $mailBodyDetails);

			$mail_subject = "Welcome to our team";
		}    
		else if ($type == "forgot_password") {
			$mailBodyDetails = str_replace("{keyword}", $mail_arr["keyword"], $mailBodyDetails); 
			$mail_subject = lang("mail_reset_password_confirm");
		}
		else if ($type == "forgot_username") {
			$mailBodyDetails = str_replace("{username}", $mail_arr["user_name"], $mailBodyDetails); 
			$mail_subject = lang("forgot_username");
		}
		else if ($type == "invite_mail") {
			$mailBodyDetails = str_replace("{email}", $mail_arr["email"], $mailBodyDetails);
			$mail_subject = 'Invitaion letter ';
		}   
		else if ($type == "user_checkout") {

			$user_name = $this->getUserName($user_id);      
			$mailBodyDetails = str_replace("{full_name}", $mail_arr['full_name'], $mailBodyDetails);
			
			$mailBodyDetails = str_replace("{admin_full_name}", $user_full_name, $mailBodyDetails);
			
			
			$mail_subject =lang('user_checkout');
		}  

		$mailBodyDetails = str_replace("{server_ip}", $this->input->server('REMOTE_ADDR'), $mailBodyDetails);
		$mailBodyDetails = str_replace("{fullname}", $user_full_name, $mailBodyDetails);
		$mailBodyDetails = str_replace("{company_name}", $site_info['name'], $mailBodyDetails);
		$mailBodyDetails = str_replace("{company_address}", $site_info['address'], $mailBodyDetails);
		$mailBodyDetails = str_replace("{company_email}", $site_info['email'], $mailBodyDetails);
		$mailBodyDetails = str_replace("{company_phone}", $site_info['phone'], $mailBodyDetails); 

		$mailBodyFooterDetails = $this->getFooterDetails($site_info);
		$mailBodyFooterDetails = str_replace("{user_email}", $user_email_id, $mailBodyFooterDetails);
		$mail_full_content = $mailBodyHeaderDetails . $mailBodyDetails . $mailBodyFooterDetails ;
        // $this->rollback();


		$send_mail = $this->phpmailer->send_mail($mail_from, $mail_to, $mail_reply_to, $mail_subject, $mail_full_content, $mail_altbody, $mail_details['type'], $smtp_data, $attachments);
		$mgClient = Mailgun::create('cffb0e7c08cf8c38db1442b01daadf07-5bb33252-3a8cd9cd', 'https://api.mailgun.net');
		$domain = "mails.btcclub.com";
		$params = array(
			'from' => 'Angelnetwork <info@btcclub.com>',
			'to'      => "$user_full_name<$user_email_id>",
			'subject' => $mail_subject,
			'html'    => $mail_full_content
		);
		$mgClient->messages()->send($domain, $params);
		return TRUE;
		return $data;
	} 


	public function getMailSettings(){
		$smtp_details = array();
		$this->db->select('*');
		$this->db->from('mail_settings');
		$query = $this->db->get();
		foreach($query->result_array() as $row)
		{
			$smtp_details = $row; 
		}
		return $smtp_details;
	}


	function getEmailContent($type='NA'){
		$content  =NULL;
		$this->db->select('content');
		$this->db->where('type', $type);
		$query = $this->db->get('mail_contents');
		foreach ($query->result_array() as $row) {
			$content = $row['content'];
		}

		if ($type == "registration") {
			$mailBodyDetails = '<h3 style="color:#53565a;">'. lang("mail_congratulation") .' </h3>
			<p style="color:#53565a;line-height:180%;font-family:Open Sans,Helvetica,sans-serif;font-size:14px;font-weight:normal;margin:0 0 15px;padding:0">
			'. lang("mail_dear") .' <strong>{full_name},</strong>
			<br>
			<br>
			<strong>You have made right decision at the right time and chosen the great company who has offered you great avenues of financial freedom that you have been seeking for so long.</strong>
			<table width="100%" cellspacing="0" cellpadding="10" border="1">
			<tbody>
			<tr>
			<th scope="col"  mc:edit="data_table_heading00" width="25%" valign="top">
			'. lang("user_name") .'
			</th>
			<th scope="col" mc:edit="data_table_heading01" width="25%" valign="top" >
			{user_name}
			</th> 
			</tr>
			<tr mc:repeatable="">
			<th  mc:edit="data_table_content00" valign="top">
			'. lang("password") .'
			</th>
			<th  mc:edit="data_table_content01" valign="top">
			{password}
			</th>
			</tr>
			<tr mc:repeatable="">
			<th  mc:edit="data_table_content00" valign="top">
			'. lang("Security Pin") .'
			</th>
			<th  mc:edit="data_table_content01" valign="top">
			{secure_pin}
			</th>
			</tr>
			</tbody>
			</table>

			<h5 class="m_-4808757542982372404red" style="font-size:11px;letter-spacing:1px;text-transform:uppercase;color:#c01818">
			<a href="'. base_url() .'" target="_blank">Access Account</a>
			</h5>
			</p>';
		}   
		else if ($type == "forgot_password") { 
			$mailBodyDetails = '<h3 style="color:#53565a;">'. lang("mail_reset_password_confirm") .' </h3>
			<p style="color:#53565a;line-height:180%;font-family:Open Sans,Helvetica,sans-serif;font-size:14px;font-weight:normal;margin:0 0 15px;padding:0">
			'. lang("mail_dear") .' <strong>{fullname},</strong>
			<br>
			<br>
			'. lang("mail_forgot_password_para_1") .'
			<br />
			'. lang("mail_forgot_password_para_2") .'
			<h5 class="m_-4808757542982372404red" style="font-size:11px;letter-spacing:1px;text-transform:uppercase;color:#c01818">
			<a href="'.base_url().'login/reset-password/{keyword}" target="_blank">'. lang("button_reset_password") .'</a>
			</h5>
			</p>';
		}
		else if ($type == "forgot_username") { 
			$mailBodyDetails = '<h3 style="color:#53565a;">'. lang("forgot_username") .' </h3>
			<p style="color:#53565a;line-height:180%;font-family:Open Sans,Helvetica,sans-serif;font-size:14px;font-weight:normal;margin:0 0 15px;padding:0">
			'. lang("mail_dear") .' <strong>{fullname},</strong>
			<br>
			<br>
			'. lang("mail_forgot_username_para_1") .'
			<br />
			'. lang("mail_forgot_username_para_2") .'
			</p>';
		} 
		else if ($type == "invite_mail") { 
			$mailBodyDetails = '
			<p style="color:#53565a;line-height:180%;font-family:Open Sans,Helvetica,sans-serif;font-size:14px;font-weight:normal;margin:0 0 15px;padding:0">
			'. lang("mail_dear") .' <strong>{fullname},</strong>
			<br>
			<strong>you are invited by your friend. <br>click to join the below link <br> </strong><strong>https://falcon.com/invited</strong>
			';
		}
		else if ($type == "user_checkout") { 
			$mailBodyDetails = '<tr>
			<td align="center" valign="top">
			<table border="0" cellpadding="10" cellspacing="0" width="600" id="templateBody">
			<tr>
			<td valign="top" width="180" id="templateSidebar">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
			<td valign="top">

			<table border="0" cellpadding="20" cellspacing="0" width="100%" class="sidebarContent">
			<tr>
			<td valign="top" style="padding-left:10px;">
			<div mc:edit="std_content01">
			
			<br />
			
			<br />
			
			
			</div>
			</td>
			</tr>
			</table>
			</td>
			</tr>
			</table>
			</td> 
			<td valign="top" class="bodyContent">
			<table border="0" cellpadding="10" cellspacing="0" width="100%">
			<tr>
			<td valign="top" style="padding-left:0;">
			<div mc:edit="std_content00">
			
			
			<br>
			'. lang("mail_dear") .' <strong>{admin_full_name},</strong>
			<br>
			<br>
			{full_name}
			'.lang("user_checkout").'
			
			<br />
			<br />
			</div>
			</td>
			</tr>
			</table>
			</td>
			</tr>
			</table>
			</td>
			</tr>';
		}
		return $mailBodyDetails;

	}




	public function getHeaderDetails($site_info) {
		$site_logo = $site_info['logo'];
		$company_name = $site_info['name'];

		$mailBodyHeaderDetails = '<!DOCTYPE html PUBLIC >
		<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>'. $company_name .'</title>
		</head>
		<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
		<center>
		<table>
		<tbody><tr style="margin:0">
		<td class="m_-6385192254922120283container" style="box-sizing:border-box;font-family:Open Sans,Helvetica,sans-serif;font-size:14px;vertical-align:top;display:block;width:100%;max-width:600px;margin:0 auto;padding:0" width="100%" valign="top">

		<div class="m_-6385192254922120283content" style="box-sizing:border-box;display:block;width:100%;margin:0 auto;padding:0">



		<br>
		<table class="m_-6385192254922120283card" style="box-sizing:border-box;border-collapse:collapse;width:100%;background-color:#ffffff;border:1px solid #e6e7e8" width="100%" bgcolor="#ffffff">
		<tbody><tr style="margin:0">
		<td style="box-sizing:border-box;font-family:Open Sans,Helvetica,sans-serif;font-size:14px;vertical-align:top;padding:0" valign="top">

		<table class="m_-6385192254922120283header-twocol" style="box-sizing:border-box;border-collapse:collapse;width:100%;border-bottom-width:1px;border-bottom-color:#e6e7e8;border-bottom-style:solid" width="100%">
		<tbody><tr style="margin:0">
		<td style="box-sizing:border-box;font-family:Open Sans,Helvetica,sans-serif;font-size:11px;vertical-align:middle;padding:20px" width="60%" valign="middle" align="left">
		<img src="'.assets_url().'images/logo/logo.png" alt="'. $company_name .'" style="display:block" class="CToWUd">
		</td>

		<td style="box-sizing:border-box;font-family:Open Sans,Helvetica,sans-serif;font-size:11px;vertical-align:middle;padding:20px" width="40%" valign="middle" align="right">
		<a href="'.base_url().'" style="box-sizing:border-box;color:#53565a;text-decoration:none;text-transform:uppercase;font-size:11px;letter-spacing:1px;line-height:1" target="_blank" >MY ACCOUNT</a>
		</td>

		</tr>
		</tbody></table>
		</td>
		</tr>

		<tr class="m_-6385192254922120283center-on-narrow" style="margin:0">
		<td class="m_-6385192254922120283pad-big" style="box-sizing:border-box;font-family:Open Sans,Helvetica,sans-serif;font-size:14px;vertical-align:top;padding:8%" valign="top">';
		return $mailBodyHeaderDetails;
	}

	public function getFooterDetails($site_info) {

		$mailBodyFooterDetails ='
		</td>
		</tr>
		</tr>
		</tbody></table></div>
		</td>
		</tr>
		</tbody>
		</table>';

		return $mailBodyFooterDetails;
	}


	public function getUserMessages($user_id='', $mail_id='',$read_status='',$from_id='',$to_id='',$starred='',$limit='') {
		$messages = array();
		$this->db->select('*')
		->from('internal_mail im')
		->join('user_info ui','ui.user_id=im.to_user')
		->where('im.status', 'yes')
		->order_by('im.date', 'desc');
		if($user_id)
			$this->db->where('im.to_user', $user_id);
		if($from_id)
			$this->db->where('im.from_user', $from_id);
		if($to_id)
			$this->db->where('im.to_user', $to_id);
		if($mail_id)
			$this->db->where('im.id', $mail_id);
		if($read_status)
			$this->db->where('im.read_status', $read_status);
		if($starred)
			$this->db->where('im.starred', $starred);
		
		$query = $this->db->get();

		foreach ($query->result_array() as $row) 
		{
			$row['flag'] = 1;
			$row['fullname'] = $row['first_name']. ' '.$row['second_name'];
			$row['from_user_name'] = $this->Base_model->getUserName($row['from_user']);

			$row['enc_id'] = $this->Base_model->encrypt_decrypt('encrypt',$row['id']);
			$row['enc_from_id'] = $this->Base_model->encrypt_decrypt('encrypt',$row['from_user']);
			$message = html_entity_decode($row['message']);
			$row['message'] = $this->Base_model->textAreaLineBreaker($message);
			
			$row['message1'] =substr($row['message'],0,20);
			$row['date']= date("M d", strtotime($row["date"]));

			if( element( 'user_photo', $row )){
				$img_path = $this->config->item('assets_folder').'/images/profile/'. $row['user_photo'] ;
				if (!file_exists( $img_path)) {
					$row['user_photo'] = 'nophoto.png';
				} 
				$row['profile_pic'] =$row['user_photo'];
			}

			if($mail_id)
			{
				return $row;
			}
			$messages[] = $row;
		}
		return $messages;
	}
	public function sendMessage($user_id, $subject, $message, $date, $from_user,$type="",$attachment='') {
		$data = array(
			'to_user' => $user_id,
			'from_user' => $from_user,
			'subject' => $subject,
			'message' => $message,
			'date' => $date,
			'type' => $type,
			'attachment' => $attachment
		);
		$res = $this->db->insert('internal_mail', $data);
		$this->db->cache_delete('admin', 'mail');
		$this->db->cache_delete('user', 'mail');
		return $res;
	}
	public function updateMail($id='',$user_id='')
	{
		$this->db->set('status','no');
		if($id)
			$this->db->where('id',$id);
		if($user_id)
		{
			$this->db->where('to_user',$user_id);

		}
		$res = $this->db->update('internal_mail');
		$this->db->cache_delete('admin', 'mail');
		$this->db->cache_delete('user', 'mail');
		// echo $this->db->last_query();die();
		return $res;
	}
	public function updateReadStatus($id='',$user_id='')
	{
		$this->db->set('read_status','yes');
		if($id)
		{
			$this->db->where('id',$id);
		}
		if($user_id)
		{
			$this->db->where('to_user',$user_id);

		}
		$res = $this->db->update('internal_mail');
		// echo $this->db->last_query($res);die();
		return $res;
	}
	public function updateStarred($id,$status)
	{
		$this->db->set('starred',$status);
		if($id)
			$this->db->where('id',$id);

		$res = $this->db->update('internal_mail');
		// echo $this->db->last_query();die();
		return $res;
	}
	public function sendFrontEndEmails($type = 'notification', $mail_arr = array()) 
	{
		$user_email_id = $mail_arr['email'];
		if ( $user_email_id =="" || !SEND_EMAIL)
		{
			$data["message"] = "Mail Settings is off!";
			return $data;
		}
		$this->load->library('phpmailer', NULL, 'phpmailer');
		$this->load->model("Settings_model");

		$user_full_name = $mail_arr['email'];

		$site_info = $this->Settings_model->getCompanyInformation();

		$attachments = [];
		$smtp_data = array();
		$mail_details = $this->getMailSettings();
// print_r($mail_details);die();
		$mail_details['type'] = "mail";

// 		if ($mail_details['type'] == "smtp") {
// 			$smtp_data = array(
// 				"SMTPAuth" => TRUE,
// 				"SMTPSecure" => 'ssl',
// 				"Host" => 'smtp.googlemail.com',
// 				"Port" => '465',
// 				"Username" => 'akhilsignaturelab@gmail.com',
// 				"Password" => 'mwbocougfwazlfbd',
// 				"Timeout" => '7',
//                 // "SMTPDebug" => 3 //uncomment this line to check for any errors
// 			);
// 		}

		if ($mail_details['type'] == "smtp") {

			$smtp_data = array(
				"SMTPAuth" => $mail_details['authentication'],
				"SMTPSecure" => ($mail_details['protocol'] == "none") ? "" : $mail_details['protocol'],
				"Host" => $mail_details['host'],
				"Port" => $mail_details['port'],
				"Username" => $mail_details['username'],
				"Password" => $mail_details['password'],
				"Timeout" => $mail_details['timeout'],
// "SMTPDebug" => 3 //uncomment this line to check for any errors
			);
		}
		$content = $this->getFrontEmailContent($type);
		$mail_altbody = html_entity_decode($content);
		$mailBodyDetails = $mail_altbody; 
		$mail_to = array("email" => $user_email_id, "name" => $user_full_name);
		$mail_from = array("email" => $site_info['email'], "name" => $site_info['name']);
		$mail_reply_to = $mail_from;
		$mail_subject = "Notification";

		$mailBodyHeaderDetails = $this->getFrontHeaderDetails($site_info);

		if ($type == "registrations") {
			$user_id=$mail_arr['user_id'];
			$user_id_encrypted = $this->Base_model->encrypt_decrypt('encrypt',$user_id);
			$mailBodyDetails = str_replace("{full_name}", $mail_arr['full_name'], $mailBodyDetails);
			$mailBodyDetails = str_replace("{user_name}", $mail_arr['email'], $mailBodyDetails);
			$mailBodyDetails = str_replace("{password}", $mail_arr["password"], $mailBodyDetails);
			$mailBodyDetails = str_replace("{user_id_encrypted}", $user_id_encrypted, $mailBodyDetails);
			$mail_subject = "Registration Info! ";

		} 
		
		else if ($type == "forgot_password") {
			$mailBodyDetails = str_replace("{keyword}", $mail_arr["keyword"], $mailBodyDetails);
			$mailBodyDetails = str_replace("{company_name}", $mail_arr["company_name"], $mailBodyDetails);
			$mail_subject = "Reset Password";
		} 
		else if ($type == "order_confirmation") {
			
			$mailBodyDetails = str_replace("{date}", $mail_arr['date'], $mailBodyDetails);
			$mailBodyDetails = str_replace("{count}", $mail_arr['count'], $mailBodyDetails);
			$mailBodyDetails = str_replace("{order_number}", $mail_arr['order_number'], $mailBodyDetails);
			$mailBodyDetails = str_replace("{address}", $mail_arr['address'], $mailBodyDetails);
			$mailBodyDetails = str_replace("{full_name}", $mail_arr['full_name'], $mailBodyDetails);
			$mailBodyDetails = str_replace("{user_name}", $mail_arr['email'], $mailBodyDetails);
			$mailBodyDetails = str_replace("{contents}", $mail_arr['contents'], $mailBodyDetails);
			$mailBodyDetails = str_replace("{total_amount}", cur_format($mail_arr['total_amount']), $mailBodyDetails);


			$mail_subject = "Thank you for your order   {$mail_arr['order_number']}! ";

		} 
		else if ($type == "order_confirmation_to_admin") {
			
			$mailBodyDetails = str_replace("{date}", $mail_arr['date'], $mailBodyDetails);
			$mailBodyDetails = str_replace("{count}", $mail_arr['count'], $mailBodyDetails);
			$mailBodyDetails = str_replace("{order_number}", $mail_arr['order_number'], $mailBodyDetails);
			$mailBodyDetails = str_replace("{address}", $mail_arr['address'], $mailBodyDetails);
			$mailBodyDetails = str_replace("{full_name}", $mail_arr['full_name'], $mailBodyDetails);
			$mailBodyDetails = str_replace("{user_name}", $mail_arr['email'], $mailBodyDetails);
			$mailBodyDetails = str_replace("{customer_email}", $mail_arr['customer_email'], $mailBodyDetails);
			$mailBodyDetails = str_replace("{enc_order_id}", $mail_arr['enc_order_id'], $mailBodyDetails);
			$mailBodyDetails = str_replace("{contents}", $mail_arr['contents'], $mailBodyDetails);
			$mailBodyDetails = str_replace("{total_amount}", cur_format($mail_arr['total_amount']), $mailBodyDetails);


			$mail_subject = "Thank you for your order   {$mail_arr['order_number']}! ";

		} 	

		$mailBodyDetails = str_replace("{server_ip}", $this->input->server('REMOTE_ADDR'), $mailBodyDetails);
		$mailBodyDetails = str_replace("{fullname}", $user_full_name, $mailBodyDetails);
		$mailBodyDetails = str_replace("{company_name}", $site_info['name'], $mailBodyDetails);
		$mailBodyDetails = str_replace("{company_address}", $site_info['address'], $mailBodyDetails);
		$mailBodyDetails = str_replace("{company_email}", $site_info['email'], $mailBodyDetails);
		$mailBodyDetails = str_replace("{company_phone}", $site_info['phone'], $mailBodyDetails);
		$mailBodyFooterDetails = $this->getFrontFooterDetails($site_info);
		$mailBodyFooterDetails = str_replace("{user_email}", $user_email_id, $mailBodyFooterDetails);
		$mail_full_content = $mailBodyHeaderDetails . $mailBodyDetails . $mailBodyFooterDetails ;
// 		print_r($user_email_id);die();
// 		$send_mail = $this->phpmailer->send_mail($mail_from, $mail_to, $mail_reply_to, $mail_subject, $mail_full_content, $mail_altbody, $mail_details['type'], $smtp_data, $attachments);
// 		if (!$send_mail['status']) {
// 			$data["message"] = "Error: " . $send_mail['ErrorInfo'];
// 		} else {
// 			$data["message"] = "Message sent correctly!";
// 		}

		$header = "From:info@shippexvip.com \r\n";  
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html\r\n";

		$send_mail = mail ($user_email_id,$mail_subject,$mail_full_content,$header);



		if (!$send_mail) {
			$data["message"] = "Error: " ;
		} else {
			$data["message"] = "Message sent correctly!";
		}
// 		if ($type == "forgot_password") {
// 		    print_r($send_mail);die();
// 		}
		
		return $data;
	}

	public function getFrontHeaderDetails($site_info) {
		$site_logo = $site_info['logo'];
		$company_name = $site_info['name'];
		$mailBodyHeaderDetails = '<!DOCTYPE html>
		<html lang="en" style="margin: 0;padding: 0;box-sizing: border-box;">
		<head style="margin: 0;padding: 0;box-sizing: border-box;">
		</head>
		<body style="margin: 20px auto;padding: 0;box-sizing: border-box;text-align: center;width: 650px;font-family: &quot;Nunito Sans&quot;, sans-serif;background-color: #e2e2e2;display: block;position: relative;">
		<table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color: #fff;width: 100%;margin: 0;padding: 0;box-sizing: border-box;border-collapse: collapse;border-spacing: 0;">
		<tbody style="margin: 0;padding: 0;box-sizing: border-box;">
		<tr style="margin: 0;padding: 0;box-sizing: border-box;">
		<td style="margin: 0;padding: 0;box-sizing: border-box;">
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0;padding: 0;box-sizing: border-box;border-collapse: collapse;border-spacing: 0;">
		<tr class="header" style="margin: 0;padding: 0;box-sizing: border-box;">
		<td align="left" valign="top">
		<img src="'. assets_url() .'store/images/logo.png" class="main-logo" style="margin: 0;padding: 0;box-sizing: border-box;width: 200px;height: auto;">
		</td>
		<td class="menu" align="right" style="margin: 0;padding: 16px calc(12px + (26 - 12) * ((100vw - 320px) / (1920 - 320)));box-sizing: border-box;margin-top: 6px;width: 100%;display: block;text-align: left;padding-top: 0;padding-bottom: 0;">
		<ul style="margin: 0;padding: 0;box-sizing: border-box;list-style: none;">
		<li style="margin: 0;padding: 0;box-sizing: border-box;display: inline-block;margin-left: calc(10px + (20 - 10) * ((100vw - 320px) / (1920 - 320)));margin-right: calc(5px + (20 - 5) * ((100vw - 320px) / (1920 - 320)));"><a href="'. base_url() .'" style="margin: 0;padding: 0;box-sizing: border-box;text-decoration: none;font-weight: bold;font-size: 14px;line-height: 19px;color: #252525;text-transform: capitalize;">Home</a></li>
		<li style="margin: 0;padding: 0;box-sizing: border-box;display: inline-block;margin-left: calc(10px + (20 - 10) * ((100vw - 320px) / (1920 - 320)));margin-right: calc(5px + (20 - 5) * ((100vw - 320px) / (1920 - 320)));"><a href="javascript:void(0)" style="margin: 0;padding: 0;box-sizing: border-box;text-decoration: none;font-weight: bold;font-size: 14px;line-height: 19px;color: #252525;text-transform: capitalize;">Whishlist</a></li>
		<li style="margin: 0;padding: 0;box-sizing: border-box;display: inline-block;margin-left: calc(10px + (20 - 10) * ((100vw - 320px) / (1920 - 320)));margin-right: calc(5px + (20 - 5) * ((100vw - 320px) / (1920 - 320)));"><a href="'. base_url('website/cart') .'" style="margin: 0;padding: 0;box-sizing: border-box;text-decoration: none;font-weight: bold;font-size: 14px;line-height: 19px;color: #252525;text-transform: capitalize;">my cart</a></li>
		<li style="margin: 0;padding: 0;box-sizing: border-box;display: inline-block;margin-left: calc(10px + (20 - 10) * ((100vw - 320px) / (1920 - 320)));margin-right: calc(5px + (20 - 5) * ((100vw - 320px) / (1920 - 320)));"><a href="'. base_url('contact-us') .'" style="margin: 0;padding: 0;box-sizing: border-box;text-decoration: none;font-weight: bold;font-size: 14px;line-height: 19px;color: #252525;text-transform: capitalize;">Contact</a></li>
		</ul>
		</td>
		</tr>
		</table>
		</td>
		</tr>';
		return $mailBodyHeaderDetails;
	}

	function getFrontEmailContent($type='NA'){
		$content  =NULL;
		$this->db->select('content');
		$this->db->where('type', $type);
		$query = $this->db->get('mail_contents');
		foreach ($query->result_array() as $row) {
			$content = $row['content'];
		}

		if ($type == "registrations") {
			$mailBodyDetails = ' 
			
			<tr style="margin: 0;padding: 0;box-sizing: border-box;">
			<td class="banner" style="margin: 0;padding: 0;box-sizing: border-box;position: relative;">
			<table style="margin: 0;padding: 0;box-sizing: border-box;border-collapse: collapse;border-spacing: 0;">
			<tr style="margin: 0;padding: 0;box-sizing: border-box;">
			<td colspan="2" style="margin: 0;padding: 0;box-sizing: border-box;"><img style="width: 100%;margin: 0;padding: 0;box-sizing: border-box;margin-bottom: -6px;" src="'. assets_url() .'images/banner/banner5.jpg" alt="banner"></td>
			</tr>
			</table>
			</td>
			</tr>

			<tr style="margin: 0;padding: 0;box-sizing: border-box;">
			<td class="section-t" style="position: relative;padding: 0 calc(15px + (88 - 15) * ((100vw - 320px) / (1920 - 320)));margin: 0;box-sizing: border-box;margin-top: calc(25px + (32 - 25) * ((100vw - 320px) / (1920 - 320)));display: block;">
			<table style="width: 100%;margin: 0;padding: 0;box-sizing: border-box;border-collapse: collapse;border-spacing: 0;">
			<tr style="margin: 0;padding: 0;box-sizing: border-box;">
			<td style="margin: 0;padding: 0;box-sizing: border-box;text-align:left;">
			<h2 style="color:#616A6B">Hi {full_name},</h2>
			<h3>Welcome To {company_name}..</h3>
			<p class="pera" style="margin: 0;padding: 0;box-sizing: border-box;font-weight: 600;font-size: 14px;line-height: calc(21px + (23 - 21) * ((100vw - 320px) / (1920 - 320)));text-align: left;margin-bottom: -4px;color:black;">
			We hope our product will lead you, like many other before you. to a place where yourideas where your ideas can spark and grow.n a place where you’ll find all your inspiration
			needs. before we get started, we’ll need to verify your email.
			<br>
			</p>
			</td>
			</tr>
			</table>
			</td>
			</tr>

			<tr style="margin: 0;padding: 0;box-sizing: border-box;">
			<td class="section-t" style="margin: 0;padding: 0;box-sizing: border-box;margin-top: calc(25px + (32 - 25) * ((100vw - 320px) / (1920 - 320)));display: block;">
			<a href="'.base_url().'signup/verify-email/{user_id_encrypted}" style="margin: 0;padding: calc(10px + (14 - 10) * ((100vw - 320px) / (1920 - 320))) calc(24px + (43 - 24) * ((100vw - 320px) / (1920 - 320)));box-sizing: border-box;text-decoration: none;font-weight: bold;font-size: calc(17px + (20 - 17) * ((100vw - 320px) / (1920 - 320)));line-height: calc(22px + (27 - 22) * ((100vw - 320px) / (1920 - 320)));display: inline-block;color: #ffffff;background: #ff4c3b;border-radius: 6px;">Verify Email</a>
			<br>
			</td>
			</tr>
			';
		}
		else if ($type == "forgot_password") { 
			$mailBodyDetails = '
			<tr>
			</tr>
			<tr>
			<td class="section-t" style="position: relative;margin-top: calc(25px + (32 - 25) * ((100vw - 320px) / (1920 - 320)));
			display: block; padding: 0 calc(15px + (88 - 15) * ((100vw - 320px) / (1920 - 320)))">
			<table style="width: 100%;border-collapse: collapse;
			border-spacing: 0;text-align:left;">
			<tr>
			<td>
			<h1 class="heading-1" style="margin-bottom: 6px;margin-left:10px;font-size: 16px;line-height: calc(17px + (20 - 17) * ((100vw - 320px) / (1920 - 320)));color: #252525;">'. 'RESET PASSWORD' .' </h1>
			<br />
			<br />

			'. 'Dear' .' <strong>{company_name},</strong>
			<br>
			<br>
			Please check below link to reset your {company_name}  password,
			<br>
			</td>
			</tr>
			</table>
			</td>
			</tr>

			<tr>
			<td class="section-t" style="margin-left:230px;margin-top: calc(25px + (32 - 25) * ((100vw - 320px) / (1920 - 320)));
			display: block;">
			<br>
			<a href="'.base_url().'login/reset/{keyword}" class="button-solid" style="font-weight: bold;font-size: calc(17px + (20 - 17) * ((100vw - 320px) / (1920 - 320)));line-height: calc(22px + (27 - 22) * ((100vw - 320px) / (1920 - 320)));display: inline-block;color: #ffffff;background: #ff4c3b;border-radius: 6px;padding: calc(10px + (14 - 10) * ((100vw - 320px) / (1920 - 320))) calc(24px + (43 - 24) * ((100vw - 320px) / (1920 - 320)));text-decoration: none;margin-right:250px;">Reset Password</a>
			</td>
			</tr>';
		}
		else if ($type == "order_confirmation") {

			$mailBodyDetails = '
			<table align="center" border="0" cellpadding="0" cellspacing="0"
			style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
			<tbody>
			<tr>
			<td>
			<table align="left" border="0" cellpadding="0" cellspacing="0" style="text-align: left;margin-top: 30px"
			width="100%">
			<tr>
			<td style="text-align: center;">
			<img src="'. assets_url() .'images/icon/delivery-2.png" alt="" style="margin-bottom: 30px;">
			</td>
			</tr>
			<tr>
			<td>
			<p style="font-size: 14px;"><b>Hi {full_name},</b></p>
			<p style="font-size: 14px;">Order Is Successfully Processsed And Your Order Is On The
			Way,</p>
			<p style="font-size: 14px;"></p>
			</td>
			</tr>
			</table>

			<table cellpadding="0" cellspacing="0" border="0" align="left"
			style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
			<tbody>
			<tr>
			<td
			style="background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 50%;">
			<h5
			style="font-size: 16px; font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">
			Your Shipping Address</h5>
			<p
			style="text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">
			{address}</p>
			</td>
			<td><img src="'. assets_url() .'images/icon/space.jpg" alt=" " height="25" width="30">
			</td>
			<td
			style="background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 50%;">
			<h5
			style="font-size: 16px;font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">
			Your Billing Address:</h5>
			<p
			style="text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">
			{address}</p>
			</td>
			</tr>
			</tbody>
			</table>
			<table class="order-detail" border="0" cellpadding="0" cellspacing="0" align="left"
			style="width: 100%;    margin-bottom: 50px;margin-top: 30px;border: 1px solid #ddd;
			border-collapse: collapse;">
			<tr align="left" style:" border-top: 1px solid #ddd;
			border-bottom: 1px solid #ddd;">
			<th style="style="font-size: 16px;
			padding: 15px;
			text-align: center;
			background: #fafafa;">PRODUCT</th>
			<th style="padding-left: 15px;font-size: 16px;
			padding: 15px;
			text-align: center;
			background: #fafafa;">DESCRIPTION</th>
			<th style="font-size: 16px;
			padding: 15px;
			text-align: center;
			background: #fafafa;">QUANTITY</th>
			<th style="font-size: 16px;
			padding: 15px;
			text-align: center;
			background: #fafafa;">PRICE </th>
			</tr>
			{contents}
			<tr class="pad-left-right-space " style="border: unset !important;">
			<td class="m-t-5" colspan="2" align="left" style="padding: 5px 15px;">
			<p style="font-size: 14px;">Subtotal : </p>
			</td>
			<td class="m-t-5" colspan="2" align="right" style="padding: 5px 15px;">
			<b style>{total_amount}</b>
			</td>
			<tr class="pad-left-right-space"style="border: unset !important;">
			<td colspan="2" align="left"style="padding: 5px 15px;" >
			<p style="font-size: 14px;">Shipping Charge:</p>
			</td>
			<td colspan="2" align="right"style="padding: 5px 15px;">
			<b>0</b>
			</td>
			</tr>
			<tr class="pad-left-right-space"style="border: unset !important;">
			<td colspan="2" align="left"style="padding: 5px 15px;">
			<p style="font-size: 14px;">Discount :</p>
			</td>
			<td colspan="2" align="right"style="padding: 5px 15px;">
			<b>0</b>
			</td>
			</tr>
			<tr class="pad-left-right-space "style="border: unset !important;">
			<td class="m-b-5" colspan="2" align="left"style="padding: 5px 15px;">
			<p style="font-size: 14px;">Total :</p>
			</td>
			<td class="m-b-5" colspan="2" align="right"style="padding: 5px 15px;">
			<b>{total_amount}</b>
			</td>
			</tr>

			</table>


			</td>
			</tr>

			';
		}	else if ($type == "order_confirmation_to_admin") {

			$mailBodyDetails = '
			<tr>
			<td align="center" valign="top">
			<table border="0" cellpadding="10" cellspacing="0" width="600" id="templateBody">
			<tr>
			<td valign="top" width="180" id="templateSidebar">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
			<td valign="top">

			<table border="0" cellpadding="20" cellspacing="0" width="100%" class="sidebarContent">
			<tr>
			<td valign="top" style="padding-left:10px;">
			<div mc:edit="std_content01">
			
			<td valign="top" class="bodyContent">
			<table border="0" cellpadding="10" cellspacing="0" width="100%">
			<tr>
			<td valign="top" style="padding-left:0;text-align:left;">
			<div mc:edit="std_content00">


			<br>
			<strong></strong>
			<br>

			<br />
			You have  been received a new order (Order Number : {order_number}) from {customer_email}.
			<br>
			

			</div>
			</td>
			</tr>
			</table>
			</td>
			</tr>
			</table>
			</td>
			</tr>
			<tr>
			<td style="padding-top:0; padding-bottom:0;" valign="top">

			<table width="100%" cellspacing="0" cellpadding="10" border="0">
			<tbody>
			<tr>
			<td valign="top">
			<h2 >ORDERED: ({date})</h2>
			<table class="templateDataTable"  width="100%" cellspacing="0" border="0" style="padding: 10px;">
			<tbody> 
			<tr>
			<td valign="top" style="padding-left:0; border-right: 1px solid #909090;">
			<div mc:edit="std_content00">
			<h3>ORDER SUMMARY</h3>
			<p> Order Number: {order_number}</p>
			<p> Order Total : {total_amount}</p>
			<p></p>
			</div>
			</td>
			<td style="vertical-align: baseline; padding-left: 9px;">
			<h3>SHIPPING ADDRESS</h3>
			<p> {full_name}</p>
			<p> {address}</p>
			</td>
			</tr>								
			</tbody>
			</table>
			</td>
			</tr>
			<tr>
			<td style="padding-top:0; padding-bottom:0;" valign="top">
			<table width="100%" cellspacing="0" cellpadding="10" border="0">
			<tbody>
			<tr>
			</tr>
			</tbody>
			</table>
			</td>
			</tr>
			</tbody>
			</table> 
			</td>
			</tr>
			';
		}	
		return $mailBodyDetails;

	}
	public function getFrontFooterDetails($site_info) {
		$site_email=$site_info['email'];
		$companyname=$site_info['name']; 

		$mailBodyFooterDetails ='   <tr style="margin: 0;padding: 0;box-sizing: border-box;text-align:left;color:grey;">
		<td class="section-t" style="padding: 0 calc(15px + (46 - 15) * ((100vw - 320px) / (1920 - 320)));margin: 0;box-sizing: border-box;margin-top: calc(25px + (32 - 25) * ((100vw - 320px) / (1920 - 320)));display: block;color: #939393;text-align:left;">
		<p class="pera" style="margin: 0;padding: 0;box-sizing: border-box;font-weight: 600;font-size: 14px;line-height: calc(21px + (23 - 21) * ((100vw - 320px) / (1920 - 320)));text-align: left;color: #5D6D7E;margin-bottom: -4px;">
		<br>
		If you have any question, please email us at <a href="mailto: '. $site_email .'" style="margin: 0;padding: 0;box-sizing: border-box;text-decoration: none;font-weight: bold;text-decoration-line: underline;color: #ff4c3b;"> info@shippexvip.com </a> or visit our <a href="'. base_url('faq') .'" style="margin: 0;padding: 0;box-sizing: border-box;text-decoration: none;font-weight: bold;text-decoration-line: underline;color: #ff4c3b;"> FAQs.</a> You can also chat with a real
		live human during our operating hours. they can answer questions about account or help you with your meditation practice.
		</p>
		<br>
		</td>
		</tr>

		<tr style="margin: 0;padding: 0;box-sizing: border-box;text-align: center;">
		<td colspan="2" class="section-t" style="background-color: #212121;padding: calc(20px + (26 - 20) * ((100vw - 320px) / (1920 - 320))) 0;margin: 0;box-sizing: border-box;margin-top: calc(25px + (32 - 25) * ((100vw - 320px) / (1920 - 320)));display: block;">
		<table class="footer" style="background-color: #212121;margin: 0;padding: 0;box-sizing: border-box;border-collapse: collapse;border-spacing: 0;position: relative;width: 100%;color:white;">
		<tr style="margin: 0;padding: 0;box-sizing: border-box;">
		<td class="footer-content" style="margin: 0;padding: 0;box-sizing: border-box;">
		<table border="0" cellpadding="0" cellspacing="0" class="text-center" align="center" style="vertical-align: middle;margin: 0 auto;width: 326px;padding: 0;box-sizing: border-box;border-collapse: collapse;border-spacing: 0;">
		<tr class="social" style="margin: 0;padding: 0;box-sizing: border-box;">
		<td style="margin: 0 calc(7px + (10 - 7) * ((100vw - 320px) / (1920 - 320)));padding: 0;box-sizing: border-box;width: calc(18px + (20 - 18) * ((100vw - 320px) / (1920 - 320)));height: calc(18px + (20 - 18) * ((100vw - 320px) / (1920 - 320)));display: inline-block;">
		<a href="'. $site_info['facebook'] .'" style="margin: 0;padding: 0;box-sizing: border-box;text-decoration: none;font-weight: 800;font-size: calc(11px + (12 - 11) * ((100vw - 320px) / (1920 - 320)));line-height: 23px;text-align: center;letter-spacing: 0.5px;"><img src="'. assets_url() .'images/icon/fb.png" alt="fb" style="margin: 0;padding: 0;box-sizing: border-box;width: 100%;margin-top:10px;"></a>
		
		<a href="'. $site_info['instagram'] .'" style="margin: 0;padding: 0;box-sizing: border-box;text-decoration: none;font-weight: 800;font-size: calc(11px + (12 - 11) * ((100vw - 320px) / (1920 - 320)));line-height: 23px;text-align: center;letter-spacing: 0.5px;"><img src="'. assets_url() .'images/icon/insta.png" alt="insta" style="margin: 0;padding: 0;box-sizing: border-box;width: 100%;margin-top:10px;"></a>
		
		<a href="'. $site_info['twitter'] .'" style="margin: 0;padding: 0;box-sizing: border-box;text-decoration: none;font-weight: 800;font-size: calc(11px + (12 - 11) * ((100vw - 320px) / (1920 - 320)));line-height: 23px;text-align: center;letter-spacing: 0.5px;"><img src="'. assets_url() .'images/icon/twitter-w.png" alt="twitter" style="margin: 0;padding: 0;box-sizing: border-box;width: 100%;margin-top:10px;"></a>
		</td>
		</tr>
		<td style="margin: 0;padding: 0;box-sizing: border-box;font-size: 10px;">
		<p style="color:white;margin: 0;padding: 0;box-sizing: border-box;font-weight: 100;font-size: calc(11px + (12 - 11) * ((100vw - 320px) / (1920 - 320)));line-height: 23px;text-align: center;letter-spacing: 0.5px;color: #e4e4e4;margin-top: 15px;text-transform: ;">This Email Was Created Using The '. $companyname .'. Made With by Design '. $companyname .'.</p>
		</td>
		</tr>
		</table>
		</td>
		</tr>
		</table>
		</td>
		</tr>
		</tbody>
		</table>
		</body>
		</html>

		';
		return $mailBodyFooterDetails;
	}

}
