<?php 
require_once(__DIR__ ."/functions/check_session.php");


$pageTitle = "Messages";
include_once("./head.php");

$message_id = $_GET['id'];
$user = $_GET['user'];

include_once("./functions/view_emailAPI.php");


?>




<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">

            <?php include_once("./sidebar.php");?>
            

            <div class="col py-3">
                <div class="row">
                    <h1><?php echo $pageTitle; ?></h1>
                    <h4><?php echo date("d/m/y");?></h4>
                </div>

            <hr>
            <div class="row">
                <div class="col-2">            
                    <a href="./new_email.php" class="btn btn-add">Send New Email</a>
                </div>
            <div class="row">
            <div class="nurses-table container-fluid datatable pt-4 pb-4">

<?php
include_once __DIR__ . '/vendor/autoload.php';

// Parse the message using the php-mime-mail-parser package.
  // Call the Gmail API to get the message.
  $message = $service->users_messages->get($user, $messageId, array('format' => 'full'));

  // Get the message body as a string.
  $body = $message->getPayload()->getBody()->getData();

  // Decode the message body from base64 encoding.
  $decodedBody = base64_decode(strtr($body, '-_', '+/'), true);

  // Get the message headers.
$headers = $message->getPayload()->getHeaders();

// Get the "From" and "Subject" headers.
$from = '';
$subject = '';
foreach ($headers as $header) {
  if ($header->getName() == 'From') {
    $from = $header->getValue();
  }
  if ($header->getName() == 'Subject') {
    $subject = $header->getValue();
  }
}



// Display the message in a user friendly manner.
echo "<h1>Message Details</h1>";
echo "<p><strong>From:</strong> $from</p>";
echo "<p><strong>Cc:</strong> $subject</p>";
  // Print the decoded message body.
echo "<p>$decodedBody</p>?";

?>






</tbody>       
</table>
</div>
            </div>
            <div class="row">
                <div class="col-6">
                    
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-2">
                    <a href="" class="btn btn-assign">Reply</a>
                </div>
                <div class="col-2">
                    <a href="" class="btn btn-email">Delete</a>
                </div>
            </div>

            </div>
                
            </div>
            <?php include_once __DIR__ .'/includes/footer.php';?>
        </div>
    </div>
    

</body>
</html>

