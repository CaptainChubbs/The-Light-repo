<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require('vendor/phpmailer/phpmailer/src/PHPMailer.php');
// require('vendor/phpmailer/phpmailer/src/Exception.php');

include "../../config/connect.php";
require '../../vendor/autoload.php';

$mail = new PHPMailer(true);
$email = $_POST['email'];

const APP_URL = 'https://abahlengi.com/client/';
$activation_link = APP_URL . "/activate.php?email=$email&token=$token";

try {

    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@abahlengi.com';                     //SMTP username
    $mail->Password   = 'ytun gesa huog ygxy';                               //SMTP password zcyb fqyw yitn ztzk
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    $mail->From = "info@abahlengi.com";
    $mail->FromName = "Asanda Ngocobo";

    // Recipient
    $mail->addAddress($email, $userName); // $userEmail and $userName from your registration form


    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Abahlengi Nurse Portal - Email Confirmation';
    $mail->Body = "<p>Welcome to the Abahlengi Client Portal!</p> 
    <p>We're thrilled to welcome you to the Abahlengi community!, please confirm your email address.

Click the Confirmation Link Below:
<a href='$activation_link'>Confirm Email Address</a>

<p><strong>Not sure why you received this email?</strong></p>
If you did not sign up for the Abahlengi Client Portal, please ignore this email. Your privacy and security are important to us.

 <p>We're here to make your experience with Abahlengi as enjoyable and efficient as possible. Should you have any questions or need further assistance, please feel free to get in touch.</p>

        <p>Thank you for choosing Abahlengi. We look forward to providing you with the best services and support in your journey.</p>

        <p>Warm regards,</p>
        <p>The Abahlengi Team</p>";


    // Send the email
    $mail->send();

    // Redirect to confirmation email sent page
    header('Location: registration-success.html');
} catch (Exception $e) {
    echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}


// KK9z3d5wJWuZGPh

// RNUqbd?n=ldO