<?php



$conn = mysqli_connect('localhost', 'root', '', 'abahleng_db');



if (!($conn)){

    die("Connection failed: " . mysqli_connect_error());

}



?>