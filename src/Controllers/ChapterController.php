<?php

namespace App\src\Controllers;

use App\src\Core\Controller;
use App\src\Managers\ChapterManager;
use App\src\Managers\CommentManager;
use Exception;

class ChapterController extends Controller
{
    public $chapterManager;
    public $commentManager;

    /**
     * ChapterController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->chapterManager = new ChapterManager();
        $this->commentManager = new CommentManager();
    }

    /**
     * createChapter
     *
     * @param mixed $isAdmin
     * @return void
     * @throws Exception
     * @throws Exception
     */
    public function createChapter($isAdmin)
    {
        if (!empty($_POST['chapterAuthor']) && !empty($_POST['chapterTitle']) && !empty($_POST['chapterImg'])) {
            $newChapterAuthor = htmlspecialchars($_POST['chapterAuthor']);
            $newChapterTitle = htmlspecialchars($_POST['chapterTitle']);
            $newChapterContent = htmlspecialchars($_POST['chapterContent']);
            $newChapterImg = $_POST['chapterImg'];
            $chapterCreateDate = date("d-m-Y H:i:s");
            if (isset($_POST['saveAndPublish'])) {
                $chapterPublished = true;
                $insertLines = $this->chapterManager->addChapterInDb($newChapterAuthor, $newChapterTitle, $newChapterContent, $chapterCreateDate, $chapterPublished, $newChapterImg);
                if ($insertLines === false) {
                    throw new Exception('Impossible d\'ajouter le chapitre');
                } else {
                    header('Location: /createChapter');
                    // echo('Chapitre ajouté');
                }
            } elseif (isset($_POST['saveDraft'])) {
                $chapterPublished = false;
                $insertLines = $this->chapterManager->addChapterInDb($newChapterAuthor, $newChapterTitle, $newChapterContent, $chapterCreateDate, $chapterPublished, $newChapterImg);
                if ($insertLines === false) {
                    throw new Exception('Impossible de modifier le chapitre');
                } else {
                    header('Location: /createChapter');
                }
            }
        }
        echo $this->render('adding_chapter.html.twig', ['isAdmin' => $isAdmin]);
    }

    /**
     * readChapter
     *
     * @param mixed $chapterId
     * @param mixed $isAdmin
     * @return void
     * @throws Exception
     */
    public function readChapter($chapterId, $isAdmin)
    {
        if ($chapterId) {
            echo $this->render(
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
        // $uniqueChapter = $this->chapterManager->getChapterById($chapterId);
        echo $this->render(
            'modifying_chapter.html.twig',
            ['uniqueChapter' => $this->chapterManager->getChapterById($chapterId),
            'isAdmin' => $isAdmin]
        );
    }

    /**
     * deleteChapter
     *
     * @param mixed $chapterId
     * @param $isAdmin
     * @return void
     */
    public function deleteChapter($chapterId, $isAdmin)
    {
        $this->chapterManager = new ChapterManager();
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
        $this->chapterManager = new ChapterManager();
        $this->chapterManager->publishedChapter($chapterId);
        header('Location: /adminView');
    }

    /**
     * updateChapterAction
     *
     * @param mixed $chapterId
     * @return void
     * @throws Exception
     */
    public function updateChapterAction($chapterId)
    {
        $this->chapterManager = new ChapterManager();
        $updatedChapterTitle = htmlspecialchars($_POST['chapterTitle']);
        $updatedChapterContent = htmlspecialchars($_POST['chapterContent']);
        $updatedChapterImg = $_POST['chapterImg'];
        $chapterUpdateDate = date("d-m-Y H:i:s");
        // if(!empty($_POST['chapterTitle'] && !empty($_POST['chapterImg'])))
        // {
        if (isset($_POST['saveAndPublish'])) {
            $chapterPublished = true;
            $updatedLines = $this->chapterManager->updateChapterById($updatedChapterTitle, $updatedChapterContent, $chapterUpdateDate, $chapterPublished, $updatedChapterImg, $chapterId);
            if ($updatedLines === false) {
                throw new Exception('Impossible de modifier le chapitre');
            } else {
                $alertMessage = 'Chapitre Modifié';
                header('Location: /readChapter/' . $chapterId);
            }
        } elseif (isset($_POST['saveDraft'])) {
            $chapterPublished = false;
            $updateLines = $this->chapterManager->updateChapterById($updatedChapterTitle, $updatedChapterContent, $chapterUpdateDate, $chapterPublished, $updatedChapterImg, $chapterId);
            if ($updateLines === false) {
                throw new Exception('Impossible de modifier le chapitre');
            } else {
                header('Location: /readChapter/' . $chapterId);
            }
        }
        // }
    }
}
