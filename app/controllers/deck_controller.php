<?php
include_once 'app/models/decks_model.php';
include_once 'app/models/deck-settings_model.php';

class DeckController {
    private $deckSettingsModel;
    private $decksModel;

    public function __construct() {
        $this->decksModel = new DecksModel();
        $this->deckSettingsModel = new DeckSettingsModel();
    }

    public function showOneDeck($deckID) {
        $viewPath = 'app/views/en/deck_view.php';

        $decksModel = $this->decksModel;
        $deckSettingsModel = $this->deckSettingsModel;

        $deckName = $decksModel->getDeckNameByID($deckID);
        $oneDeck = $decksModel->get10Cards($deckID); // IMPORTANT! NEED FOR THE CARD-FLIPPING VIEW AND CONTROLLER!!
        //$tenCards = $decksModel->getGivenAmountCards(1,15);
        
        $deckSettingsData = $deckSettingsModel->getDeckSettingsData($_SESSION["user_id"], $deckID); // ideiglenes adattal feltoltve
        $deckLanguageData = $deckSettingsModel->getVoiceLanguages();
        $knownCardsNumber = $decksModel->getKnownCardsNumber($deckID);

        if (file_exists($viewPath)) {
            include_once $viewPath;
        } else {
            echo "The file did not found.";
        }
    }

    public function updateAndShowOneDeck($data)
    {
        if ($this->deckSettingsModel->updateDeckSettingsData($data) == true) {
            echo "Settings saved successfully!";
        } else {
            echo "Settings saving failed!";
        }

        $this->showOneDeck($_POST["deck_id"], $_POST["deck_name"]);
    }
}

$controller = new DeckController();

# var_dump ($_POST);

// Processing the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if deck_id is sent
    if (isset($_POST["deck_id"]) && 
        isset($_POST["deck_name"]) &&
        isset($_POST["deck_settings_max_flip"]) &&
        isset($_POST["deck_settings_public"]) &&
        isset($_POST["deck_settings_language_front"]) &&
        isset($_POST["deck_settings_language_back"]) ) {
        
        $controller->updateAndShowOneDeck($_POST);
    }
    
    if (isset($_POST["deck_id"]) && isset($_POST["deck_name"])) {

        // Here you can continue with operations related to the POST request
        // such as database operations, etc.

        $controller->showOneDeck($_POST["deck_id"], $_POST["deck_name"]);
    } 
} else {
    include_once "app/controllers/decks_controller.php";
}



?>
