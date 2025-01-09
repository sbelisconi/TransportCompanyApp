<?php
session_start();
require_once "../classes/Route.php";
require_once "../classes/validate.php";

if(isset($_POST['btnsubmit'])){

    $routename = sanitize($_POST['routename']);
    $terminal = $_POST['terminal'];
    $tostate = $_POST['tstate'];
    $price = sanitize($_POST['price']);
    $bus = $_POST['bus'];

    $route  = new Route;
    $routes =  $route->insert_route($routename,$terminal,$tostate,$price,$bus);
    if($routes){
        $_SESSION['feedback'] = "New route added successfully";
        header("location:../dash_route.php");
        exit;
    }else{
        $_SESSION['errormsg'] = "Error adding new route";
        header("location:../dash_route.php");
        exit;
    }

}else{
    $_SESSION['errormsg'] = "Please use the form";
    header("location:../dash_route.php");
    exit;
}



?>