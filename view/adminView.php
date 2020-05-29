<?php $pageTitle = 'Bienvenue Jean !'; ?>

<?php ob_start() ?>
    <a href="../public/index.php?page=addNewChapter"><button class="btn btn-info">Ajouter un chapitre</button></a>
    <a href="../public/index.php?page=getLogin"><button class="btn btn-success">Connecté</button></a>
<?php $navbarContent = ob_get_clean();?> 

<?php ob_start() ?>
<p class="lead text-muted">Voici la liste des chapitres que vous avez publiés !</p>
<?php foreach($chaptersList as $chapter) :?>
<div class=card>
    <h2 class=card-header><?= htmlspecialchars($chapter->getChapterTitle())?></h2>
    <p class=card-body>Posté le <span class=font-italic><?= htmlspecialchars($chapter->getChapterCreateDate())?></span> 
        par <span class=font-italic><?= htmlspecialchars($chapter->getChapterAuthor())?></span></p>
    <p class= text-center-justify><?= htmlspecialchars($chapter->getChapterContent())?></p>
    <div>
        <a href="../public/index.php?page=single&chapterId=<?= htmlspecialchars($chapter->getChapterId())?>"><button class="btn btn-info">Voir le chapitre</button></a>
        <a href="../public/index.php?page=single&chapterId=<?= htmlspecialchars($chapter->getChapterId())?>"><button class="btn btn-info">Modifier le chapitre</button></a>
        <a href="../public/index.php?page=single&chapterId=<?= htmlspecialchars($chapter->getChapterId())?>"><button class="btn btn-danger">Supprimer le chapitre</button></a>
    </div>
</div>
<?php endforeach; ?>
<?php $content = ob_get_clean(); ?>

<?php require 'defaultView.php'; ?>