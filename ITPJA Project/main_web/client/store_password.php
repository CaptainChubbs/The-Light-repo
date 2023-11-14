<?php
// Error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// echo $_POST['new_password'];
// echo $_POST['confirm_password'];


include "../../config/connect.php";
if (isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    if ($_POST['new_password'] != $_POST['confirm_password']) {
        echo 'Passwords do not match!';
    } else {
        $password = $_POST['new_password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = $_POST['token']; // Assuming you have a 'token' field in your form3
        $stmt = $con->prepare("UPDATE nurse SET `password` = ?, token = NULL, activation_expiry = NULL WHERE token = ?");
        $stmt->bind_param("ss", $hash, $token);

        if ($stmt->execute()) {
            echo 'Your password has been reset!';
        } else {
            echo 'Password update failed: ' . $stmt->error;
        }
        $stmt->close();
    }
} else {
    exit("Invalid");
}
