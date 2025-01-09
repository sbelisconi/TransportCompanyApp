<?php
require_once "Db.php";

class Payment extends Db {
    private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();
        }

        public function update_payment($status,$ref){
            if($status){
                $payment_status = "completed";
            }else{
                $payment_status = "failed";
            }
            $sql = "UPDATE payment  SET payment_status=? WHERE payment_refno=?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$payment_status,$ref]);
            return true;
        }

        public function paystack_initialize_step_one($amt,$email,$reference){
            //step1:generate the data to be sent as an array.
            $postRequest = array("amount" =>$amt*100, "email" =>$email, "reference" =>$reference, "callback_url" => "http://localhost/motors/paystack_redirect.php");

            //step2: create or set the header as an array.
            $headers = ["authorization: Bearer sk_test_9ad0ec4fa31deb629564248826df6d29a51533c1", "content-type:application/json"];
            $url = "https://api.paystack.co/transaction/initialize";

            //step3: Initialize curl
            $curlobj = curl_init($url);
            
            //step4: set various options using setopt()
            curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curlobj, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, false);// to allow http comm with https
            curl_setopt($curlobj, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($curlobj, CURLOPT_POSTFIELDS, json_encode($postRequest));

            //execute the curl using curl_exec()
            $apirsp = curl_exec($curlobj); //return the result or false
            if($apirsp){ //we got a response from the endpoint
                curl_close($curlobj);
                return json_decode($apirsp);
            }else{//use the curl_error to find out what went wrong with the communication

                $r = curl_error($curlobj);
               // echo $r ; die(); 
                return $r;
            }


        }

        public function paystack_verify_step_two($reference){

            //step1: create or set the header as an array.
            $headers = ["authorization: Bearer sk_test_9ad0ec4fa31deb629564248826df6d29a51533c1", "content-type:application/json"];
            $url = "https://api.paystack.co/transaction/verify/$reference";
    
            //step2: Initialize curl
            $curlobj = curl_init($url);
            
            //step3: set various options using setopt()
            curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curlobj, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, false);// to allow http comm with https
    
            //step4: execute
    
            $apirsp = curl_exec($curlobj);
            if($apirsp){
                curl_close($curlobj);
                return json_decode($apirsp);
    
            }else{
                //$r = curl_error($curlobj);
                return false;
            }

        }


        public function new_payment($id,$email,$amount,$bookid,$refno){
            $sql = "INSERT INTO payment SET payment_cusid=?, payment_custemail=?, amount=?, payment_bookingid=?, payment_refno=?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id,$email,$amount,$bookid,$refno]);
            return $this->dbconn->lastInsertId();
        }

        public function get_payment_by_ref($ref){
            $sql = "SELECT * FROM payment JOIN customer ON payment.payment_cusid = customer.cust_id WHERE payment_refno=?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$ref]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function get_payment(){
            $sql = "SELECT * FROM payment JOIN customer on payment.payment_cusid=customer.cust_id";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = json_encode($result);
            return $result;
        }

        public function search_payment($id){
            $sql = "SELECT *  FROM payment JOIN customer ON payment.payment_cusid=customer.cust_id WHERE payment_refno LIKE :search OR payment_custemail LIKE :search OR amount LIKE :search";
            $stmt = $this->dbconn->prepare($sql);

            //prepare the search param with wildcards
            $search = "%".$id."%";
            $stmt->bindParam(":search", $search, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result  = json_encode($result);
            return $result;
        }

        public function get_customer_payment($id){
            $sql = "SELECT payment.payment_custemail,payment.payment_custemail, payment.amount, payment.payment_refno, payment.payment_status, payment.payment_date FROM payment JOIN customer ON payment.payment_cusid=customer.cust_id WHERE payment_cusid=?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = json_encode($result);
            return $result;
        }

       
}

?>