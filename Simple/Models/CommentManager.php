<?php

require_once "./Models/Comment.php";

require_once "./Models/DAO.php";

class CommentManager extends DAO
{
    public function getCommentByChapterId($chapterId)
    {
        $sqlRequest = 'SELECT * FROM comments WHERE chapterId = ? ORDER BY createdDate ASC';
        var_dump($sqlRequest);
        $result = $this->createQuery($sqlRequest, [$chapterId]);
        $commentList = [];
        foreach ($result as $comment)
        {
            $commentList [] = new Comment($comment); 
        }
        $result->closeCursor();
        return $commentList;
    }


}