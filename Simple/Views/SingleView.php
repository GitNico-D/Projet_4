<?php
    $pageTitle = 'Affichage d\'un unique chapter !';
    include_once "./Views/Templates/header.php"; 
?>

<p class="lead text-muted">
    Voici le chapitre <?php echo $uniqueChapter->getId();?>
</p>

<div class=card>
    <h2 class=card-header>
        <?= htmlspecialchars($uniqueChapter->getTitle());?>
    </h2>
    <p class=card-body>
        Posté le 
        <span class=font-italic>
            <?= htmlspecialchars($uniqueChapter->getCreateDate());?>
        </span> 
        par 
        <span class=font-italic>
            <?= htmlspecialchars($uniqueChapter->getAuthor());?>
        </span>
    </p>
    <p class= text-center-justify>
        <?= htmlspecialchars($uniqueChapter->getContent());?>
    </p>
    <a href="./index.php">Retour à Home Page</a>
</div>
<hr>
<div class="container">
    <h4 class="text-center">Commentaire</h4>
    <?php foreach($commentList as $comment) { ?>
        <div class="card">
            <p class="card-header">
                Posté le <span class="font-italic"><?= htmlspecialchars($comment->getCreatedDate());?></span> 
                par <span class="font-italic bold"><?= htmlspecialchars($comment->getAuthor());?></span>
            </p>
            <p class="card-body text-center-justify">
                <?= htmlspecialchars($comment->getContent());?>
            </p>
        </div>
    <?php }; ?>
</div>

<?php include_once "./Views/Templates/footer.php" ?>