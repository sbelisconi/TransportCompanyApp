<?php
session_start();
require_once "classes/User.php";
require_once "userguard.php";
require_once "classes/User.php";
require_once "classes/Route.php";
require_once "classes/Terminal.php";

$new = new Route;
$r = $new->get_toroutes();
$routes = $new->get_routebus();
$res = $new->get_states();
$ter = new Terminal;
$t = $ter->get_terminal();

// $id = $_SESSION['cust_id'];
// echo $id;
$new = new User;
    $use = $new->get_user($_SESSION['cust_id']);
    // echo "<pre>";
    // print_r($use);
    // echo "</pre>";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="fa/css/all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">

    <title>Imperial Motors LLC - Book A Trip</title>
</head>
<body>

    <div class="">
             <!-- Navigation section-->
           <?php
           include_once "partials/nav.php";

            
           ?>

           <div class="row">
            
                <?php require_once "partials/user-side-bar.php";
                ?>
            
            <div class="col-md-9">
                <h1>
                    Book A Trip
                </h1>

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
          
          <form action="viewseat.php" id="bookingform" method="post">
            <div id='trip'>
                                <h2 class="form-content">Book a Trip</h2>
                                <div class="row">
                                    <div class="col-md">
                                        <label for="depart" class="form-label form-content">Travelling From</label>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md">
                                        <select name="depart" id="depart" class="col form-select req">
                                        <option value="" >Departure Terminal</option>
                                           <?php foreach($t as $ter){ ?>
                                            <option value="<?php echo $ter['terminal_id'] ?>" ><?php echo $ter['terminal_name'] ?></option>
                                           <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                

                                <div class="row">
                                    <div class="col">
                                        <label for="dest" class="form-label form-content">Travelling To</label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <select name="dest" id="dest" class="col-md form-select req">
                                            <option value="" >Destination</option>
                                            <?php foreach($routes as $route){ ?>
                                            <option value="<?php echo $route['route_id'] ?>" ><?php echo $route['route_name'] ?></option>
                                           <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <label for="DepartDate" class="form-label form-content">Departure Date</label>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="date" name = "todate" id= "todate"class="form-control req">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="adult" class="form-label form-content">Adults</label>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="children" class="form-label form-content">Children</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="number" name="adult" id="adult" class="form-control req" value="0">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <input type="number" name="children" id="children" class="form-control req" value="0">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col mb-5">
                                        <button class="btn nav-bt" id="btnproceed" name="btnproceed" disabled>Proceed</button>
                                    </div>
                                </div>
              </div>
            </form>

        </div>
      </div>
    
   




         <!--Footer section-->
       <?php
       include_once "partials/footer.php";
       ?>

    </div>

<!--MODAL FOR TERMS AND CONDITIONS-->
<div class="modal fade" id="imperialmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Terms & Conditions</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ol>
            <li>
                All Tickets are valid for use ONLY by the individual to whom it has been issued and the bus schedule, date and time for which it is purchased
            </li>
            <li>Imperial Motors is not responsible for lost or stolen tickets</li>
            <li>Our Prices are subject to change without prior notice to guests due to unforeseen economic circumsiances.</li>
            <li>All fares are payable in Naira (Nigeria) and/or in the local currency equivalent of the country of departure.
            </li>
            <li>Our tickets is non-transferrable</li>
            <li>Tickets already purchased are non-refundable. Tickets can be carried over to be utilized at a future date with validity restricted to within one month of ticket purchase provided the fare amount is the same on the new trip date; any additional diterence will be paid by the customer at our terminal before departure</li>
            <li>Passengers are expected to send a rerouting/rescheduling request to feedback@imperialsupport.com call our customer care line</li>
            <li>First rescheduling request will be processed at zero administration charge but subsequent requests attract a charge of Two thousand naira only (2,000) and it must be paid at the departure terminal.</li>
            <li>Every rerouting request attracts an administrative charge of one thousand naira only (1,000) and passengers are required to make the payment at the departure terminal.</li>
            <li>All rerouting and rescheduling request must be sent at least four (4) Hours before the departure time stated on the ticket</li>
            <li>Passengers who miss their bus on scheduled travel date are expected to send a reroute/reschedule request not exceeding four (4) hours after the departure time on their tickets, failure to do so will result to cancellation of ticket without refunds.</li>
            <li>Pets (animals), Alcohol intake/intoxicated passenger and Smoking is prohibited on all the buses, we only convey humans.</li>

          </ol>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>
  
  <!--MODAL FOR PRIVACY POLICY-->
  <div class="modal fade" id="imperialprivacy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Privacy Policy</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <p>This privacy statement applies to all cardholder data processed by Imperial Motors website or mobile application. GUO Transport mobile application will only request necessary identifiable information to process payment and do not store cardholder’s information provided by the customer, and will only use that information for the specific purposes for which it was provided. GUO Transport will use this information strictly confidential, and will not disclose, sell, or lease the information to third parties unless required by law, or with the written permission of the cardholder.

        As with most websites and application used for payment card transaction services, Imperial Motors company web servers collect web session data used to analyze site trends and gather broad demographic data. Imperial Motors reserves the right to collect certain technical information of customers such as operating system, IP address, web browser software, and URL data through the use of cookies or other technology not linked to personally identifiable information or cardholder data.</p>
      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>


      <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>
      <script src="jquery-3.7.1.min.js"></script>
      <script>
        $(document).ready(function(){
          const form =  $('#bookingform');
          const submitbtn = $('#btnproceed');

          function checkInputs(){
            let allFilled = true;

            form.find(".req").each(function(){
              if($(this).val().trim() === ""){
                allFilled = false;
                return false;
              }
            })

            //check if the number of adults is greater than zero
            const adults = parseInt($("#adult").val().trim(), 10);
            if (isNaN(adults) || adults <= 0) {
                allFilled = false;
            }
            
            submitbtn.prop('disabled', !allFilled)
          }

          form.find(".req").on("input", checkInputs);

          checkInputs();
          
        })
        
       
      </script>
</body>
</html>