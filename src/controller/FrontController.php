<?php

namespace App\src\controller;

use App\src\DAO\ArticleManager;
use App\src\model\View;

class FrontController
{
    private $articleManager;
    private $view;

    public function __construct()
    {
        $this->articleManager = new ArticleManager();
        // var_dump($page);
        // $this->view = new View();
    } 

    public function home()
    {
        $articlesList = $this->articleManager->getAllArticles();
        // $this->view = new View('home');
        // var_dump(['articlesList' => $articlesList]);
        // return $this->view->generateView(['articlesList' => $articlesList]);
        require '../view/homeView.php';
    }

    public function single($articleId)
    {
        $uniqueArticle = $this->articleManager->getArticleById($articleId);
        require '../view/singleView.php';
    }    

    public function logIn()
    {
        require '../view/loginView.php';
        // $this->view = new View('login');
        // return $this->view->generateView();
    }
} 