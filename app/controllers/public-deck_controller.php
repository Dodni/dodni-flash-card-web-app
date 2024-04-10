<?php
class PublicDeckController {
    public function showPublicDeckPage() {
        $viewPath = 'app/views/en/public-deck_view.php';
        
        if (file_exists($viewPath)) {
            include_once $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
    }
}
$controller = new PublicDeckController();
$controller->showPublicDeckPage();
?>