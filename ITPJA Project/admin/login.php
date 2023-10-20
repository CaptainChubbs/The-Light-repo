<?php 
  require_once './vendor/autoload.php';

  require_once './functions/config_session.inc.php';
  require_once './functions/login_view.inc.php';
?>
<!DOCTYPE html>
    <head>
        <!--Meta Tags-->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="The-Light" />

        <!--Importing Font Awesome Icons CDN-->
        <script src="https://kit.fontawesome.com/bdd911af05.js" crossorigin="anonymous"></script>

        <!--Importing Favicons-->
        <link rel="apple-touch-icon" sizes="180x180" href="./favicon_io/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./favicon_io/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./favicon_io/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">

        <!--Importing google fonts CDN-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bellefair&family=Tenor+Sans&display=swap" rel="stylesheet">

        <!--Page Title-->
        <title>Admin Login</title>

        <!--Importing Bootstrap CDN-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <!--Linking CSS Stylesheet-->
        <link href="./includes/css/styles.css" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    </head>
<!--Body Begins-->

<body>



    <!--Nurse Portal Login Page Begins-->





            <?php
//Autoload Classes for autoloading classes in other files without having to include them manually
require_once 'vendor/autoload.php';
require_once "./functions/config_login.php";

// Get login url 
$authUrl = $gClient->createAuthUrl();

// Render google login button 
$output = '<a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '" class="class="btn btn btn-primary btn-flat rounded-0">Sign in with Google</a>';
echo $output;
            ?>




    <!--Bootstrap Scripting-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>