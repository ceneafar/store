<?php
require_once('databasedata.php');
class Crud extends DatabaseData
{
    protected function createObj($tableName, $properties)
    {
        session_start();
        $username = $_SESSION['username'];
        $database = "store_$username";
        $table = $username . "" . $tableName; // username_tableName

        $stringKey = "";
        $stringValue = "";

        foreach ($properties as $key => $value) {
            $stringKey .= "$key,";
            $stringValue .= "'$value',";
        }

        // delete the last comma
        $stringKey = substr($stringKey, 0, -1);
        $stringValue = substr($stringValue, 0, -1);

        $query0 = "USE $database";
        $query1 = "INSERT INTO $table ($stringKey) VALUES ($stringValue)";

        $mysqli = $this->getConnection();

        $mysqli->query($query0);
        $mysqli->query($query1);
    }
    protected function readObj($tableName, $properties)
    {
        session_start();
        $username = $_SESSION['username'];
        $database = "store_$username";
        $table = $username . "" . $tableName; // username_tableName

        $query0 = "USE $database";
        $query1 = "SELECT * FROM $table";

        $mysqli = $this->getConnection();

        $mysqli->query($query0);
        $result = $mysqli->query($query1);

        $final = [];

        while ($row = $result->fetch_assoc()) {
            $arr = [];

            foreach ($properties as $property) {
                array_push($arr, $row[$property]);
            }

            array_push($final, $arr);
        }

        return $final;
    }
}
