<?php
include_once'app/models/decks_model.php';

class DeckController {
    public function showDecks() {
        $viewPath = 'app/views/en/decks_view.php';

        $decksModel = new DecksModel();
        $decks = $decksModel->getDecks();
        //var_dump($decks);
        
        if (file_exists($viewPath)) {
            include_once $viewPath;
        } else {
            echo "The file did not found.";
        }
    }

    public function showOneDeck($deckID) {
        $viewPath = 'app/views/en/deck_view.php';

        //var_dump($deckID);

        $decksModel = new DecksModel();
        $oneDeck = $decksModel->get10Cards($deckID);
        //var_dump($oneDeck);
        //$tenCards = $decksModel->getGivenAmountCards(1,15);
        //var_dump($tenCards);
        
        if (file_exists($viewPath)) {
            include_once $viewPath;
        } else {
            echo "The file did not found.";
        }
    }
}

$controller = new DeckController();
//var_dump($_POST);
// Processing the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if deck_id is sent
    if (isset($_POST["deck_id"])) {
        $deck_id = $_POST["deck_id"];
        // Here you can continue with operations related to the POST request
        // such as database operations, etc.

        $controller->showOneDeck($deck_id);
    } else {
        echo "No deck_id sent in the POST request!";
    }
} else {
    // Show decks if not a POST request
    $controller->showDecks();
}   



?>
