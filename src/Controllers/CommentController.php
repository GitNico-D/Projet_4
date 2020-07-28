<?php

namespace App\src\Controllers;

use App\src\Core\Controller;

class CommentController extends Controller
{
    public function createComment($chapterId)
    {
        if(!empty($_POST['commentAuthor']) && !empty($_POST['commentTitle']))
        {
            $commentAuthor = htmlspecialchars($_POST['commentAuthor']);
            $commentTitle = htmlspecialchars($_POST['commentTitle']);
            $commentContent = htmlspecialchars($_POST['commentContent']);
            $commentAdded = $this->commentManager->addComment($commentAuthor, $commentTitle, $commentContent, $chapterId);
            if ($commentAdded === false)
            {
                throw new Exception('Impossible d\'ajouter le commentaire');
            }
            else 
            {
                $alertMessage = 'Votre commentaire à été ajouté !';
                header('location: /', $alertMessage );
            }
        }
        else
        {   
            // echo 'Veuillez remplir les champs !';
        }
        header('location: /readChapter/' . $chapterId);
    }

    public function deleteComment($commentId)
    {
        $this->commentManager->deleteCommentById($commentId);
        header('location: /adminView');
    }

    public function reportComment($chapterId, $commentId) 
    {
        $reportedComment = $this->commentManager->addReport($commentId);
        $this->commentManager->getTotalReports($commentId);
        if ($reportedComment = false)
        {
            throw new Exception('Impossible de signaler le commentaire');
        }
        else
        {
            header('location: /readChapter/' . $chapterId);
        }
    }
}