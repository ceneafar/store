<?php
require_once('crud.php');

class Product extends Crud
{
    public function getProducts()
    {
        $tablename = "_products";
        $properties = [
            'id',
            'productName',
            'productBrand',
            'measurementUnit',
            'measurementValue',
            'propertyType',
            'propertyValue',
            'quantity',
            'date',
            'price'
        ];

        return $this->readObj($tablename, $properties);
    }

    public function createProduct()
    {
        $currentDate = getdate();
        $date = "{$currentDate['mday']}/{$currentDate['month']}/{$currentDate['year']}";
        $tablename = "_products";
        $properties = [
            'productName' => $_POST["productName"],
            'productBrand' => $_POST["productBrand"],
            'measurementUnit' => $_POST["measurementUnit"],
            'measurementValue' => $_POST["measurementValue"],
            'propertyType' => $_POST["propertyType"],
            'propertyValue' => $_POST["propertyValue"],
            'quantity' => '0',
            'date' => $date,
            'price' => $_POST["price"]
        ];

        $this->createObj($tablename, $properties);
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
