<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="fa/css/all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">

    <title>Imperial Motors LLC - Login</title>
    
</head>
<body>

    <div class="">
<!-- nav-->
 <?php
 include_once "partials/nav.php";
 ?>
    
      <!-- Background image section-->
        <div class="bg-img sec">
            <div class="inner col-md">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 offset-md-3">
                        <h1 Class="text-center mb-3 text-light mt-5">Register</h1>
                        <?php
                          if(isset($_SESSION['errormsg'])){
                            echo "<div class=' loader bg-white text-danger text-center'>".$_SESSION['errormsg']."</div>";
                          }
                          unset($_SESSION['errormsg']);
                          
                          if(isset($_SESSION['feedback'])){
                            echo "<div class='loader bg-white text-success text-center'>".$_SESSION['feedback']."</div>";
                          }
                          unset($_SESSION['feedback']);
                        ?>
                          <form action="process/regaction.php" id="form" method="post" class="mb-5 mt-5 opacity-80">
                           
                                
                                <input type="text" name="firstname" id="firstname" placeholder="First Name" class="form-control mb-3">
                                <input type="text" name="lastname" id="lastname" placeholder="Last Name" class="form-control mb-3">
                                <input type="text" name="email" id="email" placeholder="Email Address" class="form-control mb-3">
                                
                                <input type="password" name="password" id="password" placeholder="Enter your password" class="form-control mb-3">
                                <input type="password" name="cpassword" id="cpassword" placeholder="Enter password again" class="form-control mb-3">
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-danger btn-lg col-12 mb-3" name="btn_signup" id="btn_signup">Sign Up</button>
                                </div>
                                <p class="text-center mb-3"><a href="login.php" class="text-light text-decoration-none link-underline-light">Already have an account? Sign in</a></p>
                                
                                
                            </form>
                        </div>
                            
                        
                    </div>
                </div>
            </div>


        </div>
        <!--End of background section-->

       
         <!--Footer section-->
        <div class="foot-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 special-txt text-center mt-5">
                        <h2 class="mb-5">Subscribe to our Newsletter</h2>
                        <div class="row">
                            <div class="col-md-8 mb-5">
                                <input type="text" name="" id="" placeholder="Enter your email address" class="form-control col-md-12">
                            </div>
                            <div class="col-md-4 mb-5">
                                <button class="col-md-12 btn foot-bt">Subscribe</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 text-center special-txt mt-5">
                        <h2 class="mb-5" id="contact">Contact Us</h2>
                        <p>(+234) 0708 080 0808</p>
                        <p>(+234) 0708 080 0808</p>
                        <p>(+234) 0708 080 0808</p>
                        <p>feedback@imperialsupport.com</p>
                    </div>
                    <div class="col-md-4 text-center special-txt mt-5 foot-link">
                        <h2 class="mb-5">Support</h2>
                        <p><a href="" data-bs-toggle="modal" data-bs-target="#imperialcondition">Terms & Condition</a></p>
                        <p><a href="" data-bs-toggle="modal" data-bs-target="#imperialprivacy">Privacy Policy</a></p>
                    </div>
                </div>
            </div>
        </div>

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
        $(function(){
          $('#form').change(function(){
            var email = $('#email')
          var firstname = $('#firstname')
          var lastname = $('#lastname');
          var password = $('#password');
          var cpassword = $('#cpassword');

          if(firstname == '' || lastname == '' || email == '' || password == '' || cpassword == ''){
            $('#btn_signup').prop('disabled', true);
          }
          })
          
          $('#email').change(function(){
            var email = $(this).val();

            $.ajax({
              type: "get",
              url: "process/regaction.php",
              data: {email: email},
              dataType: "text",
              success: function(response){
                if(response == "yes"){
                  $('#btn_signup').prop('disabled', true)
                  $('.loader').html('Email address already exist...')
                }
              },
              error: function(error){
                console.log(error)
              },
              beforeSend:function(){
                $('.loader').html("Checking if email address is available...")
              },
              complete: function(){
                $('.loader').html('')
              }
            })
          })
        })
      </script>

    
</body>
</html>