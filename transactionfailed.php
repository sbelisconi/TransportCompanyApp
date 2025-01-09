<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="fa/css/all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
    <title>Transaction Failed</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex flex-column align-content-center">
                <h1 class="text-center mt-5">Transaction Failed!</h1>

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
                <div class="d-flex justify-content-center"><img src="images/alert.png" alt="failed transaction" width=40% height=40% class="img-fluid"></div>
                <p class="text-center mt-3"><a href="index.php" class="text-decoration-none">Return to Homepage</a></p>
            </div>
        </div>
    </div>
</body>
</html>