<?php
session_start();
require_once "../classes/Bus.php";
require_once "../accessguard.php";
require_once "../classes/validate.php";

if(isset($_POST['btnupdate'])){
    $id = sanitize($_POST['bus_id']);
    $busname = sanitize($_POST['busname']);
    $capacity = sanitize($_POST['capacity']);
    $busdriver = sanitize($_POST['busdriver']);
    $license = sanitize($_POST['licenseno']);
    $state = $_POST['state'];

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    
    
    //Let start validation of file type
    //check if image was uploaded
    if($_FILES['busimage']['error'] == 0){
        $ext = pathinfo($_FILES['busimage']['name'], PATHINFO_EXTENSION);
        $allowed=['jpg','png','jpeg'];
        if(!in_array(strtolower($ext),$allowed)){
            $_SESSION['errormsg'] = "This type of ile is not allowed";
            header("location:../bus_profile.php?id=$id");
            exit();
        }
    }

        $b = new Bus;
        $rsp = $b->update_bus($_FILES,$busname,$capacity,$busdriver,$license,$state,$id);
        $_SESSION['feedback'] = "Profile updated...";
        header("location:../bus_profile.php?id=$id"); exit();
    

}else{
    $_SESSION['errormsg'] = "Please complete the form";
    header("location:../bus_profile.php"); exit();
}
?>