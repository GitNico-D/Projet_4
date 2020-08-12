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
        // return $this->findBy($this->table, array('chapterId' => $chapterId), array('createdDate' => 'ASC'), 10);
        $commentList = [];
        foreach($this->findBy($this->table, array('chapterId' => $chapterId)) as $comment)
        {
            $commentList [] = new Comment($comment);
        }
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
    public function addComment($commentAuthor, $commentTitle, $commentContent, $commentCreatedDate, $chapterId)
    {
        return $this->insertInto(
            $this->table,
            array('author' => $commentAuthor, 'title' => $commentTitle, 'content' => $commentContent, 
                'createdDate' => $commentCreatedDate, 'updatedDate' => $commentCreatedDate,
                'chapterId' => $chapterId)
                );
    }

    /**
     * deleteCommentById
     *
     * @param mixed $commentId
     * @return void
     */
    public function deleteCommentById($commentId)
    {
        // $this->table = 'comment';
        return $this->delete($this->table, array('id' => $commentId));
    }
    
    public function deleteChapterComments($chapterId) 
    {
        // $this->table = 'comment';
        return $this->delete($this->table, array('chapterId' => $chapterId));
    }

    /**
     * addReport
     *
     * @param mixed $commentId
     * @return void
     */
    public function addReport($commentId)
    {
        $this->table = 'reporting';
        $reportingDate = date("d-m-Y H:i:s");
        return $this->insertInto($this->table, array('reportingDate' => $reportingDate, 'commentId' => $commentId));
    }
    
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
    
    /**
     * getAllReportedComments
     *
     * @return void
     */
    public function getAllReportedComments()
    {
        $sqlRequest = 'SELECT * FROM comment INNER JOIN reporting ON comment.id = reporting.commentId GROUP BY reporting.commentId';
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
        $sqlRequest = 'SELECT COUNT(*) AS totalreportedComment FROM comment INNER JOIN reporting ON comment.id = reporting.commentId GROUP BY reporting.commentId';
        $result = $this->createQuery($sqlRequest);
        $totalReportedComment = [];
        foreach ($result as $total) {
            $totalReportedComment [] = $total;
        }
        $result->closeCursor();
        return $totalReportedComment;
    }
}
