<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once 'vendor/autoload.php';

require 'LoginController2.php';
require 'accsetController.php';
require 'addnewsController.php';
// require 'RoleController.php';
// require 'UserController.php';


$server = new \Jacwright\RestServer\RestServer('debug');

$server->addClass('accsetController');
$server->addClass('RegistController');
$server->addClass('addnewsController');
// $server->addClass('RoleController');
// $server->addClass('UserController');
$server->handle();