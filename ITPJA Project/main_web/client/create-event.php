

<!DOCTYPE html>

<html lang="en">

<?php 

  $title = "Event Booking";
  session_start();
  require_once("includes/connect.php");
  include_once("./includes/head.php");

  // display errors
    ini_set('display_errors', 1);
    error_reporting(E_ALL | E_STRICT);

  if(isset($_SESSION["loggedin"]) AND $_SESSION["loggedin"] == true){
    $clientID = $_SESSION["clientID"];

    $getDetails = "SELECT * FROM `client` WHERE clientID = $clientID";
    $getResults = mysqli_query($con, $getDetails);
    $row = mysqli_fetch_assoc($getResults);
    $name = $row['first_name'];
    $last_name = $row['last_name'];
    $company = $row['company_name'];
    if($company == NULL){
      $company = '';
    }
    $province = $row['province'];
    $email = $row['email'];
    $phone = $row['phone_number'];

    
  } else {
    if(!(isset($_SESSION['loggedin'])) OR $_SESSION['loggedin'] == false){

        echo"<script>window.open(' client-login.php', '_self')</script>";
    
    } 
  }

  
  function calculateOriginalPrice($service_id, $con)
  {
      // Prepare the SQL query to get the price based on service_id
      $sql = "SELECT service_rate FROM services WHERE service_id = '$service_id'";
  
      // Execute the query
      $result = $con->query($sql);
  
      // Check if there is a result
      if ($result && $result->num_rows > 0) {
          // Fetch the row and get the price
          $row = $result->fetch_assoc();
          $price = $row['service_rate'];
  
          return $price;
      } else {
          // Handle the case where the service_id is not found
          return "Service not found";
      }
  }
  
  // Check for existing events on the specified date and time
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = $_POST["event_name"];
    $event_date = $_POST["event_date"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];
    $event_location = $_POST["event_location"] ?? '';
    $event_city = $_POST["event_city"] ?? '';
    $event_province = $_POST["event_province"] ?? '';
    $event_type = $_POST["event_type"] ?? '';
    $event_status = $_POST["event_status"] ?? '';
    $event_description = $_POST["event_description"] ?? '';
    $numNurses = $_POST["numNurses"];

    // Check for existing events on the specified date and time
    $existingEvent = checkExistingEvent($event_date, $start_time, $end_time, $con);

    if ($existingEvent) {
        // Display a message to the user that the slot is already booked
        echo "<script>alert('Sorry, the selected date and time are not available.');</script>";
    } else {
      $sql_event = "INSERT INTO event (
        event_type,
        event_status,
        event_name,
        event_date,
        start_time,
        end_time,
        event_location,
        city,
        province,
        description,
        numNurses
        ) VALUES 
          (
              '$event_type',
              '$event_status',
              '$event_name',
              '$event_date',
              '$start_time',
              '$end_time',
              '$event_location',
              '$event_city',
              '$event_province',
              '$event_description',
              $numNurses
          )";

          if ($con->query($sql_event) === TRUE) {
            // Retrieve the auto-generated event ID
            $eventID = $con->insert_id;

            echo "<script>alert('Event added successfully!');</script>";

            // You can add additional logic or redirect the user after successful event insertion

        } else {
            echo "<script>alert('Error adding event: " . $con->error . "');</script>";
        }
    }
  }
  
  function checkExistingEvent($event_date, $start_time, $end_time, $con) {
    $sql = "SELECT * FROM event 
        WHERE event_date = '$event_date' 
        AND (
            (start_time >= '$start_time' AND start_time < '$end_time') OR
            (end_time > '$start_time' AND end_time <= '$end_time') OR
            (start_time <= '$start_time' AND end_time >= '$end_time')
        )";
      $result = $con->query($sql);
      if ($result->num_rows > 0) {
          // Event exists at the specified date and time
          return true;
      } else {
          // No event at the specified date and time
          return false;
      }
  }
?> 

<body>



<?php include("./nav.php"); ?>



    <main>
    <div class="container-fluid text-center py-3">
            <div class="row">
                <div class="col-12 col-lg-6 mx-auto my-4">
                    <h1 class="display-4">Event Booking</h1>


                    <form action="" method="post" novalidate class="was-validated">

                      <?php if(isset($_SESSION["loggedin"]) AND $_SESSION["loggedin"]==true){
                      ?>
                                            <div class="row">

<div class="col-10 col-lg-6">

  <div class="form-floating mb-3">

    <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="first" value=<?php echo $name;?> required>

    <label for="floatingInput">First name</label>

  </div>

</div>

</div>

<div class="row">

<div class="col-10 col-lg-6">

  <div class="form-floating mb-3">

    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="last" value=<?php echo $last_name;?> >

    <label for="floatingInput">Last name(Optional)</label>

  </div>

</div>

</div>

<div class="row">

<div class="col-10 col-lg-6">

  <div class="form-floating mb-3">

    <input type="text" class="form-control" placeholder="Company name" aria-label="Company name" name="company" value=<?php echo $company;?>>

    <label for="floatingInput">Company Name(Optional)</label>

  </div>

</div>

</div>

<div class="row">

<div class="col-6">

    <div class=" mb-3">

        <select class="form-select" aria-label="Default select example" name="province" id="province" selected=<?php echo $province;?>>

        <option>Select a Province</option>

        <option value="Eastern Cape"
        <?php if($province == "Eastern Cape"){echo "Selected";}; ?>>
        Eastern Cape</option>

        <option value="Free State"
        <?php if($province == "Free State"){echo "Selected";}; ?>>
        Free State</option>

        <option value="Gauteng"
        <?php if($province == "Gauteng"){echo "Selected";}; ?>>
        Gauteng</option>

        <option value="KwaZulu-Natal"
        <?php if($province == "KwaZulu-Natal"){echo "Selected";}; ?>>
        KwaZulu-Natal</option>

        <option value="Limpopo"
        <?php if($province == "Limpopo"){echo "Selected";}; ?>>
        Limpopo</option>

        <option value="Mpumalanga"
        <?php if($province == "Mpumalanga"){echo "Selected";}; ?>>
        Mpumalanga</option>

        <option value="North West"
        <?php if($province == "North West"){echo "Selected";}; ?>>
        North West</option>

        <option value="Northern Cape"
        <?php if($province == "Northern Cape"){echo "Selected";}; ?>>
        Northern Cape</option>

        <option value="Western Cape"
        <?php if($province == "Western Cape"){echo "Selected";}; ?>>
        Western Cape</option>

        </select>

    </div>

</div>

<div class="row">

    <div class="col-10 col-lg-6">

        <div class="form-floating mb-3">

            <input type="text" class="form-control" placeholder="Event Name" aria-label="Event Name" name="event_name" required>

            <label for="event_name">Event Name</label>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-10 col-lg-6">

        <div class="form-floating mb-3">

            <input type="date" class="form-control" id="event-date" name="event_date" required>

            <label for="event-date">Date</label>

        </div>

    </div>
    
</div>

<div class="row">

    <div class="col-10 col-lg-6">

        <div class="form-floating mb-3">

            <input type="time" class="form-control" id="start-time" name="start_time" required>

            <label for="start-time">Start Time</label>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-10 col-lg-6">

        <div class="form-floating mb-3">

            <input type="time" class="form-control" id="end-time" name="end_time" required>

            <label for="end-time">End Time</label>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-10 col-lg-6">

        <div class="form-floating mb-3">

            <input type="number" class="form-control" placeholder="Number of Nurses" aria-label="Number of Nurses" name="numNurses" required>

            <label for="numNurses">Number of Nurses</label>

        </div>

    </div>
    
</div>

                
<div class="row">

<div class="col-10 col-lg-6">

  <div class="form-floating mb-3">

    <input type="email" class="form-control" placeholder="Email Address" aria-label="Email Address" name="email" value=<?php echo $email;?> required>

    <label for="floatingInput">Email Address</label>

  </div>

</div>

</div>

<div class="row">

<div class="col-10 col-lg-6">

  <div class="form-floating mb-3">

    <input type="text" class="form-control" placeholder="Contact Number" aria-label="Contact number" name="number" value=<?php echo $phone;?> required>

    <label for="floatingInput">Contact Number</label>

  </div>

</div>

</div>

                      <?php
                      }else{
                        ?>
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

                        <?php
                      }?>
                      <div class="row">

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

    <?php include_once("./includes/footer.php"); ?>

</body>
</html>
