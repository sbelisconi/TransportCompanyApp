<?php
require_once "config.php";
class Db
{
    private $dbname = DBNAME;
    private $dbuser = DBUSER;
    private $dbpass = DBPASS;
    private $dbhost = DBHOST;

    protected function connect(){
        $dsn = "mysql:host=$this->dbhost;dbname=$this->dbname;";
        $option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

        try{
            // $this->dbconn = new PDO($dsn, 'username', 'password', $option);
            $this->conn = new PDO($dsn, $this->dbuser, $this->dbpass, $option);
            return $this->conn;
        }catch(PDOException $e){
            // return e->getMessage();
            return false;
        }
    }

}
?>