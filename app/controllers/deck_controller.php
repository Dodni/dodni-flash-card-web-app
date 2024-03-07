<?php
class DeckController {
    public function showDecks() {
        $viewPath = 'app/views/en/decks_view.php';
        
        // Ellenőrizzük, hogy a fájl létezik-e
        if (file_exists($viewPath)) {
            // Betöltjük és megjelenítjük a nézetet
            include_once $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
    }

    public function getDeck($deckId) {
        // Itt hívjuk meg a Deck-et az id alapján és töltsük be a nézetet
        
        $viewPath = 'app/views/en/deck_view.php';
        
        // Ellenőrizzük, hogy a fájl létezik-e
        if (file_exists($viewPath)) {
            // Betöltjük és megjelenítjük a nézetet
            include_once $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
    }
}

$controller = new DeckController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ha POST kérés érkezett
    if (isset($_POST["deck"])) {
        $selectedDeck = $_POST["deck"];
        $controller->getDeck($selectedDeck);
    } else {
        echo "Nem lett kiválasztva pakli!";
    }
} else {
    $controller->showDecks();
}

?>
