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
        var_dump($chapterId);
        $sqlRequest = 'SELECT * FROM comments WHERE ? ORDER BY commentCreatedDate ASC';
        var_dump($sqlRequest);
        $result = $this->createQuery($sqlRequest, [$chapterId]);
        var_dump($result);
        $commentList = [];
        foreach ($result as $comment)
        {
            $commentList [] = $this->createCommentObject($comment); 
        }
        $result->closeCursor();
        // var_dump($commentList);
        return $commentList;
    }


}