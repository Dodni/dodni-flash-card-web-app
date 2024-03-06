<?php
class RegisterController {
    public function showRegisterPage() {
        $viewPath = 'app/views/register_view.php';
        
        // Ellenőrizzük, hogy a fájl létezik-e
        if (file_exists($viewPath)) {
            // Betöltjük és megjelenítjük a nézetet
            include_once $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
    }
}

// Példányosítjuk a HomeController osztályt
$controller = new RegisterController();

// Meghívjuk a showHomePage() metódust a HomeController-ből
$controller->showRegisterPage();

?>
