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

    private function uploadCsvToDatabase($csvFile) {
        $deck_creator = $_SESSION['username'];
        $deck_owner_id = $_SESSION['user_id'];
        
        $csvFileName = substr($csvFile["name"], 0, -4); // Extracting file name
        $csvFilePath = $csvFile['tmp_name']; // Temporary file path
    
        $decksModel = new DecksModel();
        $result = $decksModel->createDeck($csvFilePath, $csvFileName, $deck_creator, $deck_owner_id);
        
        if ($result == true) {
            echo "The deck created successfully.";
            include_once 'app/controllers/decks_controller.php';
        } else {
            echo "Error: The deck creation is not successful!";
            include_once 'app/controllers/decks_controller.php';
        }
    }


    public function start() {
        // Example: Call the function during a POST request
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES['csvFile'])) {
            $this->uploadCsvToDatabase($_FILES['csvFile']);
        } else {
            $this->showDeckImportView();
        }
    }
}

$controller = new DeckImportController();
$controller->start();

?>
