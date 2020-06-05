<?php

require_once "./Models/CommentManager.php";

class CommentController
{
    public function __construct()
    {
        $this->commentManager = new CommentManager();
    } 

    // public function getChapterComments($chapterId)
    // {
    //     var_dump($chapterId);
    //     $commentList = $this->commentManager->getCommentByChapterId($chapterId);
    //     require_once './Views/SingleView.php';
    // }

}