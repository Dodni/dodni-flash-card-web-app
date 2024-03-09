<?php
class SettingsController {
    public function showSettingsPage() {
        $viewPath = 'app/views/en/settings_view.php';
        
        if (file_exists($viewPath)) {
            include_once $viewPath;
        } else {
            echo "File did not found.";
        }
    }
}

$controller = new SettingsController();

$controller->showSettingsPage();
?>
