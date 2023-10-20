<?php 
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}
$pageTitle = "Add Client";
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
                        <div class="col-8">
                            <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="company-name">
                            <label for="floatingInput">Company Name:</label>
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
                            <label for="floatingInput">Contact Number:</label>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-3">
                            <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="vat-number">
                            <label for="floatingInput">Vat Number:</label>
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
                        <div class="row">
                            <div class="col-8 text-center">
                                <input type="submit" value="Submit" name="insert" class="btn btn-add">
                            </div>
                        </div>
                        </div>


                        </form>
            </div>
            <div class="container-fluid pt-4 pb-4">

               
            </div>


</div>
<div class="row fixed-bottom">
    <div class="col"><?php include_once("./includes/footer.php");?>
</div>
        </div>
    </div>
    

</body>
</html>

<?php



//sanitize inputs


//Waiting for user to click submit button
if(isset($_POST['insert'])){


    include_once("./functions/common_functions.php");

    //assigning form values to php variables
    $company_name = $_POST['company-name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postal_code = $_POST['postal-code'];
    $vat_number = $_POST['vat-number'];
    $address = $address1 . " " . $address2;


    //Empty field validation
    if(empty($company_name) || empty($email) || empty($mobile) || empty($address) || empty($city) || empty($province) || empty($postal_code) || empty($vat_number)){
        echo "<script>alert('Not all fields have been filled')</script>";
        exit();
    }
    else{

        //Sanitizing inputs
        $company_name = sanitize($company_name);
        $email = sanitize($email);
        $mobile = sanitize($mobile);
        $address = sanitize($address);
        $city = sanitize($city);
        $province = sanitize($province);
        $postal_code = sanitize($postal_code);
        $vat_number = sanitize($vat_number);


        //Inserting products
        $client_insert="INSERT INTO `client`( `company_name`, `email`, `phone_number`, `address`, `city`, `province`, `postal_code`, `vat_number`) 
        VALUES 
        ('$company_name','$email','$mobile','$address','$city','$province','$postal_code','$vat_number')";
        $results_query = mysqli_query($conn,$client_insert);

        if($results_query){
            echo "<script>alert('Successfully Added')</script>";
            echo "<script>window.open('add_customer.php','_self')</script>";
        }

    }
}
?>

