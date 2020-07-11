<?php

namespace App\src\Controllers;

use App\src\Core\Controller;

class LoginsController extends Controller
{
    /**
     * getLogin
     *
     * @return void
     */
    public function getLogin()
    {
        if(!empty($_POST['loginsEmail']) && !empty($_POST['loginsPassword']))
        {
            $loginsEmail = htmlspecialchars($_POST['loginsEmail']);
            $passwordVerification = $this->loginsManager->loginsVerification($loginsEmail);
            $logins = password_verify($_POST['loginsPassword'], $passwordVerification->getPassword());
            if($logins)
            {
                $_SESSION['loginsUsername'] = $passwordVerification->getUsername();
                $_SESSION['loginsEmail'] = $passwordVerification->getEmail();
                $_SESSION['loginsStatus'] = $passwordVerification->getStatus();
                // $commentIdList = $this->commentManager->getCommentIdList($chapterId);
                // $reportList = $this->commentManager->getReportComments($commentIdList);
                $isAdmin = true;
                echo $this->twig->render('AdminView.twig', 
                    ['publishedChaptersList' => $this->chapterManager->getAllPublishedChapters(),
                    'unpublishedChaptersList' => $this->chapterManager->getAllUnpublishedChapters(),
                    'reportedCommentList' => $this->commentManager->getAllReportedComments(),
                    // 'reportList' => $this->commentManager->getReportComments($commentIdList),
                    'isAdmin' => $isAdmin,
                    'session' => $_SESSION]
                );
            }
            else
            {
                echo('Email ou mot de passe invalide');
                // header('Location : /index');
                echo $this->twig->render('LoginsView.twig');
            }                
        }
        else
        {   
            // echo 'Veuillez remplir les champs !';
            echo $this->twig->render('LoginsView.twig');
        }
    }

    public function getLogout()
    {
        $_SESSION = array();
        session_destroy();
        header ('Location: /');
    }
    
    public function returnAdminView($isAdmin)
    {
        echo $this->twig->render('AdminView.twig', 
            ['publishedChaptersList' => $this->chapterManager->getAllPublishedChapters(),
            'unpublishedChaptersList' => $this->chapterManager->getAllUnpublishedChapters(),
            'reportedCommentList' => $this->commentManager->getAllReportedComments(),
            // 'reportList' => $this->commentManager->getReportComments($commentIdList),
            'isAdmin' => $isAdmin,
            'session' => $_SESSION]
        );
    }

    public function toBeContacted()
    {
        echo $this->twig->render('ContactView.twig');
    } 

}