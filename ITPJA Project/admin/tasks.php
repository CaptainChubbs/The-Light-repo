<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}
$pageTitle = "Tasks"; ?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once("./head.php");?>


<body>
    
</body>
</html>