<?php
class ConnectDataBase
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbName = "workshop_pdo";
    private $charset = "utf8";
    private $conn;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        try {
            $databaseconnect = "mysql:host={$this->servername};dbname={$this->dbName};charset={$this->charset}";
            $this->conn = new PDO($databaseconnect, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connect Fail : " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

?>