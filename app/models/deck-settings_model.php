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

    public function updateDeckSettingsData($data) {
        try {
            // Establish database connection
            Database::connect();
    
            // Update deck_settings table
            $query = "UPDATE deck_settings SET deck_settings_max_flip = ?, deck_settings_public = ?, deck_first_column_language = ?, deck_second_column_language = ?, deck_first_column_language_id = ?, deck_second_column_language_id = ? WHERE deck_id = ?";
            $statement = Database::$connection->prepare($query);
            if (!$statement) {
                throw new Exception("Error preparing deck settings update statement: " . Database::$connection->error);
            }
    
            // Bind parameters
            $statement->bind_param("issiiii", $data['deck_settings_max_flip'], $data['deck_settings_public'], $data['deck_settings_language_front'], $data['deck_settings_language_back'], $data['deck_settings_language_front'], $data['deck_settings_language_back'], $data['deck_id']);
    
            // Execute the statement
            if (!$statement->execute()) {
                throw new Exception("Error updating deck settings: " . $statement->error);
            }
    
            $statement->close();
    
            // Close database connection
            Database::disconnect();
    
            // Operation was successful
            return true;
        } catch (Exception $e) {
            // Handle any exceptions
            echo "Error updating deck setting: " . $e->getMessage();
            return false;
        } finally {
            // Ensure database connection is closed
            Database::disconnect();
        }
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
