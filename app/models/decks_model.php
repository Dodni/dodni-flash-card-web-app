<?php
class DecksModel {
    public static function getDecks() {
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

    public static function get10Cards($deckID) {
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

    public static function getGivenAmountCards($deckID, $cardsKnown, $cardsNumbers) {
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

}
?>
