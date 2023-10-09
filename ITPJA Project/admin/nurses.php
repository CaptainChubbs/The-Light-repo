<?php 
$pageTitle = "Nurses Dashboard";
include_once("./head.php");?>


<body>
    <div class="main-container container-fluid">
        <div class="row flex-nowrap">

            <?php include_once("./sidebar.php");?>
            

            <div class="col py-3">
                <h1><?php echo $pageTitle; ?></h1>
                <h4><?php echo date("d/m/y");?></h4>

            <div class="nurses-table container-fluid datatable pt-4 pb-4">

                <table class="display  table table-striped table-bordered hover nowrap compact" id="inquiries-Data" width="100%" cellspacing="0" >
                    <thead>
                    <tr>
                    <th class="all">Select</th>
                        <th class="all">First Name</th>
                        <th class="all">Last Name</th>
                        <th class="all">Email</th>
                        <th class="all">Phone Number</th>
                        <th class="all">Age</th>
                        <th class="all">Address</th>
                        <th class="all">City</th>
                        <th class="all">Province</th>
                        <th class="all">Postal Code</th>
                        <th class="all">Qualifications</th>
                        <th class="all">Experience</th>
                        <th class="all">Transport</th>
                        <th class="all">Computer Skills</th>
                        <th class="all">Own Practice</th>
                        <th class="all">Practice Number</th>
                        <th class="all">Dispensing Number</th>
                        <th class="all">Created At</th>
                        <th class="all">Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th class="all">Select</th>
                        <th class="all">First Name</th>
                        <th class="all">Last Name</th>
                        <th class="all">Email</th>
                        <th class="all">Phone Number</th>
                        <th class="all">Age</th>
                        <th class="all">Address</th>
                        <th class="all">City</th>
                        <th class="all">Province</th>
                        <th class="all">Postal Code</th>
                        <th class="all">Qualifications</th>
                        <th class="all">Experience</th>
                        <th class="all">Transport</th>
                        <th class="all">Computer Skills</th>
                        <th class="all">Own Practice</th>
                        <th class="all">Practice Number</th>
                        <th class="all">Dispensing Number</th>
                        <th class="all">Created At</th>
                        <th class="all">Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php


                    $get_nurses = "SELECT * FROM `nurse` ORDER BY first_name ASC";
                    $result=mysqli_query($conn,$get_nurses);

                    while($row= mysqli_fetch_assoc($result)){
                        $first_name=$row['first_name'];
                        $last_name=$row['last_name'];
                        $email=$row['email'];
                        $phone_number=$row['phone_number'];
                        $dob = $row['dob'];
                        $address=$row['address'];
                        $city=$row['city'];
                        $province=$row['province'];
                        $postal_code=$row['postal_code'];
                        $qualifications=$row['qualifications'];
                        $experience=$row['experience'];
                        $transport=$row['transport'];
                        $computer_skills=$row['computer_skills'];
                        $own_practice=$row['own_practice'];
                        $practice_number=$row['practice_number'];
                        $dispensing_number=$row['dispensing_number'];
                        $createdAt=$row['createdAt'];
                        ?>
                        <tr>
                        <form action="">
                        <td><input type="checkbox" name="select" id=""></td>
                        <td><?php echo $first_name; ?></td>
                        <td><?php echo $last_name;?></td>
                        <td><a href="mailto: <?php echo $email ?>"><?php echo $email; ?></a></td>
                        <td><a href="tel: <?php echo $phone_number ?>"><?php echo $phone_number; ?></td>
                        <td><?php echo $dob; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $city; ?></td>
                        <td><?php echo $province; ?></td>
                        <td><?php echo $postal_code; ?></td>
                        <td><?php echo $qualifications; ?></td>
                        <td><?php echo $experience; ?></td>
                        <td><?php echo $transport; ?></td>
                        <td><?php echo $computer_skills; ?></td>
                        <td><?php echo $own_practice; ?></td>
                        <td><?php echo $practice_number; ?></td>
                        <td><?php echo $dispensing_number; ?></td>
                        <td><?php echo $createdAt; ?></td>
                        <td><a href='index.php?edit_nurse=<?php echo $nurseID;?>'><i class='fa-solid fa-pen-to-square' style='color:black;'></i></a> <a href='index.php?delete_nurse=<?php echo $nurseID;?>'><i class='fa-solid fa-trash' style='color:black;'></i></a></td>
                        </tr>
                        <?php
                    }
                    

                    ?>

                </tbody>       
                </table>
            </div>
            <div class="container-fluid row justify-content-start">
                <div class="col-xxl-1 m-2 col-6">
                    <a href="./add_nurse.php" class="btn btn-add">Add a Nurse</a>               
                </div>
                <div class="col-xxl-1 m-2 col-6">
                    <input type="submit" value="Assign a Task" class="btn btn-assign">                
                </div>
                <div class="col-xxl-1 m-2 col-6">
                    <input type="submit" value="Email Selected" class="btn btn-email">                
                </div>
                <div class="col-xxl-1 m-2 col-6">
                    <input type="submit" value="Deleted Selected" class="btn btn-delete">                
                </div>

            </form>


            </div>
            <?php include_once("./includes/footer.php");?>
        </div>
    </div>
    

</body>
</html>

