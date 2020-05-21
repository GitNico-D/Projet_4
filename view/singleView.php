<?= $pageTitle = 'Affichage d\'un unique chapter !'?>
<?php ob_start(); ?>
    <p class="lead text-muted">Voici le chapitre <?php echo $uniqueChapter->getId();?></p>
    <div class=card>
        <h2 class=card-header font-weight-bold><?= htmlspecialchars($uniqueChapter->getTitle());?></h2>
        <p class=card-body>Posté le <span class=font-italic><?= htmlspecialchars($uniqueChapter->getCreateDate());?></span> 
            par <span class=font-italic><?= htmlspecialchars($uniqueChapter->getAuthor());?></span></p>
        <p class= text-center-justify><?= htmlspecialchars($uniqueChapter->getContent());?></p>
        <a href="../public/index.php">Retour à Home Page</a>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require 'defaultView.php' ?>