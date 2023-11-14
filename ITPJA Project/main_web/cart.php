<!DOCTYPE html>
<html lang="en">
<?php 
  include_once __DIR__ ."/functions/common_functions.php";

  $title = "Services";
  include("./head.php");
  if(isset($_SESSION["loggedin"]) AND $_SESSION["loggedin"] == true) {
  $getID = $_SESSION['clientID'];}else{
    header('Location: index.php');
  }
?> 
<body>

<?php include("./nav.php"); ?>



    <main id="services-sect">
        <div class="container-fluid text-center py-3">
            <div class="row ">
                <div class="col-12 text-center">
                    <h1 class="display-2">Your Cart</h1>

                </div>
            </div>
        </div>

        
        <div class="container-fluid">


            
            
            <?php
            emptyCart();
global $conn;

    //Setting the query as a variable
    $select_query = "SELECT * FROM `cart_details` WHERE client_id='$getID'";

    //Running the query
    $results_query = mysqli_query($conn, $select_query);
    $num_rows = mysqli_num_rows($results_query);

    if ($num_rows > 0) {

    $count = 1;
    //While there is data in the SQL table, the program will display the product items in a card
    while($fetch = mysqli_fetch_assoc($results_query)){
        $service_id = $fetch['service_id'];

        $getService = "SELECT * FROM `services` WHERE service_id = '$service_id'";
        $service_query = mysqli_query($conn, $getService);
        $row = mysqli_fetch_assoc($service_query);
        $service_name = $row['service_name'];
        $short_desc = $row['short_desc'];
        $service_category = $row['service_category'];
        $service_rate = $row['service_rate'];
        $service_img = $row['service_img'];


        //Displaying extracted data as a card
            echo "
            <div class='row '>
                <div class='col-2 align-self-center mx-2'>
                    <img src='../admin/assets/services_images/$service_img' alt='$short_desc' class='img-fluid' style='width:10rem;'>
                </div>

            <div class='col-3 align-self-center mx-2'>
                 <a href='read.php?service_id=$service_id'>$count. $service_name</a>   
            </div>
                <div class='col-4 align-self-center mx-2'>
                    <p>$short_desc</p>
                </div>
                <div class='col-1 align-self-center mx-2'>
                    <p><strong>R $service_rate</strong></p>
                </div>

            ";

            $count++;
        }

        ?>
        <div class="col-12 text-center">
            <a href="cart.php?empty=<?php echo $getID;?>" class="btn btn-green">Empty Cart</a>
            <a href="checkout.php?service_id=<?php echo $service_id;?>" class="btn btn-green">Checkout</a>
        </div><?php } else{
            echo "<h2 class='text-center'>You have no events in your cart</h2>
            <div class='row text-center'>
            <div class='col-12'><a class='btn btn-green text-center' href='services.php'>Book an Event</a>
            </div></div>
            ";
        }?>
        </div>
        </div>
    </main>
    <?php include_once("./footer.php"); ?>

</body>
</html>




