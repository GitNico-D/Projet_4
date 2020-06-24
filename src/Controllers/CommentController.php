<?php

namespace App\src\Controllers;

use App\src\Core\Controller;

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

    public function addReportedComment($commentId) 
    {
        var_dump($commentId);
        $reportedComment = $this->commentManager->addReport($commentId);
        var_dump($reportedComment);
        if ($reportedComment = false)
        {
            die('Impossible de signaler le commentaire');
        }
        else
        {
            return $reportedComment;
        }
    }

    public function allReportedComments()
    {
        var_dump($reportedCommentList);
        $reportedCommentList = $this->commentManager->getAllReportedComments();
        require_once "./Views/AdminView.php";
    }
}