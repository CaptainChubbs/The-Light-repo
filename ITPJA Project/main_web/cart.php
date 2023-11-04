<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] == 'add') {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $service_id = $_GET['id'];

        // Retrieve service details from your database based on $service_id
        require_once("db_connection.php"); // Include your database connection file.
        $query = "SELECT * FROM services WHERE service_id = $service_id";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            $service_name = $row['service_name'];
            $service_rate = $row['service_rate'];

            // Create a new item array and add it to the cart session
            $cart_item = array(
                'id' => $service_id,
                'name' => $service_name,
                'rate' => $service_rate
            );

            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                // If the cart session exists, add the item to it.
                $_SESSION['cart'][] = $cart_item;
            } else {
                // If the cart session doesn't exist, create it and add the item.
                $_SESSION['cart'] = array($cart_item);
            }

            // Redirect back to the store page
            header("Location: book-now.php");
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'clear') {
    // Clear the cart by destroying the cart session
    unset($_SESSION['cart']);
    header("Location: book-now.php");
}
