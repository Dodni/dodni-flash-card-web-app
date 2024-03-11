<?php
include_once "app/models/decks_model.php";
class DeckImportController {
    public function showDeckImportView() {
        $viewPath = 'app/views/en/deck-import_view.php';
        
        if (file_exists($viewPath)) {
            include_once $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
    }

    function uploadCsvToDatabase($csvFile) {
        // I'll do these later 
        $deck_creator = "Dodni";
        $deck_owner_id = 1;
        
        $csvFileName = substr($csvFile["name"], 0, -4); // Extracting file name
        $csvFilePath = $csvFile['tmp_name']; // Temporary file path
    
        $decksModel = new DecksModel();
        $decksModel->createDeck($csvFilePath, $csvFileName, $deck_creator, $deck_owner_id);
        
        echo "Deck created successfully. ";
        include_once 'app/controllers/decks_controller.php';
    }
    
}

$controller = new DeckImportController();

// Example: Call the function during a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES['csvFile'])) {
    $controller->uploadCsvToDatabase($_FILES['csvFile']);
} else {
    $controller->showDeckImportView();
}


?>
