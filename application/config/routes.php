<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['blog/(:any)'] = 'Home/blogdetails';
$route['about'] = 'Home/about';
$route['ashram-stay'] = 'Home/ashram_stay';
$route['shri-vidya'] = 'Home/shri_vidya';
$route['yoga-teacher-training-course'] = 'Home/yoga_teacher_training_course';
$route['divine-blessing-therapy'] = 'Home/divine_blessing_therapy';
$route['free-career-resources'] = 'Home/career';
$route['gallery'] = 'Home/gallery';
$route['CMA'] = 'Home/CMA';
$route['CA'] = 'Home/CA';
$route['ACCA'] = 'Home/ACCA';
$route['financial-modelling'] = 'Home/financial_modelling';
$route['stock-market-and-forex-trading'] = 'Home/Stock_trading';
$route['contact'] = 'Home/contact';
$route['select-gallery'] = 'Home/selectgallery'; 
