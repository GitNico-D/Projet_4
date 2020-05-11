<?php
require 'Database.php';
require 'Post.php';
require 'Comments.php';
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
                $uniqueNews = new Post; 
                $news = $uniqueNews->getUniquePost($_GET['idPost']);
                $uniqueNews = $news->fetch();
                ?>
                <div class=card>
                    <h2 class=card-header font-weight-bold><?= htmlspecialchars($uniqueNews->title);?></h2>
                    <p class=card-body>Posté le <span class=font-italic><?= htmlspecialchars($uniqueNews->creationDate);?></span> 
                        par <span class=font-italic><?= htmlspecialchars($uniqueNews->author);?></span></p>
                    <p class= text-center-justify><?= htmlspecialchars($uniqueNews->content);?></p>
                    <a href=home.php>Retour à Home Page</a>
                </div>
                <?php
                $comments = new Comments();
                $newsCommentsList = $comments->getNewsComments($_GET['idPost']);
                ?>
                <h4 class=card-header><em class=bold>Commentaires</em></h4>
                <?php
                while ($comments = $newsCommentsList->fetch())
                {
                ?>
                <div class=card>
                    <p class=card-body>Posté le <span class=font-italic><?= htmlspecialchars($comments->creationDate);?></span> 
                    par <span class=font-italic><?= htmlspecialchars($comments->author);?></span></p>
                    <p class= text-center-justify><?= htmlspecialchars($comments->content);?></p>
                </div>
                <?php
                }
                $news->closeCursor();                
                ?>
        </section>
    </body>
</html>