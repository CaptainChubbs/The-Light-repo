<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Portal</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<?php
    include_once("includes/head.php");
    include_once("includes/nav.php");
?>
<body>
    <!-- <header class="border-bottom py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4">Abahlengi</h1>
            <nav>
                <a href="index.html" class="me-3">Home</a>
                <a href="#" class="me-3">Make Enquiry</a>
                <a href="#" class="me-3">Request Assessment</a>
                <a href="client-login.php" class="me-3">Logout</a>
            </nav>
        </div>
    </header> -->

    <?php
    // Include necessary files and establish database connection
    // include_once("includes/head.php");
    // include_once("includes/nav.php");

    $clientID = 1; // Replace with the actual user identifier

    // Query the database to retrieve user information
    $sql = "SELECT first_name, last_name, email, dob, phone_number, address FROM client WHERE clientID = ?";
    if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param('i', $clientID);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($firstName, $lastName, $email, $dob, $phoneNumber, $address);
            $stmt->fetch();
        } else {
            echo "User not found in the database.";
            exit;
        }
    }
    ?>
    
    <section class="py-5">
        <div class="container">
            <h2 class="mb-4 text-center">WELCOME TO YOUR USER PORTAL</h2>
            
            <div class="container">
                <h1>User Dashboard</h1>
                <div class="row">
                    <div class="col-md-6">
                        <h2>User Information</h2>
                        <form id="user-info-form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" value="<?php echo $firstName; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="surname">Surname:</label>
                                <input type="text" class="form-control" id="surname" value="<?php echo $lastName; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth:</label>
                                <input type="text" class="form-control" id="dob" value="<?php echo $dob; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" value="<?php echo $email; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone number:</label>
                                <input type="text" class="form-control" id="phone_number" value="<?php echo $phoneNumber; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" id="address" value="<?php echo $address; ?>" readonly>
                            </div>
                            <!-- Add more user information fields as needed -->
                            <button type="button" class="btn btn-primary" id="edit-user-info">Edit</button>
                            <button type="submit" class="btn btn-success" id="save-user-info" disabled>Save</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h2>Service Details </h2>
                        <form id="service-details-form">
                            <div class="form-group">
                                <label for="service-name">Service:</label>
                                <input type="text" class="form-control" id="service-name" placeholder="The name of the service to be done" readonly>
                            </div>
                            <div class="form-group">
                                <label for="service-description">Service Description:</label>
                                <textarea class="form-control" id="service-description" placeholder="Here is the service description" readonly></textarea>
                            </div>
                            <button type="button" class="btn btn-primary" id="edit-service-details">Check</button>
                            <!-- <button type="submit" class="btn btn-success" id="save-service-details" disabled>Save</button> -->
                        </form>
                    </div>
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                              
                                <!-- Financial Statements Section -->
                                <section id="financial-statements">
                                    <h2>Financial Statements</h2>
                                    <!-- Display financial statements here-->
                                    <textarea class="form-control" id="service-description" placeholder="Here is where financial statements are viewed" readonly></textarea>
                                </section>
                                <br>
                                <br>
                                <!-- Payment Section -->
                                <section id="payment">
                                    <h2>Make a Payment</h2>
                                    <form action="process_payment.php" method="post">
                                        <div class="form-group">
                                            <label for="amount">Amount:</label>
                                            <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount">
                                        </div>
                                        <!-- Add more payment form fields as needed -->
                                        <button type="submit" class="btn btn-primary">Submit Payment</button>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
    </section>

    <?php include_once("./includes/footer.php");?>

<!-- 
    < ? php
// Database connection parameters
$DB_HOST = 'localhost';
$DB_Username = 'root';
$DB_Password = '';
$DB_NAME = 'Abahlengi';

// Create a connection to the database
$conn = new mysqli($DB_HOST, $DB_Username , $DB_Password, $DB_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve client information
$sql = "SELECT * FROM clients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data for client
    while ($row = $result->fetch_assoc()) {
        echo "";
        echo "<input type="text" class="form-control" id="name" placeholder="Enter Name" readonly>". $row["name"] . "</td>";
        echo "<td>" . $row["surname"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "Client not found in the database.";
}

// Close the database connection
$conn->close();
?> -->

<!-- Add Bootstrap JS and jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const editUserInfoBtn = document.getElementById("edit-user-info");
    const saveUserInfoBtn = document.getElementById("save-user-info");

    const userInfoForm = document.getElementById("user-info-form");
    editUserInfoBtn.addEventListener("click", function () {
        userInfoForm.querySelectorAll("input, textarea").forEach((element) => {
            element.removeAttribute("readonly");
        });
        saveUserInfoBtn.removeAttribute("disabled");
        editUserInfoBtn.setAttribute("disabled", true);
    });
    
    userInfoForm.addEventListener("submit", function (e) {
        e.preventDefault();
        // Handle user info form submission (e.g., update user info on the server)
        // Disable form fields and "Save" button after saving
        userInfoForm.querySelectorAll("input, textarea").forEach((element) => {
            element.setAttribute("readonly", true);
        });
        saveUserInfoBtn.setAttribute("disabled", true);
        editUserInfoBtn.removeAttribute("disabled");
    });

});
</script>


</body>
</html>



