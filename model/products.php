<?php

require_once('secret.php');

class Products extends data
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

    public function getProducts()
    {
        $query = "select * from products";
        $result = $this->connection->query($query);

        while ($row = $result->fetch_assoc()) {
            array_push($this->array, $row['name']);
        }

        return $this->array;
    }

    public function createProducts()
    {
        $name = $_POST["name"];
        $returnable = $_POST["returnable"];
        $initial_stock = $_POST["initial_stock"];

        $query = "INSERT INTO products (name, returnable, initial_stock) VALUES ('" . $name . "', '" . $returnable . "', '" . $initial_stock . "')";
        $this->connection->query($query);        
    }
}
