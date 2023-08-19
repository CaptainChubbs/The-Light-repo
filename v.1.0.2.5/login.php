<?php
include("db_connection.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM employees WHERE username = '$username' AND password = '$password'";
    $result = sqlsrv_query($conn, $query);

    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_has_rows($result)) {
        echo "Login successful!";
        // Perform further actions or redirect here
    } else {
        echo "Login failed. Invalid credentials.";
    }

    sqlsrv_free_stmt($result);
    sqlsrv_close($conn);
}
?>