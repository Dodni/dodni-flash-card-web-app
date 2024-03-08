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

    public function getOneDeck($deckData) {
        $viewPath = 'app/views/en/deck_view.php';

        var_dump($deckData);
        
        if (file_exists($viewPath)) {
            include_once $viewPath;
        } else {
            echo "The file did not found.";
        }
    }
}

$controller = new DeckController();

// A POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ellenőrizzük, hogy van-e szerializált adat elküldve
    if (isset($_POST["serialized_data"])) {
        // Visszaállítjuk a szerializált adatot az eredeti tömbbé
        $decks = unserialize($_POST["serialized_data"]);
        
        // A tömb tartalmát kiírhatjuk vagy további műveleteket végezhetünk vele
        //var_dump($decks);
        $controller->getOneDeck($decks);
    } else {
        echo "Nincs szerializált adat elküldve!";
    }
} else {
    $controller->showDecks();
}



?>
