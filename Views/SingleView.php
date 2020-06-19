<?php
    // $pageTitle = 'Chapitre ' . $uniqueChapter->getId() . ' : ' . $uniqueChapter->getTitle();
    include_once "./Views/Templates/header.php"; 
?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="display-4"><?php echo 'Chapitre ' . $uniqueChapter->getId() . ' : ' . $uniqueChapter->getTitle(); ?></h1>
    </div>
</section>

<p class="lead text-muted my-5 text-center">
    <?php echo $uniqueChapter->getTitle();?>
</p>

<div class="text-center">
    <?php
    $chapterNumber = $uniqueChapter->getId();
    if($chapterNumber <= 1) {   
        $chapterNumber++;
        $nextChapter = $chapterNumber;
        ?>
        <a href="./index.php?page=single&chapterId=<?= $nextChapter; ?>"><button class="btn btn-info my-2">Chapitre Suivant</button></a>
    <?php } else {
        $nextChapter = $chapterNumber;
        $nextChapter++;
        $previousChapter = $chapterNumber;
        $previousChapter--;
        ?>
        <a href="./index.php?page=single&chapterId=<?= $previousChapter; ?>" class=""><button class="btn btn-info my-2">Chapitre précédent</button></a>
        <a href="./index.php?page=single&chapterId=<?= $nextChapter; ?>" class=""><button class="btn btn-info my-2">Chapitre Suivant</button></a>
    <?php }; ?>
</div>

<div class="container">
    <div class="card text-center">
        <p class="card-header">
            <?= htmlspecialchars($uniqueChapter->getTitle());?>
            Posté le 
            <span class="font-italic">
                <?= htmlspecialchars($uniqueChapter->getCreateDate());?>
            </span> 
            par 
            <span class="font-italic">
                <?= htmlspecialchars($uniqueChapter->getAuthor());?>
            </span>
        </p>
        <p class="card-body text-center-justify">
            <?= htmlspecialchars($uniqueChapter->getContent());?>
        </p>
    </div>
    <?php if ($isAdmin) { ?>
        <div class="text-center">
            <a href="./index.php?page=adminView"><button class="btn btn-info my-2">Retour à l'accueil</button></a>
        </div>  
    <?php } else { ?>
        <div class="text-center">
            <a href="./index.php"><button class="btn btn-info  my-2">Retour à l'accueil</button></a>
        </div>
    <?php } ?>
    <hr>
    <div class="container text-center">
        <h4 class="text-center">Commentaire</h4>
        <?php foreach($commentList as $comment) { ?>
            <div class="card my-4">
                <p class="card-header">
                    Posté le <span class="font-italic"><?= htmlspecialchars($comment->getCreatedDate());?></span> 
                    par <span class="font-italic bold"><?= htmlspecialchars($comment->getAuthor());?></span>
                </p>
                <p class="card-body my-4">
                    <?= htmlspecialchars($comment->getContent());?>
                </p>
                <div class="reporting-button">
                    <a href="./index.php?page=reportComment&chapterId=<?= htmlspecialchars($uniqueChapter->getId()); ?>&commentId=<?= htmlspecialchars($comment->getId()); ?>">
                        <button class="btn btn-warning custom">Signaler ce commentaire</button>
                    </a>
                </div>
            </div>
        <?php }; ?>
    </div>
</div>
<hr>
<div class="container">
    <div class="card text-center my-4">
    <h3 class="card-header">Ajouter un commentaire</h3>
        <form action="index.php?page=addComment&chapterId=<?= $uniqueChapter->getId();?>" method="post" class="card-body">
            <div class="form-group">
                <label for="commentAuthor" class="bold">Pseudonyme</label>    
                <input type="text" class="form-control" id="commentAuthor" name="commentAuthor"></input>
                <label for="commentTitle" class="bold">Titre</label>
                <input type="text" class="form-control" id="commentTitle" name="commentTitle">
                <label for="commentContent" class="bold">Votre commentaire</label>
                <textarea type="text" class="form-control" id="commentContent" name="commentContent" rows="10"></textarea>
                <button type="submit" name="submit" class="btn btn-primary">Soumettre commentaire</button>
            </div>
        </form>    
    </div>
</div>

<?php include_once "./Views/Templates/footer.php" ?>