<?php
class Database {
    public static $connection;

    public static function connect() {
        self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (self::$connection->connect_error) {
            die("Connection failed: " . self::$connection->connect_error);
        }
    }

    public static function disconnect() {
        // Check if the connection exists
        if (isset(self::$connection)) {
            // Close the database connection
            self::$connection->close();
            // Remove the connection from the static variable
            self::$connection = null;
        }
    }

}
?>