<?php 
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}
$pageTitle = "Customer Data";
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
                    <th>Customer ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Age</th>
                    <th>Address 1</th>
                    <th>Address 2</th>
                    <th>City</th>
                    <th>Province</th>
                    <th>Postal Code</th>
                    <th>Actions</th>
                </tr>
                    </thead>
                    <tfoot>
                    <tr>
                    <th>Select</th>
                    <th>Customer ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Age</th>
                    <th>Address 1</th>
                    <th>Address 2</th>
                    <th>City</th>
                    <th>Province</th>
                    <th>Postal Code</th>
                    <th>Actions</th>
                </tr>
                    </tfoot>
                    <tbody>
                <?php


                $get_customers = "SELECT * FROM `customers` ORDER BY customer_id ASC";
                $result=mysqli_query($conn,$get_customers);
                if (mysqli_num_rows($result)==0){
                    echo "<tr><td colspan='9' class='no-records'>No records found</td></tr>";
                }else{
                while($row= mysqli_fetch_assoc($result)){
                    $customer_id=$row['customer_id'];
                    $name=$row['first_name'];
                    $surname=$row['last_name'];
                    $email=$row['email'];
                    $number=$row['number'];
                    $dob=$row['dob'];
                    $address1=$row['address1'];
                    $address2=$row['address2'];
                    $city=$row['city'];
                    $province=$row['province'];
                    $postal_code=$row['postal_code'];
                    $age = date_diff(date_create($dob), date_create('today'))->y;

                    ?>
                    <tr>
                    <form action="">
                    <td class="text-center"><input type="checkbox" name="select" id=""></td>
                    <td><?php echo $customer_id; ?></td>
                    <td><?php echo $name;?></td>
                    <td><a><?php echo $surname; ?></a></td>
                    <td><a href="mailto: <?php echo $email ?>"><?php echo $email; ?></a></td>
                    <td><?php echo $number; ?></td>
                    <td><a><?php echo $age; ?></td>
                    <td><?php echo $address1; ?></td>
                    <td><?php echo $address2; ?></td>
                    <td><?php echo $city; ?></td>
                    <td><?php echo $province; ?></td>
                    <td><?php echo $postal_code; ?></td>
                    <td class="text-center"><a class="p-2" href='index.php?edit_customer=<?php echo $customer_id;?>' ><i class='fa-solid fa-pen-to-square' style='color:black;'></i></a> <a href='index.php?delete_customer=<?php echo $customer_id;?>'><i class='fa-solid fa-trash' style='color:black;'></i></a></td>
                    </tr>
                    <?php
                }
                }

                ?>

            </tbody>       
                </table>
            </div>
            <div class="container-fluid row justify-content-start">
                <div class="col-lg-2 m-2 col-6">
                    <a href="./add_customer.php" class="btn btn-add">Add a Customer</a>                
                </div>
                <div class="col-lg-2 m-2 col-6">
                    <input type="submit" value="Email Selected" class="btn btn-email">                
                </div>
                <div class="col-lg-2 m-2 col-6">
                    <input type="submit" value="Deleted Selected" class="btn btn-delete">                
                </div>

            </form>

            </div>
            <?php include_once("./includes/footer.php");?>

        </div>
        
    </div>
    

</body>
</html>

