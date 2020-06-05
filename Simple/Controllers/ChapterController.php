<?php

require_once "./Models/ChapterManager.php";
require_once "./Models/CommentManager.php";

class ChapterController
{
    public function __construct()
    {
        $this->chapterManager = new ChapterManager();
        $this->commentManager = new CommentManager();
    } 

    public function home()
    {
        $chaptersList = $this->chapterManager->getAllChapters();
        require_once './Views/HomeView.php';
    }

    public function single($chapterId)
    {
        $uniqueChapter = $this->chapterManager->getChapterById($chapterId);
        $commentList = $this->commentManager->getCommentByChapterId($chapterId);
        require_once './Views/SingleView.php';
    }    

    public function addNewChapter()
    {
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
        require_once './Views/AddChapterView.php';
    }
} 