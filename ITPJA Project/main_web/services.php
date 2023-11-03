<!DOCTYPE html>
<html lang="en">
<?php 
  require_once("./includes/connect.php");

  $title = "Services";
  include("./head.php");
?> 
<body>

<?php include("./nav.php"); ?>



    <main id="services-sect">
        <div class="container-fluid text-center py-3">
            <div class="row ">
                <div class="col-12 text-center">
                    <h1 class="display-2">Our Services</h1>
                    <p>Abahlengi provides the following services:</p>
                </div>
            </div>
        </div>


        
        <div class="container-fluid d-flex justify-content-center">


            
            <?php
global $conn;

    //Setting the query as a variable
    $select_query = "SELECT * FROM `services` ORDER BY service_name";

    //Running the query
    $results_query = mysqli_query($conn, $select_query);
  $count = 1;
    //While there is data in the SQL table, the program will display the product items in a card
    while($row = mysqli_fetch_assoc($results_query)){
        $service_id = $row['service_id'];
        $service_name = $row['service_name'];
        $short_desc = $row['short_desc'];
        $service_category = $row['service_category'];
        $service_rate = $row['service_rate'];
        $service_img = $row['service_img'];

        if ($count ==3) {
          echo "<div class='row text-center'>";

        }
        //Displaying extracted data as a card
            echo "
            <div class='col-10 col-lg-3 mx-5 mb-5'>
              <div class='card mx-auto' style='width: 18rem; height:30rem;'>
                <h4 class='card-header text-center'> $service_name</h4>
                <img src='../admin/assets/services_images/$service_img' class='card-img-top mx-auto mt-3' alt='$service_name'>
                <div class='card-body'>
                  <p class='card-text'>$short_desc</p>
                  <div class='row sticky-bottom'>
                    <div class='col-6'>
                        <a href='book.php?add_to_cart=$service_id' class='btn btn-primary'>Book Now</a>
                    </div>
                    <div class='col-6'>
                        <a href='read.php?service_id=$service_id' class='btn btn-primary'>Read More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
            ";
            if ($count ==3) {
              echo "</div>";
              $count = 0;
    
            }
            $count++;
        }

        ?>
        </div>
    </main>
    <?php include_once("./footer.php"); ?>

</body>
</html>

<?php
function cartFunc(){

  //When the user clicks the add to cart button, the function begins
  if(isset($_GET['add_to_cart'])){
      global $conn;

      //using the getIPAddress function to store the user's ip address in the ip variable
      $ip = getIPAddress();
      //Storing the product ID in a variable
      $getProductID = $_GET['add_to_cart'];

      //Writing out the select query in a variable
      $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$ip' AND product_id = $getProductID";
      //Running the query
      $results_query = mysqli_query($conn, $select_query);
      //Counting the number of rows that match the query above
      $num_rows = mysqli_num_rows($results_query);

      /* if the number of rows is greater than 0, it means the item is already in the user's cart
      therefore, an alert will pop up on the user's screen notifying them, they will then get 
      redirected to order.php */
      if ($num_rows >0){
          echo "<script>alert('This item is already in Cart.')</script>";
          echo"<script>window.open('order.php', '_self')</script>";
      }
      //Else store the product id in the user's cart with their ip address and 0 assigned to quantity
      else{
          $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) 
                              VALUES ($getProductID, '$ip', 0)";
          $results_query = mysqli_query($conn, $insert_query);
          echo "<script>alert('Item has been added to cart')</script>";
          echo"<script>window.open('order.php', '_self')</script>";

      }


  }
}
?>