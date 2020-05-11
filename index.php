<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini Chat</title>
        <link rel="stylesheet" href="./style/style.css">
    </head>
    <body>
        <h1 class="text-center">Bienvenue sur mon blog!</h1>
        <p class="text-center">Les derniers billets disponibles !</p>
        <div class="billet">
             <?php 
                    try {
                        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                    $response = $bdd->query('SELECT id, titre, contenu, date_creation FROM billets ORDER BY date_creation DESC');
                    while ($donnees = $response->fetch()) {
                        echo '<h4 class="billet-title text-center">' . $donnees['titre'] . '<em> ' . $donnees['date_creation'] . '</em>'. '</h4>';
                        echo '<div class="billet-content">' . $donnees['contenu'] . '</div>';
                        ?>
                        <span class="text-center"><a href="commentaires.php?billet=<?php echo $donnees['id']?>">Commentaire</a></span>
                    <?php
                    } 
                    $response->closeCursor();
                ?>      
        </div>
    </body>
</html>