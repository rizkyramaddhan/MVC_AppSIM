<?php

class Database
{
    private static $host = 'localhost';
    private static $dbname = 'mvc_AppSIM'; // ganti sesuai nama db kamu
    private static $username = 'root';
    private static $password = '';

    public static function connect()
    {
        try {
            $conn = new PDO('mysql:host='.self::$host.';dbname='.self::$dbname, self::$username, self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die('Database Connection Failed: ' . $e->getMessage());
        }
    }
}
