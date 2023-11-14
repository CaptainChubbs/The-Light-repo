<nav class="navbar navbar-expand-lg  p-0">

        <div class="container-fluid p-0 m-0 ">

            <a class=" px-4 navbar-brand p-0 m-0" href="./index.php">

                <img src="assets/img/transparent_logo.png" alt="Bootstrap" width="100" height="100">

              </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

          </button>

          <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="container-fluid navbar-nav d-flex justify-content-center">

              <li class="nav-item px-5">

                <a class="nav-link active" aria-current="page" href="index.php">Home</a>

              </li>

              <li class="nav-item px-5">

                <a class="nav-link" href="about.php">About Us</a>

              </li>

              <li class="nav-item px-5">

                <a class="nav-link" href="services.php">Services</a>

              </li>

              <li class="nav-item px-5">

                <a class="nav-link" href="contact.php">Contact Us</a>

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

              

            </ul>

          </div>

        </div>

      </nav>

      <hr>