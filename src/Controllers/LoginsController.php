<?php

namespace App\src\Controllers;

use App\src\Core\Controller;
use App\src\Managers\LoginsManager;
use App\src\Managers\ChapterManager;
use App\src\Managers\CommentManager;
use Exception;

class LoginsController extends Controller
{
    public $chapterManager;
    public $commentManager;
    public $loginsManager;

    public function __construct()
    {
        parent::__construct();
        $this->loginsManager = new LoginsManager();
        $this->chapterManager = new ChapterManager();
        $this->commentManager = new CommentManager();
    }

    /**
     * getLogin
     *
     * @return void
     */
    public function getLogin()
    {
        if (!empty($_POST['loginsEmail']) && !empty($_POST['loginsPassword'])) {
            $loginsEmail = htmlspecialchars($_POST['loginsEmail']);
            $passwordVerification = $this->loginsManager->loginsVerification($loginsEmail);
            $logins = password_verify($_POST['loginsPassword'], $passwordVerification->getPassword());
            if ($logins) {
                $_SESSION['loginsUsername'] = $passwordVerification->getUsername();
                $_SESSION['loginsEmail'] = $passwordVerification->getEmail();
                $_SESSION['loginsStatus'] = $passwordVerification->getStatus();
                $isAdmin = true;
                echo $this->render(
                    'admin_page.html.twig',
                    ['allChaptersList' => $this->chapterManager->getAllChapters(),
                    'publishedChaptersList' => $this->chapterManager->getAllPublishedChapters(),
                    'unpublishedChaptersList' => $this->chapterManager->getAllUnpublishedChapters(),
                    'reportedCommentList' => $this->commentManager->getAllReportedComments(),
                    'reportingList' => $this->commentManager->allReporting(),
                    'totalReporting' => $this->commentManager->totalReportCount(),
                    // 'totalReportedComments' => $this->commentManager->distinctReportedCommentsCount(),
                    'isAdmin' => $isAdmin,
                    'session' => $_SESSION]
                );
            } else {
                // echo('Email ou mot de passe invalide');
                // header('Location : /index');
                echo $this->render('logins.html.twig');
            }
        } else {
            // echo 'Veuillez remplir les champs !';
            echo $this->render('logins.html.twig');
        }
    }

    /**
     * getLogout
     *
     * @return void
     */
    public function getLogout()
    {
        $_SESSION = array();
        session_destroy();
        header('Location: /');
        exit;
    }

    /**
     * returnAdminView
     *
     * @param mixed $isAdmin
     * @return void
     * @throws Exception
     */
    public function returnAdminView($isAdmin)
    {
        if ($isAdmin) {
            echo $this->render(
                'admin_page.html.twig',
                ['allChaptersList' => $this->chapterManager->getAllChapters(),
                'publishedChaptersList' => $this->chapterManager->getAllPublishedChapters(),
                'unpublishedChaptersList' => $this->chapterManager->getAllUnpublishedChapters(),
                'reportedCommentList' => $this->commentManager->getAllReportedComments(),
                'reportingList' => $this->commentManager->allReporting(),
                'totalReporting' => $this->commentManager->totalReportCount(),
                'isAdmin' => $isAdmin,
                'session' => $_SESSION]
            );
        } else {
            throw new Exception('Accès interdit !');
        }
    }

    /**
     * toBeContacted
     *
     * @return void
     */
    public function toBeContacted()
    {
        echo $this->render('contact.html.twig');
    }
}
