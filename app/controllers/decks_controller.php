<?php
include_once 'app/models/decks_model.php';

class DecksController {
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
}

$controller = new DecksController();
$controller->showDecks();

?>
