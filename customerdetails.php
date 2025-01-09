<?php
session_start();
require_once "accessguard.php";
require_once "classes/User.php";
$new = new User;
$newid = $_GET["id"];
$customers = $new->get_user($newid);
// echo "<pre>";
// print_r($customers);
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
    <title>Admin Dashboard</title>
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
                                <th>First Name</th>
                                <td> <?php echo $customers["cust_firstname"]; ?> </td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td> <?php echo $customers["cust_lastname"]; ?> </td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td> <?php echo $customers["cust_phone"]; ?> </td>
                            </tr>
                            <tr>
                                <th> Email </th>
                                <td> <?php echo $customers["cust_email"]; ?> </td>
                            </tr>
                            <tr>
                                <th> Date of Birth </th>
                                <td> <?php echo $customers["cust_dob"]; ?> </td>
                            </tr>
                            <tr>
                                <th> Gender </th>
                                <td> <?php echo $customers["cust_gender"]; ?> </td>
                            </tr>
                            <tr>
                                <th> Next of kin </th>
                                <td> <?php echo $customers["cust_next_of_kin"]; ?> </td>
                            </tr>
                            <tr>
                                <th> Next of kin contact </th>
                                <td> <?php echo $customers["cust_next_of_kin_phone"]; ?> </td>
                            </tr>
                            <tr>
                                <th> Date registered </th>
                                <td> <?php echo $customers["cust_date_reg"]; ?> </td>
                            </tr>
                        </table>
                        <button class="btn btn-danger btn-lg col-md-12" onclick="document.location.href='customers.php'">Close</button>
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>