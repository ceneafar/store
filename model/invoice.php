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
        $productDatabaseName = "store_{$_SESSION['username']}";
        $productTableName =  "{$_SESSION['username']}_products";
        $arr = "";

        $query0 = "USE $productDatabaseName";
        $query1 = "SELECT * FROM $productTableName WHERE id='$productId'";

        $mysqli = $this->getConnection();

        $mysqli->query($query0);
        $result = $mysqli->query($query1);
        $mysqli->close();

        while ($row = $result->fetch_assoc()) {
            $arr = $row['productName'] . " " . $row['productBrand'] . " " . $row['measurementUnit'] . " " . $row['measurementValue'] . " " . $row['propertyType'] . " " . $row['propertyValue'];
        }

        return $arr;
    }

    public function getProductPrice($productId)
    {
        $productDatabaseName = "store_{$_SESSION['username']}";
        $productTableName =  "{$_SESSION['username']}_products";
        $price = "";

        $query0 = "USE $productDatabaseName";
        $query1 = "SELECT * FROM $productTableName WHERE id='$productId'";

        $mysqli = $this->getConnection();

        $mysqli->query($query0);
        $result = $mysqli->query($query1);
        $mysqli->close();

        while ($row = $result->fetch_assoc()) {
            $price = $row['price'];
        }

        return $price;
    }

    public function addPaymentMethod()
    {
        $paymentMethodId = $_POST['paymentMethodId'];
        $paymantAmount = $_POST['paymantAmount'];

        $paymentMethodIdArr = array();
        $paymantAmountArr = array();

        if (isset($_COOKIE['paymentMethodId']) && isset($_COOKIE['paymantAmount'])) {
            $paymentMethodIdArr = explode(",", $_COOKIE['paymentMethodId']);
            $paymantAmountArr = explode(",", $_COOKIE['paymantAmount']);
        }

        array_push($paymentMethodIdArr, $paymentMethodId);
        array_push($paymantAmountArr, $paymantAmount);

        setcookie("paymentMethodId", implode(",", $paymentMethodIdArr));
        setcookie("paymantAmount", implode(",", $paymantAmountArr));

        header("Location: /store/index.php?nav=invoice");
    }

    public function showPaymentMethodsTotal()
    {
        $total = 0;
        if (isset($_COOKIE['paymentMethodId'])) {
            $paymentMethodArr = explode(",", $_COOKIE['paymantAmount']);

            foreach ($paymentMethodArr as $value) {
                $total += floatval($value);
            }
        }
        return $total;
    }
}
