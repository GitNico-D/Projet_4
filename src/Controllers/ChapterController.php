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
        echo $this->twig->render('HomeView.twig', 
            ['publishedChaptersList' => $this->chapterManager->getAllPublishedChapters(),
            'unpublishedChaptersList' => $this->chapterManager->getAllUnpublishedChapters()]
        );
    }

    /**
     * single
     *
     * @param mixed $chapterId
     * @param mixed $isAdmin
     * @return void
     */
    public function single($chapterId, $isAdmin)
    {
        $commentIdList = $this->commentManager->getCommentIdList($chapterId);
        // $totalReportsList = $this->commentManager->getTotalReportsComments($commentIdList);
        // $reportingList = $this->commentManager->getReportComments($commentIdList);
        // $totalReports = $this->commentManager->getTotalReports($reportingList);
        // var_dump($reportingList);
        // var_dump ($totalReports);
        echo $this->twig->render('SingleView.twig', 
            ['uniqueChapter' => $this->chapterManager->getChapterById($chapterId),
            'commentList' => $this->commentManager->getCommentByChapterId($chapterId),
            'totalReports' => $this->commentManager->getCommentsReportsCount($commentIdList),
            'chapterNumber' => $chapterId,
            'isAdmin' => $isAdmin]
        );
    }    

    /**
     * addNewChapter
     *
     * @return void
     */
    public function addNewChapter($isAdmin)
    {
        if(!empty($_POST['chapterAuthor']) && !empty($_POST['chapterTitle']))
        {
            $newChapterAuthor = htmlspecialchars($_POST['chapterAuthor']);
            $newChapterTitle = htmlspecialchars($_POST['chapterTitle']);
            $newChapterContent = htmlspecialchars($_POST['chapterContent']);
            $affectedLines = $this->chapterManager->addChapterInDb($newChapterAuthor, $newChapterTitle, $newChapterContent);
            // var_dump($affectedLines);
            if ($affectedLines === false)
            {
                throw new Exception ('Impossible d\'ajouter le chapitre');
            }
            else 
            {
                header('location: ../public/index.php?page=adminView');
                echo('Chapitre ajouté');
            }
        }
        else
        {   
            echo 'Veuillez remplir les champs !';
        }
        echo $this->twig->render('addChapterView.twig', ['isAdmin' => $isAdmin]);
    }

    public function publishChapter($chapterId)
    {
        $this->chapterManager->publishedChapter($chapterId);
        header('location: ../public/index.php?page=adminView');
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
        echo $this->twig->render('ModifyChapterView.twig', 
            ['uniqueChapter' => $this->chapterManager->getChapterById($chapterId),
            'isAdmin' => $isAdmin]
        );
        // require_once '../src/Views/ModifyChapterView.php';        
    }

    public function applyChapterModification($chapterId)
    {
        $modifiedChapterTitle = htmlspecialchars($_POST['chapterTitle']);
        $modifiedChapterContent = htmlspecialchars($_POST['chapterContent']);
        // var_dump($_POST);
        // if(isset($_POST['saveAndPublish']))
        if(!empty($_POST['chapterAuthor']) && !empty($_POST['chapterTitle']))
        {
            $chapterPublished = true;
            $updatedLines = $this->chapterManager->modifyChapterById($modifiedChapterTitle, $modifiedChapterContent, $chapterPublished);
            var_dump($updatedLines);
            if ($updatedLines === false)
            {
                throw new Exception('Impossible de modifier le chapitre');
            }
            else 
            {
                header('location: ../public/index.php?page=single&chapterId=' . $chapterId);
                // echo $this->twig->render('SingleView.twig', 
                //     ['uniqueChapter' => $this->chapterManager->getChapterById($chapterId),
                //     'commentList' => $this->commentManager->getCommentByChapterId($chapterId),
                //     'chapterNumber' => $chapterId]);
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
        // var_dump($_POST["submit"]);
        if(!empty($_POST['commentAuthor']) && !empty($_POST['commentTitle']))
        {
            $commentAuthor = htmlspecialchars($_POST['commentAuthor']);
            $commentTitle = htmlspecialchars($_POST['commentTitle']);
            $commentContent = htmlspecialchars($_POST['commentContent']);
            $commentAdded = $this->commentManager->addCommentOnChapter($commentAuthor, $commentTitle, $commentContent, $chapterId);
            if ($commentAdded === false)
            {
                throw new Exception('Impossible d\'ajouter le commentaire');
            }
            else 
            {
                header('location: ../public/index.php?page=single&chapterId=' . $chapterId);
                // $this->single($chapterId, $isAdmin);
                echo('Commentaire ajouté');
            }
        }
        else
        {   
            echo 'Veuillez remplir les champs !';
        }        
    }

} 