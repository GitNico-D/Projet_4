<?php 
    $pageTitle = 'Page de connection';
    require_once "./Views/Templates/header.php"; 
?>

<div class="container">
    <form action=<?="index.php?page=getLogin"?> method="post">
        <div class="form-group">
        <label for="email" class="bold">E-mail</label>
        <input type="email" class="form-control" id="loginsEmail" name="loginsEmail">
        <label for="password" class="bold margin-top">Mot de passe</label>
        <input type="password" class="form-control" id="loginsPassword" name="loginsPassword"></input>
        <button type="submit" class="btn btn-primary btn-block margin-top">Se connecter</button>
    </form>
</div>
<a href="./index.php?page=adminView">
    <button class="btn btn-block btn-info">
    Retour à l'accueil
    </button>
</a>

<?php require_once './Views/Templates/footer.php' ?>