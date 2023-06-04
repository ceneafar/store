<?php

require_once('databasedata.php');

class Supplier extends DatabaseData
{
    private $supplierList = array();

    public function createSupplier()
    {
        $supplierName = $_POST['supplierName'];
        $supplierDni = $_POST['supplierDni'];

        $mysqli = $this->getConnection();
        session_start();

        $query0 = "USE store_{$_SESSION['username']}";
        $query1 = "INSERT INTO {$_SESSION['username']}_suppliers (
            supplierName,
            supplierDni
        ) VALUES (
            '$supplierName',
            '$supplierDni'
        )";

        $mysqli->query($query0);
        $mysqli->query($query1);

        $mysqli->close();
    }

    public function getSuppliers()
    {
        $mysqli = $this->getConnection();
        $query0  = "USE store_{$_SESSION['username']}";
        $query1 = "SELECT * FROM {$_SESSION['username']}_suppliers";

        $mysqli->query($query0);
        $result = $mysqli->query($query1);

        while ($row = $result->fetch_assoc()) {
            $arr = [$row['id'], $row['supplierName'], $row['supplierDni']];
            array_push($this->supplierList, $arr);
        }

        $mysqli->close();

        return $this->supplierList;
    }
}
