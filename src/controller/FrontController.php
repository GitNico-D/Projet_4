<?php

namespace App\src\controller;

use App\src\DAO\ChapterManager;
use App\src\model\View;

class FrontController
{
    private $chapterManager;
    private $view;

    public function __construct()
    {
        $this->chapterManager = new ChapterManager();
        // var_dump($page);
        // $this->view = new View();
    } 

    public function home()
    {
        $chaptersList = $this->chapterManager->getAllChapters();
        // $this->view = new View('home');
        // var_dump(['chaptersList' => $chaptersList]);
        // return $this->view->generateView(['chaptersList' => $chaptersList]);
        require '../view/homeView.php';
    }

    public function single($chapterId)
    {
        $uniqueChapter = $this->chapterManager->getChapterById($chapterId);
        require '../view/singleView.php';
    }    

    public function logIn()
    {
        require '../view/loginView.php';
        // $this->view = new View('login');
        // return $this->view->generateView();
    }
} 