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
        $query3 = "CREATE TABLE " . $username . "_products (
            id int primary key not null auto_increment, 
            name varchar(255)            
        )";

        $mysqli->query($query0);
        $mysqli->query($query1);
        $mysqli->query($query2);
        $mysqli->query($query3);

        $mysqli->close();
    }

    public function checkLogin($username, $password)
    {
        $exist = $this->checkUserExistence($username)->num_rows ? true : false;

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

    private function checkUserExistence($username)
    {
        $mysqli = $this->getConnection();
        $query = "SELECT username FROM login WHERE username='" . $username . "'";
        $result = $mysqli->query($query);
        $mysqli->close();

        return $result;
    }
}
