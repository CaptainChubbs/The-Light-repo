<?php


    //If the user clicks the login button
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    try{
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        //Error HAndlers
        $errors = [];

        //Check if the input fields are empty
        if (is_input_empty($email, $password)){
            $errors["empty_input"] = "Please fill in all fields";
        }

        $result = get_email($db, $email);

        //Check if the email is wrong
        if(is_email_wrong($result)){
            $errors["login_incorrect"] = "Incorrect email or password";
        }
        //Check if the password is wrong
        
        if (!is_email_wrong($result) && is_password_wrong($password, $result['password'])){
            $errors["login_incorrect"] = "Incorrect email or password";
        }

        //Connect to the session config file
        require_once './config_session.inc.php';

        //If there are errors, redirect to the login page
        if ($errors){
            $_SESSION['login_errors'] = $errors;
            header("Location: ../login.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId. "_" . $result['adminID'];
        session_id($sessionId);

        $_SESSION['user_id'] = $result['id'];
        $_SESSION['email'] = htmlspecialchars($result['email']);
        $_SESSION['last_regeneration'] = time();

        header("Location: ../index.php?login=success");
        $pdo= null;
        $statement = null;

        die();

    } catch(PDOException $e){
        die("Query Failed: " . $e->getMessage()) ;
    }
}else{
    header("Location: ../login.php");
    die();
}


