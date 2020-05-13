<?php
require '../vendor/autoload.php';

// use App\config\Autoloader;
// Autoloader::register();
use App\src\DAO\ArticleManager;
use App\src\DAO\CommentsDAO;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog en création</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../public/style.css">
    </head>
    <body>
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container ">
                <a href="#" class="navbar-brand text-center">
                    <strong>HOME PAGE</strong>
                </a>
                </button>
            </div>
        </div>
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Bienvenue sur mon blog!</h1>
            </div>
            <p class="lead text-muted">Affichage d'un unique article !</p>
                <?php
                $uniqueArticle = new ArticleManager; 
                $article = $uniqueArticle->getUniqueArticle($_GET['articleId']);
                $uniqueArticle = $article->fetch();
                ?>
                <div class=card>
                    <h2 class=card-header font-weight-bold><?= htmlspecialchars($uniqueArticle->title);?></h2>
                    <p class=card-body>Posté le <span class=font-italic><?= htmlspecialchars($uniqueArticle->creationDate);?></span> 
                        par <span class=font-italic><?= htmlspecialchars($uniqueArticle->author);?></span></p>
                    <p class= text-center-justify><?= htmlspecialchars($uniqueArticle->content);?></p>
                    <a href="../public/index.php">Retour à Home Page</a>
                </div>
        </section>
    </body>
</html>