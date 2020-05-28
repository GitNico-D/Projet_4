<?php $pageTitle = 'Bienvenue sur mon Blog !'; ?>
<?php ob_start() ?>
<p class="lead text-muted">Voici tous les chapitres disponibles !</p>
<?php foreach($chaptersList as $chapter) :?>
<div class=card>
    <h2 class=card-header><?= htmlspecialchars($chapter->getChapterTitle())?></h2>
    <p class=card-body>Posté le <span class=font-italic><?= htmlspecialchars($chapter->getChapterCreateDate())?></span> 
        par <span class=font-italic><?= htmlspecialchars($chapter->getChapterAuthor())?></span></p>
    <p class= text-center-justify><?= htmlspecialchars($chapter->getChapterContent())?></p>
    <a href="../public/index.php?page=single&chapterId=<?= htmlspecialchars($chapter->getChapterId())?>">En savoir plus... </a>
</div>
<?php endforeach; ?>
<?php $content = ob_get_clean(); ?>
<?php require 'defaultView.php'; ?>