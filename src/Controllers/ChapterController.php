<?php

namespace App\src\Controllers;

use App\src\Core\Controller;
use App\src\Core\Twig;

class ChapterController extends Controller
{
    /**
     * home
     *
     * @return void
     */
    public function home()
    {
        $publishedChaptersList = $this->chapterManager->getAllPublishedChapters();
        $unpublishedChaptersList = $this->chapterManager->getAllUnpublishedChapters();
        // $commentList = $this->commentManager->getCommentByChapterId($chapterId);
        echo $this->twig->render('HomeView.twig', 
            ['publishChapters' => $this->chapterManager->getAllPublishedChapters()],
            ['unpublishedChapters' => $this->chapterManager->getAllUnpublishedChapters()]
        );
        // require_once '../src/Views/HomeView.php';
    }

    public function single($chapterId, $isAdmin)
    {
        $uniqueChapter = $this->chapterManager->getChapterById($chapterId);
        $commentList = $this->commentManager->getCommentByChapterId($chapterId);
        require_once '../src/Views/SingleView.php';
    }    

    /**
     * addNewChapter
     *
     * @return void
     */
    public function addNewChapter($isAdmin)
    {
        echo ('Page addChapterView');
        var_dump($isAdmin);
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
        require_once '../src/Views/AddChapterView.php';
    }

    /**
     * deleteChapter
     *
     * @param mixed $chapterId
     * @return void
     */
    public function deleteChapter($chapterId, $isAdmin)
    {
        $this->chapterManager->deleteChapterById($chapterId);
        header('location: ../public/index.php?page=adminView');
    }

    public function modifyChapter($chapterId, $isAdmin)
    {
        $uniqueChapter = $this->chapterManager->getChapterById($chapterId);
        require_once '../src/Views/ModifyChapterView.php';        
    }

    public function applyChapterModification($chapterTitle, $chapterContent, $chapterId)
    {
        $chapterTitle = htmlspecialchars($_POST['chapterTitle']);
        $chapterContent = htmlspecialchars($_POST['chapterContent']);
        // var_dump($_POST);
        if(isset($_POST['saveAndPublish']))
        {
            // $chapterPublish = 1;
            $updatedLines = $this->chapterManager->modifyChapterById($chapterTitle, $chapterContent, $chapterId);
            // $updatedLines = $this->chapterManager->modifyChapterById();
            if ($updatedLines === false)
            {
                die('Impossible de modifier le chapitre');
            }
            else 
            {
                $this->single($chapterId);
                echo('Chapitre modifié et publier');
            }
        } 
        // elseif (isset($_POST['saveDraft']))
        // {   
        //     $chapterPublish = 0;
        //     $updateLines = $this->chapterManager->modifyChapterById($chapterTitle, $chapterContent, $chapterPublish, $chapterId);
        //     if ($updateLines === false)
        //     {
        //         die('Impossible de modifier le chapitre');
        //     }
        //     else 
        //     {
        //         $this->single($chapterId);
        //         echo('Chapitre modifié et enregistré');
        //     }
        // }     
    }

    public function addComment($chapterId)
    {
        var_dump($_POST["submit"]);
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