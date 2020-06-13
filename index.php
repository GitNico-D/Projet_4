<?php

session_start();
ob_start();

// require_once "./Autoloader.php";

// Autoloader::register();

// Helpers
require_once "./Helpers/RouterHelper.php";
require_once "./Helpers/LoginsHelper.php";

// Controllers
require_once "./Controllers/ChapterController.php";
require_once "./Controllers/CommentController.php";
require_once "./Controllers/LoginsController.php";


$chapterController = new ChapterController();
$commentController = new CommentController();
$loginsController = new LoginsController();

// try {
    if (array_key_exists("page", $_GET) && isset($_GET["page"])) {
    switch ($_GET["page"]) 
    {
        case 'single':
            // Get PageIx from $_GET
            $pageIx = RouterHelper::getPageIx($_GET);
            $isAdmin = LoginsHelper::checkAdminConnected();
            $chapterId = RouterHelper::getChapterId($_GET);
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
            case "adminView":
                $isAdmin = LoginsHelper::checkAdminConnected();
                $loginsController->returnAdminView($isAdmin);            
            default:
            // Gérer l'erreur => redirection vers route = home
                require_once './Views/errorView.php';
        break;
        }
    // } 
} else
// catch (Exception $error)
{
    // Gérer l'erreur => redirection vers route = home
    $chapterController->home();
    // die("Erreur : Lien introuvable " . $errorPage->getMessage());
}