<?php
require_once("secret.php");
class model extends data
{
    public function create($user, $pass1, $pass2)
    {
        $data = new data();
        $hostname = $data->get_hostname();
        $username = $data->get_username();
        $password = $data->get_password();
        $dbname = $data->get_dbname();

        $mysqli = new mysqli($hostname, $username, $password, $dbname);
        $query = "insert into login (username, password) values ($user, $pass1)";
        $mysqli->query($query);
        $mysqli->close();
    }
}
