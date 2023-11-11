<?php 

require_once(__DIR__ ."/functions/check_session.php");


$pageTitle = "Admin Dashboard";
include_once("./head.php");
?>


<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">

            <?php include_once("./sidebar.php");?>
            

            <div class="col py-3">
                <h1><?php echo $pageTitle; ?></h1>
                <h4><?php echo date("d/m/y");?></h4>
                <div class="row container-fluid pt-4 pb-4">
                    <div class="col-xl-4 col-lg-3 col-8 p-2">
                        <div class="card" id="first-card">
                            <div class="card-header">
                                Total Nurses:
                            </div>
                            <br>
                            <div class="card-body text-center">
                                <a href="./nurses.php" class="text-decoration-none text-white"><?php 
                            $nurse_count = "SELECT * FROM `nurse`";
                            $result=mysqli_query($conn,$nurse_count);
                            $nurse_num = mysqli_num_rows($result);
                            if ($nurse_num > 0){
                                echo $nurse_num;
                            } else{
                                echo "No Nurses";
                            } ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-3  col-8 p-2">
                        <div class="card" id="second-card">
                            <div class="card-header">
                                Open Inquiries:
                            </div>
                            <br>
                            <div class="card-body text-center">
                                <a href="#inquiries" class="text-decoration-none text-white"><?php 
                            $inquiry_count = "SELECT * FROM `inquiries`";
                            $result=mysqli_query($conn,$inquiry_count);
                            $nurse_num = mysqli_num_rows($result);
                            if ($nurse_num > 0){
                                echo $nurse_num;
                            } else{
                                echo "No Inquiries";
                            } ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-3  col-8 p-2">
                        <div class="card" id="third-card">
                            <div class="card-header">
                                Upcoming Events:
                            </div>
                            <br>
                            <div class="card-body text-center">
                                <a href="./nurses.php" class="text-decoration-none text-white"><?php 
                            $event_count = "SELECT * FROM `events`";
                            $result=mysqli_query($conn,$event_count);
                            $nurse_num = mysqli_num_rows($result);
                            if ($nurse_num > 0){
                                echo $nurse_num;
                            } else{
                                echo "No Events";
                            } ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid text-center pt-4 pb-4">
                    <div class="row justify-content-evenly">
                        <div class="col-md-4  mb-4 col-8">
                            <div id="nurse-distribution" class="w-100" style="height: 370px;"></div>
                        </div>
                        <div class="col-md-4  mb-4 col-8">
                            <div id="eventTypes" class="w-100" style="height: 370px;">Hello</div>
                        </div>

                    </div>


            </div>
            <section id="inquiries">

            
            <div class="container-fluid datatable pt-4 pb-4">
                <h2 class="mb-6 pb-3 pb-md-0 mb-md-4">Latest Inquiries</h2>
                <table class="display table table-striped table-bordered hover responsive nowrap" id="inquiries-Data" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Email Address</th>
                            <th>Number</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Date Submitted</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Email Address</th>
                            <th>Number</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Date Submitted</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                                    <?php
            $get_inquiries = "SELECT * FROM `inquiries`";
            $result=mysqli_query($conn,$get_inquiries);
            while($row= mysqli_fetch_assoc($result)){
                $inquiry_id=$row['inquiry_id'];
                $name= $row['name'];
                $company= $row['company'];
                $email=$row['email'];
                $number=$row['number'];
                $message=$row['message'];
                $status=$row['status'];
                $date=$row['date'];
                ?>
                
                <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo $company; ?></td>
                <td><a href="mailto: <?php echo $email ?>"><?php echo $email; ?></a></td>
                <td><?php echo $number;?></td>
                <td><?php echo $message; ?></td>
                <td><?php 
                        if($status== "Unattended"){
                            echo "<p Style='color: red;'>$status</p>";
                        }else{
                            echo "<p Style='color: green;'>$status</p>";
                        }
                        ?></td>
                <td><?php echo $date; ?></td>
                <td><a href='readMessage.php?id=<?php echo $inquiry_id;?>'>Read More</a></td>
                </tr>
                <?php

            }

            ?>
                                        
                    </tbody>
                </table>
            </div>
            </section>
        </div>
    </div>
    <?php include_once __DIR__ .'/includes/footer.php';?>

    

</body>
</html>