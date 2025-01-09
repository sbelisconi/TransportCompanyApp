<?php

require_once "classes/Payment.php";
require_once "classes/Bus.php";
require_once "classes/Book.php";
require_once "classes/Terminal.php";
require_once "classes/Route.php";

session_start();
$bu = new Bus;
$ro = new Route;
$p = new Payment;
$bo = new Book;
$session_ref = isset($_SESSION['refno']) ? $_SESSION['refno'] : 0;
$payment = $p->get_payment_by_ref($session_ref);
$booking = $bo->get_booking_by_busid($payment['payment_bookingid']);
$bus = $bu->get_bus($booking[0]['bus_id']);
// echo "<pre>";
// print_r($payment);
// echo "</pre>";
// echo "<pre>";
// print_r($booking);
// echo "</pre>";
// echo "<pre>";
// print_r($bus);
// echo "</pre>";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="fa/css/all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
    <title>Imperial Motors - Payment</title>
</head>
<body>
    <?php include_once "partials/nav.php"; ?>
    <div class="container">
    <div class="row">
        <div class=" col-md-12 shadow p-3 mb-5 mt-3 bg-body-tertiary rounded" style="min-height:500px">
            <h1 class="text-center">Booking Receipt</h1>
            <form action="process/process_receipt.php" method='post'>
                <div class="d-flex grid gap-0 column-gap-3">
                
                        <div class="mt-5" id="receipt-content">
                            <p><span class="fw-bold">Name:</span> <?php echo "{$payment['cust_firstname']}"." "."{$payment['cust_lastname']}" ?></p>
                            <p><span class="fw-bold">Phone Number:</span> <?php echo $payment['cust_phone'] ?></p>
                            <p><span class="fw-bold">Email Address:</span> <?php echo $payment['cust_email'] ?></p>
                            <p><span class="fw-bold">Amount:</span> NGN<?php echo number_format($payment['amount'],2) ?></p>
                            <p><span class="fw-bold">Payment Status:</span> <?php echo $payment['payment_status'] ?></p>
                            <p><span class="fw-bold">Transaction Reference:</span> <?php echo $payment['payment_refno'] ?></p>
                            <p><span class="fw-bold">Trip date:</span> <?php echo $booking[0]['booking_date'] ?></p>
                            <p><span class="fw-bold">Destination:</span> <?php echo $bus['state_name'] ?></p>
                            <p><span class="fw-bold">Bus:</span> <?php echo $bus['bus_name'] ?></p>
                            <p><span class="fw-bold">Bus License Number:</span> <?php echo $bus['license'] ?></p>

                            <p class="text-success text-center">Thank you for booking with us!</p>
                        </div>
                       
                </div>
                <div class="row mt-5">
                <!-- Trying to send hidden data to the server to generate receipt -->
                <div>
                <input type="hidden" name="fullname" value="<?php echo "{$payment['cust_firstname']}"." "."{$payment['cust_lastname']}" ?>">
                <input type="hidden" name="phone" value="<?php echo $payment['cust_phone'] ?>">
                <input type="hidden" name="email" value="<?php echo $payment['cust_email'] ?>">
                <input type="hidden" name="price" value="<?php echo $payment['amount'] ?>">
                <input type="hidden" name="payment_status" value="<?php echo $payment['payment_status'] ?>">
                <input type="hidden" name="refno" value="<?php echo $payment['payment_refno'] ?>">
                <input type="hidden" name="booking_date" value="<?php echo $booking[0]['booking_date'] ?>">
                <input type="hidden" name="dest" value="<?php echo $bus['state_name'] ?>">
                <input type="hidden" name="bus" value="<?php echo $bus['bus_name'] ?>">
                <input type="hidden" name="license" value="</span> <?php echo $bus['license'] ?>">

                
                </div>

                    <div class="col-md">
                        <button type="button" class="btn btn-danger " onclick="document.location.href='index.php'">Close</button>
                    </div>
                    <div class="col-md" id="receipt-content">
                        <button class="btn btn-success d-block" name="download" id="download">Download Reciept</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>

    <script src="jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>

    <!-- <script>
        document.getElementById('download').addEventListener('click', function(){
            const receiptContent = document.getElementById('receipt-content').innerHTML;
            const blob = new Blob([receiptContent], {type: 'text/html'});
            const url = URL.createObjectURL(blob);

            const link = document.createElement('a');
            link.href = url;
            link.download = 'booking_receipt.html';
            link.click();

            //revoke the object URL to free memory
            URL.revokeObjectURL(url);
        })
    </script> -->


    <!-- Include Paystack SDK -->
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <!-- <script>
        document.getElementById('pay-now').addEventListener('click', function(){
            const customerId = "<?php echo $id; ?>";
            //Initialize Paystack payment
            const cust_email = "<?php echo $custemail; ?>";
            const price = "<?php echo $price?>";
            console.log(price)
            const handler = PaystackPop.setup({
                key: 'pk_test_d7318361b993cda376fc7960f0cb4cf468ceb9a8', //publick key
                email: cust_email, //customer email
                amount: price * 100, //amount
                currency: 'NGN',
                ref: 'IMP_' + Math.floor(Math.random() * 1000000000), //unique transaction
                callback: function(response){
                    alert("Payment successful! Transaction reference: " + response.reference)

                    //send the transaction reference to the server
                    fetch('process/process_pay.php',{
                        method: 'POST',
                        headers: {'content-Type': 'application/json'},
                        body: JSON.stringify({
                            reference: response.reference,
                            customer_id: customerId
                        })
                    })
                    .then(response=>response.json())
                    .then(data => {
                        if(data.status === 'success'){
                            alert('Payment verified successfully!');
                        }else{
                            alert('Payment verification failed.');
                        }
                    });
                },
                onClose: function(){
                    alert('Payment process was closed')
                }

            });
            handler.openIframe();//open the payment popup
        })
    </script> -->

 
</body>
</html>