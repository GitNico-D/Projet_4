<?php

require '../vendor/autoload.php';
require '../src/Core/Controller.php';

use App\src\Services\RouterHelper;
use App\src\Services\LoginsHelper;

use App\src\Controllers\ChapterController;
use App\src\Controllers\CommentController;
use App\src\Controllers\LoginsController;
use App\src\Controllers\ErrorController;

session_start();
ob_start();

$chapterController = new ChapterController();
$commentController = new CommentController();
$loginsController = new LoginsController();
$errorController = new ErrorController();

        
try {
    if (array_key_exists("page", $_GET) && isset($_GET["page"]) && is_string($_GET["page"])) {
        switch ($_GET["page"]) 
        {
            case 'single':
                // Get PageIx from $_GET
                $pageIx = RouterHelper::getPageIx($_GET);
                $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);
                $chapterId = RouterHelper::getChapterId($_GET);
                $chapterController->single($chapterId, $isAdmin);
                break;
                case 'addNewChapter':
                    $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);
                    $chapterController->addNewChapter($isAdmin);
                break;
                case "modifyChapter":
                    $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);                
                    $chapterId = RouterHelper::getChapterId($_GET);
                    $chapterController->modifyChapter($chapterId, $isAdmin);
                break;
                case "applyChapterModification":
                    $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);   
                    $chapterId = RouterHelper::getChapterId($_GET);
                    $chapterController->modifyChapter($chapterId, $isAdmin);
                case 'deleteChapter':
                    $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);
                    $chapterId = RouterHelper::getChapterId($_GET);
                    $chapterController->deleteChapter($chapterId, $isAdmin);
                break;
                case 'getLogin':
                    $loginsController->getLogin();  
                break;
                case 'getLogout':
                    $loginsController->getLogout();
                break;
                case 'addComment':
                    $chapterId = RouterHelper::getChapterId($_GET);
                    $chapterController->addComment($chapterId);
                break;
                case "reportComment":
                    $commentId = RouterHelper::getCommentId($_GET);
                    $commentController->addReportedComment($commentId);
                break;
                case "adminView":
                    $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);
                    $loginsController->returnAdminView($isAdmin);  
                break;          
                default:
                    throw new Exception('Page introuvable');
                break;
            }
        }
        else
        {  
            $chapterController->home();
        }
} 
catch (Exception $error)
{
    if ((int)$error->getCode() != 0)
    {
        $errorController->error500();
    }
    else
    {
        $errorController->error404($error);
    }
}