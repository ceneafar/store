<?php
require_once('crud.php');

class Customer extends Crud
{
    public function getCustomers()
    {
        $tablename = '_customers';
        $properties = [
            'id',
            'name',
            'lastname',
            'address',
            'phone',
            'email'
        ];

        return $this->readObj($tablename, $properties);
    }

    public function createCustomer()
    {

        $tablename = '_customers';
        $properties = [
            'name'      => $_POST['name'],
            'lastname'  => $_POST['lastName'],
            'address'   => $_POST['address'],
            'phone'     => $_POST['phoneNumber'],
            'email'     => $_POST['email']
        ];

        $this->createObj($tablename, $properties);
    }
}
