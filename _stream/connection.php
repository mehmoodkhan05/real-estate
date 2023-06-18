<?php

class dbConnect {
    private $server = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'real_estate';

    public function connect() {
        try {
            $conn = new PDO('mysql:host='.$this->server.';dbname='.$this->dbname, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\Exception $e) {
            echo "Database Error: ".$e->getMessage();
        }
    }
}
?>