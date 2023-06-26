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
        $paymantName = $this->getPatmentMethodsName($paymentMethodId);

        $paymentMethodIdArr = array();
        $paymantAmountArr = array();
        $paymantNameArr = array();

        if (isset($_COOKIE['paymentMethodId']) && isset($_COOKIE['paymantAmount']) && isset($_COOKIE['paymantName'])) {
            $paymentMethodIdArr = explode(",", $_COOKIE['paymentMethodId']);
            $paymantAmountArr = explode(",", $_COOKIE['paymantAmount']);
            $paymantNameArr = explode(",", $_COOKIE['paymantName']);
        }

        array_push($paymentMethodIdArr, $paymentMethodId);
        array_push($paymantAmountArr, $paymantAmount);
        array_push($paymantNameArr, $paymantName);

        setcookie("paymentMethodId", implode(",", $paymentMethodIdArr));
        setcookie("paymantAmount", implode(",", $paymantAmountArr));
        setcookie("paymantName", implode(",", $paymantNameArr));

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

    private function getPatmentMethodsName($id)
    {
        session_start();
        $res = '';
        $userDatabaseName = "store_{$_SESSION['username']}";
        $userTableName =  "{$_SESSION['username']}_payment_method";

        $query0 = "USE $userDatabaseName";
        $query1 = "SELECT paymentMethodName FROM $userTableName WHERE id='$id'";

        $mysqli = $this->getConnection();

        $mysqli->query($query0);
        $result = $mysqli->query($query1);
        $mysqli->close();

        while ($row = $result->fetch_assoc()) {
            $res = $row['paymentMethodName'];
        }

        return $res;
    }

    public function getBillCounter()
    {
        session_start();
        $arr = array();
        $database = "store_{$_SESSION['username']}";
        $table = "{$_SESSION['username']}_billing";

        $query0 = "USE $database";
        $query1 = "SELECT idBilling FROM $table";

        $mysqli = $this->getConnection();

        $mysqli->query($query0);
        $result = $mysqli->query($query1);

        while ($row = $result->fetch_assoc()) {
            array_push($arr, $row['idBilling']);
        }

        return count($arr) == 0 ? 0 :  max($arr) + 1;
    }

    public function registerInvoice()
    {
        $productInvoiceArr = array();
        $productInvoiceQuantityArr = array();
        $productNameArr = array();
        $productPriceArr = array();
        $totalPriceArr = array();

        if (isset($_COOKIE['productsId']) && isset($_COOKIE['productsQuantity'])) {
            $productInvoiceArr = explode(",", $_COOKIE['productsId']);
            $productInvoiceQuantityArr = explode(",", $_COOKIE['productsQuantity']);
            $productNameArr = explode(",", $_COOKIE['productName']);
            $productPriceArr = explode(",", $_COOKIE['priceProduct']);
            $totalPriceArr = explode(",", $_COOKIE['totalPrice']);
        }

        return array(
            $productInvoiceArr,
            $productInvoiceQuantityArr,
            $productNameArr,
            $productPriceArr,
            $totalPriceArr
        );
    }

    public function billing()
    {
        $billNumber = $this->getBillCounter();
        $arr = $this->registerInvoice();

        $productInvoice = "";
        $productInvoiceQuantity = "";
        $productName = "";
        $productPrice = "";
        $totalPrice = "";

        $database = "store_{$_SESSION['username']}";
        $table = "{$_SESSION['username']}_billing";

        $query0 = "USE $database";

        $mysqli = $this->getConnection();
        $mysqli->query($query0);

        for ($i = 0; $i < count($arr[0]); $i++) {
            $productInvoice = $arr[0][$i];
            $productInvoiceQuantity = $arr[1][$i];
            $productName = $arr[2][$i];
            $productPrice = $arr[3][$i];
            $totalPrice = $arr[4][$i];

            $this->inventoryDiscounting($productInvoice, $productInvoiceQuantity);

            $query1 = "INSERT INTO $table (            
                idBilling,
                idProduct,
                price,
                quantity,
                total,
                productName            
            ) VALUES (
                '" . $billNumber . "',
                '" . $productInvoice . "',   
                '" . $productPrice . "',
                '" . $productInvoiceQuantity . "',
                '" . $totalPrice . "', 
                '" . $productName . "'
            )";

            $mysqli->query($query1);
        }

        $mysqli->close();

        $this->addPayment($billNumber);

        setcookie("productsId", "", -1);
        setcookie("productsQuantity", "", -1);
        setcookie("productName", "", -1);
        setcookie("priceProduct", "", -1);
        setcookie("totalPrice", "", -1);

        header("Location: /store/index.php?nav=invoice");
    }

    public function inventoryDiscounting($idProduct, $quantity)
    {
        $database = "store_{$_SESSION['username']}";
        $table = "{$_SESSION['username']}_products";

        $query0 = "USE $database";
        $query1 = "SELECT quantity FROM $table WHERE id='$idProduct'";

        $mysqli = $this->getConnection();
        $mysqli->query($query0);
        $res = $mysqli->query($query1);

        while ($row = $res->fetch_assoc()) {
            $newQuantity = $row['quantity'] - $quantity;
            $query2 = "UPDATE $table SET quantity='$newQuantity' WHERE id='$idProduct'";
            $mysqli->query($query2);
        }

        $mysqli->close();
    }

    public function addPayment($billNumber)
    {
        $paymentMethodIdArr = explode(',', $_COOKIE['paymentMethodId']);
        $paymantAmountArr = explode(',', $_COOKIE['paymantAmount']);
        $paymantNameArr = explode(',', $_COOKIE['paymantName']);

        $database = "store_{$_SESSION['username']}";
        $table = "{$_SESSION['username']}_payment";

        $query0 = "USE $database";

        $mysqli = $this->getConnection();
        $mysqli->query($query0);

        for ($i = 0; $i < count($paymentMethodIdArr); $i++) {
            $paymentMethodId = $paymentMethodIdArr[$i];
            $paymantAmount = $paymantAmountArr[$i];
            $paymantName = $paymantNameArr[$i];

            $query1 = "INSERT INTO $table (                     
                invoiceId,      
                paymentId,
                amount,
                paymentName          
            ) VALUES (                
                '" . $billNumber . "',
                '" . $paymentMethodId . "',
                '" . $paymantAmount . "',
                '" . $paymantName . "'
            )";

            $mysqli->query($query1);
        }

        $mysqli->close();

        setcookie("paymentMethodId", "", -1);
        setcookie("paymantAmount", "", -1);
        setcookie("paymantName", "", -1);
    }
}
