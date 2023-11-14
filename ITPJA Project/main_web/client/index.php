<?php
// Initialize the session
session_start();
// Check if user is logged in using session variable
if (!isset($_SESSION["loggedin"]) AND $_SESSION["loggedin"] !== true) {
    header("location: client-login.php");
    exit;
}

// Connect to MySQL database
include_once("./includes/connect.php");
$sql = "SELECT * FROM client WHERE clientID=" . $_SESSION["clientID"];
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

?>



<?php
$title = "Client Dashboard";
include_once("./includes/head.php");
?>


<body>
    <?php include("./nav.php");?>


    <section class="py-5">
        <div class="container">
            <h2 class="mb-4 text-center">WELCOME TO YOUR USER PORTAL</h2>

            <div class="container">
                <h1>User Dashboard</h1>
                <div class="row">
                    <div class="col-md-6">
                        <h2>User Information</h2>
                        <div class="user-info">
                            <p><b>Name:</b> <?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></p>
                            <p><b>Email:</b> <?php echo $row['email'] ?></p>
                            <p><b>Phone:</b> <?php echo $row['phone_number'] ?></p>
                            <p><b>Address:</b> <?php echo $row['address'] ?></p>
                            <p><b>City:</b> <?php echo $row['city'] ?></p>
                            <!-- <p><b>State:</b> <?php echo $row['state'] ?></p> -->
                            <p><b>Postal Code:</b> <?php echo $row['postal_code'] ?></p>

                        </div>
                    </div>


                    <?php

                    $count = 0;
                    $id= $_SESSION['clientID'];
                    $email = $row['email'];
                    $select_request = "SELECT * FROM `service_request` WHERE user_id = $id AND email = '$email' ORDER BY date_submitted ASC";
                    $select_execute = mysqli_query($con, $select_request);
                    $num_rows = mysqli_num_rows($select_execute);
                    if ($num_rows > 0) {
                        echo "  
                        <h1 class='mt-4'>Recent Event Bookings</h1>
                        <div class='row table-responsive'>
                        <table class='table table-hover table-striped'>
        
                        <thead>
                        <tr>
                          <th scope='col'>ID</th>
                          <th scope='col'>Service Name</th>
                          <th scope='col'>Service Rate</th>
                          <th scope='col'>Start Date</th>
                          <th scope='col'>End Date</th>
                          <th scope='col'>Nurse Qty.</th>
                          <th scope='col'>Status</th>
                          <th scope='col'>Payment Status</th>
                          <th scope='col'>Deposit Paid</th>
                          <th scope='col'>Total</th>
                          <th scope='col'>Suburb</th>
                    
                        </tr>
                      </thead>
                      <tbody>";
                    while($service_row = mysqli_fetch_assoc($select_execute)){
                        $service_request_id = $service_row["service_request_id"];
                        $serviceName = $service_row["service_name"];
                        $serviceRate = $service_row["service_rate"];
                        $eventDate = $service_row["start_date"];
                        $numDays = $service_row["num_days"];
                        $nursesNeeded = $service_row["needed_nurses"];
                        $status = $service_row["status"];
                        $date = $service_row["date_submitted"];
                        $suburb = $service_row["suburb"];
                        $count++;
                        $endDate = date('Y-m-d',strtotime($eventDate) + (24*3600*$numDays));

                        $payment_query = "SELECT * FROM `payments` WHERE client_id = $id AND req_id = $service_request_id";
                        $payment_result = mysqli_query($con, $payment_query);
                        $pay_row = mysqli_fetch_assoc($payment_result);
                        $paymentStatus = $pay_row['status'];
                        $depAmount = $pay_row['deposit_paid'];
                        $total = $pay_row['amount'];
                        if($depAmount == 0 OR $depAmount == null){
                            $depAmount = 0;
                        }
                        if($total == 0 OR $total == null){
                            $total = 0;
                        }

                        echo"    <tr>
                        <th scope='row'>$service_request_id</th>
                        <td>$serviceName</td>
                        <td>$serviceRate</td>
                        <td>$eventDate</td>
                        <td>$endDate</td>
                        <td>$nursesNeeded</td>
                        <td>$status</td>
                        <td>$paymentStatus</td>
                        <td>R $depAmount</td>
                        <td>R $total</td>
                        <td>$suburb</td>


                      </tr>";

                    }}else{
                        echo "<h2 class='text-center'>You have not made any Bookings to Display</h2>";
                    }
?>
                    </tbody>
                    </table>
                </div>

                </div>
            </div>
</body>

</html>
</section>

<?php include_once("./includes/footer.php"); ?>
</body>

</html>