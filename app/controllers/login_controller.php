<?php
include_once "app/models/users_model.php";

class LoginController {

    public function showLoginPage() {
        $viewPath = 'app/views/en/login_view.php';
        
        // Ellenőrizzük, hogy a fájl létezik-e
        if (file_exists($viewPath)) {
            // Betöltjük és megjelenítjük a nézetet
            include_once $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
        
    }

    public function checkAndLogIn($username, $password) {
        $usersModel = new UsersModel();
        $result = $usersModel->checkAndLogIn($username, $password);
        if (!$result) {
            return false;
        }
        
        return true;
    }

    public function start() {
        if ($_SERVER["REQUEST_METHOD"] != 'POST') {
            $this->showLoginPage();
        
        } elseif ($_SERVER["REQUEST_METHOD"] == 'POST' 
                    && isset($_POST['user_name']) 
                    && isset($_POST['password'])
                    && $_POST['user_name'] != NULL
                    && $_POST['password'] != NULL) 
            {
            if ($this->checkAndLogIn($_POST['user_name'], $_POST['password'])) {
                echo "You logged in successfully!";
                include_once "app/controllers/decks_controller.php";
                
            } else {
                $this->showLoginPage();
            }
        } elseif ($_SERVER["REQUEST_METHOD"] == 'POST' && $_POST['user_name'] == "" || $_POST['password'] == "" ) {
            echo "The login in is failed! The user name or the password was wrong!";
            $this->showLoginPage();
        }
    }    
}

$controller = new LoginController();
$controller->start();


?>
