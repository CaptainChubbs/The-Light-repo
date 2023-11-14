<!DOCTYPE html>

<html lang="en">

<?php 

  require_once("./includes/connect.php");

  include_once __DIR__ ."/functions/common_functions.php";



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

cartFunc();



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

                <img src='https://admin.abahlengi.com/assets/services_images/$service_img' class='img-fluid mx-auto mt-3' alt='$service_name'>

                <div class='card-body'>

                  <p class='card-text'>$short_desc</p>

                  <div class='row sticky-bottom'>

                    <div class='col-6'>

                        <a href='services.php?add=$service_id' class='btn btn-add'>Book Now</a>

                    </div>

                    <div class='col-6'>

                        <a href='read.php?service_id=$service_id' class='btn btn-assign'>Read More</a>

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



