<?php
require_once('secret.php');

class Clients extends data
{
    private $connection;
    private $array = array();

    public function __construct()
    {
        $data = new data();

        $host = $data->get_hostname();
        $user = $data->get_username();
        $pass = $data->get_password();
        $dbname = $data->get_dbname();
        $this->connection = new mysqli($host, $user, $pass, $dbname);
    }

    public function getClients()
    {
        $query0  = "use store_" . $_SESSION['username'];
        $query1 = "select * from " . $_SESSION['username'] . "_clients";
        $this->connection->query($query0);
        $result = $this->connection->query($query1);

        while ($row = $result->fetch_assoc()) {
            array_push($this->array, $row['name']);
        }

        return $this->array;
    }

    public function createClients()
    {
        $name = $_POST["name"];


        session_start();
        $query0  = "use store_" . $_SESSION['username'];
        $query1 = "INSERT INTO " . $_SESSION['username'] . "_clients (name) VALUES ('" . $name . "')";
        $this->connection->query($query0);
        $this->connection->query($query1);
    }
}
