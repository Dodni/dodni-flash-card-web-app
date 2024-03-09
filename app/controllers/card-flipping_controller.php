<?php
include_once'app/models/decks_model.php';

class CardFlippingController {
    public function showNewCard($decks, $cardsMaxAmount) {
        $viewPath = 'app/views/en/card-flipping_view.php';

        if (file_exists($viewPath)) {
            include_once $viewPath;
            $cardsMaxAmount--;
            array_shift($decks);
        } else {
            echo "The file did not found.";
        }
    }

    public function flipCard() {
        
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
        $cardsMaxAmount = 100;
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
        $cardsMaxAmount--;

        var_dump ($cardsMaxAmount);

        echo "here i am";
        //now do sth
    }
}



?>
