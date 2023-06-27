<?php
require_once('crud.php');

class Currency extends Crud
{
    public function createPaymentMethod()
    {
        $tableName = "_payment_method";
        $properties = [
            'paymentMethodName' => $_POST['paymentMethod'],
            'symbol'            => $_POST['paymentSymbol']
        ];

        $this->createObj($tableName, $properties);
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
