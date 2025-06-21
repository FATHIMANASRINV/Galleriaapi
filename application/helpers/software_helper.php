<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
if ( ! function_exists('value_by_key'))
{
	function value_by_key($key)
	{
		return get_instance()->software->getSettingValueByKey($key);
	}
}


if ( ! function_exists('log_user_id'))
{ 
	function log_user_id()
	{
		return get_instance()->software->log_user_id();
	}
}

if ( ! function_exists('log_customer_id'))
{ 
	function log_customer_id()
	{
		return get_instance()->software->log_customer_id();
	}
}
 
if ( ! function_exists('log_user_type'))
{ 
	function log_user_type()
	{
		return get_instance()->software->log_user_type();
	}
}

 
if ( ! function_exists('admin_user_id'))
{ 
	function admin_user_id()
	{
		return get_instance()->software->admin_user_id();
	}
}


if ( ! function_exists('log_user_name'))
{ 
	function log_user_name()
	{
		return get_instance()->software->log_user_name();
	}
}

if ( ! function_exists('log_dept_id'))
{ 
	function log_dept_id()
	{
		return get_instance()->software->log_dept_id();
	}
}


if ( ! function_exists('theme_folder'))
{ 
	function theme_folder($user_type)
	{
		return get_instance()->software->theme_folder($user_type);
	}
}
 
if ( ! function_exists('assets_url'))
{
	/**
	 * Assets URL
	 *
	 * Create a local Assets URL based on your basepath.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function assets_url($uri = '', $protocol = NULL)
	{
		$assets_folder = get_instance()->config->item('assets_folder');

		return get_instance()->config->base_url() . $assets_folder . '/'.$uri;
	}
}

if ( ! function_exists('current_uri'))
{
	/**
	 * CURRENT URL String
	 *
	 * Returns the CURRENT URI .
	 *
	 * @return	string
	 */
	function current_uri()
	{
		return  get_instance()->router->class. '/' .get_instance()->router->method;
	}
}

if ( ! function_exists('current_class'))
{
	/**
	 * CURRENT CLASS String
	 *
	 * Returns the URI segments.
	 *
	 * @return	string
	 */
	function current_class()
	{
		return  get_instance()->router->class;
	}
} 

if ( ! function_exists('current_method'))
{
	/**
	 * CURRENT METHOD String
	 *
	 * Returns the URI segments.
	 *
	 * @return	string
	 */
	function current_method()
	{
		return  get_instance()->router->method;
	}
}

if ( ! function_exists('current_full_url'))
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
}

