<?php
session_start();
include("../../config/connect.php");


if (!isset($_POST['email'], $_POST['password'])) {
    // Could not get the data that should have been sent.
    exit('Please fill both the username and password fields!');
}

if ($stmt = $con->prepare('SELECT clientID, password FROM client WHERE email = ? AND active = 1')) {

    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    // Store the result
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($clientId, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Password verification
        if (password_verify($_POST['password'], $password)) {
            // Verification success! User has logged-in!
            // session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['clientID'] = $clientId;
            header("location: index.php");
        } else {
            // Send an alert to the login.php page
            echo '<div class="alert alert-danger">This account is not registered or still needs to be activated <a href="nurse-login.php">Login</a></div>';
            header("location:client-login.php?loginFailed=true");
        }
    } else {
        // Incorrect username
        echo 'Incorrect username and/or password!';
        // header("location: client-login.php");
    }
    $stmt->close();
}
