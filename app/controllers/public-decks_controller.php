<?php
class PublicDecksController {
    public function showPublicDecksPage() {
        $viewPath = 'app/views/en/public-decks_view.php';
        
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
