<?php

class database
{
    private $host;
    private $user;
    private $pass;
    private $db;
    public $conn;

    function __construct($host, $user, $pass, $db)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
        $this->conn = mysqli_connect($host, $user, $pass, $db);
    }

    function validateLogin($user, $pass)
    {
        $query = "select * from users where users.user='$user' and users.pass='$pass' limit 1";
        $result = $this->conn->query($query);
        if (mysqli_num_rows($result) == 1) {
            return true;
        } else {
            return false;
        }
    }
}

$dataAccess = new database("localhost", "root", "", "library");
