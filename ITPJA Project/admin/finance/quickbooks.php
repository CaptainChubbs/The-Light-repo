<?php

require_once(__DIR__ . '/vendor/autoload.php');

use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Customer;
use QuickBooksOnline\API\Facades\Invoice;

// Initialize the data service
$dataService = DataService::Configure(array(
        'auth_mode' => 'oauth2',
        'ClientID' => 'ABWb3uP9B4jOJ7aUKUJRnYMtUX5F8Nako85O9gbfKGNBgzrhcG',
        'ClientSecret' => 'scbiEVWNKiZeKGkpsn1N7HP5v0t296nML1rjh8O4',
        'accessTokenKey' => 'YOUR_ACCESS_TOKEN',
        'refreshTokenKey' => 'YOUR_REFRESH_TOKEN',
        'QBORealmID' => 'YOUR_REALM_ID',
        'baseUrl' => "development"
));

// Get all customers
$customers = $dataService->Query("SELECT * FROM Customer");

// Loop through the customers and print their names
foreach ($customers as $customer) {
        echo $customer->DisplayName . "<br>";
}

//add customer
$customerRequestObj = Customer::create(["DisplayName" => $customerName . getGUID()]);
$customerRequestObj = $dataService->Add($customerRequestObj);

//add item
$ItemObj = Item::create([
"Name" => $itemName,
"UnitPrice" => $itemPrice,
"Type" => "Service",
"IncomeAccountRef"=> ["value"=>  $incomeAccount->Id]
]);

$resultingItemObj = $dataService->Add($ItemObj);

//create invoice using customer and item created above
$invoiceObj = Invoice::create([
"CustomerRef" => ["value" => $customerRequestObj>Id],
"BillEmail" => ["Address" => "author@intuit.com"],
"Line" => [
        "Amount" => 100.00,
        "DetailType" => "SalesItemLineDetail",
        "SalesItemLineDetail" => [
                "Qty" => 2,
                "ItemRef" => ["value" => $resultingItemObj>Id]
        ]

]
]);
$resultingInvoiceObj = $dataService->Add($invoiceObj);

//send invoice email to customer
$resultingMailObj = $dataService->sendEmail($resultingInvoiceObj,$resultingInvoiceObj->BillEmail->Address);

//receive payment for the invoice
$paymentObj = Payment::create([
        "CustomerRef" => ["value" => $customerRequestObj>Id],
        "TotalAmt" => 100.00,
        "Line" => [
                "Amount" => 100.00,
                "LinkedTxn" => ["TxnId" => $invoiceId,"TxnType" => "Invoice"]
        ]
]);
$dataService->Add($paymentObj);
?>