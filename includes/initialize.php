<?php
// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'failed');

defined('LIB_ROOT') ? null : define('LIB_ROOT', './includes');
defined('LIB_ROOT1') ? null : define('LIB_ROOT1', '../includes');
define('ROOT_DIR', dirname(__DIR__, 1));
// load config file first
require_once(LIB_ROOT . DS . 'config/defines.inc.php');
require_once(LIB_ROOT . DS . 'config.php');
// load basic functions next so that everything after can use them
require_once(LIB_ROOT . DS . 'functions.php');
// Load Utils Classes
require_once(LIB_ROOT . DS . 'utils/Request.php');
require_once(LIB_ROOT . DS . 'utils/Session.php');
require_once(LIB_ROOT . DS . 'lib/Utils.php');
require_once(LIB_ROOT . DS . 'lib/Model.php');
require_once(LIB_ROOT . DS . 'lib/Authentication.php');
require_once(LIB_ROOT . DS . 'PHPMailer/Exception.php');
require_once(LIB_ROOT . DS . 'PHPMailer/PHPMailer.php');
require_once(LIB_ROOT . DS . 'PHPMailer/SMTP.php');
// Load model classes
require_once(LIB_ROOT . DS . 'model/SettingModel.php');
require_once(LIB_ROOT . DS . 'model/UserModel.php');
require_once(LIB_ROOT . DS . 'model/UserProfileModel.php');
require_once(LIB_ROOT . DS . 'model/ComplementModel.php');
$request = new Request();
$auth = new Authentication();


$dash_settings = SettingModel::repo()->find(1);
$img_path = 'images/users/';
$url = $dash_settings->url;
$company_name = $dash_settings->company_name;
$syatem_title = $dash_settings->syatem_title;
$login_page_title = $dash_settings->login_page_title;
$copy_rights = $dash_settings->copy_rights;
$time_zone = $dash_settings->time_zone;
$system_email = $dash_settings->system_email;
$system_language = $dash_settings->system_language;

if ($system_language != "") {
	require_once(LIB_ROOT . DS . 'languages/' . $system_language . '.php');
	global $lang;
} else {
	require_once(LIB_ROOT . DS . 'languages/en.php');
	global $lang;
}

if ($auth->isLoggedIn()) {
	$user = $auth->getUser();
	$user_info = UserModel::repo()->find($user['id']);
	$username = $user_info->firstname . ' ' . $user_info->lastname;
}

$favicon_image_check = $dash_settings->favicon_image;
if ($favicon_image_check) {
	$favicon_image = $favicon_image_check;
} else {
	$favicon_image = 'favicon.png';
}
$logo_check = $dash_settings->logo;
if ($logo_check) {
	$logo = $logo_check;
} else {
	$logo = 'client-side-logo.png';
}
$login_page_logo = $dash_settings->login_page_logo;
$mobile_logo = $dash_settings->mobile_logo;
$system_currency = $dash_settings->system_currency;
$sc_arr = explode(",", $system_currency);
$currency_symbol = $sc_arr[1];
$currency = $sc_arr[0];

$datetime = today(date('d-m-Y'));

date_default_timezone_set($time_zone);
