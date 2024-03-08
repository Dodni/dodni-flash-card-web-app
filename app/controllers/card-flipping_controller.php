<?php
include_once'app/models/decks_model.php';

class CardFlippingController {
    public function showNewCard() {
        $viewPath = 'app/views/en/card-flipping_view.php';

        if (file_exists($viewPath)) {
            include_once $viewPath;
        } else {
            echo "The file did not found.";
        }
    }

}

$controller = new CardFlippingController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if deck_id is sent in the POST request
    if (isset($_POST["deck_id"])) {
        $deck_id = $_POST["deck_id"];
        // Now that deck_id is available, you can proceed with processing
        echo "Selected deck ID: $deck_id";

        $cardsAmount = 100;
        
        $cardsKnown = $_POST['options'];

        $decksModel = new DecksModel();
        $decks = $decksModel->getGivenAmountCards($deck_id, $cardsKnown, $cardsAmount);

        var_dump($decks);

        $controller->showNewCard();
    } else {
        // Handle the situation where deck_id is not sent
        echo "No deck_id sent in the POST request!";
    }
}


?>
