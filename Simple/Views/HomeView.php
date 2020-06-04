<?php
    $pageTitle = 'Bienvenue sur mon Blog !';
    include_once "./Views/Templates/header.php"; 
?>

<p class="lead text-muted">
    Voici tous les chapitres disponibles !
</p>

<?php foreach($chaptersList as $chapter) { ?>
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
            <span class=font-italic
                ><?= htmlspecialchars($chapter->getAuthor())?>
            </span>
        </p>
        <p class= text-center-justify><?= htmlspecialchars($chapter->getContent())?></p>
        <a href="./index.php?page=single&chapterId=<?= htmlspecialchars($chapter->getId())?>">
            <button class="btn btn-info">
                Lire le chapitre
            </button>
        </a>
    </div>
<?php } ?>

<?php include_once "./Views/Templates/footer.php" ?>