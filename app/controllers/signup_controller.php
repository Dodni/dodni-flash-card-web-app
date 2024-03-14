<?php
class SignUpController {
    public function showSignUpPage() {
        $viewPath = 'app/views/en/signup_view.php';
        
        if (file_exists($viewPath)) {
            include_once $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
    }
}

$controller = new SignUpController();
var_dump ($_POST);
if($_SERVER["REQUEST_METHOD"] == 'POST' 
    && isset($_POST['username'])
    && isset($_POST['email'])
    && isset($_POST['password'])
    && isset($_POST['termsCheckbox'])) {
    echo "itt vagyunk";

    // Data check:
    // Felhasználónév ellenőrzése
    if (!isset($_POST['username']) || empty($_POST['username'])) {
        echo "Felhasználónév mező kitöltése kötelező.";
    }

    // Email ellenőrzése
    if (!isset($_POST['email']) || empty($_POST['email'])) {
        echo "Email mező kitöltése kötelező.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo "Érvénytelen email formátum.";
    }

    // Jelszó ellenőrzése
    if (!isset($_POST['password']) || empty($_POST['password'])) {
        echo "Jelszó mező kitöltése kötelező.";
    }

    // Checkbox ellenőrzése (általában csak akkor van szükség erre, ha a checkbox csak akkor van bejelölve, ha kiválasztják)
    if (!isset($_POST['termsCheckbox']) || $_POST['termsCheckbox'] !== 'on') {
        echo "A felhasználási feltételek elfogadása kötelező.";
    }

} else {
    $controller->showSignUpPage();
}

?>
