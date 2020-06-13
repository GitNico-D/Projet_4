<?php 
    require_once "./Views/Templates/header.php"; 
?>

<div class="form-signin-position text-center">
    <div class="form-signin">
        <form action=<?="index.php?page=getLogin"?> method="post" class="card">
            <span class="fas fa-sign-in-alt fa-5x fa-signin"></span>
            <h3 class="font-weight-normal">Connectez-vous</h3>
            <label for="email" class="sr-only"></label>
                <input type="email" class="form-control" id="loginsEmail" name="loginsEmail" placeholder="Adresse email">
            <label for="password" class="sr-only"></label>
                <input type="password" class="form-control" id="loginsPassword" name="loginsPassword" placeholder="Mot de passe"></input>
            <button type="submit" class="btn btn-block btn-primary margin-top">Se connecter</button>
            <p class="text-muted">© 2020</p>
        </form>
        <a href="./index.php">
            <!-- <button class="btn btn-block btn-info margin-top mb-3"> -->
            Retour à l'accueil
            <!-- </button> -->
        </a>
    </div>
</div>

<?php require_once './Views/Templates/footer.php' ?>