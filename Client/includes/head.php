<?php
session_start(); // Start the session.

if (isset($_POST['login'])) {
    include __DIR__.'/./includes/connect.php'; // Include your database connection file.
    include __DIR__.'/./main_web/cart.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform database query to check if the email and password match.
    $select_query = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
    $results_query = mysqli_query($conn, $select_query);
    if ($results_query && mysqli_num_rows($results_query) == 1) {
        // User is authenticated. Set session variables.
        $row = mysqli_fetch_assoc($results_query);
        $_SESSION['user_authenticated'] = true;
        $_SESSION['user_id'] = $row['customer_id'];
        $_SESSION['user_first_name'] = $row['first_name'];
        $_SESSION['user_last_name'] = $row['last_name'];

        // Redirect to the home page or a dashboard.
        header("Location: client-portal.php");
    } else {
        // Authentication failed. Display an error message.
        $login_error = "Invalid email or password. Please try again.";
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Page Title-->
    <title>Abahlengi - <?php echo $title;?></title>

    <!--Linking Stylesheet-->
    <link rel="stylesheet" href="css/style.css">

    <!--Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">  
    
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bellefair&family=Tenor+Sans&display=swap" rel="stylesheet">

    <!--Favicon Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>