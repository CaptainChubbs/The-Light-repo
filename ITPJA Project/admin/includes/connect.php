<?php

$conn = mysqli_connect('127.0.0.1', 'root', '', 'abahlengi');

if (!($conn)){
    die("Connection failed: " . mysqli_connect_error());
}

?>