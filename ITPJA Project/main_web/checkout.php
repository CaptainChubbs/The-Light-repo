<!DOCTYPE html>

<html lang="en">

<?php 

  include_once __DIR__ ."/functions/common_functions.php";



  $title = "Services";

  include("./head.php");
  if(isset($_SESSION["loggedin"]) AND $_SESSION["loggedin"] == true) {
    $getUserId = $_SESSION['clientID'];}else{
      header('Location: index.php');
    }

  $getServiceID = $_GET["service_id"]

?> 

<body>



<?php include("./nav.php"); ?>







    <main id="services-sect">

        <div class="container-fluid text-center py-3">

            <div class="row ">

                <div class="col-12 text-center">

                    <h1 class="display-2">Your Service Request</h1>

                    <p>We are going to need some additional information about your event</p>

                </div>

            </div>

        </div>



        

        

        <div class="container-fluid">

            <form action="" method="post" novalidate class="was-validated">

        <div class="row">

            <div class="col-4 offset-1">

                <div class="form-floating mb-3">

                <input type="text" class="form-control" placeholder="" id="floatingInput" name="address1" required>

                <label for="floatingInput">Address 1:</label>

                <div class="invalid-feedback">This field is required</div>

                </div>

            </div>

            <div class="col-4">

                <div class="form-floating mb-3">

                <input type="text" class="form-control" placeholder="" name="address2" id="floatingInput">

                <label for="floatingInput">Address 2(Optional):</label>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-4 offset-1">

                <div class="form-floating mb-3">

                <input type="text" class="form-control" placeholder="" name="suburb" id="floatingInput" required>

                <label for="floatingInput">Suburb:</label>

                <div class="invalid-feedback">This field is required</div>

                </div>

            </div>

            <div class="col-4">

                <div class="form-floating mb-3">

                <input type="text" class="form-control" placeholder="" name="city" id="floatingInput" required>

                <label for="floatingInput">City:</label>

                <div class="invalid-feedback">This field is required</div>

                </div>

            </div>

        </div>



        <div class="row">

            <div class="col-4 offset-1">

                            <div class=" mb-3">

                                <select class="form-select" aria-label="Default select example" name="province">

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

            <div class="col-2">

            <div class="form-floating mb-3">

                <input type="text" class="form-control" placeholder="" name="postalcode" id="floatingInput" required>

                <label for="floatingInput">Postal Code:</label>

                <div class="invalid-feedback">This field is required</div>

                </div>

            </div>

            </div>

        </div>

        <div class="row">

            <div class="col-4 offset-1">

                <div class="form-floating mb-3">

                <input type="number" class="form-control" placeholder="" name="numNurses" id="floatingInput" required>

                <label for="floatingInput">Number of Nurses needed:</label>

                </div>

            </div>

        </div>

        <div class="row">

                <div class="col-4 offset-1">

                <div class="form-floating mb-3">

                <input type="date" class="form-control" placeholder="" name="startDate" id="floatingInput" required>

                <label for="floatingInput">Starting Date:</label>

                </div>

            </div>

            <div class="col-4">

                <div class="form-floating mb-3">

                <input type="number" class="form-control" placeholder="" name="days" id="floatingInput" required>

                <label for="floatingInput">How many days is the event(including the starting):</label>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-4 offset-1">

            <div class="form-floating">

            <textarea class="form-control" placeholder="" id="floatingTextarea2" name="addInfo" style="height: 100px"></textarea>

            <label for="floatingTextarea2">Any Additional Information</label>

            </div>

            </div>

        </div>



        <div class="row">

            <div class="col-12 text-center">

                <input type="submit" name="submit" id="submit" class="btn btn-green" value="Proceed to payment">

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



if(isset($_POST["submit"])) {



    $getUserInfo = "SELECT * FROM `client` WHERE clientID = '$getUserId'";

    $result_query = mysqli_query($conn,$getUserInfo);

    $row = mysqli_fetch_assoc($result_query);

    $userType = $row["clientType"];

    if($userType == "Individual") {

        $userName = $row["first_name"] ." ". $row["last_name"];

        $email = $row["email"];

    }

    else if($userType == "Business") {

        $userName = $row["company_name"];

        $email = $row["email"];  

    }



    $getServiceInfo = "SELECT * FROM `services` WHERE service_id = '$getServiceID'";

    $result_query = mysqli_query($conn,$getServiceInfo);

    $row = mysqli_fetch_assoc($result_query);

    $service_name = $row["service_name"];

    $service_rate = $row["service_rate"];



    $address = $_POST['address1'] ." ". $_POST['address2'];

    $suburb = $_POST['suburb'];

    $city = $_POST['city'];

    $province = $_POST['province'];

    $postalCode = $_POST['postalcode'];

    $numNurses = $_POST['numNurses'];

    $startDate = $_POST['startDate'];

    $numDays = $_POST['days'];

    $addInfo = $_POST['addInfo'];

    $status = "Awaiting Approval";

    $date_submitted=date("d/m/y");




    $insert_Request = "INSERT INTO `service_request` (service_name, service_rate,user_id,user_name,email,user_type,needed_nurses,start_date,num_days,additional_information,address,suburb,city,province,postal_code, status, date_submitted) 
        VALUES 
    ('$service_name', $service_rate, $getUserId, '$userName', '$email', '$userType', $numNurses, '$startDate', $numDays, '$addInfo', '$address', '$suburb', '$city', '$province', $postalCode, '$status', date(NOW()))";



$new_request = mysqli_query($conn,$insert_Request);
$depositAmount =($service_rate * $numNurses * $numDays)*0.2;

if($new_request) {
            //Writing out the select query in a variable
      
    $delete_query = "DELETE FROM `cart_details` WHERE client_id  = $getUserId";     
    $results_query = mysqli_query($conn, $delete_query);
    $getReqID = "SELECT * FROM `service_request` WHERE user_id = $getUserId AND needed_nurses = $numNurses AND start_date = '$startDate'";

    $result = mysqli_query($conn,$getReqID);
    $row = mysqli_fetch_assoc($result);
    $reqID = $row["service_request_id"];
    echo "<script>window.open('pay.html?rate=$depositAmount&num=$numNurses&numDays=$numDays&service_request_id=$reqID','_self')</script>";


}

else{

    echo "<script>alert('Error: Please Try Again Later')</script>";

}}



