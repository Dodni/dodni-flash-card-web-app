<?php
include_once "app/models/users_model.php";

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
$usersModel = new UsersModel();

if($_SERVER["REQUEST_METHOD"] == 'POST' 
    && isset($_POST['username'])
    && isset($_POST['email'])
    && isset($_POST['password'])
    && isset($_POST['termsCheckbox'])) {

    // Data check:
    // Felhasználónév ellenőrzése
    if (!isset($_POST['username']) || empty($_POST['username'])) {
        echo "Felhasználónév mező kitöltése kötelező.";
        $controller->showSignUpPage();
    }

    // Email ellenőrzése
    if (!isset($_POST['email']) || empty($_POST['email'])) {
        echo "Email mező kitöltése kötelező.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo "Érvénytelen email formátum.";
        $controller->showSignUpPage();
    }

    // Jelszó ellenőrzése
    if (!isset($_POST['password']) || empty($_POST['password'])) {
        echo "Jelszó mező kitöltése kötelező.";
        $controller->showSignUpPage();
    }

    // Checkbox ellenőrzése (általában csak akkor van szükség erre, ha a checkbox csak akkor van bejelölve, ha kiválasztják)
    if (!isset($_POST['termsCheckbox']) || $_POST['termsCheckbox'] !== 'on') {
        echo "A felhasználási feltételek elfogadása kötelező.";
        $controller->showSignUpPage();
    }

    $result = $usersModel->createUser($_POST['username'], $_POST['email'], $_POST['password']);
    
    if ($result == true) {
        echo "Successfully signed up!";
        include_once "app/controllers/decks_controller.php";
    } else {
        echo "The registration is not successfully!";
        $controller->showSignUpPage();
    }
    
} else {
    $controller->showSignUpPage();
}

?>
