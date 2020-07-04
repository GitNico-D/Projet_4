<?php

namespace App\src\Core;

use App\src\Managers\ChapterManager;
use App\src\Managers\CommentManager;
use App\src\Managers\LoginsManager;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Error\Error;
use Twig\Error\SyntaxError;
use Twig\Extension\DebugExtension;

abstract class Controller
{
    protected $chapterManager;
    protected $commentManager;
    protected $loginsManager;
    protected $loader;
    protected $twig;

    public function __construct()
    {
        $this->chapterManager = new ChapterManager();
        $this->commentManager = new CommentManager();
        $this->loginsManager = new LoginsManager();
        $this->loader = new FileSystemLoader ('../src/Views');
        $this->twig = new Environment($this->loader, array(
            "cache" => false,
            "debug" => true
        ));        
        $this->twig->addGlobal('session', $_SESSION);
        $this->twig->addExtension(new DebugExtension());
        // var_dump($this->twig);
    }
}