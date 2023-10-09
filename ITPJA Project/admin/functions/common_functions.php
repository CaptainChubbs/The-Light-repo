<?php
declare (strict_types=1);



function sanitize($input){
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function getNurseByProvince(string $province){
    include_once("../includes/connect.php");
    $get_nurses = "SELECT * FROM `nurses` WHERE `province` = '$province'";
    $result=mysqli_query($conn,$get_nurses);
    $nurses= mysqli_num_rows($result);
    return intval($nurses);
}
?>