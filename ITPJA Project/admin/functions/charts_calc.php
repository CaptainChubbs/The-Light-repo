<?php
include_once __DIR__ ."/common_functions.php";


$nurse_data = array( 
	array("y" => nurse_calc("Gauteng", $conn), "label" => "Gauteng" ),
	array("y" => nurse_calc("Kwazulu-Natal", $conn), "label" => "Kwazulu-Natal" ),
	array("y" => nurse_calc("Eastern Cape", $conn), "label" => "Eastern Cape" ),
	array("y" => nurse_calc("Northern Cape", $conn), "label" => "Northern Cape" ),
	array("y" => nurse_calc("Western Cape", $conn), "label" => "Western Cape" ),
	array("y" => nurse_calc("Limpopo", $conn), "label" => "Limpopo" ),
	array("y" => nurse_calc("Mpumalanga", $conn), "label" => "Mpumalanga" ),
    array("y" => nurse_calc("North West", $conn), "label" => "North West" ),
	array("y" => nurse_calc("Free State", $conn), "label" => "Free State" ),

);

$events_data = array( 
	array("label"=>"In-Home Nursing Care", "y"=>eventType_calc("In-Home Nursing Care",$conn)),
	array("label"=>"Corporate Wellness", "y"=>eventType_calc("Corporate Wellness",$conn)),
	array("label"=>"Health Promotion Talks", "y"=>eventType_calc("Health Promotion Talks",$conn)),

);