<?php
require_once("databasedata.php");

class User extends DatabaseData
{
    public function createUser($username, $password)
    {
        $mysqli = $this->getConnection();

        $query0 = "INSERT INTO login (username, password) VALUES ('" . $username . "','" .  $password . "')";
        $query1 = "CREATE DATABASE store_" . $username;
        $query2 = "USE store_" . $username;

        // tables
        $query3 = "CREATE TABLE " . $username . "_products (
            id int primary key not null auto_increment, 
            productName varchar(255),
            productBrand varchar(255),
            measurementUnit varchar(255),
            measurementValue varchar(255),
            propertyType varchar(255),
            propertyValue varchar(255)
        )";

        $query4 = "CREATE TABLE " . $username . "_customers (
            id int primary key not null auto_increment,
            name varchar(255),
            lastname varchar(255),
            address varchar(255),
            phone varchar(255),
            email varchar(255)
        )";

        $mysqli->query($query0);
        $mysqli->query($query1);
        $mysqli->query($query2);
        $mysqli->query($query3);
        $mysqli->query($query4);

        $mysqli->close();
    }

    public function checkLogin($username, $password)
    {
        $exist = $this->checkUserExistence($username);

        if ($exist) {
            $mysqli = $this->getConnection();
            $query = "SELECT password FROM login WHERE username='" . $username . "'";
            $result = $mysqli->query($query);
            $mysqli->close();

            $dbPassword = $result->fetch_assoc()["password"];

            if ($dbPassword == $password) {
                return true;
            }
        }
        return false;
    }

    public function checkUserExistence($username)
    {
        $mysqli = $this->getConnection();
        $query1 = "SELECT username FROM login WHERE username='" . $username . "'";
        $result = $mysqli->query($query1)->num_rows == 1 ? true : false;
        $mysqli->close();

        return $result;
    }
}
