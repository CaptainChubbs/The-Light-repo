
<!DOCTYPE html>
<html lang="en">
<?php 
  $title = "Contact Us";
  include("./head.php");
?> 
<body>

<?php include("./nav.php"); ?>

    <main>
        <div class="container-fluid text-center py-3" >
            <div class="row ">
                <div class="col-12 text-center">
                    <h1 class="display-2">Contact Us</h1>
                    <p>Get in Touch with one of our team:</p>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="contact-sect">
            <div class="row">
                <div class="col-12 col-lg-5 offset-lg-1 mx-4 my-4 order-2 order-lg-1">
                    <h3>Abahlengi</h3>
                    <p style="width: 20rem;">Abahlengi is a home nursing agency that provides home nursing services to patients in the comfort of their homes.</p>
                    <a href="mailto:info@abahlengi.com"><i class="fa-solid fa-envelope"></i> info@abahlengi.com</a><br>
                    <a href="tel: +27715667236"><i class="fa-solid fa-phone"></i> +27 71 566 7236</a><br>
                    <a href="https://www.google.com/maps/place/WeWork+-+Coworking+%26+Office+Space/@-26.1458466,28.0412706,17z/data=!3m1!4b1!4m6!3m5!1s0x1e950dcd57eac3bf:0x2c4556de75b244a5!8m2!3d-26.1458514!4d28.0438455!16s%2Fg%2F11fk4sjcy4?entry=ttu"><i class="fa-sharp fa-solid fa-location-pin"></i>1F, 173 Oxford Rd, Rosebank, Johannesburg, 2196</a>
                    <p class="pt-4">Find Us on Social Media:</p>
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-linkedin"></i></a>
                    <a href=""><i class="fa-brands fa-x-twitter"></i></a>


                    

                </div>
                <div class="col-12 col-lg-6 mx-4 my-4 order-lg-2 order-1">
                    <form action="" method="post" novalidate class="was-validated">
                      <div class="row">
                        <div class="col-10 col-lg-6">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="first" required>
                            <label for="floatingInput">First name</label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-10 col-lg-6">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="last" >
                            <label for="floatingInput">Last name(Optional)</label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-10 col-lg-6">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Company name" aria-label="Company name" name="company">
                            <label for="floatingInput">Company Name(Optional)</label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-6">
                            <div class=" mb-3">
                                <select class="form-select" aria-label="Default select example" name="province" id="province">
                                <option selected>Select a Province</option>
                                <option value="Eastern Cape">Eastern Cape</option>
                                <option value="Free State">Free State</option>
                                <option value="Gauteng">Gauteng</option>
                                <option value="KwaZulu-Natal">KwaZulu-Natal</option>
                                <option value="Limpopo">Limpopo</option>
                                <option value="Mpumalanga">Mpumalanga</option>
                                <option value="North West">North West</option>
                                <option value="Northern Cape">Northern Cape</option>
                                <option value="Western Cape">Western Cape</option>
                                </select>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-10 col-lg-6">
                          <div class="form-floating mb-3">
                            <input type="email" class="form-control" placeholder="Email Address" aria-label="Email Address" name="email" required>
                            <label for="floatingInput">Email Address</label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-10 col-lg-6">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Contact Number" aria-label="Contact number" name="number" required>
                            <label for="floatingInput">Contact Number</label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-10 col-lg-6">
                          <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave us a message here" id="message" name="message" required></textarea>
                            <label for="message">Message</label>
                          </div>
                        </div>
                      </div>
                      <div class="row text-center pt-4">
                        <div class="col-10 col-lg-6">
                          <input type="submit" class="btn btn-green" value="Send Message" name="insert" id="insert">
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>

    </main>
    <?php include_once("./footer.php"); ?>

</body>
</html>

<?php

//Waiting for user to click submit button
if(isset($_POST['insert'])){


    include_once("../admin/functions/common_functions.php");

    //assigning form values to php variables
    $first_name = $_POST['first'];
    $last_name = $_POST['last'];
    $company_name = $_POST['company'];
    $province = $_POST['province'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];






        //Sanitizing inputs
        $first_name = sanitize($first_name);
        $last_name = sanitize($last_name);
        $company_name = sanitize($company_name);
        $email = sanitize($email);
        $number = sanitize($number);
        $province = sanitize($province);
        $message = sanitize($message);
        $status = "Unattended";

        $name = $first_name. " ".$last_name;



        //Inserting products
        $inquiry_insert="INSERT INTO `inquiries`( `name`, `company`, `email`, `number`, `province`, `message`, `status`, `date`) 
        VALUES 
        ('$name','$company_name','$email','$number','$province','$message','$status', NOW())";
        $results_query = mysqli_query($conn,$inquiry_insert);

        if($results_query){
            echo "<script>alert('Message sent')</script>";
            echo "<script>window.open('contact.php','_self')</script>";
        }

    }

?>