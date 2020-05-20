<?php 

// require '../config/PDOConnection.php';
require '../vendor/autoload.php';
use App\src\controller\FrontController;
use App\src\controller\ErrorController;
// use Exception;

$frontController = new FrontController();
$errorController = new ErrorController();

try 
{
    if (isset($_GET['page']))
    {
    $page = $_GET['page'];
        switch ($page)
        {
            case 'single': 
                $frontController->single($_GET['articleId']);
            break;
            case 'addArticle':
                $frontController->addArticle($_POST);
            break;
            case 'getLogin':
                $frontController->logIn();
            break;
            default:
                $errorController->errorPageNotFound();
        }
    }
    else 
    {
        $frontController->home();
    }
}
catch (Exception $errorConnexion)
{
    // $errorMessage = $errorConnexion->getMessage();
    $errorController->PageNotFound($errorMessage);
}

    
?>      
 