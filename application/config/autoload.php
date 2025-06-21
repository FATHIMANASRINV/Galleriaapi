<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
$autoload['packages'] = array();
 
$autoload['libraries'] = array( 'smartie' => 'smarty', 'session','form_validation', 'Currency', 'Software','database');
 
$autoload['drivers'] = array();
 
$autoload['helper'] = array('url', 'file', 'language', 'currency', 'software', 'array');

$autoload['config'] = array('jwt');
 
$autoload['language'] = array();
 
$autoload['model'] = array('Base_model');
