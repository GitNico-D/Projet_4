<?php
require '../vendor/autoload.php';

// use App\src\DAO\ArticleManager;

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
            <p class="lead text-muted">Voici tous les articles disponibles !</p>
                <?php
                // $article = new ArticleManager; 
                // $articlesList = $article->getAllArticles();
                while ($article = $allArticles->fetch())
                {
                ?>
                <div class=card>
                    <h2 class=card-header><?= htmlspecialchars($article->title)?></h2>
                    <p class=card-body>Posté le <span class=font-italic><?= htmlspecialchars($article->creationDate)?></span> 
                        par <span class=font-italic><?= htmlspecialchars($article->author)?></span></p>
                    <p class= text-center-justify><?= htmlspecialchars($article->content)?></p>
                    <a href="../public/index.php?page=singlearticle&articleId=<?= htmlspecialchars($article->id)?>">En savoir plus... </a>
                </div>
                <?php
                }
                $allArticles->closeCursor();            
                ?>
        </section>
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Souhaitez vous ajouter un nouvel article ?</h1>
            </div>
            <p class="lead text-muted">Cliquez sur le lien ci dessous !</p>
                <a href="../public/index.php?page=addArticle">Se rendre sur la page d'ajout</a>
        </section>
    </body>
</html>