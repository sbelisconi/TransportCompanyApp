<?php
session_start();
require_once "accessguard.php";
require_once "classes/Route.php";
require_once "classes/Bus.php";
require_once "classes/Payment.php";

$pay = new Payment;
$payment = $pay->get_payment();
$payment = json_decode($payment);
// echo "<pre>";
// print_r($ro);
// echo "</pre>";
// echo "<pre>";
// print_r($payment);
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
    <title>Admin Dashboard - Payment</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!--Sidebar-->
       <?php
       include_once "partials/admin-side-bar.php";
       ?>
            <div class="col-md-9">
            <h1 class="text-dark">Payments</h1>

                <div class="row">
                    <div class="col mt-3">
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

                        <table class="table table-striped display" id="myTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Transaction Reference No</th>
                                    <th>Amount</th>
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Payment Date</th>
                                    <th>Payment Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                                if(count($payment) > 0){
                                $counter = 1;
                                foreach($payment as $p){ ?>
                                <tr id="row-<?php echo $bus['bus_id']; ?>">
                                    <td><?php echo $counter++; ?></td>
                                    <td><?php echo $p->payment_refno ?></td>
                                    <td><?php echo $p->amount ?></td>
                                    <td><?php echo $p->cust_firstname . " ". $p->cust_lastname ?></td>
                                    <td><?php echo $p->payment_custemail ?></td>
                                    <td><?php echo $p->payment_date ?></td>
                                    <?php if($p->payment_status === 'completed'){ ?>
                                        <td ><div class='alert alert-success'><?php echo $p->payment_status ?></div></td>
                                    <?php }else{ ?>
                                        <td><div class='alert alert-warning'><?php echo $p->payment_status ?></div></td>
                                    <?php } ?>
                                        
                                </tr>
                                <?php } }else{?>
                                <tr>
                                    <td class="text-center">No Bus added yet</td>
                                </tr>

                                <?php  }?>
                              
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
    <script>
      $(document).ready( function () {
        $('#myTable').DataTable();
    });
    </script>

</body>
</html>