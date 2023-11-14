<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Login Page Title-->
  <title>Customer - Registration</title>
  <!--Importing Bootstrap and Linking CSS Styling-->
  <link rel="stylesheet" href="styles.css">
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
  <header class="py-3">
<?php include("./includes/nav.php"); ?>

  </header>
  
  <!--Nurse Portal Login Page Begins-->
  <section id="form-container">
    <div class="container-fluid flex-column align-items-center justify-content-center" style="padding: 50px 0; width: 40%;">
      <!--Form Begins-->

      <h1 class="h1 text-center" style="color: #798A70; margin: auto; padding-bottom:10px">Client Registration</h1>
      <p class="text-center" style="padding-bottom: 30px;">Register to Book your Event Today</p>
      <!--Use this section to integrate the 3rd party sign-ups with Google or MS Accounts-->
      <div class="container-fluid">
      </div>
      <!-- Client Type -->
      <div class="mb-3">
        <label for="client-type" class="form-label">Client Type:</label>
        <select class="form-select" aria-label="Default select example" id="client-type" name="clientType" required>
          <option selected disabled value="">Select Client Type</option>
          <option value="Individual">Individual</option>
          <option value="Business">Business</option>
        </select>
        <div class="invalid-feedback">Field Cannot be Empty</div>
      </div>
      <!-- Individual form -->
      <div class="individual-form">
        <form action="register-client.php" method="post" class="needs-validation individual" role="form" data-toggle="validator">
          <input type="hidden" value="Individual" name="form_type">
          <!-- Name and Surname Inputs -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="first-name" class="form-label">First Name:</label>
              <input type="text" class="form-control" id="first-name" name="first_name" required>
              <div class="invalid-feedback">Field Cannot be Empty</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="last-name" class="form-label">Last Name:</label>
              <input type="text" class="form-control" id="last-name" name="last_name" required>
              <div class="invalid-feedback">Field Cannot be Empty</div>
            </div>
          </div>
          <!-- Date of birth -->
          <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth:</label>
            <input type="date" class="form-control" id="dob" name="dob" required min="1900-01-01" max="2005-12-31">
            <div class="invalid-feedback">Field Cannot be Empty</div>
          </div>
          <!-- Email Input -->
          <div class="mb-3" data-validate="email">
            <label for="email-address" class="form-label">Email Address:</label>
            <input type="email" class="form-control email-add" id="email-address" name="email">
            <span class="valid-feedback"><i class="fa fa-check"></i> Valid Email</span>
            <span id="invalid-email" class="invalid-feedback"><i class="fa fa-times"></i> Enter a Valid Email Address</span>
          </div>
          <!-- Number Input -->
          <div class="mb-3">
            <label for="phone-number" class="form-label">Phone Number:</label>
            <input type="tel" class="form-control" id="phone-number" name="phone_number" required minlength="10">
            <div class="invalid-feedback">Field Cannot be Empty</div>
          </div>
          <!-- Address Inputs -->
          <div class="row">
            <div class="col mb-3">
              <label for="address" class="form-label">Address:</label>
              <input type="text" class="form-control" id="address" name="address" required>
              <div class="invalid-feedback">Field Cannot be Empty</div>
            </div>
          </div>
          <!-- City, State & Country Selector -->
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="city" class="form-label">City:</label>
              <input type="text" class="form-control" id="city" name="city" required>
              <div class="invalid-feedback">Field Cannot be Empty</div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="province" class="form-label">Province:</label>
              <input type="text" class="form-control" id="province" name="province" required>
              <div class="invalid-feedback">Field Cannot be Empty</div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="postal-code" class="form-label">Post Code:</label>
              <input type="text" class="form-control" id="postal-code" name="postal_code" required>
              <div class="invalid-feedback">Field Cannot be Empty</div>
            </div>
          </div>
          <!--Password Input-->
          <label for="inputPassword" class="form-label">Password</label>
          <input type="password" id="inputPassword" class="form-control password" aria-describedby="passwordHelpBlock" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="password" required>
          <!--Password Instructions-->
          <div id="passwordHelpBlock" class="form-text">
            Your password must be 8-20 characters long, contain letters, special characters and numbers, and must not contain spaces, or emoji.
          </div>
          <br>
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
            <label for="conf-password" class="form-label">Confirm Password:</label>
            <input type="password" class="form-control confirm-password" id="conf-password" name="confirm_password" required>
            <div class="invalid-feedback">Field Cannot be Empty</div>
          </div>
          <span id="matching-message"></span>
          <hr>
          <br>
          <!--Submit Button-->

          <p>Already have an account? <a href="client-login.php">Log In</a></p>
          <button class="btn btn-primary" type="submit">Register</button>
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
      </div>
      <!-- Business form -->
      <div class="business-form">
        <form action="register-client.php" method="post" class="needs-validation business" role="form" data-toggle="validator">
          <input type="hidden" value="Business" name="form_type">
          <!-- Name and Surname Inputs -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="first-name" class="form-label">Business Name:</label>
              <input type="text" class="form-control" id="business-name" name="business_name" required>
              <div class="invalid-feedback">Field Cannot be Empty</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="last-name" class="form-label">Business Type:</label>
              <input type="text" class="form-control" id="business-type" name="business_type" required>
              <div class="invalid-feedback">Field Cannot be Empty</div>
            </div>
          </div>
          <!-- Email, Phone number and Address inputs -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="email-address" class="form-label">Email Address:</label>
              <input type="email" class="form-control email-address" id="email-address-2" name="email" required>
              <div class="invalid-feedback">Field Cannot be Empty</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="phone-number" class="form-label">Phone Number:</label>
              <input type="tel" class="form-control" id="phone-number-2" name="phone_number" required minlength="10">
              <div class="invalid-feedback">Field Cannot be Empty</div>
            </div>
          </div>
          <div class="row">
            <div class="col mb-3">
              <label for="address" class="form-label">Address:</label>
              <input type="text" class="form-control" id="address-2" name="address" required>
              <div class="invalid-feedback">Field Cannot be Empty</div>
            </div>
          </div>
          <!-- City, State & Country Selector -->
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="city" class="form-label">City:</label>
              <input type="text" class="form-control" id="city-2" name="city" required>
              <div class="invalid-feedback">Field Cannot be Empty</div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="province" class="form-label">Province:</label>
              <input type="text" class="form-control province" id="province-2" name="province" required>
              <div class="invalid-feedback">Field Cannot be Empty</div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="postal-code" class="form-label">Post Code:</label>
              <input type="text" class="form-control postal-code" id="postal-code-2" name="postal_code" required>
              <div class="invalid-feedback">Field Cannot be Empty</div>
            </div>
            <!--Password Input-->
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" id="inputPassword-2" class="form-control" aria-describedby="passwordHelpBlock" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="password" required>
            <!--Password Instructions-->
            <div id="passwordHelpBlock" class="form-text">
              Your password must be 8-20 characters long, contain letters, special characters and numbers, and must not contain spaces, or emoji.
            </div>
            <br>
            <div class="mb-3">
              <label for="conf-password" class="form-label">Confirm Password:</label>
              <input type="password" class="form-control" id="conf-password-2" name="confirm_password" required>
              <div class="invalid-feedback">Field Cannot be Empty</div>
            </div>
            <span id="matching-message"></span>
            <hr>
            <br>
            <!--Submit Button-->
            <!-- Login link -->
            <p>Already have an account? <a href="client-login.php">Log In</a></p>
            <button class="btn btn-primary" type="submit">Register</button>
          </div>
        </form>
      </div>
    </div>
  </section>
  <section id="footer">
    <?php include "includes/footer.php"; ?>
  </section>
  <!--Bootstrap Scripting-->
</body>

</html>