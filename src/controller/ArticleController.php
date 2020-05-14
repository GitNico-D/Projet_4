<?php

class ArticleControlleur
{
    private $articleManager;

    public function home()
    {
        $this->$articleManager->getAllArticles()
    }

    public function addArticle()
    {
        $articleManager = new ArticleManager();
        $articleTitle = $_POST['articleTitle'];
        $articleContent = $_POST['articleContent'];
        $article->addNewArticle($articleTitle, $articleContent);
    }

}