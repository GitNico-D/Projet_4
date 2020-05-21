<?php

use App\src\controller\FrontController;
use App\src\controller\BackController;
use App\src\controller\ErrorController;

class Router 
{

    private $frontController;
    private $backController;
    private $errorController;

    public function __construct()
    {
        $this->frontController = new FrontController();
        // $this->backController = new BackController();
        $this->errorController = new ErrorController();
    }

    public function launchApp()
    {
        try
        {
            if (isset($_GET['page']))
            {
                $page = $_GET['page'];
                switch ($page)
                {
                    case 'single': 
                        $this->frontController->single($_GET['chapterId']);
                    break;
                    case 'addChapter':
                        $this->frontController->addChapter($_POST);
                    break;
                    case 'getLogin':
                        $this->frontController->logIn();
                    break;
                    default:
                        require '../view/errorView.php';
                        // $this->errorController->errorPageNotFound();
                }
            }
            else
            {
                $this->frontController->home();
            }
        }
        catch (Exception $error)
        {
            $this->errorController->errorPageNotFound($error->getMessage());
        }
    }

}