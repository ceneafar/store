<?php
require_once("secret.php");
class model extends data
{

    public function connection()
    {
        $data = new data();
        $hostname = $data->get_hostname();
        $username = $data->get_username();
        $password = $data->get_password();
        $dbname = $data->get_dbname();

        return new mysqli($hostname, $username, $password, $dbname);
    }

    public function create($user, $pass1, $pass2)
    {
        $mysqli = $this->connection();
        $query = "insert into login (username, password) values ('" . $user . "','" .  $pass1 . "')";
        $mysqli->query($query);
        $mysqli->close();
    }

    public function checkUser($user)
    {
    }
}
