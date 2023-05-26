<?php
require_once('databasedata.php');

class Product extends DatabaseData
{
    private $productsList = array();

    public function getProducts()
    {
        $mysqli = $this->getConnection();

        $query0  = "USE store_" . $_SESSION['username'];
        $query1 = "SELECT * FROM " . $_SESSION['username'] . "_products";

        $mysqli->query($query0);
        $result = $mysqli->query($query1);

        while ($row = $result->fetch_assoc()) {
            array_push($this->productsList, $row['name']);
        }

        return $this->productsList;
    }

    public function createProduct()
    {
        $name = $_POST["name"];

        $mysqli = $this->getConnection();
        session_start();

        $query0  = "USE store_" . $_SESSION['username'];
        $query1 = "INSERT INTO " . $_SESSION['username'] . "_products (name) VALUES ('" . $name . "')";

        $mysqli->query($query0);
        $mysqli->query($query1);
    }
}
