<?php
require_once "Db.php";

class Admin extends Db{
    private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
    }

    public function admin_logout(){
        session_destroy();
    }

    public function admin_login($email,$password){
        $sql = "SELECT * FROM admin WHERE admin_email=? LIMIT 1";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$email]);
        $records = $stmt->fetch(PDO::FETCH_ASSOC);
        if($records){
            $hashed = $records['admin_password'];
            $check = password_verify($password, $hashed);
            if($check){ //password is correct
                return $records['admin_id'];
            }else{//password is incorrect
                $_SESSION['errormsg'] = "incorrect Password";
                return false;
            }
        }else{ //invalid email
            $_SESSION['errormsg'] = "incorrect Email";
            return false;
        }
        
        return $records;

    }
}


// $ad = new Admin;
// $res = $ad->admin_login('admin@motor.com', 1234);
// echo $res;
?>