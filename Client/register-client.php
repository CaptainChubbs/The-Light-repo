<?php
// Google services
// require_once '../vendor/autoload.php';
// // load configuration file
// require_once '../config.php';

// Connect db
include "../../config/connect.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// If client type is Individual
if (isset($_POST['form_type']) && $_POST['form_type'] == 'Individual') {
    // Check if all fields are filled
    if (!isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['dob'], $_POST['password'], $_POST['confirm_password'], $_POST['phone_number'], $_POST['address'], $_POST['city'], $_POST['province'], $_POST['postal_code']) && $_POST['password'] != $_POST['confirm_password']) {
        exit('Please complete the registration form!');
    }

    if (empty($_POST['first_name'] || $_POST['last_name'] || $_POST['email'] || $_POST['dob'] || $_POST['password'] || $_POST['confirm_password'] || $_POST['mobile_number'] || $_POST['address'])) {
        exit('Please complete the registration form!');
    }

    // Check if email is valid
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        exit('Email is not valid!');
    }

    $name = htmlspecialchars($_POST['first_name']);
    $lastName = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $dob = htmlspecialchars($_POST['dob']);
    $password = htmlspecialchars($_POST['password']);
    $confirmPassword = htmlspecialchars($_POST['confirm_password']);
    $phoneNumber = htmlspecialchars($_POST['phone_number']);
    $address = htmlspecialchars($_POST['address']);
    $city = htmlspecialchars($_POST['city']);
    $province = htmlspecialchars($_POST['province']);
    $postalCode = htmlspecialchars($_POST['postal_code']);
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert user to database
    if ($stmt = $con->prepare('SELECT clientID, password FROM client WHERE email = ?')) {
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo 'Email account is already registered to this website! <a href="client-login.php">Login</a>';
        } else {
            // Register Individual client
            if ($stmt = $con->prepare('INSERT INTO client (clientType, first_name, last_name, email, dob, phone_number, address, city, province, postal_code, password, token, activation_expiry ) VALUES ("Individual", ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')) {
                // activation time
                $token = password_hash(uniqid(rand(), true), PASSWORD_DEFAULT);
                $expiry = 60 * 60 * 24; // 1 day
                $activation_expiry = date('Y-m-d H:i:s',  time() + $expiry);
                setcookie("activation", $token, time() + $expiry, "/");

                // insert into database
                $stmt->bind_param('ssssssssssss', $name, $lastName, $email, $dob, $phoneNumber, $address, $city, $province, $postalCode, $hash, $token, $activation_expiry);
                $stmt->execute();
                // echo 'You have successfully registered!';

                $email = $_POST['email'];
                $userName = $_POST['first_name'] . ' ' . $_POST['last_name'];

                require 'phpMailerConfig.php';

                exit;
            } else {
                echo 'Could not prepare statement!';
                header("location: client-registration.php");
                exit;
            }
        }
    }
} else if (isset($_POST['form_type']) && $_POST['form_type'] == 'Business') {
    // Check if all fields are filled
    if (!isset($_POST['business_name'], $_POST['email'], $_POST['password'], $_POST['confirm_password'], $_POST['phone_number'], $_POST['address'], $_POST['city'], $_POST['province'], $_POST['postal_code']) && $_POST['password'] != $_POST['confirm_password']) {
        exit('Please complete the registration form!');
    }

    if (empty($_POST['business_name'] || $_POST['email'] || $_POST['password'] || $_POST['confirm_password'] || $_POST['mobile_number'] || $_POST['address'] || $_POST['city'] || $_POST['province'] || $_POST['postal_code'])) {
        exit('Please complete the registration form!');
    }

    // Check if email is valid
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        exit('Email is not valid!');
    }
    // Check if passwords match
    if ($_POST['password'] != $_POST['confirm_password']) {
        exit('Passwords do not match!');
    }
    $name = htmlspecialchars($_POST['business_name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $phoneNumber = htmlspecialchars($_POST['phone_number']);
    $address = htmlspecialchars($_POST['address']);
    $city = htmlspecialchars($_POST['city']);
    $province = htmlspecialchars($_POST['province']);
    $postalCode = htmlspecialchars($_POST['postal_code']);
    $hash = password_hash($password, PASSWORD_DEFAULT);
    // Insert user to database
    if ($stmt = $con->prepare('SELECT clientID, password FROM client WHERE email = ?')) {
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo 'Email account is already registered to this website! <a href="client-login.php">Login</a>';
        } else {
            // Register Business client
            if ($stmt = $con->prepare('INSERT INTO client (clientType, business_name, email, phone_number, address, city, province, postal_code, password, token, activation_expiry ) VALUES ("Business", ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')) {
                // activation time
                $token = password_hash(uniqid(rand(), true), PASSWORD_DEFAULT);
                $expiry = 60 * 60 * 24; // 1 day
                $activation_expiry = date('Y-m-d H:i:s',  time() + $expiry);
                setcookie("activation", $token, time() + $expiry, "/");

                // insert into database
                $stmt->bind_param('ssssssssss', $name, $email, $phoneNumber, $address, $city, $province, $postalCode, $hash, $token, $activation_expiry);
                $stmt->execute();
                // echo 'You have successfully registered!';

                $email = $_POST['email'];
                $userName = $_POST['business_name'];

                require 'phpMailerConfig.php';

                exit;
            } else {
                echo 'Could not prepare statement!';
                header("location: client-registration.php");
            }
        }
    } else {
        echo 'Could not prepare statement!';
    }
} else {
    exit('Please select client type');
}
