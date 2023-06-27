<?php
require_once('crud.php');

class Currency extends Crud
{
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
        $tableName = "_payment_method";
        $properties = array(
            'id',
            'paymentMethodName',
            'symbol'
        );

        return $this->readObj($tableName, $properties);
    }
}
