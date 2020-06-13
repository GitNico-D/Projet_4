<?php
    include_once "./Views/Templates/header.php"; 
?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="display-4">Bienvenue sur mon site</h1>
    </div>
</section>

<p class="lead text-center text-muted my-4">
    Voici tous les chapitres disponibles !
</p>

<?php foreach($chaptersList as $chapter) { ?>
<div class="container">
    <div class="card my-4 text-center">
        <h2 class="card-header">
            <?= htmlspecialchars($chapter->getTitle())?>
        </h2>
        <p class="card-body">
            Posté le 
            <span class="font-italic">
                <?= htmlspecialchars($chapter->getCreateDate())?>
            </span> 
            par 
            <span class="font-italic">
                <?= htmlspecialchars($chapter->getAuthor())?>
            </span>
        </p>
        <p class="text-center-justify"><?= htmlspecialchars($chapter->getContent())?></p>
        <a href="./index.php?page=single&chapterId=<?= htmlspecialchars($chapter->getId())?>">
            <button class="btn btn-info my-3">
                Lire le chapitre
            </button>
        </a>
    </div>
</div>
<?php } ?>

<?php include_once "./Views/Templates/footer.php" ?>