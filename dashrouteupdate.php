<?php
session_start();
require_once "accessguard.php";
require_once "classes/Route.php";
require_once "classes/Terminal.php";
$id = $_GET['id'];
$routes = new Route;
$res = $routes->get_states();
// $route =$routes->get_fromroutes();
$ro  =  $routes->get_toroutes();
$route = $routes->get_routebusid($id);

$ter = new Terminal;
$terminals = $ter->get_terminal();
echo "<pre>";
// print_r($route);
print_r($route);
echo "</pre>";
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
    <style>
        .disp{
            display: none;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!--Sidebar-->
       <?php
       include_once "partials/admin-side-bar.php";
       ?>
            <div class="col-md-8 text-dark">
                <div class="row">
                    <div class="col-md d-flex mt-2">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-danger" type="submit">Search</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
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
                        <form action="process/process_dashrouteupdate.php" method="post">
                        <table class="table table-striped">
                            <thead>
                                
                                <tr>
                                    <th>Route Name</th>
                                    <th>Terminal</th>
                                    <th>To State</th>
                                    <th>Price</th>
                                   

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <input type="text" name="routename" id="" value='<?php echo $route['route_name'] ?>'>
                                    </td>
                                    <td>
                                        <select name="terminal" id="">
                                            <?php foreach($terminals as $terminal){ ?>
                                                <option value="<?php echo $terminal['terminal_id'] ?>"><?php echo $terminal['terminal_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="tstate" id="tstate" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                            <option value='<?php echo $route['state_id'] ?>' selected><?php echo $route['state_name'] ?></option>
                                            <?php foreach($res as $re){ ?>
                                            <option value="<?php echo $re['state_id'] ?>"><?php echo $re['state_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td><input type="text" name="price" id="price" value='<?php echo $route['price'] ?>'></td>
                                  
                                    
                                    
                                </tr>
                                
                            </tbody>
                        </table>
                        <input type="hidden" name="id" value='<?php echo $id ?>'>
                        <button class="btn btn-danger">Update</button>
                            </form>
                        
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <!-- Modal -->



    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script>
        $(function(){
            $('#croute').click(function(){
                var routename = $('#routename').val();
                var toState = $('#fstate').val();
                var fromState = $('#tstate').val();
                var price = $('#price').val();
                // $('.table').addClass('disp')
                // $('#croute').addClass('disp')

                // $('#form').submit(function(event){
                //     event.preventDefault();

                //     var routeName = $('#routename').val();
                //     var toState = $('#fstate').val();
                //     var fromState = $('#tstate').val();
                //     var price = $('#price').val();
                //     var dataToSend = {
                //         routeName = routeName,
                //         toState = toState,
                //         fromState = fromState,
                //         price = price
                //     }

                //     $.ajax({
                //         type: "post",
                //         url: "route_action.php",
                //         dataType: "text",
                //         data: datatoSend,
                //         success: function(response){
            
                //             $('#routename').val('');
                //             $('#fstate').val('');
                //             $('#tstate').val('');
                //             $('#price').val('');
                //             $('#form').addClass('disp')
                //             $('#feedback').html(response);
                            
                // },
                // error: function(err){
                //     alert(err)
                // },
                // beforeSend: function(){
                //     //show loading
                // },
                // complete: function(){
                    
                // }
                //     })
                // })



               
                
            })
            // $('#btnclose').click(function(){
            //     $('.table').removeClass('disp')
            //     $('#croute').removeClass('disp')
            // })
        })

    </script>
</body>
</html>