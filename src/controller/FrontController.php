<?php

namespace App\src\controller;

use App\src\DAO\ChapterManager;
use App\src\DAO\UserManager;
use App\src\model\View;

class FrontController
{
    private $chapterManager;
    private $userManager;
    private $view;

    public function __construct()
    {
        $this->chapterManager = new ChapterManager();
        $this->userManager = new UserManager();
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

    public function addChapter($post)
    {
        require '../view/addChapterView.php';
        echo ('Page addChapterView');
        $newChapterAuthor = $_POST['chapterAuthor']; 
        $newChapterTitle = $_POST['chapterTitle'];
        $newChapterContent = $_POST['chapterContent'];
        $newChapterId = $_POST['chapterId'];
        // $newChapterTitle = 'Mon sixième chapitre ajouté';
        // $newChapterAuthor = 'Admin';
        // $newChapterContent = 'Je vous souhaite une bonne lecture de ce chapitre';
        var_dump($newChapterTitle);
        var_dump($newChapterContent);
        var_dump($newChapterAuthor);
        var_dump($newChapterId);
        if(isset($_POST['submit']))
        {

            // $this->chapterManager->addNewChapter($newChapterTitle, $newChapterContent, $newChapterAuthor);
            $this->chapterManager->addNewChapter($newChapterAuthor, $newChapterTitle, $newChapterContent, $newChapterId);

            $this->chapterManager->getChapterById($newChapterId);
        }
        else
        {
            echo 'Erreur';
        }
    }

    public function getLogin()
    {
        require '../view/loginView.php';
        $userEmailList = $this->userManager->userEmailVerification();
        var_dump($userEmailList);
        if (isset($_POST['submit']))
        {
            $userEmail = $_POST['userEmail'];
            $userPassword = $_POST['userPassword'];
            var_dump($userEmail);
            var_dump($userPassword);
        }
        // $this->view = new View('login');
        // return $this->view->generateView();
    }
} 