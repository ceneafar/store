<?php
require_once('databasedata.php');

class Customer extends Databasedata
{
    private $customersList = array();

    public function getCustomers()
    {
        $mysqli = $this->getConnection();

        $query0  = "USE store_" . $_SESSION['username'];
        $query1 = "SELECT * FROM " . $_SESSION['username'] . "_customers";

        $mysqli->query($query0);
        $result = $mysqli->query($query1);

        while ($row = $result->fetch_assoc()) {
            $arr = [$row['name'], $row['lastname'], $row['address'], $row['phone'], $row['email']];
            array_push($this->customersList, $arr);
        }
        
        return $this->customersList;
    }

    public function createCustomer()
    {
        $name = $_POST["name"];
        $lastname = $_POST['lastName'];
        $address = $_POST['address'];
        $phone = $_POST['phoneNumber'];
        $email = $_POST['email'];

        $mysqli = $this->getConnection();
        session_start();

        $query0  = "USE store_" . $_SESSION['username'];
        $query1 = "INSERT INTO " . $_SESSION['username'] . "_customers (
            name,
            lastname,
            address,
            phone,
            email
        ) VALUES (
            '" . $name . "',
            '" . $lastname . "',
            '" . $address . "',
            '" . $phone . "',
            '" . $email . "'
        )";

        $mysqli->query($query0);
        $mysqli->query($query1);
    }
}
