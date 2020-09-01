<?php

namespace App\src\Controllers;

// use App\src\Services\VerificationHelper;
use App\src\Core\Controller;
use App\src\Managers\ChapterManager;
use App\src\Managers\CommentManager;
use App\src\Managers\ReportingManager;
use App\src\Models\Chapter;
use App\src\Services\FormVerificationHelper;

use Exception;

class ChapterController extends Controller
{
    public $chapterManager;
    public $commentManager;
    public $reportingManager;

    /**
     * ChapterController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->chapterManager = new ChapterManager();
        $this->commentManager = new CommentManager();
        $this->reportingManager = new ReportingManager();
        unset($_SESSION['addSuccessMsg']);
        unset($_SESSION['addErrorMsg']);
        unset($_SESSION['deleteMsg']);
        unset($_SESSION['modifySuccessMsg']);
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
        unset($_SESSION['addSuccessMsg']);
        unset($_SESSION['addErrorMsg']);
        if (isset($_POST['save'])) {
            $errors = FormVerificationHelper::checkField($_POST);
            var_dump($errors);
            if($errors){
                $_SESSION['addErrorMsg'] = $errors;
                var_dump($errors);
            }
            if (!empty(htmlspecialchars($_POST['author'])) and !empty(htmlspecialchars($_POST['title'])) and !empty(htmlspecialchars($_POST['imgUrl'])) and !empty(htmlspecialchars($_POST['content']))) {
                $newChapter = new Chapter($_POST);
                $newChapter->setCreateDate(date("Y-m-d H:i:s"));
                $newChapter->setUpdateDate(date("Y-m-d H:i:s"));
                $newChapter->setPublished(false);
                var_dump($insertLines);
                if ($insertLines == false) {
                    $insertLines = $this->chapterManager->insertInto($newChapter);
                    $_SESSION['addSuccessMsg'] = 'Le nouveau chapitre à été enregistré';
                    header('Location: /adminView');
                } else {
                    throw new Exception("Impossible de sauvegarder le chapitre");
                }
            } else {
                $_SESSION['addErrorMsg'] = 'Veuillez remplir tous les champs';
                header('Location: /createChapter');
            }
        }
        echo $this->render('adding_chapter.html.twig', ['isAdmin' => $isAdmin]);
    }

    /**
     * readChapter
     *
     * @param mixed $chapterId
     * @param mixed $isAdmin
     * @throws Exception
     */
    public function readChapter($chapterId, $isAdmin)
    {
        echo $this->render(
            'reading_chapter.html.twig',
            ['uniqueChapter' => $this->chapterManager->findOneBy(array('id' => $chapterId)),
            'commentList' => $this->commentManager->findBy(array('chapterId' => $chapterId), array('createdDate' => 'ASC')),
            'totalReporting' => $this->reportingManager->totalReportCount(),
            'chapterNumber' => $chapterId,
            'isAdmin' => $isAdmin]
        );
    }

    /**
     * updateChapter
     *
     * @param mixed $chapterId
     * @param mixed $isAdmin
     * @return void
     * @throws Exception
     */
    public function updateChapter($chapterId, $isAdmin)
    {
        echo $this->render(
            'modifying_chapter.html.twig',
            ['uniqueChapter' => $this->chapterManager->findOneBy(array('id' => $chapterId)),
            'isAdmin' => $isAdmin]
        );
    }

    /**
     * deleteChapter
     *
     * @param mixed $chapterId
     * @throws Exception
     */
    public function deleteChapter($chapterId)
    {
        $deleteChapter = $this->chapterManager->findOneBy(array('id' => $chapterId));
        $this->chapterManager->delete($deleteChapter);
        $this->commentManager->deleteFrom($deleteChapter);
        // if ($deleteLines == false) {
        //     throw new Exception("Le chapitre " . $chapterId . " n'existe pas");
        // } else {
            $_SESSION['deleteMsg'] = 'Le chapitre ' . $chapterId . ' et ses commentaires ont bien été supprimés';
            header('Location: /adminView');
        // }
    }

    /**
     * publishChapter
     *
     * @param mixed $chapterId
     * @throws Exception
     */
    public function publishChapter($chapterId)
    {
        $publishChapter = $this->chapterManager->findOneBy(array('id' => $chapterId));
        $publishChapter->setPublished(true);
        $this->chapterManager->update($publishChapter);
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
        $_SESSION['modifySuccessMsg'] = '';
        if (isset($_POST['save'])) {
            if (!empty(htmlspecialchars($_POST['chapterTitle'])) and !empty(htmlspecialchars($_POST['chapterImg'])) and !empty(htmlspecialchars($_POST['chapterImg']))) {
                $updatedChapter = $this->chapterManager->findOneBy(array('id' => $chapterId));
                $updatedChapter->setTitle(htmlspecialchars($_POST['chapterTitle']));
                $updatedChapter->setImgUrl(htmlspecialchars($_POST['chapterImg']));
                $updatedChapter->setContent(htmlspecialchars($_POST['chapterContent']));
                $updatedChapter->setUpdateDate(date("Y-m-d H:i:s"));
                $updatedChapter->setPublished(true);
                $updateLines = $this->chapterManager->update($updatedChapter);
                if ($updateLines == false) {
                    throw new Exception("Impossible de mettre à jour le chapitre");
                } else {
                    $_SESSION['modifySuccessMsg'] = 'Chapitre modifié et enregistré';
                    header('Location: /readChapter/' . $chapterId);
                }
            } else {
                $_SESSION['error'] = 'Veuillez remplir tous les champs';
                header('Location: /updateChapter');
            }
        }
    }
}
