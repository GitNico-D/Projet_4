<?= $pageTitle = 'Affichage d\'un unique chapter !'?>

<?php ob_start() ?>
    <a href="../public/index.php?page=getLogin"><button class="btn btn-danger">Se connecter</button></a>
<?php $navbarContent = ob_get_clean();?> 

<?php ob_start(); ?>
    <p class="lead text-muted">Voici le chapitre <?php echo $uniqueChapter->getChapterId();?></p>
    <div class=card>
        <h2 class=card-header font-weight-bold><?= htmlspecialchars($uniqueChapter->getChapterTitle());?></h2>
        <p class=card-body>Posté le <span class="font-italic"><?= htmlspecialchars($uniqueChapter->getChapterCreateDate());?></span> 
            par <span class="font-italic"><?= htmlspecialchars($uniqueChapter->getChapterAuthor());?></span></p>
        <p class= text-center-justify><?= htmlspecialchars($uniqueChapter->getChapterContent());?></p>
        <a href="../public/index.php">Retour à Home Page</a>
    </div>
    <hr>
    <div class="container">
        <h4 class="text-center">Commentaire</h4>
        <?php foreach($commentList as $comment) :?>
            <div class="card">
            <p class="card-header">Posté le <span class="font-italic"><?= htmlspecialchars($comment->getCommentCreatedDate());?></span> 
                par <span class="font-italic bold"><?= htmlspecialchars($comment->getCommentAuthor());?></span></p>
            <p class="card-body text-center-justify"><?= htmlspecialchars($comment->getCommentContent());?></p>
            </div>
        <?php endforeach; ?>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require 'defaultView.php'; ?>