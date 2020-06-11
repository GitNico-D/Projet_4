<?php

require_once "./Models/ChapterManager.php";
require_once "./Models/CommentManager.php";
require_once "./Models/LoginsManager.php";

abstract class Controller
{
    protected $chapterManager;
    protected $commentManager;
    protected $loginsManager;

    public function __construct()
    {
        $this->chapterManager = new ChapterManager();
        $this->commentManager = new CommentManager();
        $this->loginsManager = new LoginsManager();
    } 
}