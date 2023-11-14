<?php
// Include the PayPal PHP SDK
require 'vendor/autoload.php';

use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;

// Set up PayPal API credentials
$clientId = 'YOUR_CLIENT_ID';
$clientSecret = 'YOUR_SECRET';

$paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential($clientId, $clientSecret)
);

// Function to create a PayPal order
function createOrderCallback($totalAmount)
{
    global $paypal;

    // Create a Payer object
    $payer = new Payer();
    $payer->setPaymentMethod('paypal');

    // Create an Amount object
    $amount = new Amount();
    $amount->setCurrency('USD')
        ->setTotal($totalAmount);

    // Create a Transaction object
    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setDescription('Payment for your order');

    // Create a Payment object
    $payment = new Payment();
    $payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions([$transaction]);

    try {
        // Create the PayPal order
        $createdPayment = $payment->create($paypal);

        // Retrieve the order ID from the created payment
        $orderId = $createdPayment->getId();

        return $orderId;
    } catch (\Exception $e) {
        // Handle errors
        throw new \Exception('Error creating PayPal order: ' . $e->getMessage());
    }
}

// Handle the PayPal order creation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Extract total amount from the request
        $totalAmount = $_POST['total_amount'];

        // Create an order in PayPal
        $orderId = createOrderCallback($totalAmount);

        // Output the order ID (handle this data as needed)
        header('Content-Type: application/json');
        echo json_encode(['order_id' => $orderId]);
    } catch (\Exception $e) {
        // Handle errors
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => $e->getMessage()]);
    }
}
?>
