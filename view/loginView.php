<?php $pageTitle = 'Page de connection adminsitrateur' ?>
<?php ob_start(); ?>
<h3 class="text-center"> Connection </h3>
<div class="container">
    <form action="index.php?page=addArticle" method="post">
        <div class="form-group">
        <label for="username" class="bold">Nom d'utilisateur</label>
        <input type="text" class="form-control " id="username" name="username">
        <label for="password" class="bold margin-top">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password"></input>
        <button type="submit" class="btn btn-primary btn-block margin-top">Se connecter</button>
    </form>
</div>
<a href="../public/index.php"><button class="btn btn-block btn-info">Retour à l'accueil</button></a>
<?php $content = ob_get_clean(); ?>

<?php require 'defaultView.php' ?>