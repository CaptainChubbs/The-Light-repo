<?php
require_once './ITPJA Project/vendor/autoload.php';
include "connect.php";

// Google API configuration
define('GOOGLE_CLIENT_ID', '179667321074-u40or9pqp1cf3q29k0afsunsnf2rs51o.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
define('GOOGLE_REDIRECT_URL', 'http://localhost/the-light-repo-main/ITPJA%20Project/nurse-portal.php');

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
$gClient->addScope('https://www.googleapis.com/auth/calendar');
$gClient->addScope('https://www.googleapis.com/auth/chat.bot');
$gClient->addScope('https://www.googleapis.com/auth/chat.read');


$gservice = new Google_Service_Oauth2($gClient);

// Get the access token
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $gClient->setAccessToken($_SESSION['access_token']);
}