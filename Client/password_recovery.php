<?php
// Error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

// Connect db
include "../../config/connect.php";
// Initialize PHPMailer
$mail = new PHPMailer(true);

// Generate a unique token for the user and store it in your database
$token = password_hash(uniqid(rand(), true), PASSWORD_DEFAULT); // Replace with your token generation logic

// Send the reset link with the token to the user's email
const APP_URL = 'https://abahlengi.com.client';
$recovery_link = APP_URL . "/reset_password.php?token=$token";
$emailBody = "Click the following link to reset your password: $recovery_link";

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $userName = $_POST['name'];

    // Add token to nurse database table
    if ($stmt = mysqli_prepare($con, "UPDATE client SET token=?")) {
        mysqli_stmt_bind_param($stmt, "s", $token);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }


    // Set email parameters
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

    $mail->isHTML(true);
    $mail->Subject = 'Password Reset';
    $mail->Body = $emailBody;

    // Send the email
    try {
        $mail->send();
        exit('Password reset email sent.');
    } catch (Exception $e) {
        echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
}

?>

<!-- Recover password -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 350px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Password Recovery</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="">

            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="">

            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link" href="nurse-login.php">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>