<?php

require '../vendor/autoload.php';
require '../src/Core/Controller.php';
require "../config/dbConfig.php";
// require '../config/db-config.yml';

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
            case 'createChapter':
                $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);
                $chapterController->createChapter($isAdmin);
            break;
            case 'readChapter':
                // $pageIx = RouterHelper::getPageIx($_GET);
                // $commentId = RouterHelper::getCommentId($_GET);
                $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);
                $chapterId = RouterHelper::getChapterId($_GET);
                $chapterController->readChapter($chapterId, $isAdmin);
            break;            
            case "updateChapter":
                $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);                
                $chapterId = RouterHelper::getChapterId($_GET);
                $chapterController->updateChapter($chapterId, $isAdmin);
            break;
            case 'deleteChapter':
                $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);
                $chapterId = RouterHelper::getChapterId($_GET);
                $chapterController->deleteChapter($chapterId, $isAdmin);
            break;
            case "updateChapterAction":
                // $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);   
                $chapterId = RouterHelper::getChapterId($_GET);
                $chapterController->applyUpdateChapter($chapterId);
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
            case 'createComment':
                $chapterId = RouterHelper::getChapterId($_GET);
                $commentController->createComment($chapterId);
            break;
            case 'deleteComment':
                $commentId = RouterHelper::getCommentId($_GET);
                $commentController->deleteComment($commentId);
            break;
            case "reportComment":
                $commentId = RouterHelper::getCommentId($_GET);
                $chapterId = RouterHelper::getChapterId($_GET);
                $commentController->reportComment($chapterId, $commentId);
            break;
            case "adminView":
                $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);
                $loginsController->returnAdminView($isAdmin);  
            break; 
            case "contact":
                $loginsController->toBeContacted();  
            break;         
            default:
                throw new Exception('Page introuvable');
            break;
            }
        }
        else
        { 
            $isAdmin = LoginsHelper::checkAdminConnected($_SESSION); 
            $indexController->home($isAdmin);
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