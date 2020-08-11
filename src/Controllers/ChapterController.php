<?php

namespace App\src\Controllers;

use App\src\Services\VerificationHelper;
use App\src\Core\Controller;
use App\src\Managers\ChapterManager;
use App\src\Managers\CommentManager;
use App\src\Models\Chapter;
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
        // $newChapter = new Chapter();
        // var_dump($newChapter);
        // $this->insertInto($newChapter);
        var_dump(isset($_POST['save']));
        $_SESSION['error'] = '';

        if (isset($_POST['save'])) {
            // var_dump($_POST);
            // VerificationHelper::notBlank($_POST);
            // $error = VerificationHelper::notBlank($_POST);
            // $_SESSION['error'] = $error;
            // var_dump($error);
            // if(!$error) {
                
                // $newChapter->setAuthor(htmlspecialchars($_POST['chapterAuthor']));
                // $newChapter->setTitle(htmlspecialchars($_POST['chapterTitle']));
                // $newChapter->setContent(htmlspecialchars($_POST['chapterContent']));
                // $createDate = date("Y-m-d H:i:s");
                // $newChapter->setCreateDate($createDate);
                // $newChapter->setUpdateDate($createDate);
                // $newChapter->setImgUrl(htmlspecialchars($_POST['chapterImg']));
                // $newChapter->setPublished(true);
                
                // $insertLines =
                // $this->chapterManager->addChapterInDb($newChapter);
            // }
            $_SESSION['error'] = '';
            if (!empty($_POST['chapterAuthor']) AND !empty($_POST['chapterTitle']) AND !empty($_POST['chapterImg']) AND !empty($_POST['chapterContent'])) {
                $newChapter = new Chapter();
                var_dump($newChapter);
            // $insertLines = $this->chapterManager->addChapterInDb($newChapterAuthor, $newChapterTitle, $newChapterContent, $chapterCreateDate, $chapterPublished, $newChapterImg);
                // if ($insertLines === false) {
                //     throw new Exception('Impossible d\'ajouter le chapitre');
                // } else {
                //     header('Location: /createChapter');
                    // echo('Chapitre ajouté');
                // }'
            // } else {
            //     throw new Exception('Impossible d\'ajouter le chapitre');
            //     header('Location: /createChapter');
            // }
        } 
        else {
            $_SESSION['error'] = 'Veuillez remplir tous les champs';
            header('Location: /createChapter');
            // 
            // } elseif (isset($_POST['saveDraft'])) {
            //     if (!empty($_POST['chapterAuthor']) && !empty($_POST['chapterTitle']) && !empty($_POST['chapterImg'])) {
            //         $newChapter = new Chapter();
            //         $newChapter->setAuthor(htmlspecialchars($_POST['chapterAuthor']));
            //         $newChapter->setTitle(htmlspecialchars($_POST['chapterTitle']));
            //         $newChapter->setContent(htmlspecialchars($_POST['chapterContent']));
            //         $createDate = date("Y-m-d H:i:s");
            //         $newChapter->setCreateDate($createDate);
            //         $newChapter->setUpdateDate($createDate);
            //         $newChapter->setImgUrl(htmlspecialchars($_POST['chapterImg']));
            //         $newChapter->setPublished(true);
            //     // $error = $this->notBlank()
            //     var_dump($newChapter);
            //     $newChapter->setPublished(false);
            //     $insertLines = $this->chapterManager->addChapterInDb($newChapter);
            //     // $insertLines = $this->chapterManager->addChapterInDb($newChapterAuthor, $newChapterTitle, $newChapterContent, $chapterCreateDate, $chapterPublished, $newChapterImg);
            //     if ($insertLines === false) {
            //         throw new Exception('Impossible de modifier le chapitre');
            //     } else {
            //         header('Location: /createChapter');
            //     }
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
     * @throws Exception
     */
    public function updateChapterAction($chapterId)
    {
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
