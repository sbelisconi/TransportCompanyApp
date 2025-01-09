<?php
    require_once "Db.php";
    class Bus extends Db{

        private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();
        }

        public function fetch_bus($routeid){
            $sql = "SELECT bus_id, bus_name, capacity FROM bus INNER JOIN route ON bus.route_id = route.route_id WHERE route_busid = ? LIMIT 1";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$routeid]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    
        public function insert_bus($pix,$bus_name,$capacity,$bus_driver,$license,$route_id,$bus_state){
            $filename = $pix['busimage']['name']; //$_FILES['bizcover']['name']
        
            if($filename != ''){
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $newname = uniqid().".$ext";
                $temp = $pix['busimage']['tmp_name'];
                move_uploaded_file($temp, "../uploads/$newname");
            
                $sql = "INSERT  INTO bus SET bus_name=?, capacity=?, bus_driver=?, license=?, bus_pic=?, route_id=?, bus_state_id=?";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$bus_name,$capacity,$bus_driver,$license,$newname,$route_id,$bus_state]);
                return $this->dbconn->lastInsertId();
            }
        }

        public function get_buses(){
            $sql = "SELECT * FROM bus";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function get_bus($id){
            $sql = "SELECT * FROM bus JOIN state ON bus.bus_state_id=state.state_id WHERE bus_id = ? LIMIT 1";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function update_bus($pix,$bus_name,$capacity,$bus_driver,$license,$bus_state,$id){
            $filename = $pix['busimage']['name']; //$_FILES['bizcover']['name']
        
            if($filename != ''){
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $newname = uniqid().".$ext";
                $temp = $pix['busimage']['tmp_name'];
                move_uploaded_file($temp, "../uploads/$newname");
            
                $sql = "UPDATE bus SET bus_name=?, capacity=?, bus_driver=?,license=?, bus_pic=?,bus_state_id=? WHERE bus_id=?";

                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$bus_name,$capacity,$bus_driver,$license,$newname,$bus_state,$id]);
            }else{
                $sql = "UPDATE bus SET bus_name=?, capacity=?, bus_driver=?,license=?, bus_state_id=
                ? WHERE bus_id=?";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$bus_name,$capacity,$bus_driver,$license,$bus_state,$id]);
            }
            return true;
        }

        public function delete_bus($id){
            $sql = "DELETE FROM bus WHERE bus_id=?";
            $stmt = $this->dbconn->prepare($sql);
            $result = $stmt->execute([$id]);
            return $result;
        }
    }

    // $ro = new Bus;
    // $r = $ro->fetch_bus(3);
    // echo "<pre>";
    // print_r($r);
    // echo "</pre>";
?>