<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog en création</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../public/style.css">
    </head>
    <body>
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container ">
                <a href="#" class="navbar-brand text-center">
                    <strong>GESTION PAGE</strong>
                </a>
                </button>
            </div>
        </div>
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Gestion des chapitres !</h1>
            </div>
            <p class="lead text-muted">Cette page permet d'écrire et d'ajouter un nouvel chapitre.</p>
                <h3> Formulaire d'ajout d'un chapitre !</h3>
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
                <div><a href="../public/index.php">Retour à Home Page</a></div>
        </section>
    </body>
</html>
<!-- <?= $pageTitle = 'Ajout d\'un nouveau chapitre !'?>
<?php ob_start(); ?>
    <form action="index.php?page=addChapter" method="post">
            <div class="form-group">
            <label for="chapterAuthor">Auteur du chapitre</label>
            <input type="text" class="form-control" id="chapterAuthor" name="chapterAuthor">
            <label for="chapterTitle">Titre du chapitre</label>
            <input type="text" class="form-control" id="chapterTitle" name="chapterTitle">
            <label for="chapterContent">Contenu du chapitre</label>
            <textarea type="text" class="form-control" id="chapterContent" name="chapterContent" rows="10"></textarea>
            <input type="text" name="id" value="<?= $chapter->getChapterId();?>"/>
            <button type="submit" class="btn btn-primary">Envoyer chapitre</button>
            </div>
        </form>
        <div><a href="../public/index.php">Retour à Home Page</a></div>
<?php $content = ob_get_clean(); ?>

<?php require 'defaultView.php'; ?> -->