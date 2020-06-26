<?php
    include_once "../src/Views/Templates/header.php"; 
?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="display-4"><?php echo 'Modification du chapitre ' . $uniqueChapter->getTitle() . ' !'; ?></h1>
    </div>
</section>

<div class="container">
    <div class="card text-center">
        <p class="card-header">
            Posté le 
            <span class="font-italic bold">
                <?= htmlspecialchars($uniqueChapter->getCreateDate());?>
            </span> 
            par 
            <span class="font-italic bold">
                <?= htmlspecialchars($uniqueChapter->getAuthor());?>
            </span>
        </p>
    </div>
<div class="container text-center">
    <form action="index.php?page=applyChapterModification&chapterId=<?= $uniqueChapter->getId(); ?>" method="post">
        <div class="form-group">
            <label for="chapterTitle" class="h4 bold my-4">Titre du chapitre</label>
            <input type="text" class="form-control" id="chapterTitle" name="chapterTitle" value="<?php echo $uniqueChapter->getTitle(); ?>">
            <label for="chapterContent" class="h4 bold my-4">Contenu du chapitre</label>
            <textarea type="text" class="form-control" id="chapterContent" name="chapterContent" rows="50" ><?php echo $uniqueChapter->getContent(); ?></textarea>
            <button type="submit" name="saveAndPublish" class="btn btn-outline-info my-2">Enregistrer et publier les modifications</button>
            <button type="submit" name="saveDraft" class="btn btn-outline-info my-2">Enregistrer les modifications en brouillon</button>
        </div>
    </form>
</div>
<div class="text-center">
    <?php if ($isAdmin) { ?>
        <a href="../public/index.php?page=adminView"><button class="btn btn-info my-2">Retour à l'accueil</button></a>
    <?php } ?>
</div>

<?php include_once '../src/Views/Templates/Footer.php'; ?>