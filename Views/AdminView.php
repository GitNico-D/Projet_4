<?php 
    $pageTitle = 'Bienvenue Jean !'; 
    include_once "./Views/Templates/header.php";
?>

<p class="lead text-muted">
    Voici la liste des chapitres que vous avez publiés !
</p>

<?php foreach($chaptersList as $chapter) {?>
<div class=card>
    <h2 class=card-header>
        <?= htmlspecialchars($chapter->getTitle())?>
    </h2>
    <p class=card-body>
        Posté le 
        <span class=font-italic>
            <?= htmlspecialchars($chapter->getCreateDate())?>
        </span> 
        par 
        <span class=font-italic>
            <?= htmlspecialchars($chapter->getAuthor())?>
        </span>
    </p>
    <p class= text-center-justify>
        <?= htmlspecialchars($chapter->getContent())?>
    </p>
    <div>
        <a href="./index.php?page=single&chapterId=<?= htmlspecialchars($chapter->getId())?>">
            <button class="btn btn-info">Voir le chapitre</button>
        </a>
        <a href="./index.php?page=single&chapterId=<?= htmlspecialchars($chapter->getId())?>">
            <button class="btn btn-info">Modifier le chapitre</button>
        </a>
        <a href="./index.php?page=deleteChapter&chapterId=<?= htmlspecialchars($chapter->getId())?>">
            <button class="btn btn-danger">Supprimer le chapitre</button>
        </a>
    </div>
</div>
<?php } ?>

<?php 
    include_once './Views/Templates/footer.php'; 
?>