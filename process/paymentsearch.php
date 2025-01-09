<?php
session_start();
require_once "../accessguard.php";
require_once "../classes/Payment.php";
require_once "../classes/validate.php";

if(isset($_GET["btnsearch"])){
    $search = htmlentities($_GET["search"]);

    $x = new Payment;
    $res = $x->search_payment($search);
    $res = json_decode($res);
    // echo "<pre>";
    // print_r ($res);
    // echo "</pre>";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../fa/css/all.css">
    <link rel="stylesheet" href="../sb-admin-2.css">
    <link rel="stylesheet" href="../main.css">
    <title>Admin Dashboard - Payment Search</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!--Sidebar-->
       <?php
    //    include_once "../partials/admin-side-bar.php";
       ?>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md d-flex mt-2">
                        <form action="paymentsearch.php" method="get" class="col-md-12">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name='search'>
                    <button class="btn btn-outline-danger d-flex" type="submit" name="btnsearch">Search</button></form>
                    </div>
                </div>
                <div class="row">
                    <div class="col mt-5">
                        <table class="table table-striped">
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
                                $counter = 1;
                                foreach($res as $r){ ?>
                                <tr id="rw">
                                    <td><?php echo $counter++; ?></td>
                                    <td><?php echo $r->payment_refno ?></td>
                                    <td><?php echo $r->amount ?></td>
                                    <td><?php echo $r->cust_firstname. " ". $r->cust_lastname ?></td>
                                    <td><?php echo $r->payment_custemail ?></td>
                                    <td><?php echo $r->payment_date ?></td>
                                    <td><?php echo $r->payment_status ?></td>

                                </tr>
                                <?php } ?>
                              
                            </tbody>
                        </table>
                        <a href="../admin_payment.php" class ="btn btn-secondary btn-lg col-md-12">Back</a>
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../jquery-3.7.1.min.js"></script>
    <script>
        $(function(){
            $('.btn-danger').click(function(e){
                e.preventDefault();

                var id = $(this).data('id')
                var confirmed = confirm('Are you sure you want to delete from the list?')

                if(confirmed){
                    $('.btn-danger').load("process/delete_user.php?id=" + id);
                    $('#rw').remove();
                    
                }else{
                    console.log("User cancelled the deletion");
                }

                // if(confirmed){
                //     $.ajax({
                //         url: "process/delete_user.php",
                //         type: "post",
                //         data: {id: id},
                //         success: function(response){
                //             if(response.success){
                //                 alert("Customer deleted successfully")
                //                 button.closest('tr').remove();
                //             }else{
                //                 alert("Error deleting user")
                //             }
                //         },
                //         error: function(xhr, status, error){
                //             console.error("Error deleting user", error);
                //             alert("An error occured. Please try again")
                //         }
                //     })
                // }else{
                //     console.log("User cancelled the deletion");
                // }
            })
        })
    </script>
</body>
</html>