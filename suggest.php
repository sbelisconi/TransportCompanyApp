<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="fa/css/all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">

    <title>Imperial Motors LLC - Home</title>
</head>
<body>

    <div class="">
             <!-- Navigation section-->
         <?php
            include_once "partials/nav.php";
         ?>
    
      <!-- Background image section-->
        <div class="sg-img sec">
            <div class="inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 main-sec p-5 mt-5">
                            <h2 class="pb-3 text-center">Suggest a Route</h2>
                            <p class="text-center">We plan to serve you better. Suggest a route you want us to go.</p>

                            <form action="" class="form-inner col-12">
                                <h2 class="form-content p-2 text-center">Route</h2>
                                <div>
                                    <label for="depart" class="form-label">Route Departture</label>
                                </div>
                                <div class="mb-3">
                                    <select name="" id="" class="form-select">
                                        <option value="" disabled selected>Enter Departure Route</option>
                                            <option value="lagos">Lagos</option>
                                            <option value="ogun">Ogun</option>
                                            <option value="ekiti">Ekiti</option>
                                            <option value="ebonyi">Ebonyi</option>
                                            <option value="bayelsa">Bayelsa</option>
                                            <option value="ibadan">Ibadan</option>
                                            <option value="kwara">Ilorin</option>
                                            <option value="osogbo">Osogbo</option>
                                            <option value="jos">Plateau</option>
                                            <option value="taraba">Taraba</option>
                                    </select>
                                </div>

                                <div class="">
                                    <label for="des" class="form-label">Destination Route</label>
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="des" id="des" class="form-control" placeholder="Enter your destination route">
                                </div>

                                <div>
                                    <label for="fullname" class="form-label">Full Name</label>
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter your full name">
                                </div>

                                <div>
                                    <label for="fullname" class="form-label">Email</label>
                                </div>
                                <div class="mb-5">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address">
                                </div>

                                <div class="mb-5 text-center ">
                                    <button class="btn nav-bt col-6 mb-5">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
                
            </div>


        </div>
        <!--End of background section-->


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