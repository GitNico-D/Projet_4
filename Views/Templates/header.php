<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog en création</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="./src/css/style.css">
        <script src="https://kit.fontawesome.com/8b1d8d6405.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container ">
                    <a href="#" class="navbar-brand text-center"><strong>HOME PAGE</strong></a>
                    <?php if(isset($isAdmin) && $isAdmin === true) { ?>
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