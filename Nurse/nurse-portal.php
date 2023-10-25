<?php
// display errors
ini_set("display_errors", "On");

// Include configuration file 
require_once 'config.php';

// Check if user is not logged in]
// if (!isset($_SESSION['access_token'])) {
//     header("location: nurse-login.php");
//     exit();
// }

// Include User library file 
require_once 'Nurse.class.php';

if (isset($_GET['code'])) {
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var(GOOGLE_REDIRECT_URL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    // $storeToken =
    //     array(
    //         'token' => $_SESSION['token']
    //     );
    // echo json_encode($storeToken);
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    // Get user profile data from google 
    $gpUserProfile = $gservice->userinfo->get();

    // convert data to json
    // echo json_encode($gpUserProfile);

    // Initialize Nurse class 
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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-oauth-token" content="<?php echo $_SESSION['token']['access_token']; ?>">
    <title>Nurse Portal - Nurse Procurement Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        nav {
            display: flex;
            gap: 80px;
            /* Adjust the value for the desired spacing */
        }

        nav a {
            text-decoration: none;
            color: #333;
            /* Adjust the color as needed */
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #007bff;
            /* Adjust the color for the hover state */
        }

        .dropdown {
            background-color: black;
        }

        section {
            background-color: lightgoldenrodyellow;
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        footer {
            background-color: #CCD6A6;
        }
    </style>
</head>

<body>
    <script src="https://apis.google.com/js/client.js"></script>
    <header class="border-bottom py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4">Abahlengi</h1>
            <nav>
                <a href="index.html" class="me-3">Home</a>
                <a href="about.html" class="me-3">View Information</a>
                <a href="services.html" class="me-3">Edit Information</a>
                <a href="logout.php" class="me-3">Logout</a>
                <!-- <a href="#" class="me-3 dropdown-toggle" id="loginDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Login</a>
                <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                    <li><a class="dropdown-item" href="nurse-login.html">Nurse Login</a></li>
                    <li><a class="dropdown-item" href="admin-login.html">Admin Login</a></li>
                </ul> -->
            </nav>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <h2 class="mb-4 text-center">WELCOME TO YOUR NURSE PORTAL</h2>

            <div class="text-center nurse-dashboard">
                <h3><?php echo $userData['first_name'] . ' ' . $userData['last_name'] ?></h3>
                <p>Please Select An Option</p>

                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="text-center">
                            <ul class="list-unstyled">
                                <li><a href="#">View Your Information</a></li>
                                <li><a href="#">Edit Your Information</a></li>
                                <li><a href="#">Delete Your Information</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- <div class="nurse-actions">
                    <ul>
                        <li>
                            <a href="#">View Assignments</a>
                            <a href="#">Update Profile</a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>
    </section>
    <footer class="bg-light text-center py-3">
        <div class="container">
            <p class="mb-0">&copy; 2023 Nurse Procurement Service. All rights reserved.</p>
            <p class="mb-0"><strong>Get in touch</strong></p>
            <p class="mb-0">Interested in our services</p>
            <a href="contacts.html" class="btn btn-primary">Contact Us</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>
</body>

</html>