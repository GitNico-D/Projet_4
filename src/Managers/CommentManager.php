<?php

namespace App\src\Managers;

use App\src\Core\Manager;
use App\src\Models\Comment;
use App\src\Models\Reporting;

class CommentManager extends Manager
{
    public $table = 'comment';

    /**
     * getCommentByChapterId
     *
     * @param mixed $chapterId
     * @return void
     */
    public function getCommentByChapterId($chapterId)
    {
        $commentList = $this->findBy($this->table, array('chapterId' => $chapterId), array('createdDate' => 'ASC'), 10);
        return $commentList;
    }

    /**
     * addComment
     *
     * @param mixed $commentAuthor
     * @param mixed $commentTitle
     * @param mixed $commentContent
     * @param mixed $chapterId
     * @return void
     */
    public function addComment($commentAuthor, $commentTitle, $commentContent, $chapterId)
    {
        $sqlRequest = 'INSERT INTO comments(author, title, content, createdDate, updatedDate, chapterId) VALUES (:commentAuthor, :commentTitle, :commentContent, NOW(), NOW(), :chapterId)';
        $commentAdded = $this->createQuery($sqlRequest, array(
            'commentAuthor' => $commentAuthor,
            'commentTitle' => $commentTitle,
            'commentContent' => $commentContent,
            'chapterId' => $chapterId
        ));
        return $commentAdded;
    }

    /**
     * deleteCommentById
     *
     * @param mixed $commentId
     * @return void
     */
    public function deleteCommentById($commentId)
    {
        $sqlRequest = 'DELETE FROM comments WHERE id = ?';
        $this->createQuery($sqlRequest, [$commentId]);
    }

    /**
     * totalChapterComments
     *
     * @param mixed $chapterId
     * @return void
     */
    public function totalChapterComments($chapterId)
    {
        $sqlRequest = 'SELECT COUNT(*) as totalComments FROM comments WHERE chapterId = ?';
        $result = $this->createQuery($sqlRequest, [$chapterId]);
        $totalComments = $result->fetch();
        $result->closeCursor();
        return $totalComments['totalComments'];
    }

    /**
     * addReport
     *
     * @param mixed $commentId
     * @return void
     */
    public function addReport($commentId)
    {
        var_dump($commentId);
        $sqlRequest = 'INSERT INTO reporting(reportingDate, commentId) VALUES (NOW(), :commentId)';
        $this->createQuery($sqlRequest, array('commentId' => $commentId));
    }
    
    /**
     * getAllReportedComments
     *
     * @return void
     */
    public function getAllReportedComments()
    {
        $sqlRequest = 'SELECT * FROM comments INNER JOIN reporting ON comments.id = reporting.commentId GROUP BY reporting.commentId';
        $result = $this->createQuery($sqlRequest);
        $reportedCommentList = [];
        foreach ($result as $comment) {
            $reportedCommentList [] = new Comment($comment);
        }
        $result->closeCursor();
        return $reportedCommentList;
    }

    public function distinctReportedCommentsCount()
    {
        $sqlRequest = 'SELECT COUNT(*) AS totalreportedComment FROM comments INNER JOIN reporting ON comments.id = reporting.commentId GROUP BY reporting.commentId';
        $result = $this->createQuery($sqlRequest);
        // var_dump($result);
        $totalReportedComment = [];
        // var_dump($totalReportedComments['totalreportedComment']);
        foreach ($result as $total) {
            $totalReportedComment [] = $total;
        }
        // var_dump($totalReportedComment);
        $result->closeCursor();
        return $totalReportedComment;
    }
}
