<?php

namespace App\src\Controllers;

use App\src\Core\Controller;
use Exception;

class ChapterController extends Controller
{

    /**
     * createChapter
     *
     * @param mixed $isAdmin
     * @return void
     */
    public function createChapter($isAdmin)
    {
        if (!empty($_POST['chapterAuthor']) && !empty($_POST['chapterTitle']) && !empty($_POST['chapterImg'])) {
            $newChapterAuthor = htmlspecialchars($_POST['chapterAuthor']);
            $newChapterTitle = htmlspecialchars($_POST['chapterTitle']);
            $newChapterContent = htmlspecialchars($_POST['chapterContent']);
            $newChapterImg = $_POST['chapterImg'];
            if (isset($_POST['saveAndPublish'])) {
                $chapterPublished = true;
                $affectedLines = $this->chapterManager->addChapterInDb($newChapterAuthor, $newChapterTitle, $newChapterContent, $chapterPublished, $newChapterImg);
                if ($affectedLines === false) {
                    throw new Exception('Impossible d\'ajouter le chapitre');
                } else {
                    header('Location: /createChapter');
                    // echo('Chapitre ajouté');
                }
            } elseif (isset($_POST['saveDraft'])) {
                $chapterPublished = false;
                $affectedLines = $this->chapterManager->addChapterInDb($newChapterAuthor, $newChapterTitle, $newChapterContent, $chapterPublished, $newChapterImg);
                if ($affectedLines === false) {
                    throw new Exception('Impossible de modifier le chapitre');
                } else {
                    header('Location: /createChapter');
                }
            } else {
                // echo 'Veuillez remplir les champs !';
            }
        }
        echo $this->twig->render('adding_chapter.html.twig', ['isAdmin' => $isAdmin]);
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
        if ($chapterId) {
            echo $this->twig->render(
                'reading_chapter.html.twig',
                ['uniqueChapter' => $this->chapterManager->getChapterById($chapterId),
                'commentList' => $this->commentManager->getCommentByChapterId($chapterId),
                'totalComments' => $this->commentManager->totalChapterComments($chapterId),
                'chapterNumber' => $chapterId,
                'isAdmin' => $isAdmin]
            );
        } else {
            throw new Exception("Chapitre introuvable !");
        }
    }

    /**
     * updateChapter
     *
     * @param mixed $chapterId
     * @param mixed $isAdmin
     * @return void
     */
    public function updateChapter($chapterId, $isAdmin)
    {
        $uniqueChapter = $this->chapterManager->getChapterById($chapterId);
        echo $this->twig->render(
            'modifying_chapter.html.twig',
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
        header('Location: /adminView');
    }

    /**
     * publishChapter
     *
     * @param mixed $chapterId
     * @return void
     */
    public function publishChapter($chapterId)
    {
        $this->chapterManager->publishedChapter($chapterId);
        header('Location: /adminView');
    }
    
    /**
     * updateChapterAction
     *
     * @param mixed $chapterId
     * @return void
     */
    public function updateChapterAction($chapterId)
    {
        $updatedChapterTitle = htmlspecialchars($_POST['chapterTitle']);
        $updatedChapterContent = htmlspecialchars($_POST['chapterContent']);
        $updatedChapterImg = $_POST['chapterImg'];
        // if(!empty($_POST['chapterTitle'] && !empty($_POST['chapterImg'])))
        // {
        if (isset($_POST['saveAndPublish'])) {
            $chapterPublished = true;
            $updatedLines = $this->chapterManager->updateChapterById($updatedChapterTitle, $updatedChapterContent, $chapterPublished, $updatedChapterImg, $chapterId);
            if ($updatedLines === false) {
                throw new Exception('Impossible de modifier le chapitre');
            } else {
                $alertMessage = 'Chapitre Modifié';
                header('Location: /readChapter/' . $chapterId);
            }
        } elseif (isset($_POST['saveDraft'])) {
            $chapterPublished = false;
            $updateLines = $this->chapterManager->updateChapterById($updatedChapterTitle, $updatedChapterContent, $chapterPublished, $updatedChapterImg, $chapterId);
            if ($updateLines === false) {
                throw new Exception('Impossible de modifier le chapitre');
            } else {
                header('Location: /readChapter/' . $chapterId);
            }
        }
        // }
    }
}
