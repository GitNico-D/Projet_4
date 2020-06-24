<?php

namespace App\src\Core;

use App\src\Managers\ChapterManager;
use App\src\Managers\CommentManager;
use App\src\Managers\LoginsManager;

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
    } 
}