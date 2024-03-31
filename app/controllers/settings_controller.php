<?php
include_once "app/models/users_model.php";

class SettingsController {
    private $usersModel;

    public function __construct() {
        $this->usersModel = new UsersModel();
    }

    public function showSettingsPage($userSettingsData) {
        $viewPath = 'app/views/en/settings_view.php';
        
        if (file_exists($viewPath)) {
            include_once $viewPath;
        } else {
            echo "File did not found.";
        }
    }

    public function start()
    {   
        # var_dump ($_POST);
        if ($_SERVER["REQUEST_METHOD"] == 'POST' 
            && isset($_POST['user_id']) 
            && isset($_POST['as_auto_play_audio'])
            && isset($_POST['as_daily_study_goal'])
            && isset($_POST['as_marketing_letter'])
            && isset($_POST['as_news_letter'])) { 
            $result = $this->usersModel->updateUserSettings($_POST['user_id'], $_POST['as_daily_study_goal'], $_POST['as_auto_play_audio'], $_POST['as_marketing_letter'], $_POST['as_news_letter']);
            if ($result == true) {
                echo "The User Settings updated successfully.";
            } else {
                echo "The User Settings update has error.";
            }
        }
        $this->showSettingsPage($this->usersModel->getUserSettingsData($_SESSION["user_id"]));
    }
}

$controller = new SettingsController();
$controller->start();
?>
