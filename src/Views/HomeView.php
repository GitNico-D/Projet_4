<?php
    include_once "../src/Views/Templates/header.php"; 
?>

<section class="header-page text-center">
    <img src="../public/data/img/alaska-3.jpg" alt="" class="header-page-img">
    <div class="container jumbotron-container">
        <div class="jumbotron">
            <h1 class="display-4 bold">Bienvenue cher visiteur</h1>
        </div>
    </div>
</section>

<p class="lead text-center text-muted my-4">
    Voici tous les chapitres disponibles !
</p>

<?php foreach($publishedChaptersList as $chapter) { ?>
<div id="chapter" class="container">
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
        <p class="text-center-justify">
            <?= htmlspecialchars($chapter->getContent())?>
        </p>
        <a href="../public/index.php?page=single&chapterId=<?= htmlspecialchars($chapter->getId())?>">
            <button class="btn btn-info my-3">
                Lire le chapitre
            </button>
        </a>
    </div>
</div>
<?php } ?>

<?php include_once "../src/Views/Templates/footer.php" ?>