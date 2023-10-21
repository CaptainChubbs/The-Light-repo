<?php 
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}
$pageTitle = "Add Nurse";
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
                                <hr>
                                <p class="form-text">
                                    Password will be auto-generated
                                </p>
                                <hr>
                            </div>


                        <div class="row pt-4">
                            <div class="col-3">
                                <label for="experience" class="h5">Transport:</label>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="transport"  value="1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Yes
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="transport"  value="0">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    No
                                </label>
                            </div>
                            </div>
                            <div class="col-3">
                                <label for="experience" class="h5">Computer Skills:</label>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="computer-skills"  value="1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Yes
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="computer-skills"  value="0">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    No
                                </label>
                            </div>
                            </div>
                            <div class="col-3">
                                <label for="experience" class="h5">Own Practice:</label>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="own-practice"  value="1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Yes
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="own-practice"  value="0">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    No
                                </label>
                            </div>
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-4">
                            <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="practice-number">
                            <label for="floatingInput">Practice Number:</label>
                            </div>
                            </div>
                            <div class="col-4">
                            <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="dispensing-number">
                            <label for="floatingInput">Dispensing Number:</label>
                            </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-8">
                                <label for="experience" class="h4">Qualifications:</label>
                                <textarea class="form-control" placeholder="Fill out the Nurses' qualifications here..." id="floatingTextarea" name="qualifications"></textarea>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="col-8">
                                <label for="experience" class="h4">Experience:</label>
                                <textarea class="form-control" placeholder="Fill out the Nurses' experience here..." id="floatingTextarea" name="experience"></textarea>
                                <hr class="mt-4">
                            </div>
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


            <?php include_once("./includes/footer.php");?>
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
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postal_code = $_POST['postal-code'];
    $transport = $_POST['transport'];
    $computer_skills = $_POST['computer-skills'];
    $own_practice = $_POST['own-practice'];
    $practice_number = $_POST['practice-number'];
    $dispensing_number = $_POST['dispensing-number'];
    $qualifications = $_POST['qualifications'];
    $experience = $_POST['experience'];

    $address = $address1 . " " . $address2;

    //Empty field validation
    if($first_name == '' || $last_name == '' || $email == '' || $mobile == '' || $dob == '' || $address == '' || $city == '' || $province == '' || $postal_code == '' || $transport == '' || $computer_skills == '' || $own_practice == '' || $practice_number == '' || $dispensing_number == '' || $qualifications == '' || $experience == ''){
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
        $address = sanitize($address);
        $city = sanitize($city);
        $province = sanitize($province);
        $postal_code = sanitize($postal_code);
        $transport = sanitize($transport);
        $computer_skills = sanitize($computer_skills);
        $own_practice = sanitize($own_practice);
        $practice_number = sanitize($practice_number);
        $dispensing_number = sanitize($dispensing_number);
        $qualifications = sanitize($qualifications);
        $experience = sanitize($experience);



        //Generating a password then hashing the generated password
        $password = new passwordGenerator(6, 12);
        $password = htmlspecialchars($password->generate());
        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        //Inserting products
        $nurse_insert="INSERT INTO `nurse`( `first_name`, `last_name`, `email`, `phone_number`, `dob`, `address`, `city`, `province`, `postal_code`, `password`, `qualifications`, `experience`, `transport`, `computer_skills`, `own_practice`, `practice_number`, `dispensing_number`) 
        VALUES 
        ('$first_name','$last_name','$email','$mobile','$dob','$address','$city','$province','$postal_code','$hash_password','$qualifications','$experience','$transport','$computer_skills','$own_practice','$practice_number','$dispensing_number')";
        $results_query = mysqli_query($conn,$nurse_insert);

        if($results_query){
            echo "<script>alert('Successfully Added')</script>";
            echo "<script>window.open('./nurses.php','_self')</script>";
        }

    }
}
?>

