<?= $pageTitle = 'Affichage d\'un unique article !'?>
<?php ob_start(); ?>
    <p class="lead text-muted">Voici l'article <?php echo $uniqueArticle->getId(); ?></p>
    <div class=card>
        <h2 class=card-header font-weight-bold><?= htmlspecialchars($uniqueArticle->getTitle());?></h2>
        <p class=card-body>Posté le <span class=font-italic><?= htmlspecialchars($uniqueArticle->getCreationDate());?></span> 
            par <span class=font-italic><?= htmlspecialchars($uniqueArticle->getAuthor());?></span></p>
        <p class= text-center-justify><?= htmlspecialchars($uniqueArticle->getContent());?></p>
        <a href="../public/index.php">Retour à Home Page</a>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require 'defaultView.php' ?>