<?php

session_start();
// Check if a session has been started
if (session_id() == "") {
    // No session, redirect to the login page
    header('Location: login.php');
    exit;
}
// Check if the token session variable is set
if (!isset($_SESSION['token'])) {
    // No token, redirect to the login page
    header('Location: login.php');
    exit;
}
?>