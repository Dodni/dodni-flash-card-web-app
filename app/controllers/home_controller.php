<?php
//include_once 'app/models/test_model.php';
class HomeController {
    public function showHomePage() {
        $viewPath = 'app/views/en/home_view.php';
        if (file_exists($viewPath)) {
            include_once $viewPath;
        } else {
            echo "A megadott nézetfájl nem található.";
        }
        
        //$testModel = new TestModel();
        //$testModel->connectToDatabase();
        //$testModel->connectOtherWay();
    }
}

$controller = new HomeController();
$controller->showHomePage();


?>
