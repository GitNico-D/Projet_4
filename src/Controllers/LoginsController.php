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
                echo('Email et Password Correct');
                $_SESSION['loginsUsername'] = $passwordVerification->getUsername();
                $_SESSION['loginsEmail'] = $passwordVerification->getEmail();
                $_SESSION['loginsStatus'] = $passwordVerification->getStatus();
                $publishedChaptersList = $this->chapterManager->getAllPublishedChapters();
                $unpublishedChaptersList = $this->chapterManager->getAllUnpublishedChapters();
                $reportedCommentList = $this->commentManager->getAllReportedComments();
                $isAdmin = true;
                require_once '../src/Views/AdminView.php';
            }
            else
            {
                echo('Email ou mot de passe invalide');
                require_once '../src/Views/LoginsView.php';
            }                
        }
        else
        {   
            echo 'Veuillez remplir les champs !';
            // var_dump($isAdmin);
            require_once '../src/Views/LoginsView.php';
        }
    }

    public function getLogout()
    {
        $_SESSION = array();
        session_destroy();
        // $chaptersList = $this->chapterManager->getAllChapters();
        // require_once './Views/HomeView.php';
        header ('Location: ../public/index.php');
    }
    
    public function returnAdminView($isAdmin)
    {
        // $chaptersList = $this->chapterManager->getAllChapters();
        $publishedChaptersList = $this->chapterManager->getAllPublishedChapters();
        $unpublishedChaptersList = $this->chapterManager->getAllUnpublishedChapters();
        $reportedCommentList = $this->commentManager->getAllReportedComments();
        require_once "../src/Views/AdminView.php";
        // header ('Location: ./index.php?page=adminView');
    }

}