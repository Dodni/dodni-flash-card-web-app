<?php
include_once'app/models/decks_model.php';

class CardFlippingController {
    public function showNewCard($decks, $cardsMaxAmount) {
        $viewPath = 'app/views/en/card-flipping_view.php';

        if (file_exists($viewPath)) {
            include_once $viewPath;
            array_shift($decks);
        } else {
            echo "The file did not found.";
        }
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
        $decksModel = new DecksModel();
        $decks = $decksModel->getGivenAmountCards($deck_id, $cardsKnown, $cardsMaxAmount);

        //var_dump($decks);

        $controller->showNewCard($decks, $cardsMaxAmount);
    }

    if (isset($_POST["card_id"]) && isset($_POST["card_known"]) && isset($_POST["decks"]) && isset($_POST["cardsMaxAmount"])) {
        $card_id = $_POST["card_id"]; 
        $card_known = $_POST["card_known"];
        $decks = unserialize($_POST["decks"]);     
        $cardsMaxAmount = $_POST["cardsMaxAmount"];



        $decksModel = new DecksModel();
        //$savingIsSuccess = $decksModel->updateCardKnownState();

        array_shift($decks); // Delete first (uses) deck
        $cardsMaxAmount--;

        
        if ($cardsMaxAmount > 0) {
            $controller->showNewCard($decks, $cardsMaxAmount);
        } else {
            echo "No more cards";
            // We send it back to the deck where we started.
        }
    }
}



?>
