<!DOCTYPE html>

<html lang="en">

<?php 



  $title = "Home";

  include("./head.php");

?> 

<body>

<div class="home-div">





  <nav class="navbar navbar-expand-lg  p-0">

    <div class="container-fluid p-0 m-0 ">

        <a class=" px-4 navbar-brand p-0 m-0" href="./index.php">

            <img src="assets/img/Light_Logo.png" alt="Bootstrap" width="100" height="100">

          </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

      </button>

      <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="container-fluid navbar-nav d-flex justify-content-center">

          <li class="nav-item px-5">

            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>

          </li>

          <li class="nav-item px-5">

            <a class="nav-link" href="./about.php">About Us</a>

          </li>

          <li class="nav-item px-5">

            <a class="nav-link" href="./services.php">Services</a>

          </li>

          <li class="nav-item px-5">

            <a class="nav-link" href="./contact.php">Contact Us</a>

          </li>



          <?php

if (isset( $_SESSION["loggedin"]) AND $_SESSION["loggedin"] == TRUE) {

    $client = $_SESSION['clientID'];



  echo"

  <li class='nav-item px-5'>

  <a class='nav-link' href='cart.php?id='><i class='fa-solid fa-cart-shopping'></i></a>

</li>

  <li class='nav-item dropdown px-5'>

<a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>

  Account

</a>

<ul class='dropdown-menu'>

  <li><a class='dropdown-item' href='./client/index.php'>Manage Account</a></li>

  <li><a class='dropdown-item' href='./client/logout.php'>Logout</a></li>

</ul>

</li>

  ";}

else{

  echo"

  <li class='nav-item dropdown px-5'>

<a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>

  Login

</a>

<ul class='dropdown-menu'>

  <li><a class='dropdown-item' href='https://nurse.abahlengi.com/nurse-login.php'>Nurse Login</a></li>

  <li><a class='dropdown-item' href='./client/client-login.php'>Client Login</a></li>

</ul>

</li>

  ";

}

?>

          </li>

        </ul>

      </div>

    </div>

  </nav>

      <hr>

        <div class="container-fluid">

            <div class="row">

            <div class="col-md-4 offset-md-2">

                <h2 class="display-2 mb-5">Welcome to the Largest Local Nurse Network</h2>

                <p class="mb-5">Join us on the journey to a healthier, happier South Africa, one home and one workplace at a time.</p>

                <a href="services.php"><button class="btn btn-green mb-5">Our Services</button></a>

            </div>



            </div>

    </div>

    </div>



    <main>

        <div class="container-fluid text-center cards">

            <div class="row mb-4 mt-4">

                    <div class="col">

                        <h2 class="display-4">What Sets Us Apart</h2>

                    </div>

                </div>

            <div class="row d-flex justify-content-center">

            

                <div class="col-12 col-lg-3 my-3  d-flex justify-content-center">

                    <div class="card">

                        <h2 class="card-title py-3">Compassionate Care</h2>

                        <img src="./assets/img/card-1.jpg" class="card-img-top mx-auto" alt="...">

                        <div class="card-body my-3">

                          <p class="card-text">We approach our work with empathy and care, ensuring that each patient receives the personalized attention they deserve.</p>

                        </div>

                      </div>

                </div>

                <div class="col-12 col-lg-3 my-3 d-flex justify-content-center">

                    <div class="card">

                        <h2 class="card-title py-3">Accessibility</h2>

                        <img src="./assets/img/card-2.jpg" class="card-img-top mx-auto" alt="...">

                        <div class="card-body my-3">

                          <p class="card-text">We bring healthcare to your doorstep, making it convenient for you to access nursing care and wellness services.</p>

                        </div>

                      </div>

                </div>

                <div class="col-12 col-lg-3 my-3 d-flex justify-content-center">

                    <div class="card">

                        <h2 class="card-title py-3">Customized Services</h2>

                        <img src="./assets/img/card-3.jpg" class="card-img-top mx-auto" alt="...">

                        <div class="card-body my-3">

                          <p class="card-text">We understand that every individual and organisation is unique. Our services are tailored to meet your specific needs.</p>

                        </div>

                      </div>

                </div>

            </div>

            <a href="about.php"><button class="btn btn-green">Learn More</button></a>

                

                </div>

        </div>



        <div class="container-fluid">

            <div class="row mb-4 mt-4 text-center">

                <div class="col">

                    <h2 class="display-4">Gallery</h2>

                </div>

            </div>



            <div class="row mt-5">



              <?php

              //The query will begin



              //Setting the query as a variable

              $select_query = "SELECT * FROM `gallery_images`";



              //Running the query

              $results_query = mysqli_query($conn, $select_query);

                                  

              //While there is data in the SQL table, the program will display the product items in a card

              while($row = mysqli_fetch_assoc($results_query)){

              $image_id = $row['image_id'];

              $image_name = $row['image_file_name'];

              $image_flabel = $row['image_label'];

              $image_fdesc = $row['image_desc'];







              //Displaying extracted data as a card

              echo "                

              <div class='col-lg-4'>

          

                <div class='masonry_block'>

                  <div class='masonry-folio'>

                    <div class='masonry_thum'>

                      <a href='https://admin.abahlengi.com/assets/gallery_images/$image_name' class='glightbox' data-gallery='edu-gallery'></a>

                      <img src='https://admin.abahlengi.com/assets/gallery_images/$image_name' class='img-fluid' alt='image' />

          

                      <a href='https://admin.abahlengi.com/assets/gallery_images/$image_name' class='glightbox' data-gallery='edu-gallery'></a>

          

                      <a href='https://admin.abahlengi.com/assets/gallery_images/$image_name' class='glightbox' data-gallery='edu-gallery'></a>

                    </div>

          

                    <div class='masonry_text'>

                      <h3 class='masonry_title'>$image_flabel</h3>

                      <p class='masonry_cat'>$image_fdesc</p>

          

                    </div>

          

                  </div>

                </div>

              </div>

              ";

              }

                  



              ?>

            </div>

                    

        </div>

    </main>





    <?php include_once __DIR__.'/footer.php'; ?>

</body>

</html>