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
            $arr = [
                $row['id'],
                $row['productName'],
                $row['productBrand'],
                $row['measurementUnit'],
                $row['measurementValue'],
                $row['propertyType'],
                $row['propertyValue'],
                $row['quantity'],
                $row['date'],
                $row['price']
            ];
            array_push($this->productsList, $arr);
        }

        $mysqli->close();

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
        $price = $_POST["price"];

        $quantity = '0';
        $currentDate = getdate();
        $date = "{$currentDate['mday']}/{$currentDate['month']}/{$currentDate['year']}";

        $mysqli = $this->getConnection();
        session_start();

        $query0  = "USE store_" . $_SESSION['username'];
        $query1 = "INSERT INTO " . $_SESSION['username'] . "_products (
            productName,
            productBrand,
            measurementUnit,
            measurementValue,
            propertyType,
            propertyValue,
            quantity,
            date,
            price
        ) VALUES (
            '" . $productName . "',
            '" . $productBrand . "',
            '" . $measurementUnit . "',
            '" . $measurementValue . "',
            '" . $propertyType . "',
            '" . $propertyValue . "',
            '" . $quantity . "',
            '" . $date . "',
            '" . $price . "'
        )";

        $mysqli->query($query0);
        $mysqli->query($query1);

        $mysqli->close();
    }

    public function editProduct()
    {
        $id = $_POST["idProduct"];
        $array = array(
            'productName' => $_POST["productName"],
            'productBrand' => $_POST["productBrand"],
            'measurementUnit' => $_POST["measurementUnit"],
            'measurementValue' => $_POST["measurementValue"],
            'propertyType' => $_POST["propertyType"],
            'propertyValue' => $_POST["propertyValue"],
            'price' => $_POST["price"]
        );

        session_start();
        $databaseName = "store_{$_SESSION['username']}";
        $tableName = "{$_SESSION['username']}_products";

        $mysqli = $this->getConnection();        

        $query0  = "USE $databaseName";
        $mysqli->query($query0);

        foreach ($array as $key => $value) {
            $query1 =  "UPDATE $tableName SET $key='$value' WHERE id=$id";
            $mysqli->query($query1);
        }

        $mysqli->close();
    }

    public function deleteProduct()
    {
        $id = $_POST["idProduct"];

        $mysqli = $this->getConnection();
        session_start();

        $query0  = "USE store_{$_SESSION['username']}";

        $query1 = "DELETE FROM {$_SESSION['username']}_products WHERE id=$id";

        $mysqli->query($query0);
        $mysqli->query($query1);

        $mysqli->close();
    }
}
