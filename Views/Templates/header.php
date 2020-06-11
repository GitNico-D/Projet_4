<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog en création</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../public/css/style.css">
    </head>
    <body>
        <header>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container ">
                    <a href="#" class="navbar-brand text-center"><strong>HOME PAGE</strong></a>
                    <?php if(isset($isAdmin) && $isAdmin === true) { ?>
                        <a href="./index.php?page=addNewChapter">
                            <button class="btn btn-info">Ajouter un chapitre</button>
                        </a>
                        <span class="text-success">Bienvenue <?php echo($_SESSION["loginsUsername"])?></span>
                        <a href="./index.php?page=getLogout"><button class="btn btn-danger">Déconnexion</button></a>
                    <?php } else { ?>
                        <a href="./index.php?page=getLogin">
                            <button class="btn btn-success">Connexion</button>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </header>
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading"><?= $pageTitle ?></h1>
            </div>
            <div id="content" class="container">