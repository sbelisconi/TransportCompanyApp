<?php
session_start();
require_once "accessguard.php";
require_once "classes/Book.php";

$bo = new Book;
// $booking = $bo->get_bookingcustomer();
// $booking = json_decode($booking);
$bookr  = $bo->get_bookingroute();
$bookr = json_decode($bookr);


// echo "<pre>";
// print_r($ro);
// echo "</pre>";
// echo "<pre>";
// print_r($booking);
// echo "</pre>";

// echo "<pre>";
// print_r($bookr);
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
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.2.0/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.2.0/js/dataTables.js"></script> -->
    <link href="DataTables/datatables.min.css" rel="stylesheet">
    
    <title>Admin Dashboard - Booking</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!--Sidebar-->
       <?php
       include_once "partials/admin-side-bar.php";
       ?>
            <div class="col-md-9">
                <!-- <div class="row">
                    <div class="col-md d-flex mt-2">
                        <form action="process/usersearch.php" method="get" class="col-md-12">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name='search'>
                    <button class="btn btn-outline-danger d-flex" type="submit" name="btnsearch">Search</button></form>
                    </div>
                </div> -->

                <h1 class="text-dark">Bookings</h1>

                <div class="row">
                    <div class="col-md mt-3">
                    <?php
                        if(isset($_SESSION['errormsg'])){
                        echo "<div class='alert alert-danger'>". $_SESSION['errormsg']."</div>";
                        }
                        unset($_SESSION['errormsg']);

                        if(isset($_SESSION['feedback'])){
                        echo "<div class='alert alert-success'>". $_SESSION['feedback']."</div>";
                        }
                        unset($_SESSION['feedback']);
                    ?>

                        <table class=" table table-striped display" id="myTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Route Name</th>
                                    <th>Amount</th>
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Travel Date</th>

                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                                
                                $counter = 1;
                                foreach($bookr as $ro){ ?>
                                <tr id="row-<?php echo $bus['bus_id']; ?>">
                                    <td><?php echo $counter++; ?></td>
                                    <td><?php echo $ro->route_name ?></td>
                                    <td><?php echo $ro->price ?></td>
                                    <td><?php echo $ro->cust_firstname. " ". $ro->cust_lastname?></td>
                                    <td><?php echo $ro->cust_email?></td>
                                    <td><?php echo $ro->booking_date ?></td>
                                    
                                </tr>
                                <?php }?>
                                
                              
                            </tbody>
                        </table>
                    </div>
                </div>
               
            </div>
        </div>
    </div>

</div>

    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <!-- <script>let table = new DataTable('#myTable');</script> -->
  
    <script>
      $(document).ready( function () {
        $('#myTable').DataTable();
    });
    </script>
</body>
</html>