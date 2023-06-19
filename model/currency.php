<?php
require_once('databasedata.php');

class Currency extends DatabaseData
{
    private $paymentMethodsList = array();

    public function createPaymentMethod()
    {
        $mysqli = $this->getConnection();
        session_start();

        $paymentMethod = $_POST['paymentMethod'];
        $paymentSymbol = $_POST['paymentSymbol'];

        $tableName = "{$_SESSION['username']}_payment_method";
        $databaseName = "store_{$_SESSION['username']}";

        $query0  = "USE $databaseName";
        $query1 = "INSERT INTO $tableName (
            paymentMethodName,
            symbol
        ) VALUES (
            '" . $paymentMethod . "',
            '" . $paymentSymbol . "'
        )";

        $mysqli->query($query0);
        $mysqli->query($query1);
    }

    public function getPaymentMethods()
    {
        
        session_start();
        $mysqli = $this->getConnection();
        

        $databaseName = "store_{$_SESSION['username']}";
        $tableName = "{$_SESSION['username']}_payment_method";

        $query0  = "USE $databaseName";
        $query1 = "SELECT * FROM $tableName";

        $mysqli->query($query0);
        $result = $mysqli->query($query1);

        while ($row = $result->fetch_assoc()) {
            $arr = [
                $row['id'],
                $row['paymentMethodName'],
                $row['symbol']
            ];
            array_push($this->paymentMethodsList, $arr);
        }

        return $this->paymentMethodsList;
    }
}
