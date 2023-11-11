<?php 
require_once(__DIR__ ."/functions/check_session.php");

$pageTitle = "Client Data";
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
                    <th>Select</th>
                    <th>Client ID</th>
                    <th>Company Name</th>
                    <th>Email Address</th>
                    <th>Number to Dial</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                    </thead>
                    <tfoot>
                    <tr>
                    <th>Select</th>
                    <th>Client ID</th>
                    <th>Company Name</th>
                    <th>Email Address</th>
                    <th>Number to Dial</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                    </tfoot>
                    <tbody>
                <?php


                $get_clients = "SELECT * FROM `client` ORDER BY company_name ASC";
                $result=mysqli_query($conn,$get_clients);

                while($row= mysqli_fetch_assoc($result)){
                    $client_id=$row['client_id'];
                    $company_name=$row['company_name'];
                    $email=$row['email'];
                    $phone_number=$row['phone_number'];
                    $createdAt=$row['createdAt'];

                    ?>
                    <tr>
                    <form action="">
                    <td class="text-center" ><input type="checkbox" name="select" id=""></td>
                    <td><?php echo $client_id; ?></td>
                    <td><?php echo $company_name;?></td>
                    <td><a href="mailto: <?php echo $email ?>"><?php echo $email; ?></a></td>
                    <td><a href="tel: <?php echo $phone_number ?>"><?php echo $phone_number; ?></td>
                    <td><?php echo $createdAt; ?></td>
                    <td><a href='index.php?edit_client=<?php echo $client_id;?>'><i class='fa-solid fa-pen-to-square' style='color:black;'></i></a> <a href='index.php?delete_client=<?php echo $client_id;?>'><i class='fa-solid fa-trash' style='color:black;'></i></a></td>
                    </tr>
                    <?php
                }
                

                ?>

            </tbody>        
                </table>
            </div>
            <div class="container-fluid row justify-content-start">
                <div class="col-lg-2 m-2 col-6">
                    <input type="submit" value="Add a Client" class="btn btn-add">                
                </div>
                <div class="col-lg-2 m-2 col-6">
                    <input type="submit" value="Email Selected" class="btn btn-email">                
                </div>
                <div class="col-lg-2 m-2 col-6">
                    <input type="submit" value="Deleted Selected" class="btn btn-delete">                
                </div>

            </form>


            </div>
            <?php include_once __DIR__ .'/includes/footer.php';?>
        </div>
    </div>
    

</body>
</html>
