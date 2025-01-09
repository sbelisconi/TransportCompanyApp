<?php
session_start();
require_once "accessguard.php";
require_once "classes/User.php";
$new = new User;
$id= $_GET['id'];
$customers = $new->get_user($id);
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
                
                <div class="row">
                    <div class="col mt-5">
                        <h1 class='text-dark'>Update User Profile</h1>
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
                        <form action="process/edit_user.php" method="post">

                        <input type="hidden" name="user_id" value="<?php echo $customers['cust_id']; ?>">
                            <div class="mb-3">
                                <label for="firtname">First Name<span class="text-danger">*</span></label>
                                <input type="text" name="firstname" id="firstname" class="form-control border-dark noround" value="<?php echo $customers['cust_firstname'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="lastsname">Last Name<span class="text-danger">*</span></label>
                                <input type="text" name="lastname" id="lastname" class="form-control border-dark noround" value="<?php echo $customers['cust_lastname'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="phone">Phone<span class="text-danger">*</span></label>
                                <input type="text" name="phone" id="phone" class="form-control border-dark noround" value="<?php echo $customers['cust_phone'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="email">Email<span class="text-danger">*</span></label>
                                <input type="text" name="email" id="email" class="form-control border-dark noround" value="<?php echo $customers['cust_email'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="dob">Date of  Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control border-dark noround" value="<?php echo $customers['cust_dob'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="gender">Gender</label>
                                <input type="text" name="gender" id="gender" class="form-control border-dark noround" value="<?php echo $customers['cust_gender'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="cust_next_of_kin">Next of Kin</label>
                                <input type="text" name="cust_next_of_kin" id="cust_next_of_kin" class="form-control border-dark noround" value="<?php echo $customers['cust_next_of_kin'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="cust_next_of_kin_phone">Next of Kin Contact</label>
                                <input type="text" name="cust_next_of_kin_phone" id="cust_next_of_kin_phone" class="form-control border-dark noround" value="<?php echo $customers['cust_next_of_kin_phone'] ?>">
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-danger  col-md-4" name='btnupdate'>Update</button>
                                <button type='button' class="btn btn-secondary col-md-4" onclick="document.location.href='customers.php'">Cancel</button>
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