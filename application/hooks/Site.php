<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DefaultPostLoader
{
	function initialize() {
		$CI =& get_instance();

		if (!in_array($CI->router->class, $CI->software->NO_MODEL_CLASS_PAGES)) 
		{ 
			$model = ucfirst($CI->router->class."_model");
			$CI->load->model($model);
		} 
		
		// $CI->set('CURRENCY_ID', $CI->currency->getId());
		// $CI->set('SIDE_MENU', $CI->SIDE_MENU);
		// $CI->set('SUPPORT_MENU', $CI->SUPPORT_MENU);

		// $CI->set('LANG_CODE', $CI->software->LANG_CODE);
		// $CI->set('LANG_ARR', $CI->LANG_ARR);   
		// $CI->set('LOGIN_LANG_ARR', $CI->LOGIN_LANG_ARR);   
		// $CI->set("LOGIN_LANG_ID", $CI->LOGIN_LANG_ID);
		$CI->data['LANG_ARR']=  $CI->LANG_ARR;   
		$CI->data['LANG_CODE']=  $CI->software->LANG_CODE;   
	}
} 

class LanguageLoader
{
	function initialize() {
		$CI =& get_instance();
		$CI->load->helper('language');
		$CI->load->model( 'Base_model' );
		$CI->LANG_ARR = $CI->Base_model->getLanguageDetails();
		$CI->LOGIN_LANG_ARR = $CI->Base_model->getLanguageDetails('', 'login_perm', 1);

		$lang_arr = array_column($CI->LANG_ARR, 'code', 'language_id');
		$CI->software->LANG_CODE = $lang_arr[$CI->software->LANG_ID];

		if(uri_string() == 'login/index' || uri_string() == ''){
		

			$lang_details = $CI->Base_model->getLanguageDetails($CI->LOGIN_LANG_ID, 'login_perm');

		}else{   
			$lang_details = $CI->Base_model->getLanguageDetails($CI->software->LANG_ID);
		}

		$language_name = $lang_details['directory'];

		$CI->lang->load('common', $language_name);

		if (!in_array($CI->router->class, $CI->software->NO_LANG_CLASS)) {
			$CI->lang->load($CI->router->class, $language_name);
		}
	}
}
/*if ( ! function_exists('current_full_url'))
{
	function current_full_url($field='')
	{
		$CI =& get_instance();

		$url = $CI->config->base_url($CI->uri->uri_string());

		$get = $CI->input->get(); 

		if(array_key_exists($field, $get)){	 
			unset($get[$field]);
			$QUERY_STRING =  http_build_query($get) . "\n";
			return $QUERY_STRING ? $url.'?'.$QUERY_STRING : $url; 
		}

		return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
	}
}*/
