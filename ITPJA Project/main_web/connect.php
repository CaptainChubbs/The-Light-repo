<?php

$DB_HOST = '102.130.125.52';
$DB_USER = 'root';
$DB_PW = 'r3zsaturn';
$DB_NAME = 'Abahlengi';

$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PW, $DB_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to the database: ' . mysqli_connect_error());
}

