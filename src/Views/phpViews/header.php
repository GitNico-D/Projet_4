<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog en création</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../public/css/style.css">
        <script src="https://kit.fontawesome.com/8b1d8d6405.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <div class="container">
                <div class="navbar navbar-custom">
                    <a href="./index.php" class="navbar-brand text-center text-dark">
                        <strong>JEAN FORTEROCHE</strong>
                        <!-- <img src="./src/data/img/logo-jf-1-resize.png" alt=""> -->
                    </a>
                    <?php if(isset($isAdmin) && $isAdmin === true) { ?>
                        <!-- <span class="text-success">Bienvenue <?php echo($_SESSION["loginsUsername"])?></span> -->
                        <div class="inline">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a href="#publishChapter" class="text-dark navbar-nav-link">Chapitres publiés</a>
                                    <a href="#pendingChapter" class="text-dark navbar-nav-link">Chapitre en attente</a>
                                    <a href="#commentModeration" class="text-dark navbar-nav-link">Modération commentaires</a>
                                </li>
                            </ul>
                        </div>
                        <a href="./index.php?page=getLogout"><button class="btn btn-danger">Déconnexion</button></a>
                    <?php } else { ?>
                        <div class="inline">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a href="#chapter" class="text-dark navbar-nav-link">Accéder aux chapitres</a>
                                    <a href="" class="text-dark navbar-nav-link">A propos</a>
                                    <a href="" class="text-dark navbar-nav-link">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <a href="./index.php?page=getLogin">
                            <button class="btn btn-outline-danger">Connexion</button>
                        </a>
                    <?php } ?>
                </div>
            </div> 
        </header>