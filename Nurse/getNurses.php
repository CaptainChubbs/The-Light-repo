<?php
include_once "connect.php";
// Get the selected province from the query parameter
$selectedProvince = $_GET['province'];

// Your SQL query to get available nurses
$sql = "SELECT * FROM nurse WHERE province = '$selectedProvince' AND status = 'available'";
$result = $con->query($sql);

// Fetch the result as an associative array
$nurses = [];
while ($row = $result->fetch_assoc()) {
    $nurses[] = $row;
}

// Return the nurses as JSON
header('Content-Type: application/json');
echo json_encode($nurses);

$con->close();
