<?php

namespace App\src\Managers;

use App\src\Core\Manager;
use App\src\Models\Comment;
use App\src\Models\Reporting;
use PDOStatement;

class CommentManager extends Manager
{
    public $table = 'comment';

    /**
     * getCommentByChapterId
     *
     * @param mixed $chapterId
     * @return array
     */
    public function getCommentByChapterId($chapterId)
    {
        $commentList = [];
        foreach ($this->findBy($this->table, array('chapterId' => $chapterId)) as $comment) {
            $commentList [] = new Comment($comment);
        }
        return $commentList;
    }

    /**
     * addComment
     *
     * @param mixed $newComment
     * @return PDOStatement
     */
    public function addComment(Comment $newComment)
    {
        return $this->insertInto(
            $this->table,
            array('author' => $newComment->getAuthor(), 'content' => $newComment->getContent(),
                'createdDate' => $newComment->getCreatedDate(), 'chapterId' => $newComment->getChapterId())
        );
    }

    /**
     * deleteCommentById
     *
     * @param Comment $comment
     * @return void
     */
    public function deleteCommentById(Comment $comment)
    {
        // $this->table = 'comment';
        return $this->delete($this->table, array('id' => $comment->getId()));
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
     * @return PDOStatement
     */
    public function addReport(Reporting $newReporting)
    {
        $this->table = 'reporting';
        return $this->insertInto($this->table, array('reportingDate' => $newReporting->getReportingDate(), 'commentId' => $newReporting->getCommentId()));
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

    public function allReporting()
    {
        $this->table = 'reporting';
        $reportingList = [];
        foreach($this->findAll($this->table) as $reporting) {
            $reportingList [] = new Reporting($reporting);
        }
        return $reportingList;
    }

    public function totalReportCount()
    {
        $sqlRequest = 'SELECT COUNT(*) as totalReport, commentId FROM `reporting` GROUP BY commentId';
        $result = $this->createQuery($sqlRequest);
        $totalReporting = [];
        foreach($result as $data){
            $totalReporting [] = $data;
        }
        $result->closeCursor();
        var_dump($totalReporting);
        return $totalReporting;
    }

    /**
     * getAllReportedComments
     *
     * @return array
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
