<?php
//Autoload Classes for autoloading classes in other files without having to include them manually
require_once('vendor/autoload.php');
// load configuration file
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Login Page Title-->
    <title>Customer - Registration</title>

    <!--Importing Bootstrap and Linking CSS Styling-->
    <link rel="stylesheet" href="./styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--Importing google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bellefair&family=Tenor+Sans&display=swap" rel="stylesheet">

    

    <!--Importing Font Awesome Icons-->
    <script src="https://kit.fontawesome.com/bdd911af05.js" crossorigin="anonymous"></script>

    <script src="index.js"></script>
    
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
                  <a class="nav-link px-5" aria-current="page" href="index.html">Home</a>
                  <a class="nav-link px-5" href="about.html">About Us</a>
                  <a class="nav-link px-5" href="services.html">Services</a>
                  <a class="nav-link px-5" href="team.html">Meet the Team</a>
                  <li class="nav-item dropdown px-5">

                    <!--Navbar Login Dropdowns-->
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Login Here
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="client-login.php">Client Login</a></li>
                      <li><a class="dropdown-item" href="nurse-login.php">Nurse Login</a></li>
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
            <form action="" method="post" style="width: 40%;" class="needs-validation" role="form" data-toggle="validator" novalidate>
            <h1 class="h1 text-center"style="color: #798A70; margin: auto; padding-bottom:10px">Client Registration</h1>
            <p class="text-center" style="padding-bottom: 30px;">Register to Book your Event Today</p>


            <!--Use this section to integrate the 3rd party sign-ups with Google or MS Accounts-->
            <div class="container-fluid">

            </div>


            <!-- Name and Surname Inputs -->
            <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="first-name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="first-name" required>
                        <div class="invalid-feedback">Field Cannot be Empty</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="last-name" class="form-label">Surname:</label>
                        <input type="text" class="form-control" id="last-name" required>
                        <div class="invalid-feedback">Field Cannot be Empty</div>
                    </div>
                </div>

                <!-- Age Input -->
                <div class="mb-3">
                    <label for="age" class="form-label">Age:</label>
                    <input type="number" class="form-control" id="age" required>
                    <div class="invalid-feedback">Field Cannot be Empty</div>
                </div>

                <!-- Email Input -->
                <div class="mb-3" data-validate="email">
                    <label for="email-address" class="form-label">Email Address:</label>
                    <input type="email" class="form-control email-add" id="email-address" required>
                    <span class="valid-feedback"><i class="fa fa-check"></i> Valid Email</span>
                    <span id="invalid-email" class="invalid-feedback"><i class="fa fa-times"></i> Enter a Valid Email Address</span>
                </div>

                <!-- Number Input -->
                <div class="mb-3">
                    <label for="phone-number" class="form-label">Phone Number:</label>
                    <input type="tel" class="form-control" id="phone-number" required minlength="10">
                    <div class="invalid-feedback">Field Cannot be Empty</div>
                </div>

                <!-- Address Inputs -->
                <div class="row">
                    <div class="col mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="address" required>
                        <div class="invalid-feedback">Field Cannot be Empty</div>
                    </div>
                </div>

              <!--Password Input-->
              <label for="inputPassword" class="form-label">Password</label>
              <input type="password" id="inputPassword" class="form-control" aria-describedby="passwordHelpBlock" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
              <!--Password Instructions-->
              <div id="passwordHelpBlock" class="form-text">
                Your password must be 8-20 characters long, contain letters, special characters and numbers, and must not contain spaces, or emoji.
              </div><br>

              <!--Password Validation-->
              <div class="valid-feedback">Valid Password</div>
              <div class="invalid-feedback">Invalid Password</div>

              <!--Password Creation Criteria-->
              <div class="col-6 mt-4 mt-xxl-0 w-auto h-auto">
                <div class="alert px-4 py-3 mb-0 d-none" role="alert" data-mdb-color="warning" id="password-alert">
                  <ul class="list-unstyled mb-0">
                    <li class="requirements leng">
                      <i class="fas fa-check text-success me-2"></i>
                      <i class="fas fa-times text-danger me-3"></i>
                      Your password must have at least 8 characters</li>
                    <li class="requirements big-letter">
                      <i class="fas fa-check text-success me-2"></i>
                      <i class="fas fa-times text-danger me-3"></i>
                      Your password must have at least 1 uppercase letter.</li>
                    <li class="requirements num">
                      <i class="fas fa-check text-success me-2"></i>
                      <i class="fas fa-times text-danger me-3"></i>
                      Your password must have at least 1 number.</li>
                    <li class="requirements special-char">
                      <i class="fas fa-check text-success me-2"></i>
                      <i class="fas fa-times text-danger me-3"></i>
                      Your password must have at least 1 special character.</li>
                  </ul>
                </div>
            
              </div>
              <br>
              <!--Confirm Password input field-->
              <div class="mb-3">
                <label for="conf-password" class="form-label">Confirm Password:</label>
                <input type="password" class="form-control" id="conf-password" required>
                <div class="invalid-feedback">Field Cannot be Empty</div>
              </div>

              <span id="matching-message"></span>

              <hr><br>

                  <!--Submit Button-->
                  <div class="text-center" style="padding-bottom: 20px;">
                    <a href="<?php echo $gClient->createAuthUrl(['redirect_uri' => 'https://admin.abahlengi.com/index.php']) ?>" class="btn btn btn-primary btn-flat rounded-0">Register with Google</a>
                  </div>
                </div>
                
                <p>Already have an account? <a href="client-login.php">Log In</a></p>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                  <label class="form-check-label" for="invalidCheck">
                    Agree to the <a href="">terms and conditions</a>
                  </label>
                  <div class="invalid-feedback">
                    You must agree before submitting.
                  </div>

              </div>
              
            </form>
        </section>

        <section id="footer">    
        <footer class="bg-light text-center" >
          <div class="container-fluid text-center" >
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
