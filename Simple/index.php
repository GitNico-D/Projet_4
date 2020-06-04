<?php

session_start();
ob_start();

// require_once "./Autoloader.php";

// Autoloader::register();

// Helpers
require_once "./Helpers/RouterHelper.php";

// Controllers
require_once "./Controllers/ChapterController.php";

$chapterController = new ChapterController();
var_dump($chapterController);
if (array_key_exists("page", $_GET) && isset($_GET["page"])) {
// if (isset($_GET['page']))
// {
    switch ($_GET['page']) 
    {
        case 'single':
            // Get PageIx from $_GET
            $pageIx = RouterHelper::getPageIx($_GET);
            var_dump($pageIx);
            $chapterController->single($pageIx);

            break;
        default:
            // Gérer l'erreur => redirection vers route = home
            break;
    }
} 
else 
{
    // Gérer l'erreur => redirection vers route = home
    $chapterController->home($pageIx);
}