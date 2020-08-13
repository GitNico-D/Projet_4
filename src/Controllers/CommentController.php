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
        unset($_SESSION['commentSuccess']);
    }

    public function createComment($chapterId)
    {
        unset($_SESSION['commentSuccess']);
        if (!empty($_POST['commentAuthor']) and !empty($_POST['commentContent'])) {
            $newComment = new Comment();
            $newComment->setAuthor(htmlspecialchars($_POST['commentAuthor']));
            $newComment->setContent(htmlspecialchars($_POST['commentContent']));
            $newComment->setCreatedDate(date("Y-m-d H:i:s"));
            $newComment->setChapterId($chapterId);
            $this->commentManager->addComment($newComment);
            $_SESSION['commentSuccess'] = 'Votre commentaire a été ajouté';
            header('Location: /readChapter/' . $chapterId);
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
        header('Location: /adminView#commentModeration');
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
        if ($reportedComment = false) {
            throw new Exception('Impossible de signaler le commentaire');
        } else {
            header('Location: /readChapter/' . $chapterId);
        }
    }

    public function validateComment($commentId)
    {
        $this->commentManager->removeReportFromComment($commentId);
        header('Location: /adminView#commentModeration');
    }
}
