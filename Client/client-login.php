<?php
//Autoload Classes for autoloading classes in other files without having to include them manually
// require_once 'vendor/autoload.php';
// require_once "config.php";

// // Get login url 
// $authUrl = $gClient->createAuthUrl();

// // Render google login button 
// $output = '<a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '" class="class="btn btn btn-primary btn-flat rounded-0">Sign in with Google</a>';
// 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--Login Page Title-->
  <title>Abahlengi - Client Log In</title>

  <!--Importing Bootstrap and Linking CSS Styling-->
  <link rel="stylesheet" href="./styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!--Importing google fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bellefair&family=Tenor+Sans&display=swap" rel="stylesheet">

</head>
<!--Body Begins-->

<body>

  <!--Navigation Bar Begins-->
<?php include("./nav.php"); ?>


  <!--Green Line Separating Navbar with Body Content-->
  <hr class=" border-3 opacity-100" style="color: #798A70; margin: 0;">

  <!--Nurse Portal Login Page Begins-->
  <section id="nurse-login">
    <div class="container-fluid d-flex align-items-center justify-content-center" style="padding: 50px 0">

      <!--Form Begins-->
      <form action="auth.php" method="post">
        <h1 class="h1 text-center" style="color: #798A70; margin: auto; padding-bottom:10px">Client Portal Login</h1>
        <p class="text-center" style="padding-bottom: 30px;">Login to the portal to Book your Event</p>


        <!--Use this section to integrate the 3rd party sign-ins-->
        <div class="container-fluid">

        </div>

        <!--Email Address Entry-->
        <div class="mb-3">
          <label for="email-login" class="form-label">Email Address:</label>
          <input type="email" name="email" class="form-control" id="email-login">
        </div>
        <!--Password Entry-->
        <div class="mb-3">
          <label for="password-login" class="form-label">Password:</label>
          <input type="password" name="password" class="form-control" id="password-login">
        </div>
        <!--Submit Button-->
        <div class="text-center" style="padding-bottom: 20px;">
          <button class="btn" type="submit">Login</button>
        </div>
        <!--Forgot Password Option-->
        <p style="margin-bottom: 0;">Forgot Password? <a href="password_recovery.php">Click Here</a></p>
        <!--Register Option-->
        <p>Want to Book your next Wellness Event? <a class="" href="client-registration.php">Register Here</a></p>
      </form>
  </section>
  <!--Footer Begins Here-->
  <section id="footer">
    <footer class="bg-light text-center">
      <div class="container-fluid text-center">
        <h2 class="h2" style="color: #fffbe9;">Get In Touch</h2><br>
        <p class="mb-0">Interested in our services?</p>
        <button class="btn text-center">Contact Us</button>
        <br><br>
        <p class="mb-0">&copy; 2023 Abahlengi. All rights reserved.</p>

      </div>
    </footer>
  </section>

  <!--Bootstrap Scripting-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>