<?php
session_start();
require_once "accessguard.php";
require_once "classes/Bus.php";
$bus = new Bus;
$newid = $_GET["id"];
$b= $bus->get_bus($newid);
// echo "<pre>";
// print_r($b);
// echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fa/css/all.css">
    <link rel="stylesheet" href="sb-admin-2.css">
    <link rel="stylesheet" href="main.css">
    <title>Admin Dashboard - Bus Details</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!--Sidebar-->
       <?php
       include_once "partials/admin-side-bar.php";
       ?>
            <div class="col-md-9">
              
                <div class="row">
                    <div class="col mt-5">
                        <table class="table table-striped">
                            <tr>
                                <th>Bus Name</th>
                                <td> <?php echo $b["bus_name"]; ?> </td>
                            </tr>
                            <tr>
                                <th>Bus Capacity</th>
                                <td> <?php echo $b["capacity"]; ?> </td>
                            </tr>
                            <tr>
                                <th>Assigned Driver</th>
                                <td> <?php echo $b["bus_driver"]; ?> </td>
                            </tr>
                            <tr>
                                <th>License Plate</th>
                                <td> <?php echo $b["license"]; ?> </td>
                            </tr>
                            <tr>
                                <th>Bus Image</th>
                                <td> <?php echo $b["bus_pic"]; ?> </td>
                            </tr>

                            <tr>
                                <th>Destination</th>
                                <td> <?php echo $b["state_name"]; ?> </td>
                            </tr>
                            
                        </table>
                        <button class="btn btn-danger btn-lg col-md-12" onclick="document.location.href='bus.php'">Close</button>
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>