<?php

class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "autism";
    private $connection;

    public function __construct() {
        $this->connection = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function read($query) {
        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            return false;
        } else {
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function save($query) {
        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function close() {
        mysqli_close($this->connection);
    }
}

?>
