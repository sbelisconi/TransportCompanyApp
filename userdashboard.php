<?php
session_start();
require_once "classes/User.php";
require_once "userguard.php";

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

    <title>Imperial Motors LLC - Dashboard</title>
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
                    Welcome, <?php echo $use['cust_firstname']?>
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
          
            <form action="process/user_update.php" method="post">
              <div class="mb-3">
                <label for="firstname">First Name <span class="text-danger">*</span></label>
                <input type="text" name="firstname" id="firstname" class="form-control border-dark noround" value="<?php echo $use['cust_firstname'] ?>">
              </div>
              <div class="mb-3">
                <label for="lastname">Last Name<span class="text-danger">*</span></label>
                <input type="text" name="lastname" id="lastname" class="form-control border-dark noround" value="<?php echo $use['cust_lastname'] ?>" >
              </div>
              <div class="mb-3">
                <label for="phone">Phone Number<span class="text-danger">*</span></label>
                <input type="text" name="phone" id="phone" class="form-control border-dark noround" value="<?php echo $use['cust_phone'] ?>" >
              </div>
              <div class="mb-3">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" class="form-control border-dark noround" value="<?php echo $use['cust_email'] ?>"></input>
              </div>
              <div class="mb-3">
                <label for="dob">Date of  Birth</label>
                <input type="date" name="dob" id="dob" class="form-control border-dark noround" value="<?php echo $use['cust_dob'] ?>">
                </div>

                <div class="mb-3">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
             
                <div class="mb-3">
                <label for="cust_next_of_kin">Next of Kin Name</label>
                <input type="text" name="cust_next_of_kin" id="cust_next_of_kin" class="form-control border-dark noround" value="<?php echo $use['cust_next_of_kin'] ?>" >
              </div>

              <div class="mb-3">
                <label for="cust_next_of_kin_phone">Next of Kin Phone Number</label>
                <input type="text" name="cust_next_of_kin_phone" id="cust_next_of_kin_phone" class="form-control border-dark noround" value="<?php echo $use['cust_next_of_kin_phone'] ?>" >
              </div>
             
              <div class="mb-5 mt-3">
                <button class="btn btn-danger btn-lg w-100" name="btnupdate">Update</button>
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
</body>
</html>