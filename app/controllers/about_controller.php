<?php
class AboutController {
    public function showAboutPage() {
        $viewPath = 'app/views/en/about_view.php';
        
        if (file_exists($viewPath)) {
            include_once $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
    }
}
$controller = new AboutController();
$controller->showAboutPage();
?>
