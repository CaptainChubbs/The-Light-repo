<?php 
require_once("./functions/config_login.php");

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

        <style>
            body .login .login-with-google-btn {
    transition: background-color .3s, box-shadow .3s !important; 
      
    padding: 12px 16px 12px 42px !important;
    border: none !important;
    border-radius: 3px !important;
    box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 1px 1px rgba(0, 0, 0, .25) !important;
    
    color: #757575 !important;
    font-size: 14px !important;
    font-weight: 500 !important;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",sans-serif !important;
    
    background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMTcuNiA5LjJsLS4xLTEuOEg5djMuNGg0LjhDMTMuNiAxMiAxMyAxMyAxMiAxMy42djIuMmgzYTguOCA4LjggMCAwIDAgMi42LTYuNnoiIGZpbGw9IiM0Mjg1RjQiIGZpbGwtcnVsZT0ibm9uemVybyIvPjxwYXRoIGQ9Ik05IDE4YzIuNCAwIDQuNS0uOCA2LTIuMmwtMy0yLjJhNS40IDUuNCAwIDAgMS04LTIuOUgxVjEzYTkgOSAwIDAgMCA4IDV6IiBmaWxsPSIjMzRBODUzIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNNCAxMC43YTUuNCA1LjQgMCAwIDEgMC0zLjRWNUgxYTkgOSAwIDAgMCAwIDhsMy0yLjN6IiBmaWxsPSIjRkJCQzA1IiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNOSAzLjZjMS4zIDAgMi41LjQgMy40IDEuM0wxNSAyLjNBOSA5IDAgMCAwIDEgNWwzIDIuNGE1LjQgNS40IDAgMCAxIDUtMy43eiIgZmlsbD0iI0VBNDMzNSIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZD0iTTAgMGgxOHYxOEgweiIvPjwvZz48L3N2Zz4=) !important;
    background-color: white !important;
    background-repeat: no-repeat;
    background-position: 12px 11px;
    
    &:hover {
      box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 2px 4px rgba(0, 0, 0, .25);
    }
    
    &:active {
      background-color: #eeeeee;
    }
    
    &:focus {
      outline: none;
      box-shadow: 
        0 -1px 0 rgba(0, 0, 0, .04),
        0 2px 4px rgba(0, 0, 0, .25),
        0 0 0 3px #c8dafc;
    }}
        </style>
    </head>
<!--Body Begins-->

<body>

    <div class="container-fluid">
    <!--Nurse Portal Login Page Begins-->
    <div class="row text-center">
        <div class="col">
            <h1>
                Abahlengi Admin Dashboard login
            </h1>
        </div>
    </div>
    <div class="row text-center login">
    <div class="col-6" style=""></div>
            <?php



// Check if the user is already logged in
if (isset($_SESSION['token']) && $_SESSION['token']) {
  // Set the access token on the client
  $client->setAccessToken($_SESSION['token']);

  // Get the Google service object
  $service = new Google_Service_Oauth2($client);

  // Get the user profile data
  $user = $service->userinfo->get();

  header('index.php');

} else {
  // The user is not logged in
  // Generate a login URL
  $login_url = $client->createAuthUrl();
  echo '<a class="login login-with-google-btn" href="' . $login_url . '">Log in with Google</a>';
}

                    ?>


    </div>
    </div>


</div>







    <!--Bootstrap Scripting-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>