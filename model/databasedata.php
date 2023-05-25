<?php
class DatabaseData
{
    private $dbHostname = "";
    private $dbUsername = "";
    private $dbPassword = "";
    private $dbName = "";
    private $connection;

    function __construct()
    {
        $this->connection = new mysqli(
            $this->dbHostname,
            $this->dbUsername,
            $this->dbPassword,
            $this->dbName
        );
    }

    protected function getConnection()
    {
        return $this->connection;
    }
}