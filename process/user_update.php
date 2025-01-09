<?php
session_start();
require_once "../classes/User.php";
require_once "../userguard.php";
require_once "../classes/validate.php";

if(isset($_POST['btnupdate'])){
    $firstname = sanitize($_POST['firstname']);
    $lastname = sanitize($_POST['lastname']);
    $phone = sanitize($_POST['phone']);
    $email = sanitize($_POST['email']);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $nextofkin = sanitize($_POST['cust_next_of_kin']);
    $nextkinphone = sanitize($_POST['cust_next_of_kin_phone']);

    $dateofbirth  = date("Y-m-d", strtotime($dob));

    if(empty($firstname) || empty($lastname) || empty($phone)){
        $_SESSION['errormsg'] = "Fields marked with asterisks cannot be empty.";
        header("location:../userdashboard.php"); exit();
    }else{
        $up = new User;
        $rsp = $up->update_user($firstname,$lastname,$phone,$email,$dateofbirth,$gender,$nextofkin,$nextkinphone,$_SESSION['cust_id']);
        $_SESSION['feedback'] = "Profile updated...";
        header("location:../userdashboard.php"); exit();
    }

    
    
}else{
    $_SESSION['errormsg'] = "Please complete the form";
    header("location:../userdashboard.php"); exit();
}
?>