<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Replace with your own credentials
$client = new Google_Client();
$client->setApplicationName('Abahlengi');
$client->setScopes(Google_Service_Gmail::GMAIL_READONLY);
$client->setAuthConfig(__DIR__ . '/../credentials.json');
$client->setAccessType('offline');

// Authorize the client
$tokenPath = __DIR__ .'/tokens';

$token = $_SESSION['token'];
$client->setAccessToken($token);


// If there is no previous token or it's expired.
if ($client->isAccessTokenExpired()) {
    // Refresh the token if possible, else fetch a new one.
    if ($client->getRefreshToken()) {
        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    } else {
        // Request authorization from the user.
        $authUrl = $client->createAuthUrl();
        printf("Open the following link in your browser:\n%s\n", $authUrl);
        print 'Enter verification code: ';
        $authCode = trim(fgets(STDIN));

        // Exchange authorization code for an access token.
        $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
        $client->setAccessToken($accessToken);

        // Check to see if there was an error.
        if (array_key_exists('error', $accessToken)) {
            throw new Exception(join(', ', $accessToken));
        }
    }

}

// Get the API service and construct the service object.
$service = new Google_Service_Gmail($client);

// Get the user ID and message ID from the URL
$user = "me";
$messageId = $_GET['id'];

$message = $service->users_messages->get($user, $messageId);



?>


