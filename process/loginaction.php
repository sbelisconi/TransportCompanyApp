<?php
session_start();
    require_once "../classes/validate.php";
    require_once "../classes/User.php";
    if(isset($_POST['btn_login'])){
        $username = sanitize($_POST['username']);
        $pass = $_POST['password'];
        if(empty($username) || empty($pass)){
            $_SESSION['errormsg'] = "Username and Paswword are required";
            header("location:../login.php");
            exit;
        }
        
        $usr = new User;
        $online_user = $usr->user_login($username, $pass);
        
        if($online_user){
            $_SESSION['cust_id'] = $online_user;
            header("location:../index.php");
            exit();
        }else{
            header("location:../login.php");
            exit;
        }

        // echo "<pre>";
        // print_r($online_user);
        // echo "</pre>";
        
        
    }else{
        $_SESSION['errormsg'] = "Please complete the form";
        header("location:login.php?msg=invalid access");
        exit;
    }
?>