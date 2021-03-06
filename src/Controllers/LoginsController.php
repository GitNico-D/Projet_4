<?php

namespace App\src\Controllers;

use App\src\Core\Controller;
use App\src\Core\FormValidator;
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
        
    }

    /**
     * getLogin
     *
     * @return void
     * @throws Exception
     */
    public function adminConnect()
    {
        if (isset($_POST['connect'])) {
            $errors = FormValidator::checkField($_POST);
            if (!$errors) {
                $loginsAdmin = $this->loginsManager->findOneBy(array('email' => $_POST['loginsEmail']));
                if ($loginsAdmin === null) {
                    $_SESSION ['fail'] = 'Adresse email inconnu !';
                    header("Location: /getLogin");
                } else {
                    $logins = password_verify($_POST['loginsPassword'], $loginsAdmin->getPassword());
                    if ($logins && ($loginsAdmin->getEmail() === $_POST['loginsEmail'])) {
                        $_SESSION ['loginsUsername'] = $loginsAdmin->getUsername();
                        $_SESSION ['loginsEmail'] = $loginsAdmin->getEmail();
                        $_SESSION ['loginsStatus'] = $loginsAdmin->getStatus();
                        $isAdmin = true;
                        $this->adminView($isAdmin);
                    } else {
                        $_SESSION['fail'] = 'Mot de passe invalide !';
                        header("Location: /getLogin");
                    }
                }
            } else {
                $_SESSION['fail'] .= implode(', ', $errors);
                header("Location: /getLogin");
            }
        }
    }

    public function getLogin()
    {
        echo $this->render('logins.html.twig');
        unset($_SESSION ['fail']);
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
    public function adminView($isAdmin)
    {
        if ($isAdmin) {
            echo $this->render(
                'admin_page.html.twig',
                ['allChaptersList' => $this->chapterManager->findAll(),
                'publishedChaptersList' => $this->chapterManager->findBy(array('published' => true)),
                'unpublishedChaptersList' => $this->chapterManager->findBy(array('published' => false)),
                'reportedCommentList' => $this->commentManager->getAllReportedComments(),
                'totalReporting' => $this->reportingManager->totalReportCount(),
                'isAdmin' => $isAdmin,
                'session' => $_SESSION]
            );
            unset($_SESSION ['deleteMsg']);
            unset($_SESSION ['commentValid']);
            unset($_SESSION ['commentDelete']);
            unset($_SESSION ['chapterPublish']);
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
        unset($_SESSION ['sendFail']);
        unset($_SESSION ['sendSuccess']);
        unset($_SESSION ['error']);

    }

    public function sendMessage() 
    {
        if (isset($_POST['send'])) {
            $errors = FormValidator::checkField($_POST);
            if (!$errors) {
                $message = $_POST['messageContent'];
                $messageSended = mail('forteroche@yopmail.com', 'Contat via blog', $message);
                if ($messageSended) {
                    $_SESSION ['sendSuccess'] = 'Votre message a été envoyé';
                    header('Location: /contact');
                } else {
                    $_SESSION ['sendFail'] = 'Le message n\'a pas pu être envoyé';
                    header('Location: /contact');                
                }
            } else {
                $_SESSION ['error'] .= implode(', ', array_unique($errors));
                header('Location: /contact');
            }
        } 
    }
}
