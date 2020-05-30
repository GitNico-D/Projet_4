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
    <div class="container">
    <?php var_dump($commentList); foreach($commentList as $comment) :?>
        <div class="card">
        <h4 class="card-body">Commentaire</h4>
        <p class=card-body>Posté le <span class=font-italic><?= htmlspecialchars($comment->getCommentCreatedDate());?></span> 
            par <span class=font-italic><?= htmlspecialchars($comment->getCommentAuthor());?></span></p>
        <p class= text-center-justify><?= htmlspecialchars($comment->getCommentContent());?></p>
        <p class= text-center-justify><?= htmlspecialchars($comment->getChapterId());?></p>
        </div>
    </div>
    <?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require 'defaultView.php'; ?>