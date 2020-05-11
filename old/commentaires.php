<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini Chat</title>
        <link rel="stylesheet" href="./style/style.css">
    </head>
    <body>
        <h1 class="text-center">Commentaire billet <?php echo $_GET['billet']?> !</h1>
        <div class="billet">
             <?php 
                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
                $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
                $req->execute(array($_GET['billet']));
                $donnees = $req->fetch();
                    echo '<h4 class="billet-title text-center">' . $donnees['titre'] . '<em> ' . $donnees['date_creation_fr'] . '</em>'. '</h4>';
                    echo '<div class="billet-content">' . $donnees['contenu'] . '</div>';
            ?>
            <h3>Commentaires</h3>
            <?php        
                $req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
                $req->execute(array($_GET['billet']));
                while ($donnees = $req->fetch()) {
                    echo '<p><strong> ' . $donnees['auteur'] . '</strong> le  <em> ' . $donnees['date_commentaire_fr'] . '</p>';
                    echo '<p>' . $donnees['commentaire'] . '</p>';
                }
            ?> 
        </div>
    </body>
</html>