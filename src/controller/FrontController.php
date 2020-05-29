<?php

namespace App\src\controller;

use App\src\DAO\ChapterManager;
use App\src\DAO\LoginsManager;
use App\src\model\View;

class FrontController
{
    private $chapterManager;
    private $loginsManager;
    private $view;

    public function __construct()
    {
        $this->chapterManager = new ChapterManager();
        $this->loginsManager = new LoginsManager();
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

    public function addNewChapter()
    {;
        echo ('Page addChapterView');
        if(!empty($_POST['chapterAuthor']) && !empty($_POST['chapterTitle']))
        {
            $newChapterAuthor = $_POST['chapterAuthor'];
            $newChapterTitle = $_POST['chapterTitle'];
            $newChapterContent = $_POST['chapterContent'];
            $affectedLines = $this->chapterManager->addChapterInDb($newChapterAuthor, $newChapterTitle, $newChapterContent);
            var_dump($affectedLines);
            if ($affectedLines === false)
            {
                die('Impossible d\'ajouter le chapitre');
            }
            else 
            {
                header('location: index.php');
                echo('Chapitre ajouté');
            }
        }
        else
        {   
            echo 'Veuillez remplir les champs !';
        }
        require '../view/addChapterView.php';
    }

    public function getLogin()
    {
        if(!empty($_POST['loginsEmail']) && !empty($_POST['loginsPassword']))
        {
            $loginsEmailList = $this->loginsManager->loginsVerification();
            foreach($loginsEmailList as $loginsData)
            {
                var_dump($loginsData);
                var_dump($loginsData->getLoginsEmail());
                var_dump($loginsData->getLoginsPassword());
                if(($loginsData->getLoginsEmail() === $_POST['loginsEmail']) && ($loginsData->getLoginsPassword() === $_POST['loginsPassword']))
                {
                    echo('Email et Password Correct');
                    $chaptersList = $this->chapterManager->getAllChapters();
                    // header('location: index.php?page=homeView.php');
                    require_once '../view/adminView.php';
                }
                else
                {
                    echo('Email ou Password invalide');
                }    
            }
        }
        else
        {   
            echo 'Veuillez remplir les champs !';
            require '../view/loginView.php';
        }
        // $this->view = new View('login');
        // return $this->view->generateView();
    }
} 