<?= $pageTitle = 'Affichage d\'un unique chapter !'?>

<?php ob_start() ?>
    <a href="../public/index.php?page=getLogin"><button class="btn btn-danger">Se connecter</button></a>
<?php $navbarContent = ob_get_clean();?> 

<?php ob_start(); ?>
    <p class="lead text-muted">Voici le chapitre <?php echo $uniqueChapter->getChapterId();?></p>
    <div class=card>
        <h2 class=card-header font-weight-bold><?= htmlspecialchars($uniqueChapter->getChapterTitle());?></h2>
        <p class=card-body>Posté le <span class=font-italic><?= htmlspecialchars($uniqueChapter->getChapterCreateDate());?></span> 
            par <span class=font-italic><?= htmlspecialchars($uniqueChapter->getChapterAuthor());?></span></p>
        <p class= text-center-justify><?= htmlspecialchars($uniqueChapter->getChapterContent());?></p>
        <a href="../public/index.php">Retour à Home Page</a>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require 'defaultView.php'; ?>