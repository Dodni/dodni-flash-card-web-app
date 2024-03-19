<?php
class ContactController {
    public function showContactPage() {
        
        $viewPath = 'app/views/en/contact_view.php';
        
        if (file_exists($viewPath)) {
            include_once $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
    }
}

$controller = new ContactController();

$controller->showContactPage();
?>
