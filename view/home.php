<?php
require '../vendor/autoload.php';
require '../config/PDOConnection.php';

// use App\vendor\Autoloader;
// Autoloader::register();
use App\src\DAO\PostDAO;

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
            <p class="lead text-muted">Tous les articles disponibles !</p>
                <?php
                $news = new PostDAO; 
                $newsList = $news->getPost();
                while ($news = $newsList->fetch())
                {
                ?>
                <div class=card>
                    <h2 class=card-header><?= htmlspecialchars($news->title)?></h2>
                    <p class=card-body>Posté le <span class=font-italic><?= htmlspecialchars($news->creationDate)?></span> 
                        par <span class=font-italic><?= htmlspecialchars($news->author)?></span></p>
                    <p class= text-center-justify><?= htmlspecialchars($news->content)?></p>
                    <a href="../public/index.php?page=singlenews&idPost=<?= htmlspecialchars($news->id)?>">En savoir plus... </a>
                </div>
                <?php
                }
                $newsList->closeCursor();            
                ?>
        </section>
    </body>
</html>