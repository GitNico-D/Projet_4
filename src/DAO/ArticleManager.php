<?php

namespace App\src\DAO;

class ArticleManager extends DAO
{

    public function getUniqueArticle($articleId) //getArticleById
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

    public function addNewArticle(Article $article)
    {
        $sqlRequest = 'INSERT INTO news(title, author, content, creationDate) VALUES (:author, :title, :content, NOW())';
        return $this->createQuery($sqlRequest, [$article->setTitle(), ])
    }
}