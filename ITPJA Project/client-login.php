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
    <header class="border-bottom py-3" >
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <!--Navbar Heading-->
              <a class="navbar-brand" href="#" style="color: #798A70;"><h1 class="h2">Abahlengi</h1></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <!--Navbar Items-->
              <div class="collapse navbar-collapse justify-content-evenly" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link px-5" aria-current="page" href="#">Home</a>
                  <a class="nav-link px-5" href="#">About Us</a>
                  <a class="nav-link px-5" href="#">Services</a>
                  <a class="nav-link px-5" href="#">Meet the Team</a>
                  <li class="nav-item dropdown px-5">

                    <!--Navbar Login Dropdowns-->
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Login Here
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Client Login</a></li>
                      <li><a class="dropdown-item" href="#">Nurse Login</a></li>
                    </ul>
                  </li>
                </div>
              </div>
            </div>
          </nav>
    </header>

    <!--Green Line Separating Navbar with Body Content-->
    <hr class=" border-3 opacity-100" style="color: #798A70; margin: 0;">

    <!--Nurse Portal Login Page Begins-->
    <section id="nurse-login">
        <div class="container-fluid d-flex align-items-center justify-content-center" style="padding: 50px 0">

            <!--Form Begins-->
            <form action="" method="post">
            <h1 class="h1 text-center"style="color: #798A70; margin: auto; padding-bottom:10px">Client Portal Login</h1>
            <p class="text-center" style="padding-bottom: 30px;">Login to the portal to Book your Event</p>


            <!--Use this section to integrate the 3rd party sign-ins-->
            <div class="container-fluid">

            </div>


            <!--Email Address Entry-->
            <div class="mb-3">
                <label for="email-login" class="form-label">Email Address:</label>
                <input type="email" class="form-control" id="email-login">
              </div>
              <!--Password Entry-->
              <div class="mb-3">
                <label for="password-login" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password-login">
              </div>
              <!--Submit Button-->
              <div class="text-center" style="padding-bottom: 20px;">
                <button class="btn" type="submit">Login</button>
              </div>
              <!--Forgot Password Option-->
              <p style="margin-bottom: 0;">Forgot Password? <a href="">Click Here</a></p>
              <!--Register Option-->
              <p>Want to Book your next Wellness Event? <a class="" href="#">Register Here</a></p>   
            </form>
        </section>
    <!--Footer Begins Here-->
    <section id="footer">    
        <footer class="bg-light text-center" >
        <div class="container-fluid fixed-bottom text-center" >
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