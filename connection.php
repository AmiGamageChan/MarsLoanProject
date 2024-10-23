<?php

class Database
{
    public static $connection;

    public static function setupConnection()
    {
        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli("localhost", "root", "password", "MarsLoanDB", "3306");

            if (Database::$connection->connect_error) {
                die("Connection failed: " . Database::$connection->connect_error);
            }
        }
    }

    public static function iud($q)
    {
        Database::setupConnection();
        if (Database::$connection->query($q) === FALSE) {
            echo "Error: " . Database::$connection->error;
        }
    }

    public static function search($q)
    {
        Database::setupConnection();
        $resultset = Database::$connection->query($q);

        if (!$resultset) {
            echo "Error: " . Database::$connection->error;
            return [];
        }

        $data = [];
        while ($row = $resultset->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public static function searchRS($q)
    {

        Database::setupConnection();
        $resultset = Database::$connection->query($q);
        return $resultset;
    }
}
