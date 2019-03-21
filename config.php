<?php
/*** Configuration ***/
ini_set('display_errors', 'on');
error_reporting(E_ALL);

$host = $_SERVER['HTTP_HOST'];
$root = $_SERVER['DOCUMENT_ROOT'];

define('HOST', 'http://'.$host);
define('ROOT', $root);

define('CONTROLLER', ROOT.'/controller/');
define('MODEL', ROOT.'/model/');
define('VIEW', ROOT.'/view/');

define('CSS', HOST.'/public/css/');
define('IMAGE', HOST.'/public/images/');
define('JS', HOST.'/public/js/');
