<?php $pageTitle = 'Bienvenue sur mon Blog !'; ?>
<?php ob_start() ?>
<p class="lead text-muted">Voici tous les articles disponibles !</p>
<?php foreach($articlesList as $article) : ?>
<div class=card>
    <h2 class=card-header><?= htmlspecialchars($article->getTitle())?></h2>
    <p class=card-body>Posté le <span class=font-italic><?= htmlspecialchars($article->getCreationDate())?></span> 
        par <span class=font-italic><?= htmlspecialchars($article->getAuthor())?></span></p>
    <p class= text-center-justify><?= htmlspecialchars($article->getContent())?></p>
    <a href="../public/index.php?page=single&articleId=<?= htmlspecialchars($article->getId())?>">En savoir plus... </a>
</div>
<?php endforeach; ?>
<?php $content = ob_get_clean(); ?>

<?php require 'defaultView.php'; ?>