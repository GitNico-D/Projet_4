<?php

require '../vendor/autoload.php';
require '../src/Core/Controller.php';

use App\src\Services\RouterHelper;
use App\src\Services\LoginsHelper;

use App\src\Controllers\ChapterController;
use App\src\Controllers\CommentController;
use App\src\Controllers\LoginsController;

session_start();
ob_start();

$chapterController = new ChapterController();
$commentController = new CommentController();
$loginsController = new LoginsController();

        
try {
    // var_dump($_GET["page"]);
    if (array_key_exists("page", $_GET) && isset($_GET["page"]) && is_string($_GET["page"])) {
        switch ($_GET["page"]) 
        {
            case 'single':
                // Get PageIx from $_GET
                $pageIx = RouterHelper::getPageIx($_GET);
                $isAdmin = LoginsHelper::checkAdminConnected();
                $chapterId = RouterHelper::getChapterId($_GET);
                var_dump($_GET["chapterId"]);
                // $chapterController->single($_GET['chapterId'], $isAdmin);
                $chapterController->single($chapterId, $isAdmin);
                break;
                case 'addNewChapter':
                    $isAdmin = LoginsHelper::checkAdminConnected();
                    $chapterController->addNewChapter($isAdmin);
                break;
                case "modifyChapter":
                    $isAdmin = LoginsHelper::checkAdminConnected();                
                    $chapterId = RouterHelper::getChapterId($_GET);
                    $chapterController->modifyChapter($chapterId, $isAdmin);
                break;
                case "applyChapterModification":
                    $isAdmin = LoginsHelper::checkAdminConnected();   
                    $chapterId = RouterHelper::getChapterId($_GET);
                    $chapterController->modifyChapter($chapterId, $isAdmin);
                case 'deleteChapter':
                    $isAdmin = LoginsHelper::checkAdminConnected();
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
                    $isAdmin = LoginsHelper::checkAdminConnected();
                    $loginsController->returnAdminView($isAdmin);  
                break;          
                default:
                // Gérer l'erreur => redirection vers route = home
                    require_once './Views/errorView.php';
                break;
            }
        }
        else
        {
            $isAdmin = LoginsHelper::checkAdminConnected();   
            $chapterController->home($isAdmin);
        }
} 
catch (Exception $error)
{
    // Gérer l'erreur => redirection vers route = home
    var_dump ("Erreur : " . $error->getMessage());
}