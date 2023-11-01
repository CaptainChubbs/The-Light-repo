<?php
include __DIR__.'/../vendor/autoload.php';

// Replace with your own JSON file
$clientSecretFile = 'path/to/your/client_secret.json';

$client = new Google_Client();
$client->setAuthConfig($clientSecretFile);
$client->addScope(Google_Service_Gmail::MAIL_GOOGLE_COM);
$client->setRedirectUri('http://yourwebsite.com/oauth2callback.php');

// Handle OAuth 2.0 flow
if (!isset($_GET['code'])) {
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
} else {
    $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $accessToken = $client->getAccessToken();

    // Store $accessToken securely or use it to access Gmail API
    // Example: $client->setAccessToken($accessToken);

    // Use the Gmail API to retrieve emails
    $service = new Google_Service_Gmail($client);
    $messages = $service->users_messages->listUsersMessages('me');

    foreach ($messages as $message) {
        $email = $service->users_messages->get('me', $message->id);
        // Process the email as needed
    }
}


// Create a Gmail API client (assuming you've already authenticated and have access token)
$service = new Google_Service_Gmail($client);

// Create a message
$message = new Google_Service_Gmail_Message();
$message->setRaw(base64_encode("Subject: Your Subject\r\nTo: recipient@example.com\r\n\r\nHello, this is the email body."));

// Send the message
$message = $service->users_messages->send("me", $message);


// Assuming you have retrieved a list of messages as shown in the previous code
foreach ($messages as $message) {
    $email = $service->users_messages->get('me', $message->id);

    // Get the email subject and body
    $subject = '';
    $body = '';
    foreach ($email->getPayload()->getHeaders() as $header) {
        if ($header->name === 'Subject') {
            $subject = $header->value;
        }
    }
    $parts = $email->getPayload()->getParts();
    foreach ($parts as $part) {
        if ($part->mimeType === 'text/plain') {
            $body = base64_decode($part->body->data);
        }
    }

    // Process the subject and body
    echo "Subject: $subject<br>";
    echo "Body: $body<br>";
}


// Assuming you have retrieved a list of messages as shown in the previous code
foreach ($messages as $message) {
    $email = $service->users_messages->get('me', $message->id);

    // Get the email subject and body
    $subject = '';
    $body = '';
    foreach ($email->getPayload()->getHeaders() as $header) {
        if ($header->name === 'Subject') {
            $subject = $header->value;
        }
    }
    $parts = $email->getPayload()->getParts();
    foreach ($parts as $part) {
        if ($part->mimeType === 'text/plain') {
            $body = base64_decode($part->body->data);
        }
    }

    // Process the subject and body
    echo "Subject: $subject<br>";
    echo "Body: $body<br>";
}
