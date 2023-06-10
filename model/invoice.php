<?php
require_once('databasedata.php');

class Invoice extends DatabaseData
{
    private $customerList = array();

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
}
