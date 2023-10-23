<?php
// display errors
ini_set("display_errors", "On");

// Include configuration file 
require_once 'config.php';

// Include User library file 
require_once 'Client.class.php';

if (isset($_GET['code'])) {
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var(GOOGLE_REDIRECT_URL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    // Get user profile data from google 
    $gpUserProfile = $gservice->userinfo->get();

    // convert data to json
    // echo json_encode($gpUserProfile);

    // Initialize User class 
    $nurse = new Nurse();

    // Getting user profile info 
    $gpUserData = array();
    $gpUserData['oAuthId']  = !empty($gpUserProfile['id']) ? $gpUserProfile['id'] : '';
    $gpUserData['first_name'] = !empty($gpUserProfile['given_name']) ? $gpUserProfile['given_name'] : '';
    $gpUserData['last_name']  = !empty($gpUserProfile['family_name']) ? $gpUserProfile['family_name'] : '';
    $gpUserData['email']       = !empty($gpUserProfile['email']) ? $gpUserProfile['email'] : '';

    // Insert or update user data to the database 
    $gpUserData['oAuthProvider'] = 'google';
    $userData = $nurse->checkUser($gpUserData);

    // Storing user data in the session 
    $_SESSION['userData'] = $userData;
} else {
    // Get login url 
    $authUrl = $gClient->createAuthUrl();

    // Render google login button 
    $output = '<a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '" class="login-btn">Sign in with Google</a>';
}

// Database connection configuration
$servername = "ftp.abahlengi.com";
$username = "admin@abahlengi.com";
$password = "GjJ*9A;Vjkot";
$dbname = "";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    // Update user details in the database
    $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', age=$age, email='$email', phone_number='$phone_number', address='$address' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "User details updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Get the user's details from the database
$id = 1; // Replace with the user's ID
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse Portal</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="border-bottom py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4">Abahlengi</h1>
            <nav>
                <a href="index.html" class="me-3">Home</a>
                <a href="#" class="me-3">Make Enquiry</a>
                <a href="#" class="me-3">Request Assessment</a>
                <a href="client-login.php" class="me-3">Logout</a>
            </nav>
        </div>
    </header>
    
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
                                <label for="username">Name:</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username" readonly>
                            </div>
                            <div class="form-group">
                                <label for="username">Surname:</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username" readonly>
                            </div>
                            <div class="form-group">
                                <label for="username">Age:</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" readonly>
                            </div>
                            <div class="form-group">
                                <label for="username">Phone number:</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username" readonly>
                            </div>
                            <div class="form-group">
                                <label for="username">Address:</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username" readonly>
                            </div>
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

    <footer class="bg-light text-center py-3">
        <div class="container">
            <p class="mb-0">&copy; 2023 Nurse Procurement Service. All rights reserved.</p>
            <p class="mb-0"><strong>Get in touch</strong></p>
            <p class="mb-0">Interested in our services</p>
            <a href="contacts.html" class="btn btn-primary">Contact Us</a>
        </div>
    </footer>

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

<?php
} else {
    echo "User not found.";
}

$conn->close();
?>
</body>
</html>