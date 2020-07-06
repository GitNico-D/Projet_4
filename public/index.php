<?php

require '../vendor/autoload.php';
require '../src/Core/Controller.php';
require "../config/dbConfig.php";

use App\src\Services\RouterHelper;
use App\src\Services\LoginsHelper;

use App\src\Controllers\IndexController;
use App\src\Controllers\ChapterController;
use App\src\Controllers\CommentController;
use App\src\Controllers\LoginsController;
use App\src\Controllers\ErrorController;

session_start();
ob_start();

$indexController = new IndexController();
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
                // $commentId = RouterHelper::getCommentId($_GET);
                $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);
                $chapterId = RouterHelper::getChapterId($_GET);
                // var_dump($_GET["page"]);
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
                    // $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);   
                    $chapterId = RouterHelper::getChapterId($_GET);
                    $chapterController->applyChapterModification($chapterId );
                case 'deleteChapter':
                    $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);
                    $chapterId = RouterHelper::getChapterId($_GET);
                    $chapterController->deleteChapter($chapterId, $isAdmin);
                break;
                case 'publishChapter':
                    $chapterId = RouterHelper::getChapterId($_GET);
                    $chapterController->publishChapter($chapterId);
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
                    $chapterId = RouterHelper::getChapterId($_GET);
                    $commentController->addReportedComment($chapterId, $commentId);
                break;
                case "adminView":
                    $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);
                    $loginsController->returnAdminView($isAdmin);  
                break; 
                case "contact":
                    $loginsController->getContacted();  
                break;         
                default:
                    throw new Exception('Page introuvable');
                break;
            }
        }
        else
        {  
            $indexController->home();
        }
} 
catch (Exception $error)
{
    if ((int)$error->getCode() != 0)
    {
        $errorController->error500($error);
    }
    else
    {
        $errorController->error404($error);
    }
}