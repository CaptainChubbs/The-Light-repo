<?php
require_once(__DIR__ ."/functions/check_session.php");

$pageTitle = "Add Customer";
include_once("./head.php");?>


<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">

            <?php include_once("./sidebar.php");?>
            

            <div class="col py-3">
                <h1><?php echo $pageTitle; ?></h1>
                <h4><?php echo date("d/m/y");?></h4>
                <div class="row container-fluid pt-4 pb-4">
                    <form action="" method="post">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="first-name">
                            <label for="floatingInput">First Name:</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="last-name">
                            <label for="floatingInput">Last Name:</label>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-4">
                            <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email">
                            <label for="floatingInput">Email Address:</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="mobile">
                            <label for="floatingInput">Mobile Number:</label>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-3">
                            <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" name="dob">
                            <label for="floatingInput">Date of Birth:</label>
                            </div>
                        </div>

                        </div>
                        <div class="row">
                        <div class="col-4">
                            <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="address1">
                            <label for="floatingInput">Address Line 1:</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="address2">
                            <label for="floatingInput">Address Line 2:</label>
                            </div>
                        </div>
                        <div class="row">
                        </div>
                            <div class="col-3">
                            <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingInput" name="city">
                            <label for="floatingInput">City:</label>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class=" mb-3">
                                <select class="form-select" aria-label="Default select example" name="province">
                                <option selected>Select a Province</option>
                                <option value="Eastern Cape">Eastern Cape</option>
                                <option value="Free State">Free State</option>
                                <option value="Gauteng">Gauteng</option>
                                <option value="KwaZulu-Natal">KwaZulu-Natal</option>
                                <option value="Limpopo">Limpopo</option>
                                <option value="Mpumalanga">Mpumalanga</option>
                                <option value="North West">North West</option>
                                <option value="Northern Cape">Northern Cape</option>
                                <option value="Western Cape">Western Cape</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="postal-code">
                            <label for="floatingInput">Postal Code:</label>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-8 text-center">
                                <p class="form-text">
                                    Password will be auto-generated
                                </p>
                            </div>
                        <div class="row">
                            <div class="col-8 text-center">
                                <input type="submit" value="Submit" name="insert" class="btn btn-add">
                            </div>

                        </div>

                        </form>
            </div>
            <div class="container-fluid pt-4 pb-4">

               
            </div>


            <?php include_once __DIR__ .'/includes/footer.php';?>
        </div>
    </div>
    

</body>
</html>

<?php



//sanitize inputs


//Waiting for user to click submit button
if(isset($_POST['insert'])){


    include_once("./functions/password_generator.php");
    include_once("./functions/common_functions.php");

    //assigning form values to php variables
    $first_name=$_POST['first-name'];
    $last_name=$_POST['last-name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $dob=$_POST['dob'];
    $address1=$_POST['address1'];
    $address2=$_POST['address2'];
    $city=$_POST['city'];
    $province=$_POST['province'];
    $postal_code=$_POST['postal-code'];

    //Empty field validation
    if($first_name=='' OR $last_name=='' OR $email=='' OR $mobile=='' OR $dob=='' OR $address1=='' OR $address2=='' OR $city=='' OR $province=='' OR $postal_code==''){
        echo "<script>alert('Not all fields have been filled')</script>";
        exit();
    }
    else{

        //Sanitizing inputs
        $first_name = sanitize($first_name);
        $last_name = sanitize($last_name);
        $email = sanitize($email);
        $mobile = sanitize($mobile);
        $dob = sanitize($dob);
        $address1 = sanitize($address1);
        $address2 = sanitize($address2);
        $city = sanitize($city);
        $province = sanitize($province);
        $postal_code = sanitize($postal_code);

        //Generating a password then hashing the generated password
        $password = new passwordGenerator(6, 12);
        $password = htmlspecialchars($password->generate());
        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        //Inserting products
        $customer_insert="INSERT INTO `customers`( `first_name`, `last_name`, `email`, `number`, `dob`, `address1`, `address2`, `city`, `province`, `postal_code`, `password`) 
        VALUES 
        ('$first_name','$last_name','$email','$mobile','$dob','$address1','$address2','$city','$province','$postal_code','$hash_password')";
        $results_query = mysqli_query($conn,$customer_insert);

        if($results_query){
            echo "<script>alert('$password')</script>";
            echo "<script>window.open('add_customer.php','_self')</script>";
        }

    }
}
?>

