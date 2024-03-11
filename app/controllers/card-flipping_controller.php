<?php
include_once 'app/models/decks_model.php';


class CardFlippingController {
    public function showNewCard($decks, $cardsNumberForTheSession) {
        $viewPath = 'app/views/en/card-flipping_view.php';

        if (file_exists($viewPath)) {
            include_once $viewPath;
            array_shift($decks);
        } else {
            echo "The file did not found.";
        }
    }

    // It gives back the chosen cards number
    function getFlippingCardsNumber($value) {
        

        return $value;
    }
}

$controller = new CardFlippingController();

//deck to card-flipping view
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if deck_id is sent in the POST request
    if (isset($_POST["deck_id"])) {
        $deck_id = $_POST["deck_id"];
        // Now that deck_id is available, you can proceed with processing
        $cardsKnown = $_POST['options'];
        $cardsMaxAmount = $_POST["cardsMaxAmount"];
        $cardsNumberForTheSession = $_POST["cardsNumberForTheSession"];
        $decksModel = new DecksModel();        
        $decks = $decksModel->getGivenAmountCards($deck_id, $cardsKnown, $cardsMaxAmount);

        //var_dump($decks);
        //var_dump ($cardsNumberForTheSession);
        $controller->showNewCard($decks, $cardsNumberForTheSession);
    }

    if (isset($_POST["card_id"]) && isset($_POST["card_known"]) && isset($_POST["decks"]) && isset($_POST["cardsNumberForTheSession"])) {
        // These variables are not necessary but, I've wanted to keep the code clean.
        
        $card_id = $_POST["card_id"]; 
        $card_known = $_POST["card_known"];
        $decks = unserialize($_POST["decks"]); 
        $deck_id = $decks[0]["deck_id"];
        $cardsNumberForTheSession = $_POST["cardsNumberForTheSession"];

        $decksModel = new DecksModel();
        $decksModel->updateCardKnownState($card_id, $card_known);

        array_shift($decks); // Delete first (uses) deck
        $cardsNumberForTheSession--;
        
        if ($cardsNumberForTheSession > 0) {
            $controller->showNewCard($decks, $cardsNumberForTheSession);
        } else {
            //echo "No more cards";
            
            //$url = BASE_URL . 'deck';
            //header('Location: ' . $url);
            //exit();
            //var_dump($deck_id);
            include_once 'app/controllers/deck_controller.php';
            $deckController = new DeckController();
            $deckController->showOneDeck($deck_id, "asd");

            // We send it back to the deck where we started.
        }
    }
}
?>
