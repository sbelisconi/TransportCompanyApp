<?php
session_start();
require_once "../classes/Bus.php";
require_once "../accessguard.php";

$id = $_GET['id'];
$b = new Bus;
$bus  = $b->delete_bus($id);
$_SESSION['feedback'] = "Bus deleted successfully";
header('location:../bus.php');
exit;
// header('Content-Type: text/plain'); // Ensure plain text response
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// // Start output buffering to capture any unwanted output
// ob_start();


//     if($_SERVER['REQUEST_METHOD'] === 'POST'){
//         $id = $_POST['id'];

//         $use = new Bus;
//         $success = $use->delete_bus($id);
//         return $success;

//         if($success === true){
//             http_response_code(200); // OK
//             echo "success";
//             // return "success";
//             // header("location:customers.php");
//             // exit;
//         }else{
//             http_response_code(500); // Internal Server Error
//             echo "error";
//             // return "error";
//             // header("location:customers.php");
//             // exit;
//         }
//     }else{
//         http_response_code(400); // Bad Request
//         echo "Invalid request.";
//     }

//     ob_end_clean();
?>