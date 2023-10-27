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
    <title>Nurse - Registration</title>

    <!--Importing Bootstrap and Linking CSS Styling-->
    <link rel="stylesheet" href="../styles.css">
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
    <header class="border-bottom py-3">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <!--Navbar Heading-->
                <a class="navbar-brand" href="#" style="color: #798A70;">
                    <h1 class="h2">Abahlengi</h1>
                </a>
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
            <form action="register-nurse.php" method="post" style="width: 40%;" class="was-validated" role="form" data-toggle="validator" novalidate>
                <h1 class="h1 text-center" style="color: #798A70; margin: auto; padding-bottom:10px">Nurse Portal Registration</h1>
                <p class="text-center" style="padding-bottom: 30px;">Register to join the network</p>


                <!--Use this section to integrate the 3rd party sign-ups with Google or MS Accounts-->
                <div class="container-fluid">

                </div>


                <!--First & Last Name Input-->
                <div class="row">
                    <div class="col mb-3">
                        <label for="first_name" class="form-label">First Name:</label>
                        <input name="first_name" type="text" class="form-control" id="first-name" required>
                        <div class="invalid-feedback">Field Cannot be Empty</div>
                    </div>
                    <div class="col mb-3">
                        <label for="last_name" class="form-label">Last Name:</label>
                        <input name="last_name" type="text" class="form-control" id="last-name" required>
                        <div class="invalid-feedback">Field Cannot be Empty</div>
                    </div>
                </div>
                <!-- Email Address Input-->
                <div class="mb-3" data-validate="email">
                    <label for="email" class="form-label">Email Address:</label>
                    <input name="email" type="email" class="form-control email-add" id="email-address" required>
                    <span class="valid-feedback"><i class="fa fa-check"></i> Valid Email</span>
                    <span id="invalid-email" class="invalid-feedback"><i class="fa fa-times"></i> Enter a Valid Email Address</span>
                </div>
                <!--Mobile Number Input-->
                <div class="mb-3">
                    <label for="mobile_number" class="form-label">Mobile Number:</label>
                    <input name="mobile_number" type="tel" class="form-control" id="mobile-number" required minlength="10">
                    <div class="invalid-feedback">Field Cannot be Empty</div>
                </div>
                <hr><br>
                <div class="row">
                    <div class="mb-3 col">

                        <!--Address Input-->
                        <label for="address" class="form-label">Address Line 1:</label>
                        <input type="text" placeholder="" class="form-control" id="location-input" name="address" required />
                        <div class="invalid-feedback">Field Cannot be Empty</div>
                    </div>
                    <div class="mb-3 col">
                        <label for="address-2" class="form-label">Address Line 2:</label>
                        <input type="text" class="form-control" placeholder="" name="address-2" />
                    </div>
                </div>
                <!--City Input-->
                <div class="row">
                    <div class="mb-3 col">
                        <label for="city" class="form-label">City:</label>
                        <input type="text" class="form-control" placeholder="" id="locality" name="city" required />
                        <div class="invalid-feedback">Field Cannot be Empty</div>
                    </div>
                    <!--Province Input-->
                    <div class="mb-3 col">
                        <label for="administrative_area_level_1" class="form-label">Province:</label>
                        <input type="text" class="half-input form-control" placeholder="" id="administrative_area_level_1-input" name="administrative_area_level_1" required />
                        <div class="invalid-feedback">Field Cannot be Empty</div>
                    </div>
                </div>
                <!--Postal Code Input-->
                <div class="row">
                    <div class="mb-3 col">
                        <label for="postal_code" class="form-label">Postal Code:</label>
                        <input type="text" class="half-input form-control" placeholder="" id="postal_code-input" name="postal_code" required />
                        <div class="invalid-feedback">Field Cannot be Empty</div>
                    </div>
                    <div class="mb-3 col"></div>
                </div>
                <!--Connecting to Google Maps for Autocompletion API-->
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrYOKQrKnN_OgxZau_JUvI4MjyJU-WBHE&libraries=places&callback=initMap&solution_channel=GMP_QB_addressselection_v1_cA" async defer></script>
                <hr><br>

                <!--Password Input-->
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" id="inputPassword" class="form-control" aria-describedby="passwordHelpBlock" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
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
                                Your password must have at least 8 characters
                            </li>
                            <li class="requirements big-letter">
                                <i class="fas fa-check text-success me-2"></i>
                                <i class="fas fa-times text-danger me-3"></i>
                                Your password must have at least 1 uppercase letter.
                            </li>
                            <li class="requirements num">
                                <i class="fas fa-check text-success me-2"></i>
                                <i class="fas fa-times text-danger me-3"></i>
                                Your password must have at least 1 number.
                            </li>
                            <li class="requirements special-char">
                                <i class="fas fa-check text-success me-2"></i>
                                <i class="fas fa-times text-danger me-3"></i>
                                Your password must have at least 1 special character.
                            </li>
                        </ul>
                    </div>

                </div>
                <br>
                <!--Confirm Password input field-->
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password:</label>
                    <input name="confirm_password" type="password" class="form-control" id="conf-password" required>
                    <div class="invalid-feedback">Field Cannot be Empty</div>
                </div>

                <span id="matching-message"></span>

                <hr><br>
                <!--Qualifications Input-->
                <div class="mb-3">
                    <label for="qualifications" class="form-label">Qualifications:</label>
                    <input name="qualifications" type="text" class="form-control" id="qualifications" required>
                    <div class="invalid-feedback">Field Cannot be Empty</div>
                </div>

                <!--Experience Input-->
                <div class="mb-3">
                    <label for="experience" class="form-label">Experience:</label>
                    <textarea name="experience" class="form-control" id="experience" rows="4" cols="50" required></textarea>
                    <div class="invalid-feedback">Field Cannot be Empty</div>
                </div>
                <hr><br>

                <!--Transport Radio Input-->
                <div class="row">
                    <div class="container-fluid col mb-3">
                        <label for="transport" class="form-label">Do you have your own transport?:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="transport" id="trans-Yes" value="1" required>
                            <label class="form-check-label" for="transport">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="transport" id="trans-No" value="0" required>
                            <label class="form-check-label" for="transport">
                                No
                            </label>
                            <div class="invalid-feedback">Please Select a Valid Option</div>
                        </div>
                    </div>

                    <!--Computer Skills Radio Input-->
                    <div class="container-fluid col mb-3">
                        <label for="computer_skills" class="form-label">Do you have Computer Skills?:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="computer_skills" id="comp-Yes" value="1" required>
                            <label class="form-check-label" for="computer_skills">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="computer_skills" id="comp-No" value="0" required>
                            <label class="form-check-label" for="computer_skills">No</label>
                            <div class="invalid-feedback">Please Select a Valid Option</div>
                        </div>
                    </div>
                </div>


                <!--Own Practice Radio Input-->
                <!--Own Practice Radio Input-->
                <label for="practice" class="form-label">Do you have your own Practice*</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="practice" id="prac-Yes" value="1" onclick="showPractice()" required>
                    <label class="form-check-label" for="practice">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="practice" id="prac-No" value="0" onclick="hidePractice()" required>
                    <label class="form-check-label" for="practice">No</label>
                    <div class="invalid-feedback">Please Select a Valid Option</div>

                    <hr><br>
                    <!--Practice Number Input-->
                    <div class="mb-3" id="box">
                        <label for="practice_number" class="form-label">Practice Number:</label>
                        <input name="practice_number" type="text" class="form-control" id="prac-number">
                    </div>

                    <!--Dispensing Number Input-->
                    <div class="mb-3">
                        <label for="dispense_number" class="form-label">Dispensing Number:</label>
                        <input name="dispense_number" type="text" class="form-control" id="dispense-number">
                    </div>
                    <hr>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Agree to the <a href="">terms and conditions</a>
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>

                    </div>
                    <!--Submit Button-->
                    <div class="text-center" style="padding-bottom: 20px;">
                        <button class="btn" type="submit">Register</button>

                    </div>

                </div>
                <a href="<?php $gClient->createAuthUrl() ?>" class="btn btn btn-primary btn-flat rounded-0">Register with Google</a>
                <p>Already have an account? <a href="">Log In</a></p>


            </form>
    </section>

    <!--Footer Begins Here-->
    <section id="footer">
        <footer class="bg-light text-center">
            <div class="container-fluid sticky-bottom text-center">
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
    <title>Nurse - Registration</title>

    <!--Importing Bootstrap and Linking CSS Styling-->
    <link rel="stylesheet" href="../styles.css">
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
    <header class="border-bottom py-3">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <!--Navbar Heading-->
                <a class="navbar-brand" href="#" style="color: #798A70;">
                    <h1 class="h2">Abahlengi</h1>
                </a>
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
            <form action="register-nurse.php" method="post" style="width: 40%;" class="was-validated" role="form" data-toggle="validator" novalidate>
                <h1 class="h1 text-center" style="color: #798A70; margin: auto; padding-bottom:10px">Nurse Portal Registration</h1>
                <p class="text-center" style="padding-bottom: 30px;">Register to join the network</p>


                <!--Use this section to integrate the 3rd party sign-ups with Google or MS Accounts-->
                <div class="container-fluid">

                </div>


                <!--First & Last Name Input-->
                <div class="row">
                    <div class="col mb-3">
                        <label for="first_name" class="form-label">First Name:</label>
                        <input name="first_name" type="text" class="form-control" id="first-name" required>
                        <div class="invalid-feedback">Field Cannot be Empty</div>
                    </div>
                    <div class="col mb-3">
                        <label for="last_name" class="form-label">Last Name:</label>
                        <input name="last_name" type="text" class="form-control" id="last-name" required>
                        <div class="invalid-feedback">Field Cannot be Empty</div>
                    </div>
                </div>
                <!-- Email Address Input-->
                <div class="mb-3" data-validate="email">
                    <label for="email" class="form-label">Email Address:</label>
                    <input name="email" type="email" class="form-control email-add" id="email-address" required>
                    <span class="valid-feedback"><i class="fa fa-check"></i> Valid Email</span>
                    <span id="invalid-email" class="invalid-feedback"><i class="fa fa-times"></i> Enter a Valid Email Address</span>
                </div>
                <!--Mobile Number Input-->
                <div class="mb-3">
                    <label for="mobile_number" class="form-label">Mobile Number:</label>
                    <input name="mobile_number" type="tel" class="form-control" id="mobile-number" required minlength="10">
                    <div class="invalid-feedback">Field Cannot be Empty</div>
                </div>
                <hr><br>
                <div class="row">
                    <div class="mb-3 col">

                        <!--Address Input-->
                        <label for="address" class="form-label">Address Line 1:</label>
                        <input type="text" placeholder="" class="form-control" id="location-input" name="address" required />
                        <div class="invalid-feedback">Field Cannot be Empty</div>
                    </div>
                    <div class="mb-3 col">
                        <label for="address-2" class="form-label">Address Line 2:</label>
                        <input type="text" class="form-control" placeholder="" name="address-2" />
                    </div>
                </div>
                <!--City Input-->
                <div class="row">
                    <div class="mb-3 col">
                        <label for="city" class="form-label">City:</label>
                        <input type="text" class="form-control" placeholder="" id="locality" name="city" required />
                        <div class="invalid-feedback">Field Cannot be Empty</div>
                    </div>
                    <!--Province Input-->
                    <div class="mb-3 col">
                        <label for="administrative_area_level_1" class="form-label">Province:</label>
                        <input type="text" class="half-input form-control" placeholder="" id="administrative_area_level_1-input" name="administrative_area_level_1" required />
                        <div class="invalid-feedback">Field Cannot be Empty</div>
                    </div>
                </div>
                <!--Postal Code Input-->
                <div class="row">
                    <div class="mb-3 col">
                        <label for="postal_code" class="form-label">Postal Code:</label>
                        <input type="text" class="half-input form-control" placeholder="" id="postal_code-input" name="postal_code" required />
                        <div class="invalid-feedback">Field Cannot be Empty</div>
                    </div>
                    <div class="mb-3 col"></div>
                </div>
                <!--Connecting to Google Maps for Autocompletion API-->
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrYOKQrKnN_OgxZau_JUvI4MjyJU-WBHE&libraries=places&callback=initMap&solution_channel=GMP_QB_addressselection_v1_cA" async defer></script>
                <hr><br>

                <!--Password Input-->
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" id="inputPassword" class="form-control" aria-describedby="passwordHelpBlock" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
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
                                Your password must have at least 8 characters
                            </li>
                            <li class="requirements big-letter">
                                <i class="fas fa-check text-success me-2"></i>
                                <i class="fas fa-times text-danger me-3"></i>
                                Your password must have at least 1 uppercase letter.
                            </li>
                            <li class="requirements num">
                                <i class="fas fa-check text-success me-2"></i>
                                <i class="fas fa-times text-danger me-3"></i>
                                Your password must have at least 1 number.
                            </li>
                            <li class="requirements special-char">
                                <i class="fas fa-check text-success me-2"></i>
                                <i class="fas fa-times text-danger me-3"></i>
                                Your password must have at least 1 special character.
                            </li>
                        </ul>
                    </div>

                </div>
                <br>
                <!--Confirm Password input field-->
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password:</label>
                    <input name="confirm_password" type="password" class="form-control" id="conf-password" required>
                    <div class="invalid-feedback">Field Cannot be Empty</div>
                </div>

                <span id="matching-message"></span>

                <hr><br>
                <!--Qualifications Input-->
                <div class="mb-3">
                    <label for="qualifications" class="form-label">Qualifications:</label>
                    <input name="qualifications" type="text" class="form-control" id="qualifications" required>
                    <div class="invalid-feedback">Field Cannot be Empty</div>
                </div>

                <!--Experience Input-->
                <div class="mb-3">
                    <label for="experience" class="form-label">Experience:</label>
                    <textarea name="experience" class="form-control" id="experience" rows="4" cols="50" required></textarea>
                    <div class="invalid-feedback">Field Cannot be Empty</div>
                </div>
                <hr><br>

                <!--Transport Radio Input-->
                <div class="row">
                    <div class="container-fluid col mb-3">
                        <label for="transport" class="form-label">Do you have your own transport?:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="transport" id="trans-Yes" value="1" required>
                            <label class="form-check-label" for="transport">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="transport" id="trans-No" value="0" required>
                            <label class="form-check-label" for="transport">
                                No
                            </label>
                            <div class="invalid-feedback">Please Select a Valid Option</div>
                        </div>
                    </div>

                    <!--Computer Skills Radio Input-->
                    <div class="container-fluid col mb-3">
                        <label for="computer_skills" class="form-label">Do you have Computer Skills?:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="computer_skills" id="comp-Yes" value="1" required>
                            <label class="form-check-label" for="computer_skills">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="computer_skills" id="comp-No" value="0" required>
                            <label class="form-check-label" for="computer_skills">No</label>
                            <div class="invalid-feedback">Please Select a Valid Option</div>
                        </div>
                    </div>
                </div>


                <!--Own Practice Radio Input-->
                <!--Own Practice Radio Input-->
                <label for="practice" class="form-label">Do you have your own Practice*</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="practice" id="prac-Yes" value="1" onclick="showPractice()" required>
                    <label class="form-check-label" for="practice">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="practice" id="prac-No" value="0" onclick="hidePractice()" required>
                    <label class="form-check-label" for="practice">No</label>
                    <div class="invalid-feedback">Please Select a Valid Option</div>

                    <hr><br>
                    <!--Practice Number Input-->
                    <div class="mb-3" id="box">
                        <label for="practice_number" class="form-label">Practice Number:</label>
                        <input name="practice_number" type="text" class="form-control" id="prac-number">
                    </div>

                    <!--Dispensing Number Input-->
                    <div class="mb-3">
                        <label for="dispense_number" class="form-label">Dispensing Number:</label>
                        <input name="dispense_number" type="text" class="form-control" id="dispense-number">
                    </div>
                    <hr>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Agree to the <a href="">terms and conditions</a>
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>

                    </div>
                    <!--Submit Button-->
                    <div class="text-center" style="padding-bottom: 20px;">
                        <button class="btn" type="submit">Register</button>

                    </div>

                </div>
                <a href="<?php $gClient->createAuthUrl() ?>" class="btn btn btn-primary btn-flat rounded-0">Register with Google</a>
                <p>Already have an account? <a href="">Log In</a></p>


            </form>
    </section>

    <!--Footer Begins Here-->
    <section id="footer">
        <footer class="bg-light text-center">
            <div class="container-fluid sticky-bottom text-center">
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