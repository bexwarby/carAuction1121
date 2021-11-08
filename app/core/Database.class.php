<?php

/**
 * core/Database.class.php - Database class
 */

/* Namespace */
namespace App\Database;

/* Alias */
use PDO;

/**
 * Database class
 */
abstract class Database
{

    const ADDRESS = "mysql:dbname=car-auction-1121;host:localhost";
    const USER = "root";
    const PASSWORD = "";

    /**
     * Create DB connection
     */
    public static function createDBConnection()
    {
        return new PDO(self::ADDRESS, self::USER, self::PASSWORD);
    }
}
