<?php

require_once "./Controllers/Controller.php";

class ChapterController extends Controller
{
    /**
     * home
     *
     * @return void
     */
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

    /**
     * addNewChapter
     *
     * @return void
     */
    public function addNewChapter()
    {
        echo ('Page addChapterView');
        if(!empty($_POST['chapterAuthor']) && !empty($_POST['chapterTitle']))
        {
            $newChapterAuthor = htmlspecialchars($_POST['chapterAuthor']);
            $newChapterTitle = htmlspecialchars($_POST['chapterTitle']);
            $newChapterContent = htmlspecialchars($_POST['chapterContent']);
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

    /**
     * deleteChapter
     *
     * @param mixed $chapterId
     * @return void
     */
    public function deleteChapter($chapterId)
    {
        $this->chapterManager->deleteChapterById($chapterId);
        $this->home();
    }

    public function addComment($chapterId)
    {
        var_dump($chapterId);
        if(!empty($_POST['commentAuthor']) && !empty($_POST['commentTitle']))
        {
            $commentAuthor = htmlspecialchars($_POST['commentAuthor']);
            $commentTitle = htmlspecialchars($_POST['commentTitle']);
            $commentContent = htmlspecialchars($_POST['commentContent']);
            $commentAdded = $this->commentManager->addCommentOnChapter($commentAuthor, $commentTitle, $commentContent, $chapterId);
            if ($commentAdded === false)
            {
                die('Impossible d\'ajouter le commentaire');
            }
            else 
            {
                $this->single($chapterId);
                echo('Commentaire ajouté');
            }
        }
        else
        {   
            echo 'Veuillez remplir les champs !';
        }
        
    }
} 