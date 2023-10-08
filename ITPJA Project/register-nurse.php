<?php
// Google services
require_once 'vendor/autoload.php';
// load configuration file
require_once 'config.php';

// Connect db
include "connect.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "connect.php";





if (!isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['mobile_number'], $_POST['address'], $_POST['city'], $_POST['administrative_area_level_1'], $_POST['postal_code'], $_POST['qualifications'], $_POST['experience'], $_POST['transport'], $_POST['computer_skills'], $_POST['practice'], $_POST['dispense_number']) && $_POST['password'] != $_POST['confirm_password']) {
    exit('Please complete the registration form!');
}

if (empty($_POST['first_name'] || $_POST['last_name'] || $_POST['email'] || $_POST['password'] || $_POST['mobile_number'] || $_POST['address'] || $_POST['city'] || $_POST['administrative_area_level_1'] || $_POST['postal_code'] || $_POST['qualifications'] || $_POST['experience'] || $_POST['transport'] || $_POST['computer_skills'] || $_POST['practice'] || $_POST['dispense_number'])) {
    exit('Please complete the registration form!');
}


if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    exit('Email is not valid!');
}

$address = $_POST['address'] . ", " . $_POST['address-2'];
$practice_number = $_POST['practice_number'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);

if ($stmt = $con->prepare('SELECT nurseID, password FROM nurse WHERE email = ?')) {
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo 'Email account is already registered to this website!';
    } else {
        if ($stmt = $con->prepare('INSERT INTO nurse (first_name, last_name, email, phone_number, address, city, province, postal_code, password, qualifications, experience, transport, computer_skills, own_practice, practice_number, dispensing_number ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )')) {
            $stmt->bind_param('sssssssssssiiiss', $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['mobile_number'], $address, $_POST['city'], $_POST['administrative_area_level_1'], $_POST['postal_code'], $hash, $_POST['qualifications'], $_POST['experience'], $_POST['transport'], $_POST['computer_skills'], $_POST['practice'], $practice_number, $_POST['dispense_number']);
            $stmt->execute();
            echo 'You have successfully registered!';
            header("location: nurse-login.php");
        } else {
            echo 'Could not prepare statement!';
            header("location: nurse-registration.php");
        }
    }
    $stmt->close();
} else {
    echo 'Could not prepare statement!';
}
$con->close();
