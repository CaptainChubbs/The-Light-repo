<?php
session_start();
include_once "connect.php";

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


        // Assign nurses to the event
        if (isset($_POST['nurse']) && is_array($_POST['nurse'])) {
            foreach ($_POST['nurse'] as $nurseID) {
                $sql_assign_nurse = "INSERT INTO assignments (nurseID, eventID) VALUES ('$nurseID', '$eventID')";
                $con->query($sql_assign_nurse);
            }
        }

        echo "Event added and nurses assigned successfully!";
    } else {
        echo "Error adding event: " . $con->error;
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
</head>

<body>
    <form method="post">
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
        <!-- Address -->
        <div class="form-group">
            <label for="event-location">Location:</label>
            <input type="text" class="form-control" id="event-location" name="event_location" required>
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
        <hr />

        <div class="form-group">
            <label for="event-type">Type:</label>
            <select class="form-control" id="event-type" name="event_type" required>
                <!-- Change accordingly -->
                <option value="clinic">Clinic</option>
                <option value="hospital">Hospital</option>
                <option value="vaccination">Vaccination</option>
            </select>
        </div>
        <div class="form-group">
            <label for="event-status">Status:</label>
            <select class="form-control" id="event-status" name="event_status" required>
                <option value="upcoming">Upcoming</option>
                <option value="completed">Completed</option>
            </select>
        </div>
        <div class="form-group">
            <label for="event-requirements">Description</label>
            <textarea class="form-control" id="event-description" name="event_description" rows="3" required></textarea>
        </div>
        <!-- Add nurses that are available -->
        <div class="form-group">
            <label for="nurse-list">Nurses Available:</label><br />
            <div class="nurse-list">
                <!-- Nurse list will be displayed here -->
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        let selectedProvince = document.getElementById("event-province");

        selectedProvince.addEventListener("change", function() {
            // Get the selected province
            selectedProvince = this.value;
            fetch(`getNurses.php?province=${selectedProvince}`)
                .then(response => response.json())
                .then(data => {
                    // Handle the data, maybe update the UI with the available nurses
                    console.log(data);

                    // Update the nurseList div with the fetched data
                    let nurseList = document.querySelector(".nurse-list");
                    nurseList.innerHTML = "";
                    if (data) {
                        data.forEach((item, index) => {
                            let newDiv = document.createElement("div");
                            newDiv.innerHTML = `

                            <input type="checkbox" id="nurse${index}" name="nurse[${index}]" value="${item.nurseID}">
                            <label for="nurse${index}">${item.first_name} ${item.last_name} - ${item.email}</label><br>
                            `;
                            nurseList.appendChild(newDiv);
                        });
                    }

                });
        });


        // Send AJAX request to your server with the selected province
    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>