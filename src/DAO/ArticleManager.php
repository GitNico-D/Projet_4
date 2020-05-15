<?php

namespace App\src\DAO;

class ArticleManager extends DAO
{

    public function getArticleById($articleId) //getArticleById
    {
        $sqlRequest = 'SELECT * FROM news WHERE id = ?';
        var_dump($articleId);
        return $this->createQuery($sqlRequest, [$articleId]);
    }

    public function getAllArticles()
    {
        $sqlRequest = 'SELECT * FROM news ORDER BY creationDate ASC';
        return $this->createQuery($sqlRequest);
    }

    public function addNewArticle($articleTitle, $articleContent)
    {
        $sqlRequest = 'INSERT INTO news(title, content, creationDate) VALUES (:title, :content, NOW())';
        return $this->createQuery($sqlRequest, [$articleTitle, $articleContent]);
    }
}