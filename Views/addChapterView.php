<?php
    $pageTitle = 'Ajout d\'un nouveau chapitre';
    include_once "./Views/Templates/header.php"; 
?>

<div class="container">
    <form action="index.php?page=addNewChapter" method="post">
        <div class="form-group">
            <label for="chapterAuthor">Auteur du chapitre</label>
            <input type="text" class="form-control" id="chapterAuthor" name="chapterAuthor">
            <label for="chapterTitle">Titre du chapitre</label>
            <input type="text" class="form-control" id="chapterTitle" name="chapterTitle">
            <label for="chapterContent">Contenu du chapitre</label>
            <textarea type="text" class="form-control" id="chapterContent" name="chapterContent" rows="10"></textarea>
            <button type="submit" class="btn btn-primary">Envoyer chapitre</button>
        </div>
    </form>
</div>
<div>
<?php if ($isAdmin) { ?>
    <a href="./index.php?page=adminView">Retour à Home Page</a>
<?php } ?>
</div>

<?php include_once './Views/Templates/Footer.php'; ?>