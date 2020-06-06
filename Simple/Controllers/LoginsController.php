<?php

require_once "./Models/LoginsManager.php";
require_once "./Models/ChapterManager.php";

class LoginsController
{
    public function __construct()
    {
        $this->chapterManager = new ChapterManager();
        $this->loginsManager = new LoginsManager();
    } 

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
                $_SESSION['loginsEmail'] = $passwordVerification->getEmail();
                $_SESSION['loginsStatus'] = $passwordVerification->getStatus();
                $chaptersList = $this->chapterManager->getAllChapters();
                $isConnected = true;
                require_once './Views/AdminView.php';
            }
            else
            {
                echo('Email ou Password invalide');
                require_once './Views/LoginsView.php';
            }    
            
        }
        else
        {   
            echo 'Veuillez remplir les champs !';
            require_once './Views/LoginsView.php';
        }
    }

}