<?php
if(!isset($_SESSION['cust_id'])){
    echo $_SESSION['errormsg'] = "You must login to access this page";
    header("location:login.php");
    exit;
}
?>