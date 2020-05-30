<?php

namespace App\src\controller;

use App\src\DAO\ChapterManager;
use App\src\DAO\CommentManager;
use App\src\model\View;

class ChapterController
{
    private $chapterManager;
    private $loginsManager;
    private $commentController;
    // private $view;

    public function __construct()
    {
        $this->chapterManager = new ChapterManager();
        $this->commentManager = new CommentManager();
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
        $commentList = $this->commentManager->getCommentByChapterId($chapterId);
        require_once '../view/singleView.php';
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
} 