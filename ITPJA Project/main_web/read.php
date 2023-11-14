<!DOCTYPE html>
<html lang="en">
<?php 


  $title = "Read more";
  include("./head.php");
  include_once __DIR__ ."/functions/common_functions.php";
?> 
<body>
    <?php
    include("./nav.php");
    cartFunc();


    $getServiceID = $_GET['service_id'];


        //Writing out the select query in a variable
        $select_query = "SELECT * FROM `services` WHERE service_id = $getServiceID";
        //Running the query
        $results_query = mysqli_query($conn, $select_query);
        //Counting the number of rows that match the query above
        $num_rows = mysqli_num_rows($results_query);

        /* if the number of rows is greater than 0, it means the item is already in the user's cart
        therefore, an alert will pop up on the user's screen notifying them, they will then get 
        redirected to order.php */
        if ($num_rows >1 OR $num_rows==0){
            echo "<script>alert('Error')</script>";
            echo"<script>window.open('./services.php', '_self')</script>";
        }
        //Else store the product id in the user's cart with their ip address and 0 assigned to quantity
        else{
            /*While still in the limitations of the query, we will extract the data from the table
        and display it as a card on the customer's index page */
        while($row = mysqli_fetch_assoc($results_query)){
            $service_name = $row['service_name'];
            $service_desc = $row['service_description'];
            $service_category = $row['service_category'];
            $service_rate = $row['service_rate'];
            $service_img = $row['service_img'];

            }

        }
    ?>
    
    <div class="container-fluid">
        <div class="row text-center pb-5">
            <div class="col-12">
                <h1>
                    <?php echo $service_name; ?>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-2 offset-1">
            <img src='../admin/assets/services_images/<?php echo $service_img?>' class='card-img-top mx-auto mt-3' alt='<?php echo $service_name;?>'>
            </div>
            <div class="col-2 offset-1">
                <?php echo $service_desc?>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-1 mx-0">
            <label for="form-control" class="col-form-label">Price:</label>
            </div>
            <div class="col-1 mx-0">
            <input class="form-control" type="text" value="<?php echo 'R '.$service_rate ?>" aria-label="Disabled input example" disabled readonly>
            </div>
        </div>
        <div class="row text-center pt-4">
            <div class="col-12">
            <a href='read.php?add=<?php echo $getServiceID;?>' class="btn btn-green">Book Now</a>
            
            </div>
        </div>

    </div>

    <?php 

    include("./footer.php");?>
</body>
</html>