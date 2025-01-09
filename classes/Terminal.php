<?php
require_once "Db.php";

class Terminal extends Db{
    private $dbconn;

    public function __construct(){
        $this->dbconn =$this->connect();
    }

    public function get_terminal(){
        $sql = "SELECT * FROM terminal";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_terminalid($id){
        $sql = "SELECT * FROM terminal WHERE terminal_id=?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

// $ter = new Terminal;
// $t = $ter->get_terminal();
// echo "<pre>";
// print_r($t);
// echo "</pre>";


?>