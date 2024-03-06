<!-- init.php -->
<?php
// Elérési út beállítása a controllerekhez
$controllerPath = 'app/controllers/';
include 'system/config.php';
include 'system/database.php';
include 'route.php';


// Error reporting bekapcsolása
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log'); // Elérési útvonal a naplófájlhoz
?>
