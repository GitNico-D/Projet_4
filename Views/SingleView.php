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
    <?php if ($isAdmin) { ?>
        <a href="./index.php?page=adminView">Retour à Home Page</a>
    <?php } else { ?>
        <a href="./index.php">Retour à Home Page</a>
    <?php } ?>
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
            <button class="btn btn-warning">Signaler ce commentaire</button>
        </div>
    <?php }; ?>
</div>
<hr>
<div class="container">
    <div class="card">
    <h3 class="card-header">Ajouter un commentaire</h3>
        <form action="index.php?page=addComment&chapterId=<?= $uniqueChapter->getId();?>" method="post" class="card-body">
            <div class="form-group">
                <label for="commentAuthor" class="bold">Pseudonyme</label>    
                <input type="text" class="form-control" id="commentAuthor" name="commentAuthor"></input>
                <label for="commentTitle" class="bold">Titre</label>
                <input type="text" class="form-control" id="commentTitle" name="commentTitle">
                <label for="commentContent" class="bold">Votre commentaire</label>
                <textarea type="text" class="form-control" id="commentContent" name="commentContent" rows="10"></textarea>
                <button type="submit" class="btn btn-primary">Soumettre commentaire</button>
            </div>
        </form>    
    </div>
</div>

<?php include_once "./Views/Templates/footer.php" ?>