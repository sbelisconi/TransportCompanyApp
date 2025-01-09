<?php
session_start();
if(isset($_POST['download'])){
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$price = $_POST['price'];
$payment_status =  $_POST['payment_status'];
$refno = $_POST['refno'];
$bookingdate =  $_POST['booking_date'];
$dest = $_POST['dest'];
$busname =  $_POST['bus'];
$license = $_POST['license'];

$receipt = "
    <!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        .receipt { border: 1px solid #ccc; padding: 20px; width: 400px; margin: auto; width:50%}
        .receipt-header { font-size: 18px; margin-bottom: 10px; }
        .receipt-details { margin-top: 20px; }
    </style>
</head>
<body>
    <div class='receipt'>
        <div class='receipt-header'>
        <h1 style='text-align:center;'>Booking Receipt</h1>
        </div>
        <div class='receipt-details'>
            
            <p><strong>Customer Name:</strong> $fullname</p>
            <p><strong>Phone Number:</strong> $phone</p>
            <p><strong>Email Address:</strong> $email</p>
            <p><strong>Amount:</strong> $price</p>
            <p><strong>Payment Status:</strong> $payment_status</p>
            <p><strong>Transaction Reference:</strong> $refno</p>
            <p><strong>Trip date:</strong> $bookingdate</p>
            <p><strong>Destination:</strong> $dest</p>
            <p><strong>Bus:</strong> $busname</p>
            <p><strong>Bus License Number:</strong> $license</p>
        </div>
        <p style='color: green; text-align:center;'>Thank you for booking with us!</p>
    </div>
</body>
</html>
";

 // Serve the receipt as a downloadable file
 header('Content-Type: text/html');
 header('Content-Disposition: attachment; filename="booking_receipt.html"');
 echo $receipt;


}else{
    header("location:../index.php");
}

?>
