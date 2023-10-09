<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 60 * 60 * 24,
    'path' => '/admin',
    'domain' => 'localhost',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);

session_start();

if(isset($_SESSION["user_id"])){
    if (!isset($_SESSION['last_regeneration'])){
        regenerate_session_id_logged_in();
    } else{
        $interval = 60*30;
        if (time() - $_SESSION['last_regeneration'] >= $interval){
            regenerate_session_id_logged_in();
        }
    }
}else{
    if (!isset($_SESSION['last_regeneration'])){
        regenerate_session_id();
    } else{
        $interval = 60*30;
        if (time() - $_SESSION['last_regeneration'] >= $interval){
            regenerate_session_id();
        }
    }
}



function regenerate_session_id(){
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
}

function regenerate_session_id_logged_in(){
    session_regenerate_id(true);
    $userId = $_SESSION['user_id'];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId. "_" . $userId['id'];
    $sessionId($sessionId);

    $_SESSION['last_regeneration'] = time();
}