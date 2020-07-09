<?php

namespace App\src\Controllers;

use App\src\Core\Controller;

class CommentController extends Controller
{
    public function createComment($chapterId)
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
                throw new Exception('Impossible d\'ajouter le commentaire');
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
        header('location: ../public/index?page=readChapter&chapterId=' . $chapterId);
    }

    public function deleteComment($commentId)
    {
        $this->commentManager->deleteCommentById($commentId);
        header('location: ../public/index.php?page=adminView');
    }

    public function addReportedComment($chapterId, $commentId) 
    {
        // var_dump($commentId);
        $reportedComment = $this->commentManager->addReport($commentId);
        $totalReports = $this->commentManager->getTotalReports($commentId);
        var_dump($totalReports);
        if ($reportedComment = false)
        {
            throw new Exception('Impossible de signaler le commentaire');
        }
        else
        {
            header('location: ../public/index?page=single&chapterId=' . $chapterId);
        }
    }

    public function allReportedComments()
    {
        $reportedCommentList = $this->commentManager->getAllReportedComments();
    }
}