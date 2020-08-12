<?php

namespace App\src\Controllers;

use App\src\Core\Controller;
use App\src\Managers\CommentManager;
use App\src\Models\Comment;
use App\src\Models\Reporting;

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
        if (!empty($_POST['commentAuthor']) and !empty($_POST['commentContent'])) {
            $newComment = new Comment();
            $newComment->setAuthor(htmlspecialchars($_POST['commentAuthor']));
            $newComment->setContent(htmlspecialchars($_POST['commentContent']));
            $newComment->setCreatedDate(date("Y-m-d H:i:s"));
            $newComment->setChapterId($chapterId);
            // $commentAdded =
            $this->commentManager->addComment($newComment);
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
        $comment->getId($commentId);
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
        $newReporting = new Reporting();
        $newReporting->setReportingDate(date("Y-m-d H:i:s"));
        $newReporting->setCommentId($commentId);
        $reportedComment = $this->commentManager->addReport($newReporting);
        // $this->commentManager->getTotalReports($commentId);
        if ($reportedComment = false) {
            throw new Exception('Impossible de signaler le commentaire');
        } else {
            header('Location: /readChapter/' . $chapterId);
        }
    }
}
