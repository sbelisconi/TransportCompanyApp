<?php




    // echo "<pre>";
    // print_r($new);
    // echo "</pre>";
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top main-bg">

                <div class="container-fluid p-3">
                <a class="navbar-brand" href="index.php"><strong>IMPERIAL MOTORS LLC</strong></a>
                <button class="navbar-toggler  nave-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="route.php">Our Routes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="suggest.php">Suggest Route</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                    </ul>
                    <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn nav-bt" type="submit">Search</button>
                    </form> -->
                    
                    <?php if(isset($_SESSION['cust_id'])){
                     ?>
                    <div class="m-2">
                    <button class="btn nav-bt" onclick="document.location.href='logout.php'" type="submit">Logout</button>
                    <span></span>
                    </div>

                    <div class="m-2">
                    <button class="btn nav-bt" onclick="document.location.href='userdashboard.php'" type="submit">My Profile</button>
                    <!-- <a href='userdashboard.php' class="btn nav-bt">My Profile</a> -->
                    <span></span>
                    </div>

                    <?php }else{ ?>
                        <div class="m-2">
                        <button class="btn nav-bt" onclick="document.location.href='login.php'" type="submit">Login</button>
                        </div>
                    <?php } ?>
                </div>
                </div>
            </nav>