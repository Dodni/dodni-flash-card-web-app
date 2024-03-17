<?php
class LogOutController {
    public function logOut() {
        // Indítjuk a session-t
        session_start();
        
        // Töröljük a session változókat
        $_SESSION = array();
        
        // Lezárjuk a session-t
        session_destroy();
        
        // Átirányítjuk a felhasználót a kijelentkezés utáni oldalra
        echo "You logged out successfully!";
        
        include_once "app/controllers/home_controller.php";
    }
    
}

$controller = new LogOutController();
$controller->logOut();
?>
