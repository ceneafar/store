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

        // table product
        $query3 = "CREATE TABLE " . $username . "_products (
            id int primary key not null auto_increment, 
            productName varchar(255),
            productBrand varchar(255),
            measurementUnit varchar(255),
            measurementValue varchar(255),
            propertyType varchar(255),
            propertyValue varchar(255),
            quantity varchar(255),
            date varchar(255),
            price varchar(255)
        )";

        // table customer
        $query4 = "CREATE TABLE " . $username . "_customers (
            id int primary key not null auto_increment,
            name varchar(255),
            lastname varchar(255),
            address varchar(255),
            phone varchar(255),
            email varchar(255)
        )";

        // table currency rate
        $query5 = "CREATE TABLE " . $username . "_currency_rate (
            id int primary key not null auto_increment,
            date date,
            rate dec(6,4) 
        )";

        // table supplier

        $query6 = "CREATE TABLE {$username}_suppliers (
            id int primary key not null auto_increment,
            supplierName varchar(255),
            supplierDni varchar(255)
        )";

        // table purchase

        $query7 = "CREATE TABLE {$username}_purchases (
            id int primary key not null auto_increment,
            idProduct varchar(255),
            supplier varchar(255),
            quantityProduct varchar(255),
            productPrice varchar(255),
            total varchar(255)
        )";

        $mysqli->query($query0);
        $mysqli->query($query1);
        $mysqli->query($query2);
        $mysqli->query($query3);
        $mysqli->query($query4);
        $mysqli->query($query5);
        $mysqli->query($query6);
        $mysqli->query($query7);

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
