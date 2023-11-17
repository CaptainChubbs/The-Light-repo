<?php
session_start();
require_once("includes/connect.php");
include_once("./includes/head.php");

// display errors
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);

if(!(isset($_SESSION['loggedin'])) OR $_SESSION['loggedin'] == false){

    echo"<script>window.open(' client-login.php', '_self')</script>";

}

// Fetch client data
if (isset($_GET['clientID'])) {
    $clientID = $_GET['clientID'];
    // Check for existing events on the specified date and time
    $existingEvent = checkExistingEvent($_POST['event_date'], $_POST['start_time'], $_POST['end_time']);

    function checkExistingEvent($event_date, $start_time, $end_time){
        $sql = "SELECT * FROM event 
        WHERE event_date = '$event_date' 
        AND (
            (start_time >= '$start_time' AND start_time < '$end_time') OR
            (end_time > '$start_time' AND end_time <= '$end_time') OR
            (start_time <= '$start_time' AND end_time >= '$end_time')
        )";

        // Execute the query
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            // Event exists at the specified date and time
            $con->close();
            return true;
        } else {
            // No event at the specified date and time
            $con->close();
            return false;
        }
    }

    if ($existingEvent) {
        // Display a message to the user that the slot is already booked
        echo "<script>alert('Sorry, the selected date and time are not available.');</script>";

        // You may want to retain the user's input, which is already in the form fields
        // You can do this by pre-filling the form fields with the submitted values
        // Add the 'value' attribute to your input fields, e.g., value="<?php echo $_POST['first_name']; "
    } else {
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process form data
            $event_name = $_POST["event_name"];
            $event_date = $_POST["event_date"];
            $start_time = $_POST["start_time"];
            $end_time = $_POST["end_time"];
            $event_location = $_POST["event_location"];
            $event_city = $_POST["event_city"];
            $event_province = $_POST["event_province"];
            $event_type = $_POST["event_type"];
            $event_status = $_POST["event_status"];
            $event_description = $_POST["event_description"];

            // Add the event
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
                description
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
                '$event_description'
            )";

            if ($con->query($sql_event) === TRUE) {
                // Retrieve the auto-generated event ID
                $eventID = $con->insert_id;

                echo "Event added successfully!";
            } else {
                echo "Error adding event: " . $con->error;
            }

            $originalPrice = calculateOriginalPrice($_POST['service_id']); 

            $depositAmount = $originalPrice * 0.15;

            // Redirect to PayPal with the necessary parameters
            header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=YOUR_PAYPAL_EMAIL&amount=$depositAmount&currency=USD&item_name=Event%20Deposit&return=RETURN_URL&cancel_return=CANCEL_URL");
            exit;
        }
    }

    function calculateOriginalPrice($service_id) {
        
    
        // Prepare the SQL query to get the price based on service_id
        $sql = "SELECT service_rate FROM services WHERE service_id = '$service_id'";
    
        // Execute the query
        $result = $con->query($sql);
    
        // Check if there is a result
        if ($result && $result->num_rows > 0) {
            // Fetch the row and get the price
            $row = $result->fetch_assoc();
            $price = $row['service_rate'];
    
            // Close the database connection
            $con->close();
    
            return $price;
        } else {
            // Close the database connection
            $con->close();
    
            // Handle the case where the service_id is not found
            return "Service not found";
        }
    }
    
    // Example usage
    $service_id = 1; // Replace with the actual service_id
    $originalPrice = calculateOriginalPrice($service_id);
    
    // Use $originalPrice as needed in your code
    echo "The original price is: $originalPrice";
    
}


$con->close();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Client Events</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
     <!--Navigation Bar Begins-->
    <?php include("nav.php"); ?>

    <form method="post">
        <!-- Populate form fields with client data -->
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : (isset($first_name) ? $first_name : ''); ?>" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : (isset($last_name) ? $last_name : ''); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : (isset($email) ? $email : ''); ?>" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="tel" class="form-control" id="phone_number" name="phone_number" value="<?php echo isset($_POST['phone_number']) ? $_POST['phone_number'] : (isset($phone_number) ? $phone_number : ''); ?>" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : (isset($address) ? $address : ''); ?>" required>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="event-city">City:</label>
                <input type="text" class="form-control" id="event-city" name="event_city" value="<?php echo isset($_POST['event_city']) ? $_POST['event_city'] : ''; ?>" required>
            </div>
            <div class="col">
                <label for="event-province">Province:</label>
                <select class="form-control" id="event-province" name="event_province" required>
                    <!-- default option -->
                    <option value="" selected disabled>Select Province</option>
                    <option value="Gauteng">Gauteng</option>
                    <option value="Limpopo">Limpopo</option>
                    <option value="Mpumalanga">Mpumalanga</option>
                    <option value="North West">North West</option>
                    <option value="Free State">Free State</option>
                    <option value="Northern Cape">Northern Cape</option>
                    <option value="Eastern Cape">Eastern Cape</option>
                    <option value="Western Cape">Western Cape</option>
                    <option value="KwaZulu-Natal">KwaZulu-Natal</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="postal_code">Postal Code:</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" value="<?php echo isset($_POST['postal_code']) ? $_POST['postal_code'] : (isset($postal_code) ? $postal_code : ''); ?>" required>
        </div>
        <div class="form-group">
            <label for="event-name">Event Name:</label>
            <input type="text" class="form-control" id="event-name" name="event_name" value="<?php echo isset($_POST['event_name']) ? $_POST['event_name'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="event-date">Date:</label>
            <input type="date" class="form-control" id="event-date" name="event_date" required>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time:</label>
            <input type="time" class="form-control" id="start-time" name="start_time" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time:</label>
            <input type="time" class="form-control" id="end-time" name="end_time" required>
        </div>
        <!-- Remaining form fields... -->

        <!-- Rest of the form remains unchanged -->

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Include JavaScript and Bootstrap scripts as in your original code -->

    <script src="create-event.js">
        document.addEventListener("DOMContentLoaded", function() {
        let selectedProvince = document.getElementById("event-province");

        selectedProvince.addEventListener("change", function() {
            // Get the selected province
            let selectedProvince = this.value;

            // Rest of the existing code...

            // When the user submits the form
            document.querySelector("form").addEventListener("submit", function(event) {
                event.preventDefault(); // Prevent the default form submission

                // Check if the user is logged in
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
                    // Collect form data
                    let formData = new FormData(this);
                    / formData.append("additionalField", additionalValue);

                    // Send a POST request to the Node.js server
                    fetch("http://localhost:3000/api/book-event", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify(Object.fromEntries(formData)),
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Handle the response from the server
                        console.log(data);
                        // Redirect to the payment page or show a confirmation message
                        // You may want to add logic here based on the server response
                    })
                    catch(error => {
                        console.error("Error:", error);
                        // Handle errors, show an error message to the user, etc.
                    });
                <?php } else { ?>
                    // Redirect to the login page if the user is not logged in
                    window.location.href = "./client/client-login.php";
                <?php } ?>
            });
        });
    });
    </script>
    

    <?php include_once("./includes/footer.php"); ?>
</body>

</html>
