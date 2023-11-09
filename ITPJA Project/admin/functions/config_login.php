<?php

// Path: functions/config_login.php
include __DIR__.'/../vendor/autoload.php';
// Start the session
session_start();



// Create a Google client object
$client = new Google_Client();
$client->setAuthConfig(__DIR__.'/../credentials.json');
$client->setAccessType('offline');
$client->setIncludeGrantedScopes(true);
$client->addScope('email');
$client->addScope('profile');
$client->addScope('https://www.googleapis.com/auth/gmail.readonly');
$client->addScope('https://www.googleapis.com/auth/gmail.compose');
$client->addScope('https://www.googleapis.com/auth/gmail.send');
$client->addScope('https://www.googleapis.com/auth/gmail.modify');
