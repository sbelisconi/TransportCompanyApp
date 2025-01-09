<?php
require_once "Db.php";

class Route extends Db{

    private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
    }

    public function get_states(){
        $sql = "SELECT * FROM state";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insert_route($routename,$terminal,$tostate,$price,$bus){
        $sql = "INSERT  INTO route SET route_name=?, terminal_id=?, to_state_id=?, price=?, route_busid=?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$routename,$terminal,$tostate,$price,$bus]);
        return $this->dbconn->lastInsertId();
    }

    public function update_route($routename,$terminal,$tostate,$price,$id){
        $sql = "UPDATE route SET route_name=?, terminal_id=?, to_state_id=?, price=? WHERE route_id=?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$routename,$terminal,$tostate,$price,$id]);
        return true;
    }

    // public function get_fromroutes(){
    //     $sql = "SELECT *  FROM route JOIN state ON route.from_state_id = state.state_id ORDER BY route_name";
    //     $stmt = $this->dbconn->prepare($sql);
    //     $stmt->execute();
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $result;
    // }

    public function get_toroutes(){
        $sql = "SELECT * FROM route JOIN state ON route.to_state_id = state.state_id";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_routebus(){
        $sql = "SELECT * FROM route JOIN terminal on route.terminal_id = terminal.terminal_id JOIN state ON route.to_state_id = state.state_id";
        // $sql = "SELECT * FROM route RIGHT OUTER JOIN bus ON route.route_busid = bus.bus_id JOIN state ON route.to_state_id = state.state_id JOIN terminal on route.terminal_id = terminal.terminal_id";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_routebusid($id){
        $sql = "SELECT * FROM route JOIN state ON route.to_state_id = state.state_id WHERE route_id=? LIMIT 1";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

}

// $new = new Route;
// $n = $new->update_route("Lagos (Ajah)", "12", 18000);
// echo "<pre>";
// print_r($n);
// echo "</pre>";

?>