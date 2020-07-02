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
            $commentListId [] = $comment['id'];
        }
        $this->getTotalReportsComments($commentListId);
        $result->closeCursor();
        return $commentList;
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

    public function getTotalReportsComments($commentListId)
    {
        foreach ($commentListId as $commentId)
        {
            $sqlRequest = 'SELECT COUNT(*) FROM reporting WHERE commentId = ?';
            $result = $this->createQuery($sqlRequest, [$commentId]);
            $totalReports = $result->fetch();
            var_dump($totalReports);
        }
        $result->closeCursor();
        return $totalReports;
    }
}