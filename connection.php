<?php

require 'vendor/autoload.php';

use Dotenv\Dotenv;

class Database
{

    public static $connection;

    public static function setupConnection()
    {
        if (!isset(Database::$connection)) {
            $dotenv = Dotenv::createImmutable(__DIR__);
            $dotenv->load();

            Database::$connection = new mysqli(
                $_ENV['DB_HOST'],
                $_ENV['DB_USER'],
                $_ENV['DB_PASS'],
                $_ENV['DB_NAME'],
                $_ENV['DB_PORT']
            );

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
