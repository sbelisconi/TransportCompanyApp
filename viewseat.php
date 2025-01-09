<?php
require_once "classes/Route.php";
require_once "classes/Bus.php";
require_once "classes/Book.php";
require_once "classes/Terminal.php";

// $ro = new Route;
// $routes = $ro->get_toroutes();
$bu = new Bus;
// $buses = $bu->get_buses();
session_start();
    if(isset($_POST['btnproceed'])){

        // echo "<pre>";
        // print_r();
        // echo "</pre>";

        $id = $_SESSION['cust_id'];
        $depart = $_POST['depart'];
        $des = $_POST['dest'];
        $todate = $_POST['todate'];
        $adult = $_POST['adult'];
        $children = $_POST['children'];

        if($_SESSION['cust_id']== false){
            header("location:login.php");
            exit;
        }

        // Validate date format
        $date = DateTime::createFromFormat('Y-m-d', $todate);
        $current_date = new DateTime();

        if ($date && $date->format('Y-m-d') === $todate) {
            if ($date >= $current_date) {
                
                // Proceed with saving to the database
            } else {
                $_SESSION['errormsg'] = "Error: You cannot select a past date.";
            }
        } else {
            $_SESSION['errormsg'] =  "Invalid date format.";
        }

      

        $bus = $bu->fetch_bus($des);
        if(!$bus){
            return "No bus is assigned to this route.";
        }

        $ro = new Route;
        $routes = $ro->get_routebusid($des);
        // echo "<pre>";
        // print_r($routes);
        // echo "</pre>";

        $book_routeid = $routes['route_id'];
        $book_busid = $routes['route_busid'];
        $terminalId = $routes['terminal_id'];
        $ter = new Terminal;
        $terminal = $ter->get_terminalid($terminalId);
        $busdetails = $bu->get_bus($book_busid);

        $bo = new Book;
        $booking = $bo->insert_booking($book_routeid,$id,$book_busid,$todate);

        $booked = $bo->get_bookingid($booking);
        $busid = $booked[0]['booking_busid'];
        $bookingid = $booked[0]['booking_id'];
        $custemail = $booked[0]['cust_email']; //for jquery var
        $price = $routes['price'];  //for jquery var
        $bookedbus = $bu->get_bus($busid);

        //variables to count seats
        $capacity = $busdetails['capacity'];
        $avail = $bo->booked_seats($book_routeid, $busid);
        $available = $avail[0]['booked_seats'];

        //variable to generate reference number
        $ref = 'IMP'.time().rand();
        
        // echo "<pre>";
        // print_r($booked);
        // echo "</pre>";

        // echo "<pre>";
        // print_r($busdetails);
        // echo "</pre>";

        // echo "<pre>";
        // print_r($available);
        // print_r($capacity);
        // echo "</pre>";

        
        



        
    }else{
        header("location:index.php");
        exit;
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="fa/css/all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
    <title>Imperial Motors - View Seat</title>
</head>
<body>
    <?php include_once "partials/nav.php"; ?>
    <div class="container">
    <div class="row">
        <div class=" col-md-12 shadow p-3 mb-5 mt-3 bg-body-tertiary rounded" style="min-height:500px">
            <h1 class="text-center">Booking Details</h1>
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

            <?php 
                $availability = $available >= $capacity;
                // var_dump($availability);
                if($availability){
                    echo "<div class='alert alert-info text-center'>No seat available</div>";
                }else{ ?>
            <div class="d-flex grid gap-0 column-gap-3">
                <div class="mt-5">
                    <p><span class="fw-bold">Name:</span> <?php echo "{$booked[0]['cust_firstname']}"." "."{$booked[0]['cust_lastname']}" ?></p>
                    <p><span class="fw-bold">Phone Number:</span> <?php echo $booked[0]['cust_phone'] ?></p>
                    <p><span class="fw-bold">Email Address:</span> <?php echo $booked[0]['cust_email'] ?></p>
                    <p><span class="fw-bold">Departure Date:</span> <?php echo $booked[0]['booking_date'] ?></p>
                    <p><span class="fw-bold">Terminal:</span> <?php echo $terminal[0]['terminal_name']?></p>
                    <p><span class="fw-bold">Route:</span> <?php echo $routes['route_name'] ?></p>
                    <p><span class="fw-bold">Price:</span> NGN<?php echo number_format($routes['price'],2) ?></p>
                </div>
                <div style="width:40%; height:200px">
                    <img src="uploads/<?php echo $busdetails['bus_pic'] ?>" alt="Bus picture" class="img-fluid">
                    <p class="fw-bold"><?php echo $busdetails['bus_name'] ?></p>
                    <p class="fw-bold"><?php echo $busdetails['license'] ?></p>
                </div>
            </div>
            <div class="mt-5 d-flex justify-content-center">
                <form action="process/save-order-and-pay.php" method="POST"> 
                    <input type="hidden" name="custid" value="<?php echo $id; ?>">
                    <input type="hidden" name="user_email" value="<?php echo $custemail; ?>"> 
                    <input type="hidden" name="amount" value="<?php echo $price; ?>"> 
                    <input type="hidden" name="bookingid" value="<?php echo $bookingid; ?>"> 
                    <input type="hidden" name="refno" value="<?php echo $ref; ?>">
                    <button class="btn btn-warning" name="pay-now" id="pay-now">Proceed to make Payment</button>
                </form>
                
            </div>
            <?php } ?>
        </div>
    </div>
    </div>

    <script src="jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>
    <!-- Include Paystack SDK -->
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <!-- <script>
        document.getElementById('pay-now').addEventListener('click', function(){
            const customerId = "<?php echo $id; ?>";
            //Initialize Paystack payment
            const cust_email = "<?php echo $custemail; ?>";
            const price = "<?php echo $price?>";
            console.log(price)
            const handler = PaystackPop.setup({
                key: 'pk_test_d7318361b993cda376fc7960f0cb4cf468ceb9a8', //publick key
                email: cust_email, //customer email
                amount: price * 100, //amount
                currency: 'NGN',
                ref: 'IMP_' + Math.floor(Math.random() * 1000000000), //unique transaction
                callback: function(response){
                    alert("Payment successful! Transaction reference: " + response.reference)

                    //send the transaction reference to the server
                    fetch('process/process_pay.php',{
                        method: 'POST',
                        headers: {'content-Type': 'application/json'},
                        body: JSON.stringify({
                            reference: response.reference,
                            customer_id: customerId
                        })
                    })
                    .then(response=>response.json())
                    .then(data => {
                        if(data.status === 'success'){
                            alert('Payment verified successfully!');
                        }else{
                            alert('Payment verification failed.');
                        }
                    });
                },
                onClose: function(){
                    alert('Payment process was closed')
                }

            });
            handler.openIframe();//open the payment popup
        })
    </script> -->

 
</body>
</html>