<?php

require_once "./Models/LoginsManager.php";
require_once "./Models/ChapterManager.php";

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
                var_dump($_SESSION);
                $chaptersList = $this->chapterManager->getAllChapters();
                $isAdmin = true;
                require_once './Views/AdminView.php';
            }
            else
            {
                echo('Email ou mot de passe invalide');
                require_once './Views/LoginsView.php';
            }                
        }
        else
        {   
            echo 'Veuillez remplir les champs !';
            // var_dump($isAdmin);
            require_once './Views/LoginsView.php';
        }
    }

    public function getLogout()
    {
        $_SESSION = array();
        session_destroy();
        $chaptersList = $this->chapterManager->getAllChapters();
        // require_once './Views/HomeView.php';
        header ('Location: ./index.php');
    }
    
    public function returnAdminView($isAdmin)
    {
        $chaptersList = $this->chapterManager->getAllChapters();
        require_once "./Views/AdminView.php";
    }

}