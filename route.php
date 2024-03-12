<!-- route.php -->
<?php
// Könyvtár az útvonalakhoz és vezérlőkhöz
$url = "card";

$routes = [
    '/' . $url . '/' => 'home_controller.php',
    '/' . $url .'/home' => 'home_controller.php',
    '/' . $url . '/about' => 'about_controller.php',
    '/' . $url . '/contact' => 'contact_controller.php',
    '/' . $url . '/signup' => 'signup_controller.php',
    '/' . $url . '/login' => 'login_controller.php',
    '/' . $url . '/logout' => 'logout_controller.php',
    '/' . $url . '/decks' => 'decks_controller.php',
    '/' . $url . '/decks/deck-import' => 'deck-import_controller.php',
    '/' . $url . '/decks/public' => 'public-decks_controller.php',
    '/' . $url . '/deck' => 'deck_controller.php',
    '/' . $url . '/deck/card-flipping' => 'card-flipping_controller.php',
    '/' . $url . '/settings' => 'settings_controller.php',
];

// Ellenőrizze, hogy létezik-e a kívánt útvonal
$requestURI = $_SERVER['REQUEST_URI'];

if (array_key_exists($requestURI, $routes)) {
    $controllerFile = $controllerPath . $routes[$requestURI];
    
    // Ellenőrizzük, hogy a fájl létezik-e
    if (file_exists($controllerFile)) {
        include_once $controllerFile;
    } else {
        echo "A megadott vezérlőfájl nem található.";
    }
} else {
    // Hibakezelés: 404 oldal
    http_response_code(404);
    include_once ("app/views/en/404-not-found_view.php");
}
?>
