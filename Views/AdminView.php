<?php 
    include_once "./Views/Templates/header.php";
?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="display-4"><?php echo 'Bienvenue ' . $_SESSION["loginsUsername"] . ' !'?></h1>
    </div>
</section>

<p class="lead text-muted my-4 text-center">
    Voici les derniers chapitres que vous avez publiés !
</p>

<div class="text-center">
    <a href="./index.php?page=addNewChapter">
        <button class="btn btn-info my-3">Écrire un chapitre</button>
    </a>
</div>

<?php foreach($chaptersList as $chapter) {?>
<div class="container">
    <div class="card my-3 text-center">
        <h2 class="card-header">
            <?= htmlspecialchars($chapter->getTitle())?>
        </h2>
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
                <button class="btn btn-info my-3">Voir le chapitre</button>
            </a>
            <a href="./index.php?page=modifyChapter&chapterId=<?= htmlspecialchars($chapter->getId())?>">
                <button class="btn btn-info my-3">Modifier le chapitre</button>
            </a>
            <a href="./index.php?page=deleteChapter&chapterId=<?= htmlspecialchars($chapter->getId())?>">
                <button class="btn btn-danger my-3">Supprimer le chapitre</button>
            </a>
        </div>
    </div>
</div>
<?php } ?>

<?php 
    include_once './Views/Templates/footer.php'; 
?>