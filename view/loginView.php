<h3><?php $pageTitle = 'Page de connection' ?></h3>

<?php ob_start() ?>
    <a href="../public/index.php?page=getLogin"><button class="btn btn-warning">Connection en cours</button></a>
<?php $navbarContent = ob_get_clean();?> 

<?php ob_start(); ?>
<div class="container">
    <form action=<?="index.php?page=getLogin"?> method="post">
        <div class="form-group">
        <label for="email" class="bold">E-mail</label>
        <input type="email" class="form-control " id="loginsEmail" name="loginsEmail">
        <label for="password" class="bold margin-top">Mot de passe</label>
        <input type="password" class="form-control" id="loginsPassword" name="loginsPassword"></input>
        <button type="submit" class="btn btn-primary btn-block margin-top">Se connecter</button>
    </form>
</div>
<a href="../public/index.php"><button class="btn btn-block btn-info">Retour à l'accueil</button></a>
<?php $content = ob_get_clean(); ?>

<?php require 'defaultView.php' ?>