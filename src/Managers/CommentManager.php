<?php

namespace App\src\Managers;

use App\src\Models\DAO;
use App\src\Models\Comment;
use App\src\Models\Reporting;

class CommentManager extends DAO
{
    public function getCommentByChapterId($chapterId)
    {
        $sqlRequest = 'SELECT * FROM comments WHERE chapterId = ? ORDER BY createdDate ASC';
        $result = $this->createQuery($sqlRequest, [$chapterId]);
        $commentList = [];
        foreach ($result as $comment)
        {
            $commentList [] = new Comment($comment); 
        }
        $result->closeCursor();
        return $commentList;
    }

    public function getCommentIdList($chapterId)
    {
        $sqlRequest = 'SELECT id FROM comments WHERE chapterId = ?';
        $result = $this->createQuery($sqlRequest, [$chapterId]);
        $commentIdList = [];
        foreach ($result as $comment)
        {
            $commentIdList [] = $comment['id'];
        }
        $result->closeCursor();
        var_dump($commentIdList);
        return $commentIdList;
    }

    public function addCommentOnChapter($commentAuthor, $commentTitle, $commentContent, $chapterId)
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
        var_dump($reportList);
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
        $sqlRequest = 'SELECT COUNT(*) AS totalReports FROM reporting WHERE commentId = ?';
        $result = $this->createQuery($sqlRequest, [$commentId]);
        $totalReports = $result->fetch();
        $result->closeCursor();
        // var_dump($totalReports);
        return $totalReports['totalReports'];
    }
}