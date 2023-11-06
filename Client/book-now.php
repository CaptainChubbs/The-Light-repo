<?php
// session_start();
// include __DIR__.'/./includes/connect.php'; // Include your database connection file.

    if(isset($_GET['add-to-cart'])){
        $select_query = "SELECT * FROM `services` ORDER BY service_name";
        $results_query = mysqli_query($conn, $select_query);
        $count = 1;

        // Check if there are any services in the database.
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $service_id = $row['service_id'];
            $service_name = $row['service_name'];
            $service_description = $row['service_description'];
            $service_rate = $row['service_rate'];
            $service_img = $row['service_img'];

            // Display each service as a card.
            echo '<div class="service-card">';
            echo '<h2>' . $service_name . '</h2>';
            echo '<p>' . $service_description . '</p>';
            echo '<p>Price: ' . $service_rate . '</p>';
            // Add a button or link for "Add to Cart" with the appropriate service ID.
            echo '<a href="head.php?add-to-cart=' . $service_id . '">Add to Cart</a>';
            echo '</div>';
        }

    } else {
        echo 'No services available at the moment.';
    }

    // Close the database connection when done.
    mysqli_close($conn);

    $service_id = $_GET['add-to-cart'];
    // Fetch service details based on $service_id from the "services" table.
    if (!isset($_SESSION['user_cart'])) {
        $_SESSION['user_cart'] = array();
    }

    // Create a cart item and add it to the user's session cart.
    $cart_item = array(
        'id' => $service_id,
        'name' => $service_name,
        'rate' => $service_rate
    );

    $_SESSION['user_cart'][] = $cart_item;

    // Redirect back to the book-now page or any other page as needed.
    header("Location: book-now.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Portal - Nurse Booking Services</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Style for the service cards */
    .service-card {
        background-color: #f5f5f5;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .service-card h2 {
        font-size: 20px;
        color: #333;
    }

    .service-card p {
        color: #777;
        margin: 10px 0;
    }

    .service-card a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007BFF;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .service-card a:hover {
        background-color: #0056b3;
    }

    /* Style for the available services section */
    .container {
        max-width: 900px;
        margin: 0 auto;
    }

    /* Additional styling for your form elements can be added here */
    </style>
</head>

<?php
    include_once("includes/head.php");
    include_once("includes/nav.php");
?>
<body>
    <section class="py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Welcome to Our Nurse Booking Services</h2>

            <!-- Health Assessments Table -->
            

    <!-- Booking form begins -->
    <form id="booking-form" action="process_booking.php" method="post">
        <div class="container">
            <!-- <h2 class="mb-4 text-center">WELCOME TO YOUR USER PORTAL</h2> -->

            <div class="container">
                <!-- ... Your user information form ... -->
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2>Booking Details</h2>
                    <!-- Booking Form Fields -->
                    <!-- Shopping Cart -->
                    <div class="container mt-5">
                        <h2>Shopping Cart</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Service Name</th>
                                    <th>Rate</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($_GET['add-to-cart'])) {
                                $service_id = $_GET['add-to-cart'];
                                // Fetch service details based on $service_id from the "services" table.

                                // Call a function from your cart file to add the service to the cart
                                addServiceToCart($service_id, $service_name, $service_rate);

                                // Redirect back to the book-now page or any other page as needed.
                                header("Location: book-now.php");
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="event-date">Event Date</label>
                        <input type="date" class="form-control" id="event-date" name="event-date" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Additional Notes</label>
                        <textarea class="form-control" id="message" name="message" placeholder="Any additional notes or requests"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="total-price">Total Price</label>
                        <input type="text" class="form-control" id="total-price" name="total-price" placeholder="Total Price" readonly>
                    </div>

                    <button type="submit" class="btn bg-black" id="pay-now-button"><a href="order-summary.php">Pay Now</a></button>
                    <button type="button" class="btn btn-secondary" id="cancel-booking">Cancel</button>
                </div>
            </div>
        </div>
    </form>
    <!-- Booking form ends -->
</section>
    
<?php include_once("./includes/footer.php");?>

    <!-- Add Bootstrap JS and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const serviceSelect = document.getElementById("service");
        const quantityInput = document.getElementById("quantity");
        const eventDateInput = document.getElementById("event-date");
        const totalPriceInput = document.getElementById("total-price");
        const payNowButton = document.getElementById("pay-now-button");

        // Function to calculate the total price
        function calculateTotalPrice() {
            const selectedServices = Array.from(serviceSelect.selectedOptions);
            const totalPrice = selectedServices.reduce((total, option) => {
                return total + parseFloat(option.getAttribute("data-price"));
            }, 0);
            const quantity = parseInt(quantityInput.value);
            const total = totalPrice * quantity;
            totalPriceInput.value = total.toFixed(2);
            enablePayNowButton();
        }

        // Calculate the total price when service selections change
        serviceSelect.addEventListener("change", calculateTotalPrice);

        // Calculate the total price when quantity changes
        quantityInput.addEventListener("input", calculateTotalPrice);

        // Enable the "Pay Now" button when all required fields are filled
        function enablePayNowButton() {
            if (serviceSelect.value && quantityInput.value && eventDateInput.value) {
                payNowButton.removeAttribute("disabled");
            } else {
                payNowButton.setAttribute("disabled", true);
            }
        }

        // Validate the form when any field changes
        serviceSelect.addEventListener("change", enablePayNowButton);
        quantityInput.addEventListener("input", enablePayNowButton);
        eventDateInput.addEventListener("input", enablePayNowButton);
        eventDateInput.addEventListener("change", enablePayNowButton); // Added event listener for date change

        // Initially, disable the "Pay Now" button
        enablePayNowButton();
    });
</script>


</body>
</html>


