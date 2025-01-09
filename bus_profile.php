<?php
session_start();
require_once "accessguard.php";
require_once "classes/Bus.php";
require_once "classes/Route.php";

$bus = new Bus;
$newid = $_GET["id"];
$b= $bus->get_bus($newid);

$routes = new Route;
$res = $routes->get_states();
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
    <title>Admin Dashboard - Bus Profile</title>
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
                        <h1 class='text-dark'>Update Bus Details</h1>
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
                        <form action="process/edit_bus.php" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="bus_id" value="<?php echo $b['bus_id']; ?>">
                            <div class="mb-3">
                                <label for="busname">Bus Name<span class="text-danger">*</span></label>
                                <input type="text" name="busname" id="busname" class="form-control border-dark noround" value="<?php echo $b['bus_name'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="capacity">Bus Capacity<span class="text-danger">*</span></label>
                                <input type="number" name="capacity" id="capacity" class="form-control border-dark noround" value="<?php echo $b['capacity'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="busdriver">Assigned Driver<span class="text-danger">*</span></label>
                                <input type="text" name="busdriver" id="busdriver" class="form-control border-dark noround" value="<?php echo $b['bus_driver'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="busdriver">License Plate<span class="text-danger">*</span></label>
                                <input type="text" name="licenseno" id="licenseno" class="form-control border-dark noround" value="<?php echo $b['license'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="busimage">Bus Image</label>
                                <?php
                                if($b['bus_pic'] != "" && isset($b['bus_pic'])){
                                echo "<img src='uploads/{$b['bus_pic']}' width='100' class='border border-primary'>";
                                }else{
                                echo "You have not uploaded a bus image";
                                }
                                ?>
                                <input type="file" name="busimage" id="busimage" class="form-control border-dark noround" value="<?php echo $b['bus_pic'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="state">Destination</label>
                                <select name="state" id="state" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                    <option value='<?php echo $b['state_id'] ?>' selected><?php echo $b['state_name'] ?></option>
                                    <?php foreach($res as $re){ ?>
                                    <option value="<?php echo $re['state_id'] ?>"><?php echo $re['state_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                       

                            <div class="mb-3">
                                <button class="btn btn-danger  col-md-4" name='btnupdate'>Update</button>
                                <button type='button' class="btn btn-secondary col-md-4" onclick="document.location.href='bus.php'">Cancel</button>
                            </div>

                            

                        
                        </form>
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    
</body>
</html>