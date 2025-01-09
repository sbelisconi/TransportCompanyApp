<?php
session_start();
require_once "../userguard.php";
require_once "../classes/Payment.php";

if(isset($_POST['pay-now']) &&  isset($_SESSION['refno'])){
    $p = new Payment;
    $payment = $p->get_payment_by_ref($_SESSION['refno']);

    $amount = $payment['amount'];
    $email = $payment['cust_email'];
    $reference  =  $_SESSION['refno'];
    $payresp = $p->paystack_initialize_step_one($amount,$email,$reference);
    // echo "<pre>";
    // print_r($payment);
    // echo "</pre>";

    if($payresp && $payresp->status == true){
        $auth_url = $payresp->data->authorization_url;
        header("location:$auth_url");
        exit;
    }else{
        $_SESSION['errormsg'] = "Payment could not be initiated. Try again". $payresp->message;
        header("location:../transactionfailed.php");
    }
}else{
    header("location:../confirm.php");
    exit;
}

?>