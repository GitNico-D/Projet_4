<?php

namespace App\src\controller;

use App\src\DAO\ChapterManager;
use App\src\DAO\CommentManager;
// use App\src\model\View;

class CommentController
{
    private $commentManager;

    public function __construct()
    {
        $this->commentManager = new CommentManager;
    } 

    // public function getComment($chapterId)
    // {
    //     var_dump($chapterId);
    //     $commentList = $this->commentManager->getCommentByChapterId($chapterId);
    // }

}