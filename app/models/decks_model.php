<?php
class DecksModel {
    public static function getDecks() {
        Database::connect();
        $data = [];
        $result = Database::$connection->query("SELECT * FROM decks");
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}
?>
