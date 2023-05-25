<?php
require_once('databasedata.php');

class Products extends DatabaseData
{
    private $connection;
    private $array = array();

    public function getProducts()
    {

        $query0  = "use store_" . $_SESSION['username'];
        $query1 = "select * from " . $_SESSION['username'] . "_products";
        $this->connection->query($query0);
        $result = $this->connection->query($query1);

        while ($row = $result->fetch_assoc()) {
            array_push($this->array, $row['name']);
        }

        return $this->array;
    }

    public function createProducts()
    {
        $name = $_POST["name"];
        //$returnable = $_POST["returnable"];
        //$initial_stock = $_POST["initial_stock"];

        session_start();
        $query0  = "use store_" . $_SESSION['username'];
        $query1 = "INSERT INTO " . $_SESSION['username'] . "_products (name) VALUES ('" . $name . "')";
        $this->connection->query($query0);
        $this->connection->query($query1);
    }
}
