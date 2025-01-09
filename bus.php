<?php
session_start();
require_once "accessguard.php";
require_once "classes/Route.php";
require_once "classes/Bus.php";

$routes = new Route;
$bus = new Bus;
$res = $routes->get_states();
$ro  =  $routes->get_toroutes();
$b = $bus->get_buses();


// echo "<pre>";
// print_r($ro);
// echo "</pre>";
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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.0/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.2.0/js/dataTables.js"></script>
    <link href="DataTables/datatables.min.css" rel="stylesheet">
    
    <title>Admin Dashboard - Bus</title>
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
                <h1 class="text-dark">Buses</h1>

                <div class="row">
                    <div class="col-md mt-3 mb-3">
                    <button type="button" class="btn btn-danger" id="cbus" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Register New Bus
                    </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md">
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

                        <table class="table table-striped  display" id="myTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Bus Name</th>
                                    <th>Bus Capacity</th>
                                    <th>Bus Driver</th>
                                    <th>License Plate</th>
                                    <th>Bus Image</th>
                                    <th colspan="3">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                                if(count($b) > 0){
                                $counter = 1;
                                foreach($b as $bus){ ?>
                                <tr id="row-<?php echo $bus['bus_id']; ?>">
                                    <td><?php echo $counter++; ?></td>
                                    <td><?php echo $bus['bus_name'] ?></td>
                                    <td><?php echo $bus['capacity'] ?></td>
                                    <td><?php echo $bus['bus_driver'] ?></td>
                                    <td><?php echo $bus['license'] ?></td>
                                    <td><?php echo $bus['bus_pic'] ?></td>
                                    
                                    <td><a href="busdetail.php?id=<?php echo $bus['bus_id']; ?>" class="btn btn-primary">Details</a></td>
                                    <td><a href="bus_profile.php?id=<?php echo $bus['bus_id']; ?>" class='btn btn-info'>Edit</a></td>
                                    <td>
                                        <a href="process/delete_bus.php?id=<?php echo $bus['bus_id'] ?>" class="btn btn-danger delete-btn" name="btndelete" data-id='<?php echo $bus['bus_id'] ?>'>Delete</a></td>
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


    <!-- Modal section -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Register New Bus</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="form" class="" action="process/bus_action.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
                        <!-- <p id="feedback" class="alert alert-success"></p>
                         -->
                            <h1 class="mb-5"></h1>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="busname" name="busname" placeholder="Enter New Bus Name">
                                <label for="busname">Enter New Bus Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="capacity" name="capacity" placeholder="Enter New Bus Capacity">
                                <label for="capacity">Enter New Bus Capacity</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="driver" name="driver" placeholder="Enter Bus Driver Name">
                                <label for="driver">Enter Driver's Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="licenseno" name="licenseno" placeholder="Enter Bus License Number">
                                <label for="driver">Enter Bus License Number</label>
                            </div>

                            <div class="mb-3">
                                <label for="busimage">Bus image</label>
                                <input type="file" name="busimage" id="busimage" class="form-control border-dark noround">
                            </div>

                            <div class="mb-3">
                                <select name="route" id="route">
                                    <option value="">Select Route Name</option>
                                    <?php foreach($ro as $route){ ?>
                                    <option value="<?php echo $route['route_id']; ?>"><?php echo $route['route_name']; ?></option>
                                    <?php } ?> 
                                </select>
                            </div>
                          

                            <div>
                                <select name="tstate" id="tstate" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                    <option selected default>To State</option>
                                    <?php foreach($res as $r){ ?>
                                    <option value="<?php echo $r['state_id'] ?>"><?php echo $r['state_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="park" name="park" placeholder="Enter Price">
                                <label for="park">Sub Route/Park</label>
                            </div> -->

                            
                       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnclose" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-danger" id="btnsubmit" name="btnsubmit">Submit</button>
      </div>
    </form>
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
            //     const busId = $(this).data('id');
            //     if(confirm("Are you sure you want to delete this bus?")){
            //         $.ajax({
            //             url: 'process/delete_bus.php',
            //             type: 'POST',
            //             data: { id: busId },
            //             success: function(response){
            //                 response = response.trim(); // Remove any extra whitespace

            //                 if(response === 'success'){
            //                     $(rowId).remove(); // Remove the row from the table
            //                     alert("Bus deleted successfully.");
            //                 }else{
            //                     alert("Error deleting bus: " + response);
            //                 }
            //             },

            //             error: function(xhr, status, error){
            //                     console.error("AJAX Error:", status, error);
            //                     alert("An error occurred: " + xhr.responseText);
            //                 }
            //         })
            //     }
            // });
            
            // $('.delete-btn').click(function(){
            //     const busId = $(this).data('id');
            //     const rowId = `#row-${busId}`;

            //     if(confirm("Are you sure you want to delete this bus?")){
            //         $.ajax({
            //             url: 'process/delete_bus.php',
            //             type: 'POST',
            //             data: { id: busId },
            //             success: function(response){
            //                 response = response.trim(); // Remove any extra whitespace
            //                 if(response === 'success'){
            //                     $(rowId).remove(); // Remove the row from the table
            //                     alert("Bus deleted successfully.");
            //                 }else{
            //                     alert("Error deleting bus: " + response);
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