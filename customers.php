<?php
session_start();
require_once "accessguard.php";
require_once "classes/User.php";
$new = new User;
$customers = $new->get_customers();
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
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.2.0/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.2.0/js/dataTables.js"></script> -->
    <link href="DataTables/datatables.min.css" rel="stylesheet">
    
    <title>Admin Dashboard- Customer List</title>
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
                <h1 class="text-dark">Customers</h1>
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
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email Address</th>
                                    <th>Phone Number</th>
                                    <th colspan="3">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                                $counter = 1;
                                foreach($customers as $c){ ?>
                                <tr id="row-<?php echo $c['cust_id']; ?>">
                                    <td><?php echo $counter++; ?></td>
                                    <td><?php echo $c['cust_firstname'] ?></td>
                                    <td><?php echo $c['cust_lastname'] ?></td>
                                    <td><?php echo $c['cust_email'] ?></td>
                                    <td><?php echo $c['cust_phone'] ?></td>
                                    <td><a href="customerdetails.php?id=<?php echo $c['cust_id']; ?>" class="btn btn-primary">Details</a></td>
                                    <td><a href="cust_profile.php?id=<?php echo $c['cust_id']; ?>" class='btn btn-info'>Edit</a></td>
                                    <!-- <td><button class="btn btn-danger delete-btn" data-id = "<?php echo $c['cust_id'] ?>" name="btndelete">Delete</button></td> -->
                                    <td>
                                        <a href="process/delete_user.php?id=<?php echo $c['cust_id'] ?>" class="btn btn-danger delete-btn" data-id = "<?php echo $c['cust_id'] ?>" name="btndelete">Delete</a></td>
                                </tr>
                                <?php } ?>
                              
                            </tbody>
                        </table>
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <script>
        $(function(){
            $('#myTable').DataTable();
           
            // $('.delete-btn').click(function(){
            //     const userId = $(this).data('id');
            //     const rowId = `#row-${userId}`;

            //     if(confirm("Are you sure you want to delete this user?")){
            //         $.ajax({
            //             url: 'process/delete_user.php',
            //             type: 'POST',
            //             data: { id: userId },
            //             success: function(response){
            //                 response = response.trim(); // Remove any extra whitespace
            //                 if(response === 'success'){
            //                     $(rowId).remove(); // Remove the row from the table
            //                     alert("User deleted successfully.");
            //                 }else{
            //                     alert("Error deleting user: " + response);
            //                 }
            //                 },
            //                 error: function(xhr, status, error){
            //                     console.error("AJAX Error:", status, error);
            //                     alert("An error occurred: " + xhr.responseText);
            //                 }
            //         });
            //     }
            // })
        })
    </script>
</body>
</html>