<?php
session_start();

if (isset($_POST['login'])) {
    include __DIR__.'/./includes/connect.php'; // Include your database connection file.

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform a database query to check if the email and password match.
    $query = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        // User is authenticated. Set session variables.
        $row = mysqli_fetch_assoc($result);
        $_SESSION['logged_in'] = true;
        $_SESSION['name'] = $row['client_name'];

        // Redirect to the home page or a dashboard.
        header("Location: client-portal.php");
    } else {
        // Authentication failed. Display an error message.
        $login_error = "Invalid email or password. Please try again.";
    }
}


?>

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
include("./nav.php"); 
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

    <section class="py-5">
        <div class="container">
            <h2 class="mb-4 text-center">WELCOME TO YOUR USER PORTAL</h2>

            <div class="container">
                <h1>User Dashboard</h1>
                <div class="row">
                    <div class="col-md-6">
                        <h2>User Information</h2>
                        <table class="">
                            <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td><?php echo $row['first_name']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Surname</th>
                                    <td><?php echo $row['last_name']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Age</th>
                                    <td><?php echo $row['dob']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td><?php echo $row['email']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone Number</th>
                                    <td><?php echo $row['phone_number']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Address</th>
                                    <td><?php echo $row['address']; ?></td>
                                </tr>
                            </tbody>
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

<?php include_once("./includes/footer.php"); ?>
<!-- <footer class="bg-light text-center py-3">
        <div class="container">
            <p class="mb-0">&copy; 2023 Nurse Procurement Service. All rights reserved.</p>
            <p class="mb-0"><strong>Get in touch</strong></p>
            <p class="mb-0">Interested in our services</p>
            <a href="contacts.html" class="btn btn-primary">Contact Us</a>
        </div>
    </footer> -->

<!-- Add Bootstrap JS and jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editUserInfoBtn = document.getElementById("edit-user-info");
        const saveUserInfoBtn = document.getElementById("save-user-info");

        const userInfoForm = document.getElementById("user-info-form");
        editUserInfoBtn.addEventListener("click", function() {
            userInfoForm.querySelectorAll("input, textarea").forEach((element) => {
                element.removeAttribute("readonly");
            });
            saveUserInfoBtn.removeAttribute("disabled");
            editUserInfoBtn.setAttribute("disabled", true);
        });

        userInfoForm.addEventListener("submit", function(e) {
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