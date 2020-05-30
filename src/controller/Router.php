<?php

use App\src\controller\ChapterController;
use App\src\controller\LoginsController;
use App\src\controller\ErrorController;
use App\src\controller\CommentController;

class Router 
{

    private $chapterController;
    private $loginsController;
    private $commentController;
    private $errorController;

    public function __construct()
    {
        $this->chapterController = new ChapterController();
        $this->loginsController = new LoginsController();
        // $this->commentController = new CommentController();
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
                        $this->chapterController->single($_GET['chapterId']);
                        // $this->commentController->getComment($_GET['chapterId']);
                    break;
                    case 'addNewChapter':
                        $this->chapterController->addNewChapter();
                        echo('addNewChapter');
                    break;
                    case 'getLogin':
                        $this->loginsController->getLogIn();
                    break;
                    default:
                        // require '../view/errorView.php';
                        // $this->errorController->errorPageNotFound();
                        throw new Exception('Page introuvable');
                }
            }
            else
            {
                $this->chapterController->home();
            }
        }
        catch (Exception $error)
        {
            $this->errorController->errorPageNotFound($error->getMessage());
        }
    }

}