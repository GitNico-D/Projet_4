<?php

namespace App\src\model;

class View
{
    private $file;
    private $pageTitle;

    public function __construct($page)
    {
        $this->file = '../view/' . $page . 'View.php';
    }

    public function generateView($data = [])
    {
        $content = $this->generateFile($this->file, $data);
        $view = $this->generateFile('../view/defaultView.php', array('pageTitle' => $this->pageTitle, 'content' => $content));
        echo $view;
    }

    private function generateFile($file, $data)
    {
        if (file_exists($file))
        {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        else 
        {
            throw new Exception ('Fichier ' . $file . 'introuvable');
        }
    }
}