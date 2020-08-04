<?php

namespace App\src\Controllers;

use App\src\Core\Controller;
use App\src\Managers\CommentManager;

use Exception;

class CommentController extends Controller
{
    public $commentManager; 

    // public function __construct()
    // {
    //     $this->commentManager = new CommentManager();
    // }

    public function createComment($chapterId)
    {
        $this->commentManager = new CommentManager();
        if (!empty($_POST['commentAuthor']) && !empty($_POST['commentTitle'] && !empty($_POST['commentContent']))) {
            $commentAuthor = htmlspecialchars($_POST['commentAuthor']);
            $commentTitle = htmlspecialchars($_POST['commentTitle']);
            $commentContent = htmlspecialchars($_POST['commentContent']);
            $commentAdded = $this->commentManager->addComment($commentAuthor, $commentTitle, $commentContent, $chapterId);
            if ($commentAdded === false) {
                throw new Exception('Impossible d\'ajouter le commentaire');
            } else {
                $alertMessage = 'Votre commentaire à été ajouté !';
                header('Location: /readChapter/' . $chapterId, $alertMessage);
            }
        } else {
            // echo 'Veuillez remplir les champs !';
        }
        header('Location: /readChapter/' . $chapterId);
    }

    public function deleteComment($commentId)
    {
        $this->commentManager = new CommentManager();
        $this->commentManager->deleteCommentById($commentId);
        header('Location: /adminView');
    }

    public function reportComment($chapterId, $commentId)
    {
        $this->commentManager = new CommentManager();
        $reportedComment = $this->commentManager->addReport($commentId);
        // $this->commentManager->getTotalReports($commentId);
        if ($reportedComment = false) {
            throw new Exception('Impossible de signaler le commentaire');
        } else {
            header('Location: /readChapter/' . $chapterId);
        }
    }
}
