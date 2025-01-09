<?php
session_start();
require_once "userguard.php";
require_once "classes/Payment.php";

$ref = $_SESSION['refno'];  
if(isset($_SESSION['refno'])){
    $p = new Payment;
    $data = $p->paystack_verify_step_two($ref);
    $status = $data->status;
    $actual_amt = $data->data->amount;
    $response =  $data->data->gateway_response;
   
    $p->update_payment($status,$ref);

    $_SESSION['errormsg']= "please start the payment process";
    header("location:success.php");

//         echo"<pre>";
// print_r($data);
//     echo"</pre>";

}else{
    $_SESSION['errormsg']= "please start the payment process";
    header("location:viewseat.php");
}

// echo "Paystack will redirect to this place, connect to the second endpoint so that you can verify the true status of the transcation,update your database table and offer service to the customer";

?>