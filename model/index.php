<?php
require_once("databasedata.php");
class model extends DatabaseData
{

    public function create($user, $pass1)
    {
        $mysqli = $this->getConnection();
        $query0 = "insert into login (username, password) values ('" . $user . "','" .  $pass1 . "')";
        $query1 = "create database store_" . $user;
        $query2 = "use store_" . $user;
        $query3 = "create table " . $user . "_products (
            id int primary key not null auto_increment, 
            name varchar(255)            
        )";

        $mysqli->query($query0);
        $mysqli->query($query1);
        $mysqli->query($query2);
        $mysqli->query($query3);
        $mysqli->close();
    }

    public function checkUser($user)
    {
        $mysqli = $this->getConnection();
        $query = "select username from login where username='" . $user . "'";
        $res = $mysqli->query($query);
        $mysqli->close();

        return $res;
    }

    public function checkLogin($username, $password)
    {
        $exist = $this->checkUser($username)->num_rows ? true : false;

        if ($exist) {
            $mysqli = $this->getConnection();
            $query = "select password from login where username='" . $username . "'";
            $res = $mysqli->query($query);
            $mysqli->close();

            $dbpass = $res->fetch_assoc()["password"];

            if ($dbpass == $password) {
                return true;
            }
        }
        return false;
    }
}
