<?php
namespace db;

class Connect {

    public $servername;
    public $dbname;
    public $username;
    public $password;

    public function connect()
    {
        $this->servername = "localhost";
        $this->dbname = "xproject";
        $this->username = "root";
        $this->password = "P@ssw0rd";

        $conn = new \PDO("mysql:host=$this->servername;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
        $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $conn;

    }
}