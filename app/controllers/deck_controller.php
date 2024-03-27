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

    public function showOneDeck($deckID, $cardsStatisticsInOneSession = NULL) {
        $viewPath = 'app/views/en/deck_view.php';

        # Declaring the variables for the future easier using
        $decksModel = $this->decksModel;
        $deckSettingsModel = $this->deckSettingsModel;

        $deckName = $decksModel->getDeckNameByID($deckID);
        
        # IMPORTANT! NEED FOR THE CARD-FLIPPING VIEW AND CONTROLLER!!
        $oneDeck = $decksModel->get10Cards($deckID); 
        
        //$tenCards = $decksModel->getGivenAmountCards(1,15); # not used

        # color classes for the statistics piles
        $colors = [
            1 => "fail-color",
            2 => "hard-color",
            3 => "good-color",
            4 => "easy-color",
        ];

        # if it does null then does not show it
        if ($cardsStatisticsInOneSession != NULL) {
            # The maximum value in one array
            $maxValue = max($cardsStatisticsInOneSession);

            # The ratio calculates
            $ratio =  10 / $maxValue;
        }
        
        $deckSettingsData = $deckSettingsModel->getDeckSettingsData($_SESSION["user_id"], $deckID); 
        $deckLanguageData = $deckSettingsModel->getVoiceLanguages();
        $knownCardsNumber = $decksModel->getKnownCardsNumber($deckID);

        if (file_exists($viewPath)) {
            include_once $viewPath;
        } else {
            echo "The file did not found.";
        }
    }

    # It tries to update the deck settings and 
    public function updateAndShowOneDeck($data) {
        if ($this->deckSettingsModel->updateDeckSettingsData($data) == true) {
            echo "Settings saved successfully!";
        } else {
            echo "Settings saving failed!";
        }

        $this->showOneDeck($_POST["deck_id"]);
    }

    public function start() {
        // Processing the POST request
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            # It comes from the deck settings on the deck view
            if (isset($_POST["deck_id"]) && 
                isset($_POST["deck_name"]) &&
                isset($_POST["deck_settings_max_flip"]) &&
                isset($_POST["deck_settings_public"]) &&
                isset($_POST["deck_settings_language_front"]) &&
                isset($_POST["deck_settings_language_back"]) ) {
                
                $this->updateAndShowOneDeck($_POST);
            }
            
            # It comes from the decks page
            if (isset($_POST["deck_id"]) && isset($_POST["deck_name"])) {

                // Here you can continue with operations related to the POST request
                // such as database operations, etc.

                $this->showOneDeck($_POST["deck_id"]);
            } 
        } else {
            include_once "app/controllers/decks_controller.php";
        }
    }
}

$controller = new DeckController();
$controller->start();

?>
