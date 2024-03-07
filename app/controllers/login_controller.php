<?php
class LoginController {
    public function showLoginPage() {
        $viewPath = 'app/views/en/login_view.php';
        
        // Ellenőrizzük, hogy a fájl létezik-e
        if (file_exists($viewPath)) {
            // Betöltjük és megjelenítjük a nézetet
            include_once $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
        
    }
}

$controller = new LoginController();

$controller->showLoginPage();


?>
