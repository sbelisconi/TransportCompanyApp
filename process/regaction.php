<?php
session_start();
    require_once "../classes/validate.php";
    require_once "../classes/User.php";

    // $email = sanitize($_GET['email']);
    // $new = new User;
    // $email_exist = $new->check_email($email);
    // if($email_exist == true){
    //     return "yes";

    // }else{
    //     return "no";
    // }


    if(isset($_POST['btn_signup'])){
        $firstname = sanitize($_POST['firstname']);
        $lastname = sanitize($_POST['lastname']);
        $email = sanitize($_POST['email']);
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];


        #checking if email exist  in the database
            $new= new User;
            $email_exist = $new->check_email($email);
                if($email_exist == true){
                    $_SESSION['errormsg'] = "Email address already exist...";
                    header("location:../reg.php");
                    exit;
                }

        if(trim($firstname) == "" || trim($lastname) == "" || trim($email) == "" || trim($password) == "" || trim($cpassword) == ""){
            $_SESSION['errormsg'] = "All fields are required";
            header("location:../reg.php");
            exit;
        }elseif($password != $cpassword){
            $_SESSION['errormsg'] = "Password must match";
            header("location:../reg.php");
            exit;
        }else{
            $new = new User;
            $id = $new->user_register($firstname,$lastname, $email, $password);
            if($id){
                

                $_SESSION['feedback'] = "An account has been created for you, Please proceed to login";
                header("location:../reg.php");
                exit;
            }else{
                $_SESSION['errormsg'] = "Error creating an account. Please try again later";
                header("location:../reg.php");
                exit;
            }


        }

        #checking if email already exist in db
       



    }else{
        $_SESSION['errormsg'] = "Please complete the form";
        header("location:../reg.php");
        exit();
    }
?>