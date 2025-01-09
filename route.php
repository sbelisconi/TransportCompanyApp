
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
        <div class="bg-col">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="text-center special-txt"> Our Routes</h2>
                        <p class="text-center special-txt">We travel across multip cities in the country. Below are the routes we travel for now. But you can suggest a route for us by visting our <a href="suggest.html">suggest route</a> page</p>

                        <table class="table table-striped table-hover table-danger">
                            <tr>
                                <th>S/N</th>
                                <th>Region</th>
                                <th>City/State</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td rowspan="5">South-West</td>
                                <td>Lagos</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Ijebu-Ode, Ogun</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Osogbo, Osun</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Akure, Ondo</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Ibadan, Oyo</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td rowspan="6">South-East</td>
                                <td>Asaba, Delta</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Onitsha, Anambra</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Enugu</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Owerri, Imo</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Aba, Abia</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Benin, Edo</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td rowspan="4">South-South</td>
                                <td>Port-Harcourt, Rivers</td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>Yenogoa, Bayelsa</td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td>Calabar, Cross-Rivers</td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td>Uyo, Akwa-Ibom</td>
                            </tr>
                            <tr>
                                <td>16</td>
                                <td rowspan="5">North-Central/North</td>
                                <td>Ilorin, Kwara</td>
                            </tr>
                            <tr>
                                <td>17</td>
                                <td>Jos, Platue</td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td>Kano, Kano</td>
                            </tr>
                            <tr>
                                <td>19</td>
                                <td>Kaduna, Kaduna</td>
                            </tr>
                            <tr>
                                <td>20</td>
                                <td>Maiduguri, Borno</td>
                            </tr>



                        </table>
                    </div>
                </div>
            
            </div>
        </div>


        <!--End of background section-->

    </div>
        <!--Footer section-->
        <?php
            include_once "partials/footer.php";
        ?>
        

    

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