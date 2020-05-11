<?php

namespace App\src\DAO;

class CommentsDAO extends DAO
{
    public function getNewsComments($idPost)
    {
        $sqlRequest = 'SELECT * FROM comments WHERE newsId = ? ORDER BY creationDate ASC';
        var_dump($idPost);
        return $this->createQuery($sqlRequest, [$idPost]);
    }


}