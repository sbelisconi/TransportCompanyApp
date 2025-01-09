<?php

require_once "classes/Payment.php";

session_start();

$p = new Payment;
$session_ref = isset($_SESSION['refno']) ? $_SESSION['refno'] : 0;
$payment = $p->get_payment_by_ref($session_ref);
// echo "<pre>";
// print_r($payment);
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
            <h1 class="text-center">Confirm Payment</h1>
            <form action="process/process_confirm.php" method='post'>
                <div class="d-flex grid gap-0 column-gap-3">
                
                        <div class="mt-5">
                            <p><span class="fw-bold">Name:</span> <?php echo "{$payment['cust_firstname']}"." "."{$payment['cust_lastname']}" ?></p>
                            <p><span class="fw-bold">Phone Number:</span> <?php echo $payment['cust_phone'] ?></p>
                            <p><span class="fw-bold">Email Address:</span> <?php echo $payment['cust_email'] ?></p>
                            <p><span class="fw-bold">Price:</span> NGN<?php echo number_format($payment['amount'],2) ?></p>
                            <p><span class="fw-bold">Transaction Reference Number:</span> <?php echo $payment['payment_refno'] ?></p>
                        </div>
                       
                </div>
                <div class="row mt-5">

                    <div class="col-md">
                        <button type="button" class="btn btn-secondary " onclick="document.location.href='index.php'">Cancel</button>
                    </div>
                    <div class="col-md">
                        <button class="btn btn-success d-block" name="pay-now" id="pay-now">Confirm Payment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>

    <script src="jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>
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