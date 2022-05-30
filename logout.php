<?php
$debug = true;
if ($debug) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

include('includes/loader.php');
require_once("includes/initialize.php");

if ($auth->isLoggedIn()) {

}
$auth->clearUser();
$auth->destroy();
header('location:' . $url);
