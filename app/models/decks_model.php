<?php
class DecksModel {
    public function getDecks() {
        // Establish database connection
        Database::connect();
        
        // Initialize empty array for storing data
        $data = [];
    
        // Prepare and execute the query using a prepared statement
        $query = "SELECT * FROM decks";
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

    public function get10Cards($deckID) {
        // Establish database connection
        Database::connect();
        
        // Initialize empty array for storing data
        $data = [];
    
        // Prepare and execute the query using a prepared statement
        $query = "SELECT * FROM cards WHERE deck_id = ? ORDER BY RAND() LIMIT 10";
        $statement = Database::$connection->prepare($query);
        $statement->bind_param("i", $deckID); // Bind the deckID parameter
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

    public function getGivenAmountCards($deckID, $cardsKnown, $cardsNumbers) {
        // Establish database connection
        Database::connect();
        
        // Initialize empty array for storing data
        $data = [];
    
        // Össze kell fűzni az összes elemet az SQL feltételben
        $conditions = implode(" or ", array_map(function($item) {
            return "card_known = " . intval($item);
        }, $cardsKnown));
    
        // Prepare and execute the query using a prepared statement
        $query = "SELECT * FROM cards WHERE deck_id = ? AND ($conditions) ORDER BY RAND() LIMIT ?";
        $statement = Database::$connection->prepare($query);
        $statement->bind_param("si", $deckID, $cardsNumbers); // Bind the parameters
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

    public function updateCardKnownState($cardID, $cardKnown)
    {
        // Establish database connection
        Database::connect();

        // Prepare and execute the query using a prepared statement
        $query = "UPDATE cards SET card_known = ? WHERE card_id = ?";
        $statement = Database::$connection->prepare($query);
        $statement->bind_param("ii", $cardKnown, $cardID); // Bind the parameters
        $statement->execute();
        
        // Get the result set
        $result = $statement->get_result();
    
        // Close statement and database connection
        $statement->close();
        Database::disconnect();
    }

    public function getKnownCardsNumber($deckID)
    {
        // Establish database connection
        Database::connect();
        
        // Prepare and execute the query using a prepared statement
        $query = "SELECT card_known, COUNT(*) AS count FROM cards WHERE deck_id = ? GROUP BY card_known ORDER BY card_known ASC";
        $statement = Database::$connection->prepare($query);
        $statement->bind_param("i", $deckID); // Bind the parameters
        $statement->execute();
        
        $counts = [];

        // Fill the array with the default value
        for ($i = 0; $i <= 4; $i++) {
            $counts[$i] = 0;
        }
    
        // Get the result set
        $result = $statement->get_result();
        
        // Fetch results into associative array
        while ($row = $result->fetch_assoc()) {
            $counts[$row['card_known']] = $row['count'];
        }
    
        // Close statement and database connection
        $statement->close();
        Database::disconnect();
    
        return $counts;
    }

    public function getDeckNameByID($deckID)
    {
        // Establish database connection
        Database::connect();
        
        // Prepare and execute the query using a prepared statement
        $query = "SELECT deck_id, deck_name FROM decks WHERE deck_id = ?";
        $statement = Database::$connection->prepare($query);
        $statement->bind_param("i", $deckID); // Bind the parameters
        $statement->execute();
        
    
        // Get the result set
        $result = $statement->get_result();
        $row = $result->fetch_assoc();
    
        // Close statement and database connection
        $statement->close();
        Database::disconnect();
    
        // Check if a row was found
        if ($row) {
            return $row['deck_name']; // Return the deck name if found
        } else {
            return null; // Return null if no deck found with the given ID
        }
    }
}
?>
