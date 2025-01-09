<?php
require_once "../classes/Payment.php";

session_start();


    if(isset($_POST['pay-now'])){
       $id = $_POST['custid'];
       $email = $_POST['user_email'];
       $amount = $_POST['amount'];
       $bookingid = $_POST['bookingid'];
       $ref = $_POST['refno'];

       $_SESSION['refno'] = $ref;
    

       $p = new Payment;
       $pay = $p->new_payment($id,$email,$amount,$bookingid,$ref);
       header("location:../confirm.php?");
    }else{
        header("location:../index.php");
        exit;
    }
?>