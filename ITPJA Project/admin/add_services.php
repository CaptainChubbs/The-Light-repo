<?php 
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}
$pageTitle = "Add Services";
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
                        <div class="col-6">
                            <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="service-name">
                            <label for="floatingInput">Service Name:</label>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-10">
                            <div class="mb-3">
                            <label for="floatingInput">Service Description:</label>
                            <textarea id="editor" class="form-control" name="editordata" rows="3" cols="5"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="category">
                            <option selected>Category</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                            <label for="rate">Service Rate:</label>
                            <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend">R</span>
                            <input type="number" class="form-control" id="rate" name="rate">
                            </div>

                            </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-6 text-center">
                            <div class="mb-3">
                            <input type="submit" class="btn btn-add" name="insert" id="insert">
                        </div>
                        </form>
            </div>
            <div class="container-fluid pt-4 pb-4">

               
            </div>


            <?php include_once("./includes/footer.php");?>
        </div>
    </div>
    

</body>

<?php

//Waiting for user to click submit button
if(isset($_POST['insert'])){

    //assigning form values to php variables
    $service_name = $_POST['service-name'];
    $service_desc = $_POST['editordata'];
    $category = $_POST['category'];
    $rate = $_POST['rate'];


    //Empty field validation
    if($service_name=='' OR $service_desc=='' OR $category=='' OR $rate==''){
        echo "<script>alert('Not all fields have been filled')</script>";
        exit();
    }
    else{


        //Inserting products
        $services_insert="INSERT INTO `services`(`service_name`, `service_description`, `service_category`, `service_rate`) 
        VALUES 
        ('$service_name','$service_desc','$category','$rate')";
        $results_query = mysqli_query($conn,$services_insert);
        if($results_query){
            echo "<script>alert('Products successfully inserted')</script>";
            echo "<script>window.open('add_services.php','_self')</script>";
        }

    }
}
?>
</html>
