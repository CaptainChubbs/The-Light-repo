<?php

// Require the Google client library
require_once(__DIR__ .'/vendor/autoload.php');
require_once(__DIR__ .'/functions/check_session.php');
use Google\AccessToken\Revoke;


$token = $_SESSION['token'];

// Create a new Revoke instance with the default HTTP client.
$revoke = new Revoke();

// Revoke the access token.
$revokeResult = $revoke->revokeToken($token);

// Check the result.
if ($revokeResult) {
  // The token was revoked successfully.
  echo 'Token revoked';
  // Clear the access token from the session or database.
  unset($_SESSION['token']);
} else {
  // The token could not be revoked.
  echo 'Token revocation failed';
}

// Delete the session data
$_SESSION = array();

// Check if cookies are used for the session
if (ini_get("session.use_cookies")) {
  // Get the cookie parameters
  $params = session_get_cookie_params();
  // Set the cookie expiration time to the past
  setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

// Destroy the session
session_unset();

// Redirect to the login page
header("Location: login.php");
exit;
