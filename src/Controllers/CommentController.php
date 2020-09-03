<?php

namespace App\src\Controllers;

use App\src\Core\Controller;
use App\src\Core\FormValidator;
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
        unset($_SESSION['commentError']);
    }

    public function createComment($chapterId)
    {
        if(isset($_POST['submit'])) {
            $errors = FormValidator::checkField($_POST);
            if (!$errors) {
                $newComment = new Comment($_POST);
                $newComment->setCreatedDate(date("Y-m-d H:i:s"));
                $newComment->setChapterId($chapterId);
                $this->commentManager->insertInto($newComment);
                $_SESSION['commentSuccess'] = 'Votre commentaire a été ajouté';
                header('Location: /readChapter/' . $chapterId . "#comment");
            } else {
                $_SESSION['commentError'] .= implode(', ', $errors);
                header('Location: /readChapter/' . $chapterId . "#comment");
            }
        }
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
        if ($reportedComment = false) {
            throw new Exception('Impossible de signaler le commentaire');
        } else {
            header('Location: /readChapter/' . $chapterId . '#comment');
        }
    }

    public function validateComment($commentId)
    {
        $deleteReport = $this->commentManager->findOneBy(array('id' => $commentId));
        $this->reportingManager->deleteFrom($deleteReport);
        header('Location: /adminView#commentModeration');
    }
}
