<?php
if(!isset($_SESSION['admin_id'])){
    echo $_SESSION['errormsg'] = "You must login as an admin to access this page";
    header("location:admin_login.php");
    exit;
}
?>