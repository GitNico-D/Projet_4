<?php

namespace App\src\controller;

use App\src\DAO\ChapterManager;
use App\src\DAO\LoginsManager;
use App\src\model\View;

class LoginsController
{

    public function __construct()
    {
        $this->chapterManager = new ChapterManager();
        $this->loginsManager = new LoginsManager();
    } 
    
    // public function getLogin()
    // {
    //     if(!empty($_POST['loginsEmail']) && !empty($_POST['loginsPassword']))
    //     {
    //         $loginsEmail = $_POST['loginsEmail'];
    //         $loginsEmailList = $this->loginsManager->loginsVerification();
    //         foreach($loginsEmailList as $loginsData)
    //         {
    //             if(($loginsData->getLoginsEmail() === $_POST['loginsEmail']) && ($loginsData->getLoginsPassword() === $_POST['loginsPassword']))
    //             {
    //                 echo('Email et Password Correct');
    //                 $chaptersList = $this->chapterManager->getAllChapters();
    //                 require_once '../view/adminView.php';
    //             }
    //             else
    //             {
    //                 echo('Email ou Password invalide');
    //                 require_once '../view/loginView.php';
    //             }    
    //         }
    //     }
    //     else
    //     {   
    //         echo 'Veuillez remplir les champs !';
    //         require '../view/loginView.php';
    //     }
    //     $this->view = new View('login');
    //     return $this->view->generateView();
    // }

    public function getLogin()
    {
        if(!empty($_POST['loginsEmail']) && !empty($_POST['loginsPassword']))
        {
            $loginsEmail = htmlspecialchars($_POST['loginsEmail']);
            $passwordVerification = $this->loginsManager->loginsVerification($loginsEmail);
            $logins = password_verify($_POST['loginsPassword'], $passwordVerification->getLoginsPassword());
            if($logins)
            {
                echo('Email et Password Correct');
                $_SESSION['loginsEmail'] = $passwordVerification->getLoginsEmail();
                $_SESSION['loginsStatus'] = $passwordVerification->getLoginsStatus();
                $chaptersList = $this->chapterManager->getAllChapters();
                require_once '../view/adminView.php';
            }
            else
            {
                echo('Email ou Password invalide');
                require_once '../view/loginView.php';
            }    
            
        }
        else
        {   
            echo 'Veuillez remplir les champs !';
            require '../view/loginView.php';
        }
        // $this->view = new View('login');
        // return $this->view->generateView();
    }

}