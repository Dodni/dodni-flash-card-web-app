<?php
class LogOutController {
    public function logOut() {
        session_start();
        
        $_SESSION = array();
        
        session_destroy();
        
        echo "You logged out successfully!";
        
        include_once "app/controllers/home_controller.php";
    }
    
}

$controller = new LogOutController();
$controller->logOut();
?>
