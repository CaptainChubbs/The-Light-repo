<?php 

session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}

$pageTitle = "Manage Finance";
include_once("./head.php");?>


<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">

            <?php include_once("./sidebar.php");?>
            

            <div class="col py-3">
                <div class="row">
                    <h1><?php echo $pageTitle; ?></h1>
                    <h4><?php echo date("d/m/y");?></h4>
                </div>

            <hr>
            <div class="row">
            <h3>Stakeholder Accounts</h3>
            <div class="row">
            <div class="nurses-table container-fluid datatable pt-4 pb-4">

<table class="display  table table-striped table-bordered hover nowrap compact" id="inquiries-Data" width="100%" cellspacing="0" >
    <thead>
    <tr>
        <th class="all">Select</th>
        <th class="all">Invoice Number</th>
        <th class="all">Customer Name</th>
        <th class="all">Services Rendered</th>
        <th class="all">Amount Due</th>
        <th class="all">Actions</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th class="all">Select</th>
        <th class="all">Invoice Number</th>
        <th class="all">Customer Name</th>
        <th class="all">Services Rendered</th>
        <th class="all">Amount Due</th>
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
        $createdAt=$row['createdAt'];
        ?>
        <tr>
        <form action="">
        <td><input type="checkbox" name="select" id=""></td>
        <td><?php echo $first_name; ?></td>
        <td><?php echo $last_name;?></td>
        <td><?php echo $email; ?></td>
        <td><a href="mailto: <?php echo $email ?>"><?php echo $email; ?></a></td>
        <td><a href="view_invoice.php?id=' . $invoice['Id'] . '">View</a></td>
        </tr>
        <?php
    }
    

    ?>

</tbody>       
</table>
</div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Finance Chart</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="finance-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-2">
                    <a href="" class="btn btn-assign">Go to QuickBooks</a>
                </div>
                <div class="col-2">
                    <a href="" class="btn btn-email">Go to Payfast</a>
                </div>
            </div>

            </div>
                
            </div>
            <?php include_once("./includes/footer.php");?>
        </div>
    </div>
    

</body>
</html>

<?php
// Include the QuickBooks API library
require_once './finance/quicbooks.php';

// Set up the QuickBooks API credentials
$quickbooks_username = 'your_quickbooks_username';
$quickbooks_password = 'your_quickbooks_password';
$quickbooks_realm = 'your_quickbooks_realm';

// Create a new instance of the QuickBooks API
$quickbooks = new QuickBooks($quickbooks_username, $quickbooks_password, $quickbooks_realm);

// Get the list of invoices from QuickBooks
$invoices = $quickbooks->getInvoices();
?>
// Display the list of invoices in a table

echo '<table>';
echo '<tr><th>Invoice Number</th><th>Customer Name</th><th>Items</th><th>Amount</th> <th>Actions</th></tr>';
foreach ($invoices as $invoice) {
    echo '<tr>';
    echo '<td>' . $invoice['InvoiceNumber'] . '</td>';
    echo '<td>' . $invoice['CustomerName'] . '</td>';
    echo '<td>' . $invoice['Items'] . '</td>';
    echo '<td>' . $invoice['Amount'] . '</td>';
    echo '<td></td>';
    echo '</tr>';
}
echo '</table>';
