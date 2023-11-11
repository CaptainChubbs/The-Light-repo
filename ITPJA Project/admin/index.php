<?php
include __DIR__.'/vendor/autoload.php';

require(__DIR__.'/./functions/config_login.php');

if (isset($_GET['code'])) {

    // Get the access token
    $client->authenticate($_GET['code']);
    $token = $client->getAccessToken();
    $refresh_token = $client->getRefreshToken();
    $_SESSION['token'] = $token;
    $_SESSION['logged_in'] = true;
    header('Location: home.php');

}
elseif(isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == true) {
    header('Location: home.php');
}
else{
    header('Location: login.php');
}