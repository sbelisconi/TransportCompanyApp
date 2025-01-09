<?php
session_start();
require_once "../classes/Bus.php";
require_once "../classes/validate.php";
require_once "../accessguard.php";
if(isset($_POST['btnsubmit'])){
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    $busname = sanitize($_POST['busname']);
    $capacity = sanitize($_POST['capacity']);
    $busdriver = sanitize($_POST['driver']);
    $license = sanitize($_POST['licenseno']);
    $busroute = $_POST['route'];
    $state = $_POST['tstate'];
    
    
    
    // Image file validation
    // check if image was uploaded
    if($_FILES['busimage']['error'] == 0){
        $ext = pathinfo($_FILES['busimage']['name'], PATHINFO_EXTENSION);
        $allowed=['jpg','png','jpeg'];
        if(!in_array(strtolower($ext),$allowed)){
            $_SESSION['errormsg'] = "This type of ile is not allowed";
            header("location:../bus.php");
            exit();
        }else{
        $b = new Bus;
        $rsp = $b->insert_bus($_FILES,$busname,$capacity,$busdriver,$license,$busroute,$state);
        $_SESSION['feedback'] = "Bus updated...";
        header("location:../bus.php"); exit();
        }
    }

}else{
    $_SESSION['errormsg'] = "Please complete the form";
    header("location:../bus.php"); exit();
}
?>