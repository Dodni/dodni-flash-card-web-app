<?php
include_once 'app/models/decks_model.php';

class PublicDecksController {
    public function showPublicDecksPage() {
        $viewPath = 'app/views/en/public-decks_view.php';
        
        $decksModel = new DecksModel();
        $publicDecks = $decksModel->getPublicDecks();

        if (file_exists($viewPath)) {
            include_once $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
    }
}
$controller = new PublicDecksController();
$controller->showPublicDecksPage();
?>
