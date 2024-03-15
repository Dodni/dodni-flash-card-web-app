<?php
class DecksModel {
    public function getDecks() {
        try {
            // Establish database connection
            Database::connect();
            
            // Initialize empty array for storing data
            $data = [];
        
            // Prepare and execute the query using a prepared statement
            $query = "SELECT * FROM decks ORDER BY deck_last_time_used DESC";
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
        } catch (Exception $e) {
            // Handle any exceptions
            echo "Error updating card state: " . $e->getMessage();
        }
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

    public function updateCardKnownState($cardID, $cardKnown, $deckID)
    {
        try {
            // Establish database connection
            Database::connect();
            $currentDate = date("Y-m-d");
            
            // Update card_known field
            $queryCard = "UPDATE cards SET card_known = ? WHERE card_id = ?";
            $statementCard = Database::$connection->prepare($queryCard);
            if (!$statementCard) {
                throw new Exception("Error preparing card update statement: " . Database::$connection->error);
            }
            $statementCard->bind_param("ii", $cardKnown, $cardID); // Bind the parameters
            if (!$statementCard->execute()) {
                throw new Exception("Error updating card: " . $statementCard->error);
            }
            $statementCard->close();
    
            // Update deck_last_time_used field
            $queryDeck = "UPDATE decks SET deck_last_time_used = NOW() WHERE deck_id = ?";
            $statementDeck = Database::$connection->prepare($queryDeck);
            if (!$statementDeck) {
                throw new Exception("Error preparing deck update statement: " . Database::$connection->error);
            }
            $statementDeck->bind_param("i", $deckID); // Assuming $deckID is defined somewhere
            if (!$statementDeck->execute()) {
                throw new Exception("Error updating deck: " . $statementDeck->error);
            }
            $statementDeck->close();
    
            // Close database connection
            Database::disconnect();
        } catch (Exception $e) {
            // Handle any exceptions
            echo "Error updating card state: " . $e->getMessage();
        }
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

public function createDeck($csvFile, $csvFileName, $deckCreator, $userId) {
    $start = microtime(true);
    $newDeckId = 0;
    try {
        // Connect to the database
        Database::connect();

        // Begin transaction
        Database::$connection->begin_transaction();
        
        // Query to get the maximum deck_id
        $maxIdQuery = "SELECT MAX(deck_id) AS max_id FROM decks";
        $result = Database::$connection->query($maxIdQuery);
        if (!$result) {
            throw new Exception("Failed to get the maximum deck_id.");
        }
        $row = $result->fetch_assoc();
        $maxId = $row['max_id'];    

        // Increment the maximum deck_id or set to 1 if there are no existing records
        $newDeckId = ($maxId === null) ? 1 : $maxId + 1;

        // Insert a new deck
        $query = "INSERT INTO decks (deck_id, deck_name, deck_create_date, deck_creator, deck_owner_id, deck_last_time_used) VALUES (?, ?, ?, ?, ?, NOW() )";
        $statement = Database::$connection->prepare($query);
        if (!$statement) {
            throw new Exception("Failed to prepare the insert statement: " . Database::$connection->error);
        }
        $currentDate = date("Y-m-d");
        $bind_result = $statement->bind_param("isssi", $newDeckId, $csvFileName, $currentDate, $deckCreator, $userId);
        if (!$bind_result) {
            throw new Exception("Failed to bind parameters: " . $statement->error);
        }
        $execute_result = $statement->execute();
        if (!$execute_result) {
            throw new Exception("Failed to execute the query: " . $statement->error);
        }
        $statement->close();
        
        //Insert cards from CSV
        $insertCardsResult = $this->insertCardsFromCsv($csvFile, $newDeckId);
        if (!$insertCardsResult) {
            throw new Exception("Failed to insert cards from CSV.");
        }

        // Insert card settings
        $insertSettingsResult = $this->insertCardSettings($newDeckId, $userId);
        if (!$insertSettingsResult) {
            throw new Exception("Failed to insert card settings.");
        }

        // Commit the transaction
        Database::$connection->commit();

        // End time
        $end = microtime(true);

        // Execution time
        $executionTime = $end - $start;

        // Print the result
        echo "Execution time: " . $executionTime . " seconds";
        echo "Transaction successfully completed.";

        // Return the new deck ID
        return $newDeckId;
    } catch (Exception $e) {
        // Rollback transaction on error
        Database::$connection->rollback();
        echo "Error occurred during transaction: " . $e->getMessage();
        return false;
    } finally {
        // Disconnect from the database
        Database::disconnect();
    }
}

    private function insertCardsFromCsv($csvFile, $deckId) {
        try {
            if ($csvFile == NULL) {
                throw new Exception("The CSV file cannot be NULL!");
            }
            $fileHandle = fopen($csvFile, "r");
            if ($fileHandle !== false) {
                while (($data = fgetcsv($fileHandle)) !== false) {
                    // Check if the row is valid
                    if (count($data) == 2) {
                        $column1 = $data[0]; // First column
                        $column2 = $data[1]; // Second column
        
                        // Insert the card
                        $query = "INSERT INTO cards (card_id, card_first, card_second, card_known, deck_id) VALUES (NULL, ?, ?, 0, ?)";
                        $statement = Database::$connection->prepare($query);
                        if (!$statement) {
                            throw new Exception("Failed to prepare the insert statement.");
                        }
                        $bind_result = $statement->bind_param("ssi", $column1, $column2, $deckId);
                        if (!$bind_result) {
                            throw new Exception("Failed to bind parameters: " . $statement->error);
                        }
                        $execute_result = $statement->execute();
                        if (!$execute_result) {
                            throw new Exception("Failed to execute the query: " . $statement->error);
                        }
                        $statement->close();
                    } else {
                        fclose($fileHandle);
                        echo "Error: Invalid format row: " . implode(",", $data);
                        return false;
                    }
                }
                fclose($fileHandle);
                return true; // Success
            } else {
                throw new Exception("Failed to open the CSV file.");
            }
        } catch (Exception $e) {
            // Rollback transaction on error
            Database::$connection->rollback();
            echo "Error occurred during transaction: " . $e->getMessage();
            return false;
        }
    }

    private function insertCardSettings($deckId, $userId) {
        try {
            // Temporary data
            $deckMaxFlip = 100;
            $deckPublic = "N";
    
            // Insert the card settings
            $query = "INSERT INTO `deck_settings` (`deck_settings_id`, `deck_settings_max_flip`, `user_id`, `deck_id`, `desk_settings_public`) VALUES (NULL, ?, ?, ?, ?);";
            $statement = Database::$connection->prepare($query);
            if (!$statement) {
                throw new Exception("Failed to prepare the insert statement.");
            }
            $bind_result = $statement->bind_param("iiis", $deckMaxFlip, $userId, $deckId, $deckPublic);
            if (!$bind_result) {
                throw new Exception("Failed to bind parameters: " . $statement->error);
            }
            $execute_result = $statement->execute();
            if (!$execute_result) {
                throw new Exception("Failed to execute the query: " . $statement->error);
            }
            $statement->close();
    
            // Return true on success
            return true;
        } catch (Exception $e) {
            // Handle exceptions
            // Rollback transaction on error
            Database::$connection->rollback();
            echo "Error occurred during transaction: " . $e->getMessage();
    
            // Return false on failure
            return false;
        }
    }
}
?>
