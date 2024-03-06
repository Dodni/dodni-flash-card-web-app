<!-- home_controller.php -->

<?php
class AboutController {
    public function showAboutPage() {
        
        // Az elérési út a home_view.php fájlhoz
        $viewPath = 'app/views/about_view.php';
        
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
$controller = new AboutController();

// Meghívjuk a showHomePage() metódust a HomeController-ből
$controller->showAboutPage();
?>
