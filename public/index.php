<?php 

// require '../config/PDOConnection.php';
require '../vendor/autoload.php';
use App\src\controller\ArticleController;

$frontController = new ArticleController();

var_dump($_GET);
    if (isset($_GET['page']))
    {
        if ($_GET['page'] === 'singlearticle')
        {
            // $frontController = new ArticleController();
            $frontController->single($_GET['articleId']);
            // require '../view/singlearticle.php';
        }
        elseif($_GET['page'] === 'addArticle')
        {
            $frontController->addArticle();
        }
        else
        {
            echo 'Page introuvable !';
        }
    }
    else 
    {
        $frontController = new ArticleController;
        $frontController->home();
    }
   
?>      
 