<?php
require_once "../classes/Route.php";
require_once "../classes/validate.php";

if(isset($_POST)){
    $routename = sanitize($_POST['routename']);
    $terminal = $_POST['terminal'];
    $tostate =  $_POST['tstate'];
    $price = sanitize($_POST['price']);
    $id = $_POST['id'];

    $up  = new Route;
    $update = $up->update_route($routename,$terminal,$tostate,$price,$id);
    if($update === true){
        $_SESSION['feedback'] = "Route updated successfully";
        header("location:../dash_route.php");
        exit();
    }else{
        $_SESSION['errormsg'] = "Failed to update route";
        header("location:../dash_route.php");
        exit();
    }
}
?>