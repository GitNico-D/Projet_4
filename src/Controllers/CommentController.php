<?php

namespace App\src\Controllers;

use App\src\Core\Controller;
use App\src\Managers\CommentManager;

use Exception;

class CommentController extends Controller
{
    public $commentManager;

    public function __construct()
    {
        parent::__construct();
        $this->commentManager = new CommentManager();
    }

    public function createComment($chapterId)
    {
        if (!empty($_POST['commentAuthor']) && !empty($_POST['commentTitle'] && !empty($_POST['commentContent']))) {
            $commentAuthor = htmlspecialchars($_POST['commentAuthor']);
            $commentTitle = htmlspecialchars($_POST['commentTitle']);
            $commentContent = htmlspecialchars($_POST['commentContent']);
            $commentCreatedDate = date("d-m-Y H:i:s");
            var_dump($commentCreatedDate);
            $commentAdded = $this->commentManager->addComment($commentAuthor, $commentTitle, $commentContent, $commentCreatedDate, $chapterId);
            if ($commentAdded === false) {
                throw new Exception('Impossible d\'ajouter le commentaire');
            } else {
                $alertMessage = 'Votre commentaire à été ajouté !';
                header('Location: /readChapter/' . $chapterId);
            }
        }
        header('Location: /readChapter/' . $chapterId);
    }

    /**
     * deleteComment
     *
     * @param mixed $commentId
     * @return void
     */
    public function deleteComment($commentId)
    {
        $this->commentManager->deleteCommentById($commentId);
        header('Location: /adminView');
    }

    /**
     * reportComment
     *
     * @param mixed $chapterId
     * @param mixed $commentId
     * @return void
     * @throws Exception
     */
    public function reportComment($chapterId, $commentId)
    {
        $reportedComment = $this->commentManager->addReport($commentId);
        // $this->commentManager->getTotalReports($commentId);
        if ($reportedComment = false) {
            throw new Exception('Impossible de signaler le commentaire');
        } else {
            header('Location: /readChapter/' . $chapterId);
        }
    }
}
