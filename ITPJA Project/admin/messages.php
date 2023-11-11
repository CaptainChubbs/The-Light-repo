<?php 
require_once(__DIR__ ."/functions/check_session.php");


$pageTitle = "Messages";
include_once("./head.php");
require_once("./functions/Gmail-api.php");?>



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
                <div class="col-2">            
                    <a href="./new_email.php" class="btn btn-add">Send New Email</a>
                </div>
            <div class="row">
            <div class="nurses-table container-fluid datatable pt-4 pb-4">

<table class="display  table table-striped table-bordered hover nowrap compact" id="inquiries-Data" width="100%" cellspacing="0" >
    <thead>
    <tr>
        <th class="all">Select</th>
        <th class="all">Sender</th>
        <th class="all">Subject</th>
        <th class="all">Date</th>
        <th class="all">Actions</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th class="all">Select</th>
        <th class="all">Sender</th>
        <th class="all">Subject</th>
        <th class="all">Date</th>
        <th class="all">Actions</th>
    </tr>
    </tfoot>
    <tbody>
    <?php


// Display the emails on the screen



foreach ($messages as $message) {
    $msg = $service->users_messages->get($user, $message->getId());
    $m_id = $msg->getId();
    $payload = $msg->getPayload();
    $headers = $payload->getHeaders();
    $subject = '';
    $from = '';
    foreach ($headers as $header) {
        if ($header->getName() == 'Subject') {
            $subject = $header->getValue();
        }
        if ($header->getName() == 'From') {
            $from = $header->getValue();
        }
        if ($header->getName() == 'Date') {
            $date = $header->getValue();
    }
}
    ?>
    <tr>
    <form action="">
    <td><input type="checkbox" name="select" id=""></td>
    <td><a href="./view_mail.php?id=<?php echo $m_id; ?>&user=<?php echo $user;?>"><?php echo $from; ?></a> </td>
    <td><a href=""><?php echo $subject;?></a> </td>
    <td><a href=""><?php echo $date;?></a> </td>
    <td><a href="mailto:>"><?php echo "test"; ?></a> <a href="view_invoice.php?id=' . $invoice['Id'] . '">View</a></td>
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
                    
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-2">
                    <a href="" class="btn btn-assign">Read All</a>
                </div>
                <div class="col-2">
                    <a href="" class="btn btn-email">Delete Selected</a>
                </div>
            </div>

            </div>
                
            </div>
            <?php include_once __DIR__ .'/includes/footer.php';?>
        </div>
    </div>
    

</body>
</html>

