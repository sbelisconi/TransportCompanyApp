<?php
session_start();
require_once "accessguard.php";
require_once "classes/Route.php";
require_once "classes/Bus.php";
require_once "classes/Terminal.php";

$routes = new Route;
$res = $routes->get_states();
// $route =$routes->get_fromroutes();
$ro  =  $routes->get_toroutes();
$b = new Route;
$bus = $b->get_routebus();

$buses = new Bus;
$bs = $buses->get_buses();

$ter = new Terminal;
$terminals = $ter->get_terminal();
// echo "<pre>";
// // print_r($route);
// // print_r($ro);
// print_r($bus);
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
    
    <title>Admin Dashboard - Route</title>
    <style>
        .disp{
            display: none;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!--Sidebar-->
       <?php
       include_once "partials/admin-side-bar.php";
       ?>
            <div class="col-md-8 text-dark">
            <h1 class="text-dark">Routes</h1>
                
                <div class="row">
                    <div class="col-md mt-3 mb-3">
                    <button type="button" class="btn btn-danger" id="croute" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Create New Route
                    </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
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
                                    <th>Route Name</th>
                                    <th>Terminal</th>
                                    <th>To State</th>
                                    <th>Price</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if(count($bus) > 0){
                                $count = 1;
                                foreach($bus as $bu){
                                    
                            
                               
                                    
                                 ?>
                                <tr>
                                    <td><?php echo $count++ ?></td>
                                    <td><?php echo $bu['route_name']; ?></td>
                                    <td><?php echo $bu['terminal_name']; ?></td>
                                    <td><?php echo $bu['state_name']; ?></td>
                                    <td><?php echo number_format($bu['price'],2) ?></td>
                                    
                                    
                                   
                                    <td><a href="dashrouteupdate.php?id=<?php echo $bu['route_id'] ?>" class="btn btn-info">Update</a></td>
                                   
                                </tr>
                                <?php
                                }
                            }else{
                                ?>
                                <tr>
                                <td colspan='7' class='text-center'>No Route added yet</td>
                                </tr>
                                
                               <?php } ?>
                            </tbody>
                        </table>

                        
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Route</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="form" class="" action="process/route_action.php" method="post">
      <div class="modal-body">
                        <!-- <p id="feedback" class="alert alert-success"></p>
                         -->
                            <h1 class="mb-5"></h1>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="routename" name="routename" placeholder="Enter New Route Name">
                                <label for="routename">Enter New Route Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select name="terminal" id="" class="form-select form-select-lg mb-3">
                                <option selected>Pick Terminal</option>
                                    <?php foreach($terminals as $terminal){ ?>
                                        <option value="<?php echo $terminal['terminal_id'] ?>"><?php echo $terminal['terminal_name'] ?></option>
                                    <?php } ?>
                                            
                                </select>
                            </div>
                            <!-- <div>
                                <select name="fstate" id="fstate" class="form-select form-select-lg mb-3">
                                    <option selected>Select Departure</option>
                                    <?php foreach($bus as $bu){ ?>
                                    <option value="<?php echo $bu['route_id']; ?>"><?php echo $bu['route_name'];?></option>
                                    <?php } ?>
                                </select>
                            </div> -->

                            <div>
                                <select name="tstate" id="tstate" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                    <option selected>To State</option>
                                    <?php foreach($res as $r){ ?>
                                    <option value="<?php echo $r['state_id'] ?>"><?php echo $r['state_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="park" name="park" placeholder="Enter Price">
                                <label for="park">Sub Route/Park</label>
                            </div> -->

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price">
                                <label for="price">Enter Price</label>
                            </div>

                            <div>
                                <select name="bus" id="bus" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                    <option selected>Assign Bus to Route</option>
                                    <?php foreach($bs as $b){ ?>
                                    <option value="<?php echo $b['bus_id'] ?>"><?php echo $b['bus_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                       
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
            $('#croute').click(function(){
                var routename = $('#routename').val();
                var toState = $('#fstate').val();
                var fromState = $('#tstate').val();
                var price = $('#price').val();
                // $('.table').addClass('disp')
                // $('#croute').addClass('disp')

                // $('#form').submit(function(event){
                //     event.preventDefault();

                //     var routeName = $('#routename').val();
                //     var toState = $('#fstate').val();
                //     var fromState = $('#tstate').val();
                //     var price = $('#price').val();
                //     var dataToSend = {
                //         routeName = routeName,
                //         toState = toState,
                //         fromState = fromState,
                //         price = price
                //     }

                //     $.ajax({
                //         type: "post",
                //         url: "route_action.php",
                //         dataType: "text",
                //         data: datatoSend,
                //         success: function(response){
            
                //             $('#routename').val('');
                //             $('#fstate').val('');
                //             $('#tstate').val('');
                //             $('#price').val('');
                //             $('#form').addClass('disp')
                //             $('#feedback').html(response);
                            
                // },
                // error: function(err){
                //     alert(err)
                // },
                // beforeSend: function(){
                //     //show loading
                // },
                // complete: function(){
                    
                // }
                //     })
                // })



               
                
            })
            // $('#btnclose').click(function(){
            //     $('.table').removeClass('disp')
            //     $('#croute').removeClass('disp')
            // })
        })

    </script>
</body>
</html>