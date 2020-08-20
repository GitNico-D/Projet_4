<?php

namespace App\src\Controllers;

use App\src\Core\Controller;
use App\src\Managers\CommentManager;
use App\src\Managers\ReportingManager;
use App\src\Models\Comment;
use App\src\Models\Reporting;

use Exception;

class CommentController extends Controller
{
    public $commentManager;
    public $reportingManager;

    public function __construct()
    {
        parent::__construct();
        $this->commentManager = new CommentManager();
        $this->reportingManager = new ReportingManager();
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
            $this->commentManager->insertInto($newComment);
            $_SESSION['commentSuccess'] = 'Votre commentaire a été ajouté';
            header('Location: /readChapter/' . $chapterId);
        }
        header('Location: /readChapter/' . $chapterId . "#comment");
    }

    /**
     * deleteComment
     *
     * @param mixed $commentId
     * @return void
     */
    public function deleteComment($commentId)
    {
        $deleteComment = $this->commentManager->findOneBy(array('id' => $commentId));
        $this->commentManager->delete($deleteComment);
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
        $reportedComment = $this->reportingManager->insertInto($newReporting);
        // $this->commentManager->addReport($newReporting);
        if ($reportedComment = false) {
            throw new Exception('Impossible de signaler le commentaire');
        } else {
            header('Location: /readChapter/' . $chapterId);
        }
    }

    public function validateComment($commentId)
    {
        $deleteReport = $this->reportingManager->findBy(array('commentId' => $commentId));
        var_dump($deleteReport);
        $this->reportingManager->deleteReport($deleteReport);
        header('Location: /adminView#commentModeration');
    }
}
