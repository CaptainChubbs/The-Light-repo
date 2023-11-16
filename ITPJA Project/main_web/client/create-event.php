<?php
session_start();
require_once("includes/connect.php");
include_once("./includes/head.php");

// display errors
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);

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
} else {
    // Fetch client data
    if (isset($_GET['clientID'])) {
        $clientID = $_GET['clientID'];
        $sql_fetch_client = "SELECT * FROM client WHERE clientID = '$clientID'";
        $result_client = $con->query($sql_fetch_client);

        if ($result_client->num_rows > 0) {
            $client_data = $result_client->fetch_assoc();

            // Populate form fields with client data
            $first_name = $client_data['first_name'];
            $last_name = $client_data['last_name'];
            $email = $client_data['email'];
            $phone_number = $client_data['phone_number'];
            $address = $client_data['address'];
            $city = $client_data['city'];
            $province = $client_data['province'];
            $postal_code = $client_data['postal_code'];
        }
    }
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
    <title>Hello, world!</title>
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
    <?php include("./nav.php"); ?>

    <form method="post">
        <!-- Populate form fields with client data -->
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo isset($first_name) ? $first_name : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo isset($last_name) ? $last_name : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="tel" class="form-control" id="phone_number" name="phone_number" value="<?php echo isset($phone_number) ? $phone_number : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo isset($address) ? $address : ''; ?>" required>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="event-city">City:</label>
                <input type="text" class="form-control" id="event-city" name="event_city" required>
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
            <input type="text" class="form-control" id="postal_code" name="postal_code" value="<?php echo isset($postal_code) ? $postal_code : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="event-name">Event Name:</label>
            <input type="text" class="form-control" id="event-name" name="event_name" required>
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

                // Collect form data
                let formData = new FormData(this);

                // Add additional data if needed
                // formData.append("additionalField", additionalValue);

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
                .catch(error => {
                    console.error("Error:", error);
                    // Handle errors, show an error message to the user, etc.
                });
            });
        });
    });
    </script>
    

    <?php include_once("./includes/footer.php"); ?>
</body>

</html>
