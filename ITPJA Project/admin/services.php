<?php 
$pageTitle = "Services Dashboard";
include_once("./head.php");?>


<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">

            <?php include_once("./sidebar.php");?>
            

            <div class="col py-3">
                <h1><?php echo $pageTitle; ?></h1>
                <h4><?php echo date("d/m/y");?></h4>
                <div class="row container-fluid pt-4 pb-4">
                    
            </div>
            <div class="container-fluid datatable pt-4 pb-4">

                <table class="display table table-striped table-bordered hover" id="inquiries-Data" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Rate</th>
                    <th>Actions</th>

                </tr>
                    </thead>
                    <tfoot>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Rate</th>
                    <th>Actions</th>

                </tr>
                    </tfoot>
                    <tbody>
                <?php


                $get_services = "SELECT * FROM `services` ORDER BY service_id ASC";
                $result=mysqli_query($conn,$get_services);

                while($row= mysqli_fetch_assoc($result)){
                    $service_id=$row['service_id'];
                    $service_name=$row['service_name'];
                    $service_description=$row['service_description'];
                    $service_category=$row['service_category'];
                    $service_rate=$row['service_rate'];

                    ?>
                    <tr>
                    <td><?php echo $service_id; ?></td>
                    <td><?php echo $service_name;?></td>
                    <td><a><?php echo $service_category;?></td>
                    <td><a><?php echo $service_description;?></a></td>
                    <td><?php echo $service_rate; ?></td>
                    <td><a href='index.php?edit_nurse=<?php echo $service_id;?>'><i class='fa-solid fa-pen-to-square' style='color:black;'></i></a> <a href='index.php?delete_nurse=<?php echo $service_id;?>'><i class='fa-solid fa-trash' style='color:black;'></i></a></td>
                    </tr>
                    <?php
                }
                

                ?>

            </tbody>       
                </table>
            </div>

            <div class="container-fluid row justify-content-start">
                <div class="col-2">
                    <a href="./add_services.php" class="btn btn-add">Add Services</a>
                </div>


            </div>
            <?php include_once("./includes/footer.php");?>
        </div>
    </div>
    

</body>
</html>
