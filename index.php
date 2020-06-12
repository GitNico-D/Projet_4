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

// RouterHelper::parseUrl("")
$fragments = parse_url("http://localhost/projet_4/simple/index.php?page=single");
var_dump($fragments);
$filepath = $fragments['path'];
var_dump($filepath);
$pos = strpos($filepath, '_');
var_dump($pos);


// var_dump($_SESSION["loginsEmail"]);

if (array_key_exists("page", $_GET) && isset($_GET["page"])) {
    switch ($_GET['page']) 
    {
        case 'single':
            // Get PageIx from $_GET
            $pageIx = RouterHelper::getPageIx($_GET);
            $isAdmin = LoginsHelper::checkAdminConnected();
            $chapterController->single($_GET['chapterId'], $isAdmin);
        break;
        case 'addNewChapter':
            $isAdmin = LoginsHelper::checkAdminConnected();
            $chapterController->addNewChapter($isAdmin);
        break;
        case 'deleteChapter':
            $isAdmin = LoginsHelper::checkAdminConnected();
            $chapterController->deleteChapter($_GET['chapterId']);
        break;
        case 'getLogin':
            $loginsController->getLogin();  
        break;
        case 'getLogout':
            $loginsController->getLogout();
        break;
        case 'addComment':
            $chapterController->addComment($_GET['chapterId']);
        break;
        case "adminView":
            $isAdmin = LoginsHelper::checkAdminConnected();
            $loginsController->returnAdminView($isAdmin);
        default:
        // Gérer l'erreur => redirection vers route = home
            require_once './Views/errorView.php';
    break;
}
} 
else 
{
    // Gérer l'erreur => redirection vers route = home
    $chapterController->home();
}