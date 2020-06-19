<?php 
    include_once "./Views/Templates/header.php";
?>

<section class="header-page text-center">
    <img src="./src/data/img/write.jpg" alt="" class="header-page-img">
    <div class="container jumbotron-container">
        <div class="jumbotron">
            <h1 class="display-4 bold"><?php echo 'Bienvenue ' . $_SESSION["loginsUsername"] . ' !'?></h1>
        </div>
    </div>
</section>

<div class="text-center my-2 margin-top">
    <a href="./index.php?page=addNewChapter">
        <button class="btn btn-lg btn-info">Écrire un chapitre</button>
    </a>
</div>

<div id="publishChapter" class="my-4 bg-success">
    <h2 class="text-center">
        Chapitre publiés
    </h2>
</div>

<?php foreach($publishedChaptersList as $chapter) {?>
<div class="container">
    <div class="card my-3 text-center">
        <h3 class="card-header">
            <?= htmlspecialchars($chapter->getTitle())?>
        </h3>
        <p class="card-body">
            Posté le 
            <span class="font-italic">
                <?= htmlspecialchars($chapter->getCreateDate())?>
            </span> 
        </p>
        <p class="text-center-justify">
            <?= htmlspecialchars(substr($chapter->getContent(), 0, 500)); ?>
        </p>
        <div>
            <a href="./index.php?page=single&chapterId=<?= htmlspecialchars($chapter->getId())?>">
                <button class="btn btn-outline-info my-3">Voir le chapitre</button>
            </a>
            <a href="./index.php?page=modifyChapter&chapterId=<?= htmlspecialchars($chapter->getId())?>">
                <button class="btn btn-outline-info my-3">Modifier le chapitre</button>
            </a>
            <a href="./index.php?page=deleteChapter&chapterId=<?= htmlspecialchars($chapter->getId())?>">
                <button class="btn btn-danger my-3">Supprimer le chapitre</button>
            </a>
        </div>
    </div>
</div>
<?php } ?>

<div id="pendingChapter" class="my-4 bg-warning">
    <h2 class="text-center">
        Chapitre en attente de publication
    </h2>
</div>

<?php foreach($unpublishedChaptersList as $chapter) {?>
    <div class="container">
        <div class="card my-3 text-center">
            <h3 class="card-header">
                <?= htmlspecialchars($chapter->getTitle())?>
            </h3>
            <p class="card-body">
                Posté le 
                <span class="font-italic">
                    <?= htmlspecialchars($chapter->getCreateDate())?>
                </span> 
            </p>
            <p class="text-center-justify">
                <?= htmlspecialchars(substr($chapter->getContent(), 0, 500)); ?>
            </p>
            <div>
                <a href="./index.php?page=modifyChapter&chapterId=<?= htmlspecialchars($chapter->getId())?>">
                    <button class="btn btn-outline-info my-3">Modifier le chapitre</button>
                </a>
                <a href="./index.php?page=publishChapter&chapterId=<?= htmlspecialchars($chapter->getId())?>">
                    <button class="btn btn-success my-3">Publier le chapitre</button>
                </a>
            </div>
        </div>
    </div>
<?php } ?>

<div id="commentModeration" class="my-4 bg-danger">
    <h2 class="text-center">
        Modération des commentaire
    </h2>
</div>

<?php foreach($reportedCommentList as $comment) {?>
    <div class="container">
        <div class="card my-3 text-center">
            <h3 class="card-header font-italic">
                Posté le
                <?= htmlspecialchars($comment->getCreatedDate())?>
                par
                <?= htmlspecialchars($comment->getAuthor())?>
            </h3>
            <p class="card-body text-center-justify">
            <?= htmlspecialchars($comment->getContent()); ?>
            </p>
            <div>
                <a href="./index.php?page=modifyChapter&chapterId=<?= htmlspecialchars($chapter->getId())?>">
                    <button class="btn btn-success my-3">Valider le commentaire</button>
                </a>
                <a href="./index.php?page=publishChapter&chapterId=<?= htmlspecialchars($chapter->getId())?>">
                    <button class="btn btn-danger my-3">Supprimer le commentaire</button>
                </a>
            </div>
        </div>
    </div>
<?php } ?>

<?php 
    include_once './Views/Templates/footer.php'; 
?>