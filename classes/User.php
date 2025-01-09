<?php
require_once "Db.php";

    class User extends Db
    {
        private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();
        }

        public function search_user($id){
            $sql = "SELECT cust_id, cust_firstname, cust_lastname,cust_phone, cust_email, cust_dob, cust_gender, cust_next_of_kin, cust_next_of_kin_phone  FROM customer WHERE cust_firstname LIKE :search OR cust_lastname LIKE :search";
            $stmt = $this->dbconn->prepare($sql);

            //prepare the search param with wildcards
            $search = "%".$id."%";
            $stmt->bindParam(":search", $search, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function update_user($cust_firstname,$cust_lastname,$cust_phone,$cust_email,$cust_dob,$cust_gender,$cust_next_of_kin,$cust_next_kin_phone,$id){
            $sql = "UPDATE customer SET cust_firstname=?, cust_lastname=?, cust_phone=?, cust_email=?, cust_dob=?, cust_gender=?, cust_next_of_kin=?, cust_next_of_kin_phone=? WHERE cust_id=?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$cust_firstname,$cust_lastname,$cust_phone,$cust_email,$cust_dob,$cust_gender,$cust_next_of_kin,$cust_next_kin_phone,$id]);
            return true;
        }

        public function delete_user($id){
            $sql = "DELETE FROM customer WHERE cust_id=?";
            $stmt = $this->dbconn->prepare($sql);
            $result = $stmt->execute([$id]);
            return $result;
        }

        public function get_customers(){
            $sql = "SELECT * FROM customer";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function get_user($id){
            $sql = "SELECT * FROM customer WHERE cust_id = ? LIMIT 1";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function user_logout(){
            session_destroy();
        }

        public function user_register($cust_firstname,$cust_lastname, $cust_email, $cust_password){
            $hash = password_hash($cust_password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO customer SET cust_firstname=?, cust_lastname=?, cust_email=?, cust_password=?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$cust_firstname,$cust_lastname, $cust_email, $hash]);
            return $this->dbconn->lastInsertId();
            
        }

        #method to check if email already exist in db
        public function check_email($email){
            //sql
            $sql = "SELECT * FROM customer WHERE cust_email = ?";
            //prepare
            $stmt = $this->connect()->prepare($sql);
            //execute
            $stmt->execute([$email]);
            //rowcount
            $numofemail = $stmt->rowCount();
            if($numofemail > 0){
                return true;
            }else{
                return false;
            }
        }

        public function user_login($email,$password){
            $sql = "SELECT * FROM customer WHERE cust_email=? LIMIT 1";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$email]);
            $records = $stmt->fetch(PDO::FETCH_ASSOC);
            if($records){
                $hashed = $records['cust_password'];
                $check = password_verify($password, $hashed);
                if($check){ //password is correct
                    return $records['cust_id'];
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

    //  $use = new User;
    // $new = $use->get_customers();
    // echo "<pre>";
    // print_r($new);
    // echo "</pre>";

    // $use = new User;
    // $new = $use->user_register("Test", "User", "test@gmail.com", "1234");
    // echo $new;

    // $del = new User;
    // $d = $del->delete_user('12');
    // echo "<pre>";
    // print_r($d);
    // echo "</pre>";

    // $up = new User;
    // $new = $up->update_user('Mallam','Spicy','0987','mallam@gmail.com','1993/04/22','male','Uche','0987','11');
    // echo ($new);

    // $new = new User;
    // $use = $new->user_login('test@gmail.com', 1234);
    // echo "<pre>";
    // print_r($use);
    // echo "</pre>";
?>