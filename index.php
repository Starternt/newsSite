<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
session_start();

require_once(ROOT.'/components/Autoload.php');
// Front controller
$router = new Router();
$router->run();