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
    
    public function getLogin()
    {
        if(!empty($_POST['loginsEmail']) && !empty($_POST['loginsPassword']))
        {
            $loginsEmailList = $this->loginsManager->loginsVerification();
            foreach($loginsEmailList as $loginsData)
            {
                if(($loginsData->getLoginsEmail() === $_POST['loginsEmail']) && ($loginsData->getLoginsPassword() === $_POST['loginsPassword']))
                {
                    echo('Email et Password Correct');
                    $chaptersList = $this->chapterManager->getAllChapters();
                    require_once '../view/adminView.php';
                }
                else
                {
                    echo('Email ou Password invalide');
                    require_once '../view/loginView.php';
                }    
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