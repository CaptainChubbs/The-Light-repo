<?php
include("connect.php");
require_once('config.php');
require_once('vendor/google/auth/autoload.php');


if (!isset($_POST['email'], $_POST['password'])) {
    // Could not get the data that should have been sent.
    exit('Please fill both the username and password fields!');
}

if ($stmt = $con->prepare('SELECT nurseID, password FROM nurse WHERE email = ?')) {

    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    // Store the result
    $stmt->store_result();
    if (count($_POST) > 0) {
        $stmt->bind_result($nurseId, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Password verification
        if (password_verify($_POST['password'], $password)) {
            // Verification success! User has logged-in!
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['nurseID'] = $nurseId;
            header("location: nurse-portal.php");
        } else {
            // Send an alert to the login.php page
            header("location:login.php?loginFailed=true");
        }
    } else {
        // Incorrect username
        echo 'Incorrect username and/or password!';
        header("location: nurse-login.php");
    }

    $stmt->close();
}

if ($stmt = $con->prepare('SELECT first_name, password FROM client WHERE email = ?')) {

    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    // Store the result
    $stmt->store_result();
    if (count($_POST) > 0) {
        $stmt->bind_result($first_name, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Password verification
        if (password_verify($_POST['password'], $password)) {
            // Verification success! User has logged-in!
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['first_name'] = $first_name;
            header("location: client-portal.php");
        } else {
            // Send an alert to the login.php page
            header("location:login.php?loginFailed=true");
        }
    } else {
        // Incorrect username
        echo 'Incorrect username and/or password!';
        header("location: client-login.php");
    }

    $stmt->close();
}
