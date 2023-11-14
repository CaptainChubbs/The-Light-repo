<!DOCTYPE html>
<html lang="en">
<?php 
use PHPMailer\PHPMailer\PHPMailer;
  include_once __DIR__ ."/functions/common_functions.php";
  $title = "Payment Status";
  include("./head.php");
// Check if payment status is successful
if (isset($_GET['status']) && $_GET['status'] === 'success' && isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Payment is successful, proceed with processing

    // Retrieve payment ID and payer ID
    $paymentID = $_GET['paymentID'];
    $payerID = $_GET['payerID'];
    $deposit = $_GET['total'];
    $reqID = $_GET['req_id'];
    $getID = $_SESSION['clientID'];


    // Use the payment ID and payer ID for further processing or logging
    // Example: Log the payment details to a file or database

    // Your additional processing code goes here...

    // Display a success message to the user
} else {
    // Payment status is not successful, handle accordingly
    // Example: Display an error message or redirect to an error page
    header('Location: index.php');
}



?> 
<body>

<?php include("./nav.php"); ?>



    <main id="services-sect">
        <div class="container-fluid text-center py-3">

        <?php
// success.php
$client_query = "SELECT * FROM `client` WHERE clientID = $getID";
$client_execute = mysqli_query($conn, $client_query);
$row = mysqli_fetch_assoc($client_execute);
$name = $row['first_name'] . ' '. $row['last_name'];
$email = $row['email'];
$status = "Deposit Paid";
emptyCart();



    // Include PHPmailer library
require __DIR__.'/vendor/autoload.php';


$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username = 'info@abahlengi.com';
    $mail->Password   = 'ttsw tknp rlov yerq';                               //SMTP password zcyb fqyw yitn ztzk
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    $mail->FromName = "Abahlengi Info";

    // Set the sender email address
$mail->setFrom('info@abahlengi.com', 'Abahlengi Info');

// Set the recipient email address
$mail->addAddress('Admin@abahlengi.com', 'Admin');


   // Content
   $mail->isHTML(true);

// Set the email subject
$mail->Subject = 'Abahlengi: New Event Booked';

// Set the email body
$mail->Body = "<p>Good Day Admin,</p> <br>

<p>This email is to confirm that a new event has been booked for </p><br>
<p>Please See Details Below:</p>

Your payment ID is $paymentID and your payer ID is $payerID.

Thank you for your business!

Sincerely,
Abahlengi Info";
$mail->send();

} catch (Exception $e) {
    echo "<script>alert('Email could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
}

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;       
    $mail->Username = 'info@abahlengi.com';    //Enable SMTP authentication
    $mail->Password   = 'ttsw tknp rlov yerq';                               //SMTP password zcyb fqyw yitn ztzk
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    $mail->FromName = "Abahlengi Info";

    // Set the sender email address
$mail->setFrom('info@abahlengi.com', 'Abahlengi Info');

// Set the recipient email address
$mail->addAddress($email, $name);


   // Content
   $mail->isHTML(true);

// Set the email subject
$mail->Subject = "Abahlengi: Payment Confirmation";

// Set the email body
$mail->Body = "<p>Good Day $name,</p><br>

<p>This email is to confirm that your Deposit Payment of R $deposit has been processed successfully.</p>
<p>Your payment ID is $paymentID and your payer ID is $payerID.</p>
<br>
<p>One of our Team Members will reach out to finalize event details. In the meantime, you can view the Event Details on your <a href='https://www.abahlengi.com/client/index.php'>Dashboard</a></p>
<p>Should we be unable to assist with your event, a full refund will be arranged to the account that made the payment.</p>
<p><strong>Please Note:</strong> Final Payment will be due 2-3 Business Days after the event is complete.</p>

<p>Thank You for your Business!</p><br>
<p>Sincerely,</p>
<p>Abahlengi Info</p>";
$mail->send();

} catch (Exception $e) {
    echo "<script>alert('Email could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
}
$amount= $deposit * 5;
$insert_query = "INSERT INTO `payments` (req_id, payment_id, payer_id, amount,deposit_paid, client_id, name, email, status, date_completed)
                VALUES ($reqID,'$paymentID', '$payerID', $amount, $deposit, $getID, '$name', '$email', '$status', date(NOW()))";
$insert_execute = mysqli_query($conn, $insert_query);

// Perform any post-payment actions, e.g., update database, send confirmation emails, etc.
?>


            <h1>Payment Successful!</h1>
            <p>Your Deposit has been Recorded.</p>
            <p><strong>Payment ID: <?php echo $paymentID; ?></strong></p>
            <p><strong>Event ID: <?php echo $reqID; ?></strong></p>
            <a href="./index.php" class="btn btn-green">Go Home</a>
            <a href="client/index.php" class="btn btn-green">Go to Account Dashboard</a>
            <!-- Add more content or actions as needed -->

        </div>
    </main>
    <?php include_once("./footer.php"); ?>

</body>
</html>




