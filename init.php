<?php
//include("classes/wfcart.php");
session_start();
 $lifetime=(3600 * 24 * 7);
  setcookie(session_name(),session_id(),time()+$lifetime);
//  print_r(session_get_cookie_params());

date_default_timezone_set('America/Los_Angeles');



//if(strlen($label['en']['page_title'])<3) header('Location: index.php');


//URL CHECK
//trying to avoid links like this /manual.php/info-15.php?id=169&title=hand+to+hand+-+Acro+Manual

if(isset($_SERVER['PATH_INFO']) && $_SERVER['SERVER_NAME'] != 'localhost') {

  $url = 'http://' . $_SERVER['SERVER_NAME']  . $_SERVER['SCRIPT_NAME'] . '?' . $_SERVER['QUERY_STRING'] ;
  //echo $url . '<hr>';

  header("Location: $url");
  die();


}



//LANGUAGE SWITCHER


//parse request string
/*
$lang =(isset($_SESSION['lang']))?$_SESSION['lang']:null;
if(isset($_REQUEST['lang'])) {

	$lang = $_REQUEST['lang'];

}
*/

//check local lang
/*
$user_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

switch ($user_lang) {
	    case 'es':
		$curLang = 'es';
		break;
	    case 'en':
		$curLang = 'en';
		break;
}
*/
$curLang = $lang =  'en';

//check user choice
/*
switch ($lang) {
	    case 'es':
		$curLang = 'es';
		break;
	    case 'en':
		$curLang = 'en';
		break;
	    default:
		$curLang = "en";
		break;
}
*/
$_SESSION['lang'] = $curLang;

//$lang = $currLang;

/* END OF LANGUAGE SWITCHER*/



include_once('classes/table.class.php');
$table = new tableManager();

include_once('classes/class.phpmailer.php');
include_once('classes/class.smtp.php');


//CONSTANTS FOR EMAIL SENDING (ALSO)
$admin_email = 'martin@flyinghighacrobatics.com';
$admin_name = 'Martin Kvist';
$site_name = 'Partner Acrobatics';
$site_url = 'partneracrobatics.com';
$site_title = 'Partner Acrobatics - the website to find acro training and community';




$currPageName = explode("/",$_SERVER['REQUEST_URI']);
$currPageName = $currPageName[(count($currPageName)-1)];


/* END MENU AND PAGES */




include('functions/auth.php');


/* FUNCTIONS */

include('functions/getContent.php');
include('functions/getSpokenLanguage.php');
include('functions/getPractitioner.php');
include('functions/errorHandler.php');




?>
