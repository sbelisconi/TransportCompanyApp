<?php
session_start();
require_once "accessguard.php";
require_once "classes/Route.php";
require_once "classes/User.php";
require_once "classes/Bus.php";
require_once "classes/Book.php";
$new = new User;
$customers = $new->get_customers();

$routes = new Route;
$route =$routes->get_toroutes();

$b = new Bus;
$bus = $b->get_buses();

$bo = new Book;
$book = $bo->get_booking();

// echo "<pre>";
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
                <!-- <div class="row">
                    <div class="col-md d-flex mt-2">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-danger" type="submit">Search</button>
                    </div>
                </div> -->
                <h1 class="text-dark text-center">Imperial Motors Dashboard</h1>
                <div class="row">
                <div style="background-color: #E88F96; " class="col-5 offset-md-1 text-light border rounded border-danger mt-5 text-center p-5">
                        <a href="customers.php" class="text-decoration-none text-white"><h1 class="fw-bold"><?php echo count($customers); ?></h1>
                        <small>Customers</small></a>
                    </div>
                    <div style="background-color: #E88F96; " class="col-5 offset-md-1 text-light border rounded border-danger mt-5 text-center p-5">
                        <a href="dash_route.php" class="text-decoration-none text-white"><h1 class="fw-bold"><?php echo count($route); ?></h1>
                        <small>Routes</small></a>
                    </div>

                    <div style="background-color: #E88F96; " class="col-5 offset-md-1 text-light border rounded border-danger mt-5 text-center p-5">
                        <a href="bus.php" class="text-decoration-none text-white"><h1 class="fw-bold"><?php echo count($bus); ?></h1>
                        <small>Buses</small></a>
                    </div>

                    <div style="background-color: #E88F96; " class="col-5 offset-md-1 text-light border rounded border-danger mt-5 text-center p-5">
                        <a href="book.php" class="text-decoration-none text-white"><h1 class="fw-bold"><?php echo count($book) ?></h1>
                        <small class="">Bookings</small></a>
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>