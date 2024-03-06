<?php
class TestModel {
    
    public function connectToDatabase() {
        $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        // Ellenőrzés, hogy a kapcsolat létrejött-e vagy sem
        if ($connection->connect_error) {
            echo "Sikertelen adatbáziskapcsolat: " . $connection->connect_error;
        } else {
            echo "Sikeresen kapcsolódva az adatbázishoz!";
        }

        // Visszatérési érték a kapcsolat állapotával
        return $connection;
    }

    public function connectOtherWay() {
        Database::connect();
        $users = [];
        $result = Database::$connection->query("select * from users");
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    }
}
?>
