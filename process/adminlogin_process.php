<?php
session_start();
require_once "../classes/Superadmin.php";
require_once "../classes/validate.php";

if(isset($_POST['btnlogin'])){
    $email = sanitize($_POST['email']);
    $pass = $_POST['pass'];
    
    $ad = new Admin;
    $res = $ad->admin_login($email,$pass);
    if($res){
        $_SESSION['admin_id'] = $res;
        header("location:../admin.php");
        exit;
    }else{
        $_SESSION['errormsg'] = "Please complete the form";
        header("location:../admin_login.php");
        exit;
    }

}else{
    $_SESSION['errormsg'] = "Please complete the form";
    header("location:../admin_login.php");
    exit;
}
?>
