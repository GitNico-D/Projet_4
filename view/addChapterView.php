<?php $pageTitle = 'Ajout d\'un nouveau chapitre !'?>

<?php ob_start() ?>
    <a href="../public/index.php?page=getLogin"><button class="btn btn-danger">Se connecter</button></a>
<?php $navbarContent = ob_get_clean();?>    

<?php ob_start(); ?>
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
        <div><a href="../public/index.php">Retour à Home Page</a></div>
<?php $content = ob_get_clean(); ?>

<?php require 'defaultView.php'; ?>