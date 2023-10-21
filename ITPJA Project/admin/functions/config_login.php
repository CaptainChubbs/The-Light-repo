<?php
// Path: functions/config_login.php
include __DIR__.'/../vendor/autoload.php';

// Google API configuration
define('GOOGLE_CLIENT_ID', '1053196319965-irhs4pprplgm8uk9nrunj3esqmlvsmpt.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
define('GOOGLE_REDIRECT_URL', 'https://cb9c-41-71-55-176.ngrok-free.app/ITPJA3_Project/admin/index.php');

// Start session
if (!session_id()) {
    session_start();


}

// Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Abahlengi');
$gClient->setClientId(GOOGLE_CLIENT_ID);
$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
$gClient->setRedirectUri(GOOGLE_REDIRECT_URL);
$gClient->addScope('email');
$gClient->addScope('profile');


$gservice = new Google_Service_Oauth2($gClient);