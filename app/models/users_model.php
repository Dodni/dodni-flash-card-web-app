<?php
class UsersModel {
    public function createUser() {
        try {
            // Connect to the database
            Database::connect();

            // Insert a new deck
            $query = "INSERT INTO decks (deck_id, deck_name, deck_create_date, deck_creator, deck_owner_id, deck_last_time_used) VALUES (?, ?, ?, ?, ?, NOW() );";
            $statement = Database::$connection->prepare($query);
            $statement->bind_param("isssi", $newDeckId, $csvFileName, $currentDate, $deckCreator, $userId);
            $statement->execute();
            $statement->close();
            
        }  catch (Exception $e) {
            // Handle any exceptions
            echo "Error: user creating: " . $e->getMessage();
        }

        // Disconnect from the database
        Database::disconnect();
    }    
}
?>
