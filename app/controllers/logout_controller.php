<?php
class LogOutController {
    public function showLogOutPage() {
        $viewPath = 'app/views/en/logout_view.php';
        
        // Ellenőrizzük, hogy a fájl létezik-e
        if (file_exists($viewPath)) {
            // Betöltjük és megjelenítjük a nézetet
            include_once $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
    }
}

$controller = new LogOutController();
$controller->showLogOutPage();
?>
