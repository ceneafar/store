<?php
require_once('databasedata.php');

class Purchase extends DatabaseData
{
    private $purchaseList = array();

    public function buyProduct()
    {
        $supplier = $_POST['supplier'];
        $idProduct = $_POST['product'];
        $productQuantity = $_POST['productQuantity'];
        $productPrice = $_POST['productPrice'];
        $total = intval($productQuantity) * floatval($productPrice);
        $total .= "";

        $mysqli = $this->getConnection();
        session_start();

        $query0 = "USE store_{$_SESSION['username']}";
        $query1 = "INSERT INTO {$_SESSION['username']}_purchases (
            supplier,
            idProduct,
            quantityProduct,
            productPrice,
            total
        ) VALUES (
            '$supplier',
            '$idProduct',
            '$productQuantity',
            '$productPrice',
            '$total'
        )";
        $query2 = "SELECT * FROM {$_SESSION['username']}_products WHERE id='$idProduct'";


        $mysqli->query($query0);
        $mysqli->query($query1);
        $quantity = floatval($mysqli->query($query2)->fetch_assoc()['quantity']);

        $quantity1 = $quantity + floatval($productQuantity);
                
        $query3 = "UPDATE {$_SESSION['username']}_products SET quantity='$quantity1' WHERE id='$idProduct'";
        $mysqli->query($query3);

        $mysqli->close();        
    }

    public function getPurchases()
    {
        $mysqli = $this->getConnection();

        $query0  = "USE store_{$_SESSION['username']}";
        $query1 = "SELECT * FROM {$_SESSION['username']}_purchases";

        $mysqli->query($query0);
        $result = $mysqli->query($query1);

        while ($row = $result->fetch_assoc()) {
            $arr = [$row['id'], $row['idProduct'], $row['supplier'], $row['quantityProduct'], $row['productPrice'], $row['total']];
            array_push($this->purchaseList, $arr);
        }

        $mysqli->close();

        return $this->purchaseList;
    }
}
