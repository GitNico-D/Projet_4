<?php
?>
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
                <h1 class="jumbotron-heading">Gestion des chapters !</h1>
            </div>
            <p class="lead text-muted">Cette page permet d'écrire et d'ajouter un nouvel chapter.</p>
                <h3> Formulaire d'ajout d'un chapter !</h3>
                <form action="index.php?page=addchapter" method="post">
                    <div class="form-group">
                    <label for="title">Titre de l'chapter</label>
                    <input type="text" class="form-control" id="Title" name="Title">
                    <label for="content">Contenu de l'chapter</label>
                    <textarea type="text" class="form-control" id="Content" name="Content" rows="10"></textarea>
                    <button type="submit" class="btn btn-primary">Envoyer chapter</button>
                </form>
                <div><a href="../public/index.php">Retour à Home Page</a></div>
        </section>
    </body>
</html>