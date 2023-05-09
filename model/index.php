<?php
require_once("secret.php");
class model extends data
{

    private function connection()
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
        $res = $mysqli->query($query);
        $mysqli->close();
        return $res;
    }

    public function checkUser($user)
    {
        $mysqli = $this->connection();
        $query = "select username from login where username='" . $user . "'";
        $res = $mysqli->query($query);
        $mysqli->close();
        return $res;
    }

    public function checkLogin($username, $password)
    {
        $exist = $this->checkUser($username)->num_rows ? true : false;

        if ($exist) {
            $mysqli = $this->connection();
            $query = "select password from login where username='" . $username . "'";
            $res = $mysqli->query($query);
            $mysqli->close();
            $dbpass = $res->fetch_assoc()["password"];

            if ($dbpass == $password) {
                return true;
            }

            return false;
        }
        return false;
    }
}
