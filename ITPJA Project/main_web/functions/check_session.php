<?php

session_start();
// Check if a session has been started
if (session_id() == "" OR (!isset( $_SESSION["logged_in"]) OR $_SESSION["logged_in"] == FALSE)) {
    // No session, redirect to the login page
    header('Location: ./client/client-login.php');
    exit;
}
?>