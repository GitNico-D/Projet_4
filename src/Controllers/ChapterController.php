<?php

namespace App\src\Controllers;

// use App\src\Services\VerificationHelper;
use App\src\Core\Controller;
use App\src\Managers\ChapterManager;
use App\src\Managers\CommentManager;
use App\src\Managers\ReportingManager;
use App\src\Models\Chapter;

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
        $_SESSION['addSuccessMsg'] = '';
        $_SESSION['addErrorMsg'] = '';
        if (isset($_POST['save'])) {
            // $error = VerificationHelper::notBlank($_POST);
            var_dump($_POST['chapterAuthor']);
            if (!empty($_POST['chapterAuthor']) and !empty($_POST['chapterTitle']) and !empty($_POST['chapterImg']) and !empty($_POST['chapterContent'])) {
                // if (!$error) {
                $newChapter = new Chapter();
                $newChapter->setAuthor(htmlspecialchars($_POST['chapterAuthor']));
                $newChapter->setTitle(htmlspecialchars($_POST['chapterTitle']));
                $newChapter->setContent(htmlspecialchars($_POST['chapterContent']));
                $createDate = date("Y-m-d H:i:s");
                $newChapter->setCreateDate($createDate);
                $newChapter->setUpdateDate($createDate);
                $newChapter->setPublished(false);
                $newChapter->setImgUrl(htmlspecialchars($_POST['chapterImg']));
                $this->chapterManager->insertInto($newChapter);
                $_SESSION['addSuccessMsg'] = 'Le nouveau chapitre à été enregistré';
                header('Location: /adminView');
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
     * @return void
     * @throws Exception
     */
    public function readChapter($chapterId, $isAdmin)
    {
        echo $this->render(
            'reading_chapter.html.twig',
            ['uniqueChapter' => $this->chapterManager->findOneBy(array('id' => $chapterId)),
            'commentList' => $this->commentManager->findBy(array('chapterId' => $chapterId)),
            'totalComments' => $this->commentManager->totalChapterComments($chapterId),
            // 'reportingList' => $this->reportingManager->findAll(),
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
     * @return void
     */
    public function deleteChapter($chapterId)
    {
        $_SESSION['deleteMsg'] = '';
        $deleteChapter = $this->chapterManager->findOneBy(array('id' => $chapterId));
        $this->chapterManager->delete($deleteChapter);
        $_SESSION['deleteMsg'] = 'Le chapitre ' . $chapterId . ' et ses commentaires ont bien été supprimés';
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
                $this->chapterManager->update($updatedChapter);
                $_SESSION['modifySuccessMsg'] = 'Chapitre modifié et enregistré';
                header('Location: /readChapter/' . $chapterId);
            } else {
                $_SESSION['error'] = 'Veuillez remplir tous les champs';
                header('Location: /updateChapter');
            }
        }
    }
}
