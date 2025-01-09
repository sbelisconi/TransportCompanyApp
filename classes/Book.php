<?php
    require_once "Db.php";
    class Book extends Db{

        private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();
        }
    
        // public function insert_bus($pix,$bus_name,$capacity,$bus_driver,$license,$route_id,$bus_state){
        //     $filename = $pix['busimage']['name']; //$_FILES['bizcover']['name']
        
        //     if($filename != ''){
        //         $ext = pathinfo($filename, PATHINFO_EXTENSION);
        //         $newname = uniqid().".$ext";
        //         $temp = $pix['busimage']['tmp_name'];
        //         move_uploaded_file($temp, "../uploads/$newname");
            
        //         $sql = "INSERT  INTO bus SET bus_name=?, capacity=?, bus_driver=?, license=?, bus_pic=?, route_id=?, bus_state_id=?";
        //         $stmt = $this->dbconn->prepare($sql);
        //         $stmt->execute([$bus_name,$capacity,$bus_driver,$license,$newname,$route_id,$bus_state]);
        //         return $this->dbconn->lastInsertId();
        //     }
        // }

        public function get_booking_by_customer($id){
            $sql = "SELECT booking.booking_id, booking.booking_routeid, booking.booking_busid,booking.booking_date, route.route_name, route.price, bus.bus_name, bus.bus_driver, bus.license FROM booking JOIN customer ON booking.booking_custid=customer.cust_id JOIN route ON booking.booking_routeid=route.route_id JOIN bus ON booking.booking_busid=bus.bus_id WHERE booking_custid=?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = json_encode($result);
            return $result;
        }

        public function get_booking(){
            $sql = "SELECT * FROM booking";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function get_bookings(){
            $sql = "SELECT * FROM booking JOIN customer ON booking.booking_custid=customer.cust_id JOIN route ON route.route_id ORDER BY booking_date";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function get_bookingcustomer(){
            $sql = "SELECT * FROM booking JOIN customer on booking.booking_custid=customer.cust_id";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = json_encode($result);
            return $result;
        }

        public function get_bookingroute(){
            $sql = "SELECT booking.booking_id, booking.booking_custid, booking.booking_date, route.route_id, route.route_name, route.terminal_id,route.price, customer.cust_firstname, customer.cust_lastname, customer.cust_email FROM booking LEFT JOIN route on booking.booking_routeid=route.route_id LEFT JOIN customer ON booking.booking_custid=customer.cust_id";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = json_encode($result);
            return $result;
        }

      

        public function get_bookingid($id){
            $sql = "SELECT * FROM booking JOIN customer ON booking.booking_custid=customer.cust_id WHERE booking_id=? ORDER BY booking_date";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function get_booking_by_busid($busid){
            $sql = "SELECT * FROM booking JOIN bus ON booking.booking_busid=bus.bus_id WHERE booking_id=? LIMIT 1";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$busid]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function booked_seats($routeid, $busid){
            $sql = "SELECT COUNT(*) AS booked_seats FROM booking WHERE 	booking_routeid=? AND booking_busid=?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$routeid, $busid]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function insert_booking($routeid, $custid, $busid, $busdate){
            $sql = "INSERT INTO booking SET booking_routeid=?, booking_custid=?, booking_busid=?, booking_date=?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$routeid, $custid, $busid, $busdate]);
            return $this->dbconn->lastInsertId();
        }
    }

    // $ro = new Book;
    // $r = $ro->booked_seats(4,3);
    // echo "<pre>";
    // print_r($r);
    // echo "</pre>";
?>