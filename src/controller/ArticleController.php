<?php

namespace App\src\controller;
use App\src\DAO\ArticleManager;

class ArticleController
{
    private $articleManager;

    public function __construct()
    {
        $this->articleManager = new ArticleManager();
    } 

    public function home()
    {
        $allArticles = $this->articleManager->getAllArticles();
        require '../view/homearticle.php';
    }

    public function single($articleId)
    {
        $uniqueArticle = $this->articleManager->getArticleById($articleId);
        require '../view/singlearticle.php';
    }

    public function addArticle()
    {
        require '../view/addArticle.php';
        if(isset($_POST['submit']))
        {
            var_dump ($_POST['articleTitle']);
            // $articleManager->
        }
        // $articleManager = new ArticleManager();
        // var_dump($_POST['articleTitle']);
        // $articleTitle = $_POST['articleTitle'];
        // $articleContent = $_POST['articleContent'];
        // $this->articleManager->addNewArticle($articleTitle, $articleContent);
    }

} 