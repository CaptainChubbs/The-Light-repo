<?php

$conn = mysqli_connect('127.0.0.1', 'root', '', 'abahleng_ops');

if (!($conn)){
    die("Connection failed: " . mysqli_connect_error());
}

?>