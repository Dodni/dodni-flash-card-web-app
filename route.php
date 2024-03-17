<!-- route.php -->
<?php
// Könyvtár az útvonalakhoz és vezérlőkhöz
$url = "card";
session_start();
$isLoggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === "yes";

$routes = [
    '/' . $url . '/' => 'home_controller.php',
    '/' . $url .'/home' => 'home_controller.php',
    '/' . $url . '/about' => 'about_controller.php',
    '/' . $url . '/contact' => 'contact_controller.php',
    '/' . $url . '/signup' => 'signup_controller.php',
    '/' . $url . '/login' => 'login_controller.php',
    '/' . $url . '/logout' => ($isLoggedIn ? 'logout_controller.php' : 'login_controller.php'),
    // A bejelentkezési státustól függetlenül ugyanazt a vezérlőt használó útvonalak
    '/' . $url . '/decks' => ($isLoggedIn ? 'decks_controller.php' : 'login_controller.php') ,
    '/' . $url . '/decks/deck-import' => ($isLoggedIn ? 'deck-import_controller.php' : 'login_controller.php') ,
    '/' . $url . '/decks/public' => ($isLoggedIn ? 'public-decks_controller.php' : 'login_controller.php') ,
    '/' . $url . '/deck' => ($isLoggedIn ? 'deck_controller.php' : 'login_controller.php') ,
    '/' . $url . '/deck/card-flipping' => ($isLoggedIn ? 'card-flipping_controller.php' : 'login_controller.php') ,
    '/' . $url . '/settings' => ($isLoggedIn ? 'settings_controller.php' : 'login_controller.php'),
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
