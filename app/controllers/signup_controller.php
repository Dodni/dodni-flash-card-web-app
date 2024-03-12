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

$controller->showSignUpPage();

?>
