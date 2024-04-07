<?php
class TutorialController {
    public function showTutorialPage() {
        $viewPath = 'app/views/en/tutorial_view.php';
        
        if (file_exists($viewPath)) {
            include_once $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
    }
}
$controller = new TutorialController();
$controller->showTutorialPage();
?>
