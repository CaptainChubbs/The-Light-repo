<?php

// Process a webhook notification.

// Get the webhook notification data from Yoco.
$data = json_decode(file_get_contents('php://input'), true);

// Check the event type of the webhook notification.
$eventType = $data['type'];

  // Handle the successful payment webhook notification.

  // Redirect the customer to the success page.
  header('Location: https://0fde-41-71-55-176.ngrok-free.app/ITPJA3_Project/main_web/success.php');

