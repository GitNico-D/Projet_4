<?php

require_once "./Models/Comment.php";

require_once "./Models/DAO.php";

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
        $sqlRequest = 'UPDATE comments SET report = true WHERE id = ?';
        $result = $this->createQuery($sqlRequest, [$commentId]);
        $reportComment = $result->fetch();
        $result->closeCursor();
        return new Comment($reportedComment);
    }

    public function getAllReportedComments()
    {
        $sqlRequest = 'SELECT * FROM comments WHERE report = true';
        $result = $this->createQuery($sqlRequest);
        $reportedCommentList = [];
        foreach ($result as $comment)
        {
            $reportedCommentList [] = new Comment($comment); 
        }
        $result->closeCursor();
        return $reportedCommentList;
    }

}