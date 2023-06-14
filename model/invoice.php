<?php
require_once('databasedata.php');

class Invoice extends DatabaseData
{
    private $customerList = array();
    private $productList = array();

    public function getCustomerList()
    {
        $userDatabaseName = "store_{$_SESSION['username']}";
        $userTableName =  "{$_SESSION['username']}_customers";

        $query0 = "USE $userDatabaseName";
        $query1 = "SELECT * FROM $userTableName";

        $mysqli = $this->getConnection();

        $mysqli->query($query0);
        $result = $mysqli->query($query1);

        $mysqli->close();

        while ($row = $result->fetch_assoc()) {
            $arr = [
                $row['id'],
                $row['name'],
                $row['lastname'],
                $row['address'],
                $row['phone'],
                $row['email']
            ];
            array_push($this->customerList, $arr);
        }

        return $this->customerList;
    }

    public function getProductList()
    {
        $userDatabaseName = "store_{$_SESSION['username']}";
        $userTableName =  "{$_SESSION['username']}_products";

        $query0 = "USE $userDatabaseName";
        $query1 = "SELECT * FROM $userTableName";

        $mysqli = $this->getConnection();

        $mysqli->query($query0);
        $result = $mysqli->query($query1);

        $mysqli->close();

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
                $row['date']
            ];
            array_push($this->productList, $arr);
        }

        return $this->productList;
    }

    public function getProduct($productId)
    {
        $userDatabaseName = "store_{$_SESSION['username']}";
        $userTableName =  "{$_SESSION['username']}_products";
        $arr = "";

        $query0 = "USE $userDatabaseName";
        $query1 = "SELECT * FROM $userTableName WHERE id='$productId'";

        $mysqli = $this->getConnection();

        $mysqli->query($query0);
        $result = $mysqli->query($query1);
        $mysqli->close();

        while ($row = $result->fetch_assoc()) {
            $arr = $row['productName'] . " " . $row['productBrand'] . " " . $row['measurementUnit'] . " " . $row['measurementValue'] . " " . $row['propertyType'] . " " . $row['propertyValue'];
        }

        return $arr;
    }
}
