<?php 
    $pageTitle = 'Bienvenue ' . $_SESSION["loginsUsername"] . ' !'; 
    include_once "./Views/Templates/header.php";
?>

<p class="lead text-muted my-5">
    Voici les derniers chapitres que vous avez publiés !
</p>

<a href="./index.php?page=addNewChapter">
    <button class="btn btn-info my-3">Écrire un chapitre</button>
</a>

<?php foreach($chaptersList as $chapter) {?>
<div class="card my-3">
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
        <a href="./index.php?page=single&chapterId=<?= htmlspecialchars($chapter->getId())?>">
            <button class="btn btn-info my-3">Modifier le chapitre</button>
        </a>
        <a href="./index.php?page=deleteChapter&chapterId=<?= htmlspecialchars($chapter->getId())?>">
            <button class="btn btn-danger my-3">Supprimer le chapitre</button>
        </a>
    </div>
</div>
<?php } ?>

<?php 
    include_once './Views/Templates/footer.php'; 
?>