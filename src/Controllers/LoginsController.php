<?php

namespace App\src\Controllers;

use App\src\Core\Controller;
use App\src\Managers\LoginsManager;
use App\src\Managers\ChapterManager;
use App\src\Managers\CommentManager;
use App\src\Managers\ReportingManager;
use Exception;

class LoginsController extends Controller
{
    public $chapterManager;
    public $commentManager;
    public $loginsManager;
    public $reportingManager;

    public function __construct()
    {
        parent::__construct();
        $this->loginsManager = new LoginsManager();
        $this->chapterManager = new ChapterManager();
        $this->commentManager = new CommentManager();
        $this->reportingManager = new ReportingManager();
        unset($_SESSION['fail']);
    }

    /**
     * getLogin
     *
     * @return void
     * @throws Exception
     */
    public function getLogin()
    {
        unset($_SESSION['fail']);
        if (!empty($_POST['loginsEmail']) and !empty($_POST['loginsPassword'])) {
            $loginsAdmin = $this->loginsManager->findOneBy(array('email' => htmlspecialchars($_POST['loginsEmail'])));
            $logins = password_verify($_POST['loginsPassword'], $loginsAdmin->getPassword());
            if ($logins) {
                $_SESSION['loginsUsername'] = $loginsAdmin->getUsername();
                $_SESSION['loginsEmail'] = $loginsAdmin->getEmail();
                $_SESSION['loginsStatus'] = $loginsAdmin->getStatus();
                $isAdmin = true;
                echo $this->render(
                    'admin_page.html.twig',
                    ['allChaptersList' => $this->chapterManager->findAll(),
                    'publishedChaptersList' => $this->chapterManager->findBy(array('published' => true)),
                    'unpublishedChaptersList' => $this->chapterManager->findBy(array('published' => false)),
                    'reportedCommentList' => $this->commentManager->getAllReportedComments(),
                    'reportingList' => $this->reportingManager->findAll(),
                    'totalReporting' => $this->reportingManager->totalReportCount(),
                    'isAdmin' => $isAdmin,
                    'session' => $_SESSION]
                );
            } else {
                // $_SESSION['fail'] = 'Identifiant ou Mot de passe invalide !';
                throw new Exception("Identifiant ou Mot de passe invalide !");
            }
        } else {
            $_SESSION['fail'] = 'Veuillez remplir les champs !';
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
                ['allChaptersList' => $this->chapterManager->findAll(),
                'publishedChaptersList' => $this->chapterManager->findBy(array('published' => true)),
                'unpublishedChaptersList' => $this->chapterManager->findBy(array('published' => false)),
                'reportedCommentList' => $this->commentManager->getAllReportedComments(),
                'reportingList' => $this->reportingManager->findAll(),
                'totalReporting' => $this->reportingManager->totalReportCount(),
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
     * @throws Exception
     */
    public function toBeContacted()
    {
        echo $this->render('contact.html.twig');
    }
}
