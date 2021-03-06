<?php

session_start();
ob_start();

require '../vendor/autoload.php';

use App\src\Services\RouterHelper;
use App\src\Services\LoginsHelper;

use App\src\Controllers\IndexController;
use App\src\Controllers\ChapterController;
use App\src\Controllers\CommentController;
use App\src\Controllers\LoginsController;
use App\src\Controllers\ErrorController;

$indexController = new IndexController();
$chapterController = new ChapterController();
$commentController = new CommentController();
$loginsController = new LoginsController();
$errorController = new ErrorController();
  
try {
    if (array_key_exists("page", $_GET) && isset($_GET["page"]) && is_string($_GET["page"])) {
        switch ($_GET["page"]) {
            case 'createChapter':
                $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);
                $chapterController->createChapter($isAdmin);
            break;
            case 'readChapter':
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
                $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);
                $chapterId = RouterHelper::getChapterId($_GET);
                $chapterController->updateChapterAction($chapterId, $isAdmin);
            break;
            case 'publishChapter':
                $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);
                $chapterId = RouterHelper::getChapterId($_GET);
                $chapterController->publishChapter($chapterId, $isAdmin);
            break;
            case 'getLogin':
                $loginsController->getLogin();
            break;
            case 'adminConnect':
                $loginsController->adminConnect();
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
            case 'validateComment':
                $commentId = RouterHelper::getCommentId($_GET);
                $commentController->validateComment($commentId);
            break;
            case "reportComment":
                $commentId = RouterHelper::getCommentId($_GET);
                $chapterId = RouterHelper::getChapterId($_GET);
                $commentController->reportComment($chapterId, $commentId);
            break;
            case "adminView":
                $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);
                $loginsController->adminView($isAdmin);
            break;
            case "contact":
                $loginsController->toBeContacted();
            break;
            case "sendMessage":
                $loginsController->sendMessage();
            break;
            default:
                throw new Exception('Page introuvable');
            }
    } else {
        $isAdmin = LoginsHelper::checkAdminConnected($_SESSION);
        $indexController->home($isAdmin);
    }
} catch (Exception $error) {
    if ((int)$error->getCode() != 0) {
        $errorController->error500($error);
    } else {
        $errorController->error404($error);
    }
}
