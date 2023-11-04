<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<?php
    include_once("includes/head.php");
    include_once("includes/nav.php");

    if (isset($_SESSION['user_authenticated']) && $_SESSION['user_authenticated']) {
        // User is logged in.
    
        if (isset($_POST['checkout'])) {
            // Get the selected services from the user's cart session.
            if (isset($_SESSION['user_cart']) && is_array($_SESSION['user_cart'])) {
                require_once("db_connection.php"); // Include your database connection file.
    
                // Initialize the total price for the order.
                $totalPrice = 0;
    
                foreach ($_SESSION['user_cart'] as $item) {
                    $service_name = $item['name'];
                    $service_rate = $item['rate'];
                    $totalPrice += $service_rate;
    
                    // Insert the order details into the "orders" table.
                    $customer_id = $_SESSION['user_id']; // Retrieve the user's ID from the session.
                    $customer_name = $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'];
                    $payment_status = "Paid"; // You can modify this based on your payment process.
                    $order_status = "Completed"; // You can adjust the order status.
    
                    $date_ordered = date("Y-m-d"); // Get the current date.
    
                    // Insert the order into the database.
                    $insert_query = "INSERT INTO orders (service_name, payment_status, order_status, customer_name, customer_id, date_ordered) VALUES ('$service_name', '$payment_status', '$order_status', '$customer_name', $customer_id, '$date_ordered')";
                    mysqli_query($conn, $insert_query);
                }
    
                // Clear the user's cart after the order is placed.
                unset($_SESSION['user_cart']);
            }
        }
    }
?>

<body>
    <div>
        <h2>Your Order Summary</h2>
        <p>Service: <span id="service"></span></p>
        <p>Quantity: <span id="quantity"></span></p>
        <p>Total Price: <span id="total-price"></span></p>
        <p>Client Information:</p>
        <p>Name: <span id="client-name"></span></p>
        <p>Email: <span id="client-email"></span></p>

        <!-- <button onclick="proceedToPayment()">Proceed to Payment</button> -->

        <!-- Payment Form -->
        <form id="payment-form">
            <label for="card-element">
                Credit or Debit Card
            </label>
            <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>

            <button type="submit">Pay Now</button>
        </form>
    </div>

    <?php include_once("./includes/footer.php");?>

    <!-- Add Bootstrap JS and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Function to extract query parameters from URL
        function getQueryParameter(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }

        // Retrieve and display order details
        const serviceName = getQueryParameter("service");
        const quantity = getQueryParameter("quantity");
        const total = getQueryParameter("total");
        const clientName = getQueryParameter("name");
        const clientEmail = getQueryParameter("email");

        document.getElementById("service").textContent = serviceName;
        document.getElementById("quantity").textContent = quantity;
        document.getElementById("total-price").textContent = total;
        document.getElementById("client-name").textContent = clientName;
        document.getElementById("client-email").textContent = clientEmail;

        // Function to proceed to payment
        function proceedToPayment() {
            // Redirect the client to the payment page (replace with your payment page URL)
            window.location.href = "order-summary.php";
        }
    </script>
</body>
</html>
