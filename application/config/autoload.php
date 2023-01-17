<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
$autoload['packages'] = array();
 
$autoload['libraries'] = array('email','database','session','table','upload','user_agent' , 'form_validation' );
 
$autoload['drivers'] = array();
 
$autoload['helper'] = array('url','common_helper','form','html','date');
 
$autoload['config'] = array();
 
$autoload['language'] = array();
 
$autoload['model'] = array('Login_model','Dashboard_model','CommonModal');
