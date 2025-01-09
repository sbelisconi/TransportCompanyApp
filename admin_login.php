<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMPERIAL MOTORS LLC</title>
    <link rel="stylesheet" type="text/css" href="fa/css/all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="process/adminlogin_process.php" method = "post">
                    <h1 class="text-center mb-5 mt-3">IMPERIAL MOTORS LLC</h1>
                    <?php
                        if(isset($_SESSION['errormsg'])){
                            echo "<div class='alert alert-danger'>" . $_SESSION['errormsg']. "</div>";
                        }
                        unset($_SESSION['errormsg']);
                    ?>
                    <input type="text" class="form-control mb-3 border border-dark" name="email" id="email" placeholder="Enter Email Address">
                    <input type="password" class = "form-control mb-3 border border-dark" name="pass" id="pass" placeholder="Enter password">
                    <div class="d-flex justify-content-center">
                        <button name="btnlogin" id="btnlogin" class="btn btn-lg btn-danger col-12">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>