<?php 
require_once(__DIR__ ."/functions/check_session.php");

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
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="service-name">
                            <label for="floatingInput">Service Name:</label>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="service-short-desc" max="50">
                            <label for="floatingInput">Service Short Description:</label>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="mb-3 col-3">
                            <label for="formFile" class="form-label">Service Image:</label>
                            <input class="form-control" type="file" id="formFile" name="service-image">
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-10">
                            <div class="mb-3">
                            <label for="floatingInput">Service Description:</label>
                            <textarea id="editor" class="form-control" name="service-desc" rows="3" cols="5"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="category">
                            <option selected>Category</option>
                            <option value="1">Single Person Care</option>
                            <option value="2">Multi-person care</option>
                            <option value="3">Wellness Offering</option>
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


            <?php include_once __DIR__ .'/includes/footer.php';?>
        </div>
    </div>
    

</body>

<?php
//Waiting for user to click submit button
if(isset($_POST['insert'])){

    //assigning form values to php variables
    $service_name = $_POST['service-name'];
    $service_short_desc = $_POST['service-short-desc'];
    $service_desc = $_POST['service-desc'];
    $category = $_POST['category'];
    $rate = $_POST['rate'];

        //Image access
        $service_image = $_FILES['service-image']['name'];


        //Temp name image
        $temp_img1 = $_FILES['service-image']['tmp_name'];



    //Empty field validation
    if($service_name=='' OR $service_desc=='' OR $category=='' OR $rate==''){
        echo "<script>alert('Not all fields have been filled')</script>";
        exit();
    }
    else{


        move_uploaded_file($temp_img1, __DIR__."/./assets/services_images/$service_image");
        

        //Inserting products
        $services_insert= "INSERT INTO `services`(`service_name`, `short_desc` , `service_description`, `service_category`, `service_rate`, `service_img`) 
        VALUES 
        ('$service_name','$service_short_desc','$service_desc','$category','$rate', '$service_image')";
        $results_query = mysqli_query($conn,$services_insert);
        if($results_query){
            echo "<script>alert('Services successfully inserted')</script>";
            echo "<script>window.open('add_services.php','_self')</script>";
        }else{
            echo "<script>alert('Failed')</script>";
        }

    }
}
?>
</html>
