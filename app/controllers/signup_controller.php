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

    public function checkAndInsert() {
            // Data check:
            // Username check
            if (!isset($_POST['username']) || empty($_POST['username'])) {
                echo "Username field is required.";
                return false;
            }

            // Email check
            if (!isset($_POST['email']) || empty($_POST['email'])) {
                echo "Email field is required.";
                return false;
            } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format.";
                return false;
            }

            // Password check
            if (!isset($_POST['password']) || empty($_POST['password'])) {
                echo "Password field is required.";
                return false;
            }

            // Checkbox check (usually only needed if the checkbox is checked conditionally)
            if (!isset($_POST['termsCheckbox']) || $_POST['termsCheckbox'] !== 'on') {
                echo "Accepting the terms of use is mandatory.";
                return false;
            }
            $usersModel = new UsersModel();
            $result = $usersModel->createUser($_POST['username'], $_POST['email'], $_POST['password']);
            
            # It waits a true 
            return $result; 
    }

    public function start(){
        # It checks the request from the signup view
        if (!($_SERVER["REQUEST_METHOD"] == 'POST' 
            && isset($_POST['username'])
            && isset($_POST['email'])
            && isset($_POST['password'])
            && isset($_POST['termsCheckbox']))) {
            $this->showSignUpPage();
        } elseif ($result = $this->checkAndInsert()) {
            echo "The registration was successful!";
            include_once "app/controllers/decks_controller.php";
        } else {
            echo "The registration is not successfully!";
            $this->showSignUpPage();
        }
    }
}

$controller = new SignUpController();
$controller->start();


?>
