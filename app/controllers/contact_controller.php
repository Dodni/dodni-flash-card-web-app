<!-- home_controller.php -->

<?php
class ContactController {
    public function showContactPage() {
        
        $viewPath = 'app/views/contact_view.php';
        
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
$controller = new ContactController();

// Meghívjuk a showHomePage() metódust a HomeController-ből
$controller->showContactPage();
?>
