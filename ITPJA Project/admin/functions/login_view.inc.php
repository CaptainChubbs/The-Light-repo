<?php

declare (strict_types = 1);

function check_login_errors(){
    if (isset($_SESSION['login_errors'])) {
        $errors = $_SESSION['login_errors'];

        echo "<br>";

        foreach ($errors as $error) {
            echo "<p class='form-text text-danger'>$error</p>";
        }
        unset($_SESSION['login_errors']);
    }else if(isset($_GET['login']) && $_GET['login'] === "success"){
        $success = $_SESSION['login_success'];

        echo "<br>";

        foreach ($success as $suc) {
            echo "<p class='text-success'>$suc</p>";
        }
        unset($_SESSION['login_success']);
    }
}