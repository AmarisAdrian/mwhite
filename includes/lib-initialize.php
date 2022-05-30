<?php
// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'failed');

defined('LIB_ROOT') ? null : define('LIB_ROOT', '../includes');
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
require_once(LIB_ROOT . DS . 'PHPMailer/Exception.php');
require_once(LIB_ROOT . DS . 'PHPMailer/PHPMailer.php');
require_once(LIB_ROOT . DS . 'PHPMailer/SMTP.php');

// load core objects
require_once(LIB_ROOT . DS . 'lib/Model.php');
require_once(LIB_ROOT . DS . 'lib/Authentication.php');

/* Para mejorar */
require_once(LIB_ROOT . DS . 'core.php');
require_once(LIB_ROOT . DS . 'file_manager.php');
// require_once(LIB_ROOT . DS . 'libmodel.php');
// require_once(LIB_ROOT . DS . 'executor.php');

// Load model classes
require_once(LIB_ROOT . DS . 'model/CreditModel.php');
require_once(LIB_ROOT . DS . 'model/SettingModel.php');
require_once(LIB_ROOT . DS . 'model/UserModel.php');
require_once(LIB_ROOT . DS . 'model/UserProfileModel.php');
require_once(LIB_ROOT . DS . 'model/ProvinceModel.php');
require_once(LIB_ROOT . DS . 'model/CityModel.php');
require_once(LIB_ROOT . DS . 'model/ComplementModel.php');

$request = new Request();
$auth = new Authentication();


// Get Settings
$dash_settings = SettingModel::repo()->find(1);
$syatem_title = $dash_settings->syatem_title;
$base_url = $dash_settings->url;
$img_path = 'images/users/';
$copy_rights = $dash_settings->copy_rights;
$company_name = $dash_settings->company_name;

// echo $dash_settings->toJson();die;

// $url = $dash_settings->url;
// 
// $login_page_title = $dash_settings->login_page_title;
// 
$time_zone = $dash_settings->time_zone;
// $system_email = $dash_settings->system_email;
// $system_language = $dash_settings->system_language;


if ($auth->isLoggedIn()) {
	$user = $auth->getUser();
	$user_info = UserModel::repo()->find($user['id']);
	$username = $user_info->firstname . ' ' . $user_info->lastname;
}

if ($dash_settings->system_language != "") {
	require_once(LIB_ROOT . DS . 'languages/' . $dash_settings->system_language . '.php');
	global $lang;
} else {
	require_once(LIB_ROOT . DS . 'languages/en.php');
	global $lang;
}

/* Setting favicon  */
$favicon_image_check = $dash_settings->favicon_image;
if ($favicon_image_check) {
	$favicon_image = $favicon_image_check;
} else {
	$favicon_image = 'favicon.png';
}

/* Setting logo  */
$logo_check = $dash_settings->logo;
if ($logo_check) {
	$logo = $logo_check;
} else {
	$logo = 'client-side-logo.png';
}

/* Setting timezone  */
date_default_timezone_set($dash_settings->time_zone);
$date_today = today(date('d-m-Y'));

/* Countries  */
$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
