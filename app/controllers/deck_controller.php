<?php
include_once 'app/models/decks_model.php';
include_once 'app/models/deck-settings_model.php';

class DeckController {
    public function showOneDeck($deckID) {
        $viewPath = 'app/views/en/deck_view.php';

        $decksModel = new DecksModel();
        $deckName = $decksModel->getDeckNameByID($deckID);
        $oneDeck = $decksModel->get10Cards($deckID); // IMPORTANT! NEED FOR THE CARD-FLIPPING VIEW AND CONTROLLER!!
        //$tenCards = $decksModel->getGivenAmountCards(1,15);
        
        $deckSettingsModel = new DeckSettingsModel();
        $deckSettingsData = $deckSettingsModel->getDeckSettingsData($_SESSION["user_id"], $deckID); // ideiglenes adattal feltoltve
        $deckLanguageData = $deckSettingsModel->getVoiceLanguages();
        $knownCardsNumber = $decksModel->getKnownCardsNumber($deckID);

        if (file_exists($viewPath)) {
            include_once $viewPath;
        } else {
            echo "The file did not found.";
        }
    }
}

$controller = new DeckController();

// Processing the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if deck_id is sent
    if (isset($_POST["deck_id"])) {

        $deck_id = $_POST["deck_id"];
        $deck_name = $_POST["deck_name"];
        // Here you can continue with operations related to the POST request
        // such as database operations, etc.

        $controller->showOneDeck($deck_id, $deck_name);
    } 
} else {
    include_once "app/controllers/decks_controller.php";
}



?>
