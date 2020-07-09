<?php

namespace App\src\Controllers;

use App\src\Core\Controller;
use App\src\Core\Twig;

class ChapterController extends Controller
{
    /**
     * createChapter
     *
     * @return void
     */
    public function createChapter($isAdmin)
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

    /**
     * readChapter
     *
     * @param mixed $chapterId
     * @param mixed $isAdmin
     * @return void
     */
    public function readChapter($chapterId, $isAdmin)
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
            'totalComments' => $this->commentManager->totalChapterCommets($chapterId),
            'chapterNumber' => $chapterId,
            'isAdmin' => $isAdmin]
        );
    }    

    public function updateChapter($chapterId, $isAdmin)
    {
        $uniqueChapter = $this->chapterManager->getChapterById($chapterId);
        echo $this->twig->render('ModifyChapterView.twig', 
            ['uniqueChapter' => $this->chapterManager->getChapterById($chapterId),
            'isAdmin' => $isAdmin]
        );       
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

    public function publishChapter($chapterId)
    {
        $this->chapterManager->publishedChapter($chapterId);
        header('location: ../public/index.php?page=adminView');
    }
    
    public function applyUpdateChapter($chapterId)
    {
        $updatedChapterTitle = htmlspecialchars($_POST['chapterTitle']);
        $updatedChapterContent = htmlspecialchars($_POST['chapterContent']);
        var_dump($_POST);
        $chapterPublished = true;
        $this->chapterManager->updateChapterById($updatedChapterTitle, $updatedChapterContent, $chapterPublished, $chapterId);
        $this->readChapter($chapterId);
        // if(isset($_POST['saveAndPublish']))
        // {
            if(!empty($_POST['chapterAuthor']) && !empty($_POST['chapterTitle']))
            {
                // $updatedLines = 
                // if ($updatedLines === false)
                // {
                //     throw new Exception('Impossible de modifier le chapitre');
                // }
                // else 
                // {
                    // header('location: ../public/index.php?page=readChapter&chapterId=' . $chapterId);
                    // echo $this->twig->render('SingleView.twig', 
                    //     ['uniqueChapter' => $this->chapterManager->getChapterById($chapterId),
                    //     'commentList' => $this->commentManager->getCommentByChapterId($chapterId),
                    //     'chapterNumber' => $chapterId]);
                    var_dump($updatedLines);
                    echo('Chapitre modifié et publier');
                // }
            } 
        // }
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

} 