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
            $arr = [$row['id'], $row['productName'], $row['productBrand'], $row['measurementUnit'], $row['measurementValue'], $row['propertyType'], $row['propertyValue']];
            array_push($this->productsList, $arr);
        }

        return $this->productsList;
    }

    public function createProduct()
    {
        $productName = $_POST["productName"];
        $productBrand = $_POST["productBrand"];
        $measurementUnit = $_POST["measurementUnit"];
        $measurementValue = $_POST["measurementValue"];
        $propertyType = $_POST["propertyType"];
        $propertyValue = $_POST["propertyValue"];


        $mysqli = $this->getConnection();
        session_start();

        $query0  = "USE store_" . $_SESSION['username'];
        $query1 = "INSERT INTO " . $_SESSION['username'] . "_products (
            productName,
            productBrand,
            measurementUnit,
            measurementValue,
            propertyType,
            propertyValue
        ) VALUES (
            '" . $productName . "',
            '" . $productBrand . "',
            '" . $measurementUnit . "',
            '" . $measurementValue . "',
            '" . $propertyType . "',
            '" . $propertyValue . "'
        )";

        $mysqli->query($query0);
        $mysqli->query($query1);
    }
}
