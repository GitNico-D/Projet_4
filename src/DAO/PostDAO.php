<?php

namespace App\src\DAO;

class PostDAO extends DAO
{
    public function getPost()
    {
        $sqlRequest = 'SELECT * FROM news ORDER BY id ASC';
        var_dump($sqlRequest);
        return $this->createQuery($sqlRequest);
    }

    public function getUniquePost($idPost)
    {
        $sqlRequest = 'SELECT id, title, author, content, creationDate FROM news WHERE id = ?';
        var_dump($sqlRequest);
        return $this->createQuery($sqlRequest, [$idPost]);
    }
}