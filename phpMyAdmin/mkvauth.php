<?php
if(!isset($_GET['callback'])){
    $client->setAccessToken($_SESSION['access_token']);
//TODO: Redirect to OAuth Server to finsh the log in.
//Do not forget to include callback=1 in your redirect_uri parameter
}else{
// make the cookie reachable :
session_set_cookie_params(0, '/', '', 0);
// same as in config.inc.php : 
session_name('SignonSession');
session_start();

//TODO: Get user's mysql username and password
$username = '';
$password = '';

$_SESSION['PMA_single_signon_user'] = $username;
$_SESSION['PMA_single_signon_password'] = $password;
$_SESSION['PMA_single_signon_host'] = 1; // If you have more than 1 host in config.inc.php, please specify host here

// save changes :
session_write_close();
// finally redirect to phpMyAdmin :
header('Location: index.php?server=1');
}

