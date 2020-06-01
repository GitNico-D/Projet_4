<?php

namespace App\src\DAO;

use App\src\model\Comment;

class CommentManager extends DAO
{
    public function createCommentObject(array $data)
    {
        $comment = new Comment($data); 
        return $comment;
    }

    public function getCommentByChapterId($chapterId)
    {
        $sqlRequest = 'SELECT * FROM comments WHERE chapterId = ? ORDER BY commentCreatedDate ASC';
        var_dump($sqlRequest);
        $result = $this->createQuery($sqlRequest, [$chapterId]);
        $commentList = [];
        foreach ($result as $comment)
        {
            $commentList [] = $this->createCommentObject($comment); 
        }
        $result->closeCursor();
        return $commentList;
    }


}