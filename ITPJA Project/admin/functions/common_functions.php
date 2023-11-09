<?php
declare (strict_types=1);



function sanitize($input){
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function nurse_calc(string $province, $conn){
    $get_nurses = "SELECT * FROM `nurse` WHERE `province` = '$province'";
    $result=mysqli_query($conn,$get_nurses);
    $nurses= mysqli_num_rows($result);
    return intval($nurses);
}
function eventType_calc(string $eventType, $conn){
    $get_events = "SELECT * FROM `events` WHERE `event_type` = '$eventType'";
    $result=mysqli_query($conn,$get_events);
    $events= mysqli_num_rows($result);
    return intval($events);
}

function deleteNurse(string $nurse_id, $conn){
    $delete_query = "DELETE FROM `nurse` WHERE `nurseID` = '$nurse_id'";
    $result=mysqli_query($conn,$delete_query);
    if ($result){
        echo "<script>alert('Successfully Deleted')</script>";
    }else{
        echo "<script>alert('Error')</script>";
    }
}