<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Google {
	protected $CI;

	public function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->library('session');
		$this->CI->config->load('ssl');
		
		include_once 'Google/Google_Client.php';
		include_once 'Google/contrib/Google_Oauth2Service.php';

		$this->CI->googleClient = new Google_Client();
		$this->CI->googleClient->setApplicationName('Login to CodeCastra.com');
		$this->CI->googleClient->setClientId($this->CI->config->item('google_client_id'));
		$this->CI->googleClient->setClientSecret($this->CI->config->item('google_client_secret'));
		$this->CI->googleClient->setRedirectUri(base_url().$this->CI->config->item('google_redirect_url'));

		$this->CI->google_oauthV2 = new Google_Oauth2Service($this->CI->googleClient);

		


	}

	public function createAuthUrl(){
		return  $this->CI->googleClient->createAuthUrl();

	}
	public function getUserInfo() {
		return $this->CI->google_oauthV2->userinfo->get();
	}


	public function getAuthenticate($code = null) {
		return $this->CI->googleClient->authenticate($code);
	}
	
	public function getAccessToken() {
		return $this->CI->googleClient->getAccessToken();
	}
	
	public function setAccessToken($accessToken) {
		return $this->CI->googleClient->setAccessToken($accessToken);
	}
	
	public function revokeToken() {
		return $this->CI->googleClient->revokeToken();
	}
	
	
}