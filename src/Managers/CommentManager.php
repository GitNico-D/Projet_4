<?php

namespace App\src\Managers;

use App\src\Core\Manager;
use App\src\Models\Comment;
use App\src\Models\Reporting;

class CommentManager extends Manager
{
    public $table = 'comments';
    public $className = 'App\src\Models\Comment';

    public function getCommentByChapterId($chapterId)
    {
        $whereKey = 'chapterId';
        $orderKey = 'createdDate';
        $commentList = $this->findAll($this->table, $whereKey, $chapterId, $orderKey, $this->className);
        return $commentList;
    }

    public function getCommentIdList($chapterId)
    {
        $selectValue = 'id';
        $whereKey = 'chapterId';
        $commentIdList = $this->findBy($selectValue, $this->table, $whereKey, $chapterId);
        return $commentIdList;
    }

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

    public function deleteCommentById($commentId)
    {
        $sqlRequest = 'DELETE FROM comments WHERE id = ?';
        $this->createQuery($sqlRequest, [$commentId]);
    }

    public function totalChapterComments($chapterId)
    {
        $sqlRequest = 'SELECT COUNT(*) as totalComments FROM comments WHERE chapterId = ?';
        $result = $this->createQuery($sqlRequest, [$chapterId]);
        $totalComments = $result->fetch();
        $result->closeCursor();
        return $totalComments['totalComments'];
    }

    public function addReport($commentId)
    {
        var_dump($commentId);
        $sqlRequest = 'INSERT INTO reporting(reportingDate, commentId) VALUES (NOW(), :commentId)';
        $this->createQuery($sqlRequest, array('commentId' => $commentId));
    }

    public function getAllReportedComments()
    {
        $sqlRequest = 'SELECT * FROM comments INNER JOIN reporting ON comments.id = reporting.commentId GROUP BY reporting.commentId';
        $result = $this->createQuery($sqlRequest);
        $reportedCommentList = [];
        foreach ($result as $comment)
        {
            $reportedCommentList [] = new Comment($comment); 
        }
        $result->closeCursor();
        return $reportedCommentList;
    }

    public function getReportComments($commentIdList)
    {
        $reportList = [];
        foreach ($commentIdList as $commentId)
        {
            $sqlRequest = 'SELECT * FROM reporting WHERE commentId = ?';
            $result = $this->createQuery($sqlRequest, [$commentId]);
            foreach ($result as $reporting)
            {
                $reportList [] = new Reporting($reporting); 
            }
            $result->closeCursor();
        }
        return $reportList;   
    }

    public function getCommentsReportsCount($commentIdList)
    {
        $reportList = [];
        foreach ($commentIdList as $commentId)
        {
            $sqlRequest = 'SELECT * FROM reporting WHERE commentId = ?';
            $result = $this->createQuery($sqlRequest, [$commentId]);
            $totalReports = $this->getTotalReports($commentId);
            var_dump("Si commentId = " . $commentId . " alors le nombre de reports = " . $this->getTotalReports($commentId));
        }
        $result->closeCursor();
        return $totalReports;    
    }

    public function getTotalReports($commentId)
    {
        var_dump($commentId);
        $sqlRequest = 'SELECT COUNT(*) AS totalReports FROM reporting WHERE commentId = ?';
        $result = $this->createQuery($sqlRequest, [$commentId]);
        $totalReports = $result->fetch();
        var_dump($totalReports);
        return $totalReports['totalReports'];
    }
}