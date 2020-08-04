<?php

namespace App\src\Core;
// use App\src\Managers\ChapterManager;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Error\Error;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\DebugExtension;

abstract class Controller
{
    
    // protected $chapterManager;
    protected $loader;
    protected $twig;

    public function __construct()
    {
        $config = yaml_parse_file('../config/config.yml');
        $this->loader = new FileSystemLoader('../templates');
        $this->twig = new Environment($this->loader , array(
            "cache" => false,
            "debug" => true
        ));
        $this->twig->addExtension(new DebugExtension());
        $this->twig->addGlobal('session', $_SESSION);
        $this->twig->addGlobal('locale', $config['APP_LOCALE']);
        $this->twig->addGlobal('langage', $config['APP_CHARSET']);
        // var_dump($this->twig);        
    }

    // public function __construct()
    // {
        // $this->chapterManager = new ChapterManager();
        // $this->loader = new FileSystemLoader ('../templates');
        // $this->twig = new Environment($this->loader, array(
        //     "cache" => false,
        //     "debug" => true
        // ));        
        // $this->twig->addGlobal('session', $_SESSION);
        // $this->twig->addExtension(new DebugExtension());
        // var_dump($this->loader);
    // }

    public function render($view, $options = [])
    {
        try{
            return $this->twig->render($view, $options);
        } catch(Exception $errorView) {
            die('Erreur de connection : ' . $errorView->getMessage());
        }
    }
}
