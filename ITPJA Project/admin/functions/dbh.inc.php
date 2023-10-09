<?php
//Connecting to Database
    try{
        $db = new PDO('mysql:host=127.0.0.1; dbname=abahlengi', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException $e){
        die("Connection failed: " . $e->getMessage()) ;
    }