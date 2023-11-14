<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Google services
require_once '../../vendor/autoload.php';
// load configuration file
// require_once 'config.php';

// Connect db
include "../../config/connect.php";



// activate user account
if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];
    // echo $token;

    $stmt = $con->prepare("SELECT clientID FROM client WHERE email = ? AND token = ?");
    $stmt->bind_param("ss", $email, $token);
    $stmt->execute();
    $stmt->store_result();


    if ($stmt->num_rows > 0) {
        $stmt = $con->prepare("UPDATE client SET token = NULL, activation_expiry = NULL, activatedAt = CURRENT_TIMESTAMP(), active = 1 WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->close();


        echo 'Your account has been activated, you can now login! <a href="client-login.php">Login</a>' ;
    } else {
        echo 'The url is either invalid or you already have activated your account!';
    }
} else {
    echo 'Invalid parameters provided!';
}
