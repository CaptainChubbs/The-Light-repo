<?php



function cartFunc(){





  //When the user clicks the add to cart button, the function begins

  if(isset($_GET['add'])){



      if(!(isset($_SESSION['loggedin'])) OR $_SESSION['loggedin'] == false){

        echo"<script>window.open('./client/client-login.php', '_self')</script>";

      }else{



        global $conn;

        //Storing the product ID in a variable

        $getServiceID = $_GET['add'];

        $getID = $_SESSION['clientID'];



      //Writing out the select query in a variable

      $select_query = "SELECT * FROM `cart_details` WHERE service_id  = '$getServiceID' AND client_id = '$getID'";

      //Running the query

      $results_query = mysqli_query($conn, $select_query);

      //Counting the number of rows that match the query above

      $num_rows = mysqli_num_rows($results_query);



      /* if the number of rows is greater than 0, it means the item is already in the user's cart

      therefore, an alert will pop up on the user's screen notifying them, they will then get 

      redirected to order.php */

      if ($num_rows >0){

          echo "<script>alert('This item is already in Cart.')</script>";

          echo"<script>window.open('cart.php', '_self')</script>";

      }

      //Else store the product id in the user's cart with their ip address and 0 assigned to quantity

      else{

          $insert_query = "INSERT INTO `cart_details` (service_id, client_id) 

                              VALUES ('$getServiceID','$getID')";

          $results_query = mysqli_query($conn, $insert_query);

          echo "<script>alert('Item has been added to cart')</script>";

          echo"<script>window.open('services.php', '_self')</script>";



      }





  }

      }

      

}



function emptyCart(){





  //When the user clicks the add to cart button, the function begins

  if(isset($_GET['empty'])){





        global $conn;

        //Storing the product ID in a variable

        $clientID = $_SESSION['clientID'];

        $getuserID = $_GET['empty'];



      //Writing out the select query in a variable

      $delete_query = "DELETE FROM `cart_details` WHERE client_id  = $clientID";

      //Running the query

      $results_query = mysqli_query($conn, $delete_query);

          if ($results_query){

          echo "<script>alert('Cart Emptied')</script>";

          echo"<script>window.open('services.php', '_self')</script>";

          }

          else{

            echo"<script>alert('Unsuccessful')</script>";

            echo"<script>window.open('cart.php', '_self')</script>";



          }

      }

      





  }

      

