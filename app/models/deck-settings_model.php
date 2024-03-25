<?php
class DeckSettingsModel {
    public function getDeckSettingsData($userID, $deckID)
    {
        // Establish database connection
        Database::connect();

        // Initialize empty array for storing data
        $data = [];

        // Prepare and execute the query using a prepared statement
        $query = "SELECT * FROM deck_settings  WHERE user_id = ? AND deck_id = ?";
        $statement = Database::$connection->prepare($query);
        $statement->bind_param("ii", $userID, $deckID); // Bind the parameters
        $statement->execute();
        // Get the result set
        $result = $statement->get_result();
    
        // Fetch data row by row and store it in the array
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    
        // Close statement and database connection
        $statement->close();
        Database::disconnect();
        
        // Return the fetched data
        return $data;
    }

    public function getVoiceLanguages()
    {
        // Establish database connection
        Database::connect();

        // Initialize empty array for storing data
        $data = [];

        // Prepare and execute the query using a prepared statement
        $query = "SELECT * FROM card_languages ";
        $statement = Database::$connection->prepare($query);
        $statement->execute();
        // Get the result set
        $result = $statement->get_result();
    
        // Fetch data row by row and store it in the array
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    
        // Close statement and database connection
        $statement->close();
        Database::disconnect();
        
        // Return the fetched data
        return $data;
    }
    
}
?>
