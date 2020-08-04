<?php

namespace App\src\Controllers;

use App\src\Core\Controller;
use Exception;

class LoginsController extends Controller
{
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
                echo $this->twig->render(
                    'admin_page.html.twig',
                    ['allChaptersList' => $this->chapterManager->getAllChapters(),
                    'publishedChaptersList' => $this->chapterManager->getAllPublishedChapters(),
                    'unpublishedChaptersList' => $this->chapterManager->getAllUnpublishedChapters(),
                    'reportedCommentList' => $this->commentManager->getAllReportedComments(),
                    'totalReportedComments' => $this->commentManager->distinctReportedCommentsCount(),
                    // 'reportList' => $this->commentManager->getReportComments($commentIdList),
                    'isAdmin' => $isAdmin,
                    'session' => $_SESSION]
                );
            } else {
                // echo('Email ou mot de passe invalide');
                // header('Location : /index');
                echo $this->twig->render('logins.html.twig');
            }
        } else {
            // echo 'Veuillez remplir les champs !';
            echo $this->twig->render('logins.html.twig');
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
    }
    
    /**
     * returnAdminView
     *
     * @param mixed $isAdmin
     * @return void
     */
    public function returnAdminView($isAdmin)
    {
        if ($isAdmin) {
            echo $this->twig->render(
                'admin_page.html.twig',
                ['allChaptersList' => $this->chapterManager->getAllChapters(),
                'publishedChaptersList' => $this->chapterManager->getAllPublishedChapters(),
                'unpublishedChaptersList' => $this->chapterManager->getAllUnpublishedChapters(),
                'reportedCommentList' => $this->commentManager->getAllReportedComments(),
                'totalReportedComments' => $this->commentManager->distinctReportedCommentsCount(),
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
        echo $this->twig->render('contact.html.twig');
    }
}
