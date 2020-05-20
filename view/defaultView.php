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
                    <a href="../public/index.php?page=getLogin"><button class="btn btn-info">Se Connecter</button></a>
                </div>
            </div>
        </header>
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading"><?= $pageTitle ?></h1>
            </div>
            <div id="content" class="container">
                <?= $content ?>
        </section>
    </body>
</html>