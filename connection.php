<?php
class practicedb {
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "testingbook";
    protected $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function connect() {
        return $this->conn;  
    }
}
?>
