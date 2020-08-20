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
    // public function getCommentByChapterId($chapterId)
    // {
    //     return $this->findBy($this->table, array('chapterId' => $chapterId));
    // }

    /**
     * addComment
     *
     * @param mixed $newComment
     * @return PDOStatement
     */
    // public function addComment($newComment)
    // {
    //     var_dump($newComment);
    //     return $this->insertInto(
    //         $this->table,
    //         $newComment
            // array('author' => $newComment->getAuthor(), 'content' => $newComment->getContent(),
            //     'createdDate' => $newComment->getCreatedDate(), 'chapterId' => $newComment->getChapterId())
        // );
    // }

    /**
     * deleteCommentById
     *
     * @param Comment $comment
     * @return void
     */
    // public function deleteCommentById($commentId)
    // {
        // $this->table = 'comment';
    //     return $this->delete($this->table, array('id' => $commentId));
    // }
    
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
    // {
    //     $this->table = 'reporting';
    //     return $this->insertInto($this->table, array('reportingDate' => $newReporting->getReportingDate(), 'commentId' => $newReporting->getCommentId()));
    // }
    
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
    // {
    //     $this->table = 'reporting';
    //     $reportingList = [];
    //     foreach($this->findAll($this->table) as $reporting) {
    //         $reportingList [] = new Reporting($reporting);
    //     }
    //     return $reportingList;
    // }

    // public function totalReportCount()
    // {
    //     $sqlRequest = 'SELECT COUNT(*) as totalReport, commentId FROM `reporting` GROUP BY commentId';
    //     $result = $this->createQuery($sqlRequest);
    //     $totalReporting = [];
    //     foreach($result as $data){
    //         $totalReporting [] = $data;
    //     }
    //     $result->closeCursor();
    //     return $totalReporting;
    // }

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
        var_dump($reportedCommentList);
        return $reportedCommentList;
    }

    // public function removeReportFromComment($commentId) 
    // {
    //     $this->table = 'reporting';
    //     var_dump($commentId);
    //     return $this->delete($this->table, array('commentId' => $commentId));
    // }

    // public function distinctReportedCommentsCount()
    // {
    //     $sqlRequest = 'SELECT COUNT(*) AS totalreportedComment FROM comment INNER JOIN reporting ON comment.id = reporting.commentId GROUP BY reporting.commentId';
    //     $result = $this->createQuery($sqlRequest);
    //     $totalReportedComment = [];
    //     foreach ($result as $total) {
    //         $totalReportedComment [] = $total;
    //     }
    //     $result->closeCursor();
    //     return $totalReportedComment;
    // }
}
