<?php
session_start();
require_once "../classes/User.php";
require_once "../classes/validate.php";
require_once "../accessguard.php";



if(isset($_POST['btnupdate'])){
    $id = $_POST['user_id'];
    $firstname  = sanitize($_POST['firstname']);
    $lastname = sanitize($_POST['lastname']);
    $phone = sanitize($_POST['phone']);
    $email = sanitize($_POST['email']);
    $dob = $_POST['dob'];
    $gender = sanitize($_POST['gender']);
    $nextofkin  = sanitize($_POST['cust_next_of_kin']);
    $nextkinphone = sanitize($_POST['cust_next_of_kin_phone']);

    $dateofbirth  = date("Y-m-d", strtotime($dob));
   


    // if($firstname='' || $lastname='' || $email='' || $phone=''){
    //     $_SESSION['errormsg'] = "Fields marked with asterisks are required";
    //     header("location:../cust_profile.php?id=$id"); exit();
    // }else{
        $up = new User;
        $rsp = $up->update_user($firstname,$lastname,$phone,$email,$dateofbirth,$gender,$nextofkin,$nextkinphone,$id);
        $_SESSION['feedback'] = "Profile updated...";
        header("location:../cust_profile.php?id=$id"); exit();
    // }
    // echo "<pre>";
    // print_r($_POST);
    // echo  "</pre>";



}else{
    $_SESSION['errormsg']  = 'Please complete the form';
    header("location:../cust_profile.php");
    exit;
}

?>