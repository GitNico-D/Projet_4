<?php

namespace App\src\Managers;

use App\src\Core\Manager;
use App\src\Models\Comment;
use App\src\Models\Reporting;
use PDOStatement;

class CommentManager extends Manager
{
    
    /**
     * getCommentByChapterId
    *
    * @param mixed $chapterId
    * @return void
    */
    // public function getCommentByChapterId($chapterId)

    /**
     * addComment
    *
    * @param mixed $newComment
    * @return void
    */
    // public function addComment($newComment)

    
    // /**
    //  * deleteCommentById
    //  *
    //  * @param mixed $commentId
    //  * @return void
    //  */
    // public function deleteCommentById($commentId)
    
    public function deleteChapterComments($chapterId)
    {
        // $this->table = 'comment';
        return $this->delete($this->table, array('chapterId' => $chapterId));
    }

    /**
     * addReport
     *
     * @param mixed $commentId
     * @return PDOStatement
     */
    // public function addReport(Reporting $newReporting)
    
    /**
     * totalChapterComments
     *
     * @param mixed $chapterId
     * @return void
     */
    public function totalChapterComments($chapterId)
    {
        $sqlRequest = 'SELECT COUNT(*) as totalComments FROM comment WHERE chapterId = ?';
        $result = $this->createQuery($sqlRequest, [$chapterId]);
        $totalComments = $result->fetch();
        $result->closeCursor();
        return $totalComments['totalComments'];
    }

    // public function allReporting()

    // public function totalReportCount()

    /**
     * getAllReportedComments
     *
     * @return array
     */
    public function getAllReportedComments()
    {
        $sqlRequest = 'SELECT comment.id, comment.author, comment.content, comment.createdDate, comment.chapterId, reporting.reportingDate
                        FROM comment INNER JOIN reporting ON comment.id = reporting.commentId GROUP BY reporting.commentId';
        $result = $this->createQuery($sqlRequest);
        $reportedCommentList = [];
        foreach ($result as $comment) {
            $reportedCommentList [] = new Comment($comment);
        }
        $result->closeCursor();
        return $reportedCommentList;
    }

    // public function removeReportFromComment($commentId)

    // public function distinctReportedCommentsCount()
}
