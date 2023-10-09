<?php 
$pageTitle = "Admin Dashboard";
include_once("./head.php");?>


<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">

            <?php include_once("./sidebar.php");?>
            

            <div class="col py-3">
                <h1><?php echo $pageTitle; ?></h1>
                <h4><?php echo date("d/m/y");?></h4>
                <div class="row container-fluid pt-4 pb-4">
                    <div class="col-lg-4 col-md-6 p-2">
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
                    <div class="col-lg-4 col-md-6 p-2">
                        <div class="card" id="second-card">
                            <div class="card-header">
                                Open Inquiries:
                            </div>
                            <br>
                            <div class="card-body text-center">
                                <a href="" class="text-decoration-none text-white">5</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 p-2">
                        <div class="card" id="third-card">
                            <div class="card-header">
                                Upcoming Events:
                            </div>
                            <br>
                            <div class="card-body text-center">
                                <a href="" class="text-decoration-none text-white">2</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid text-center pt-4 pb-4">
                    <div class="row justify-content-evenly">
                        <div class="card col-md-4 mb-md-0 mb-4">
                            <div class="card-header">
                                Number of Nurses per Province
                            </div>
                            <div class="card-body">
                            <canvas id="bar-chart"></canvas>
                            </div>
                        </div>
                        <div class="card col-md-4 mb-md-0 mb-2">
                            <div class="card-header">
                                Chart 2
                            </div>
                            <div class="card-body">
                            <canvas id="pie-chart"></canvas>
                            </div>
                        </div>
                    </div>

            </div>
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
                <td><?php echo $status; ?></td>
                <td><?php echo $date; ?></td>
                <td><a href='index.php?view_inquiry=<?php echo $inquiry_id;?>'>Read More</a></td>
                </tr>
                <?php

            }

            ?>
                                        
                    </tbody>
                </table>
            </div>
            <?php include_once("./includes/footer.php");?>
        </div>
    </div>
    

</body>
</html>