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

    function getAuthorFromId($ID)
    {
        $query = "select * from authors where authors.ID=$ID";
        $result = $this->conn->query($query);
        if (mysqli_num_rows($result) == 1) {
            $row = $result->fetch_assoc();
            $fname = $row["Name"];
            $lname = $row["Surname"];
            return ($fname . " " . $lname);
        } else {
            return false;
        }
    }

    function getPublisherFromId($ID)
    {
        $query = "select * from publishers where publishers.ID=$ID";
        $result = $this->conn->query($query);
        if (mysqli_num_rows($result) == 1) {
            $row = $result->fetch_assoc();
            $name = $row["Name"];
            return $name;
        } else {
            return false;
        }
    }

    function addUser($user, $pass)
    {
        $query = "insert into users(user, pass) values('$user', '$pass')";
        $result = $this->conn->query($query);
        if ($result) {
            return true;
        }
        return false;
    }

    function addAuthor($fname, $lname)
    {
        $query = "insert into authors(Name, Surname) values('$fname', '$lname')";
        $result = $this->conn->query($query);
        if ($result) {
            return true;
        }
        return false;
    }

    function addPublisher($name, $type)
    {
        $query = "insert into publishers(Name, Type) values('$name', '$type')";
        $result = $this->conn->query($query);
        if ($result) {
            return true;
        }
        return false;
    }

    function addBook($title, $authorId, $publisherId)
    {
        $query = "insert into books(Title, AuthorID, PublisherID) values('$title', '$authorId', '$publisherId')";
        $result = $this->conn->query($query);
        if ($result) {
            return true;
        }
        return false;
    }
}

$dataAccess = new database("localhost", "root", "", "library");
