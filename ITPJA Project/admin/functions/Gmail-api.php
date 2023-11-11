<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Replace with your own credentials
$client = new Google_Client();
$client->setApplicationName('Abahlengi');
$client->setScopes(array(
    'https://www.googleapis.com/auth/gmail.readonly',
    'https://www.googleapis.com/auth/gmail.compose',
    'https://www.googleapis.com/auth/gmail.send',
    'https://www.googleapis.com/auth/gmail.modify'
  ));
  
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

// Fetch all of the user's emails
$service = new Google_Service_Gmail($client);
$user = 'me';
$results = $service->users_messages->listUsersMessages($user);
$messages = $results->getMessages();

// Get the message ID





?>
