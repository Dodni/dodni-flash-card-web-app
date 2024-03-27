<?php
include_once 'app/models/decks_model.php';

class CardFlippingController {
    public function showNewCard($decks, $cardsNumberForTheSession, $cardsStatisticsInOneSession) {
        $viewPath = 'app/views/en/card-flipping_view.php';

        if (file_exists($viewPath)) {
            include_once $viewPath;
            array_shift($decks);
        } else {
            echo "The file did not found.";
        }
    }

    public function startFlipping() {
        //deck to card-flipping view
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // This come from deck page&controller, after the card flipping starts
            if (isset($_POST["deck_id"])) {

                $deck_id = $_POST["deck_id"];
                $cardsKnown = $_POST['options'];
                $cardsMaxAmount = $_POST["cardsMaxAmount"];
                $cardsNumberForTheSession = $_POST["cardsNumberForTheSession"];

                # array for the deck statistics for the end of the session
                $cardsStatisticsInOneSession = [
                    1 => 0,
                    2 => 0,
                    3 => 0,
                    4 => 0,
                ];
                
                $decksModel = new DecksModel();    
                $decks = $decksModel->getGivenAmountCards($deck_id, $cardsKnown, $cardsMaxAmount);

                # It check the cards max amount what you checked on the deck view
                # Example: if the session number 100 but the checked cards only 40 then it will be 40 not 100
                if ($cardsNumberForTheSession < $cardsMaxAmount) {
                    $this->showNewCard($decks, $cardsNumberForTheSession, $cardsStatisticsInOneSession);
                } else {
                    $this->showNewCard($decks, $cardsMaxAmount, $cardsStatisticsInOneSession);
                }
            }

            // Card flipping continues here after the start
            if (isset($_POST["card_id"]) && isset($_POST["card_known"]) && isset($_POST["decks"]) && isset($_POST["cardsNumberForTheSession"])) {
                
                // These variables are not necessary but, I've wanted to keep the code clean.
                $card_id = $_POST["card_id"]; 
                $card_known = $_POST["card_known"];
                $decks = unserialize($_POST["decks"]); 
                $deck_id = $decks[0]["deck_id"];
                $cardsNumberForTheSession = $_POST["cardsNumberForTheSession"];
                $cardsStatisticsInOneSession = unserialize($_POST["cards_statistics_in_one_session"]);

                # count the user's answer for the deck statistics per session
                switch ($card_known) {
                    case 1:
                        $cardsStatisticsInOneSession[1]++;
                        break;
                    case 2:
                        $cardsStatisticsInOneSession[2]++;
                        break;
                    case 3:
                        $cardsStatisticsInOneSession[3]++;
                        break;
                    case 4:
                        $cardsStatisticsInOneSession[4]++;
                        break;
                }

                $decksModel = new DecksModel();
                $decksModel->updateCardKnownState($card_id, $card_known, $deck_id);

                array_shift($decks); // Delete first (uses) deck (we go through on the full deck)
                $cardsNumberForTheSession--;
                
                if ($cardsNumberForTheSession > 0) {
                    $this->showNewCard($decks, $cardsNumberForTheSession, $cardsStatisticsInOneSession);
                } else {
                    include_once 'app/controllers/deck_controller.php';
                    $deckController = new DeckController();
                    $deckController->showOneDeck($deck_id, $cardsStatisticsInOneSession);
                }
            }
        }
    }
}

$controller = new CardFlippingController();
$controller->startFlipping();

?>
