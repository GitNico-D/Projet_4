<?php

require_once "./Controllers/Controller.php";
 
class CommentController extends Controller
{
    public function addComment($chapterId)
    {
        var_dump($chapterId);
        if(!empty($_POST['commentAuthor']) && !empty($_POST['commentTitle']))
        {
            $commentAuthor = htmlspecialchars($_POST['commentAuthor']);
            $commentTitle = htmlspecialchars($_POST['commentTitle']);
            $commentContent = htmlspecialchars($_POST['commentContent']);
            $commentAdded = $this->commentManager->addComment($commentAuthor, $commentTitle, $commentContent, $chapterId);
            var_dump($affectedLines);
            if ($commentAdded === false)
            {
                die('Impossible d\'ajouter le commentaire');
            }
            else 
            {
                header('location: index.php');
                echo('Chapitre ajouté');
            }
        }
        else
        {   
            echo 'Veuillez remplir les champs !';
        }
        $this->single($chapterId);
    }
}